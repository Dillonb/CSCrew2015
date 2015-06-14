<?php
require_once('vendor/autoload.php');
require_once('functions.php');

$app = new \Slim\Slim();

function render_json($data) {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->headers->set('Access-Control-Allow-Origin', '*');
    $app->response->setBody( json_encode($data, JSON_NUMERIC_CHECK) . "\n");
    $app->stop;
}

function render_json_string($data) {
    $app = \Slim\Slim::getInstance();
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->headers->set('Access-Control-Allow-Origin', '*');
    $app->response->setBody( $data . "\n");
    $app->stop;
}

function require_authenticated($who = false, $requireNetid = null, $adminOk = false) {
    if (!$who) {
        $who = get_loggedin_info();
    }
    if ($who['authenticated']) {
        // If a specific netid is required, check and see if it matches.
        if ($requireNetid != null) {
            if ($requireNetid == $who['username']) {
                return true;
            }
            elseif ($adminOk) {
                return $who['user']['IsAdmin'];
            }
        }
        return true;
    }

    $app = \Slim\Slim::getInstance();
    $app->response->status(401);
    render_json(array("error"=>true,"message"=>"This endpoint requires authentication."));
    return false;
}
function require_admin($who = false) {
    if (!$who) {
        $who = get_loggedin_info();
    }

    require_authenticated($who); // Pass $who as a parameter so it doesn't need to be requested again.
    if (array_key_exists("user",$who)) {
        if ($who['user']['IsAdmin']) {
            return true;
        }
    }
    // If any of those if statements above fail, and the function does not return, the user must not be an admin.
    $app = \Slim\Slim::getInstance();
    $app->response->setStatus(401);
    render_json(array("error"=>true,"message"=>"Endpoint is for administrators only."));
    return false;
}

//$app->group('/api', function() use ($app) {
    $app->get('/netid-info/:netid', function($netid) use($app) {
        render_json(netid_info($netid));
    });
    $app->get('/netid-db/:netid', function($netid) use ($app) {
        render_json_string(get_user($netid)->toJSON());
    });
    $app->get('/signin/:netid/:reason', function($netid, $reason) use ($app) {
        $result = signin_netid($netid, $reason);
        render_json($result);
    });
    $app->group('/signins', function() use ($app) {
        $app->get('/today', function() use ($app) {
            render_json(signins_today());
        });
        $app->get('/reasons', function() use ($app) {
            $reasons = signInReasonQuery::create()->find();
            render_json($reasons->toArray());
        });
    });
    $app->group('/users', function() use ($app) {
        $app->get('/list', function() use ($app) {
            if (!require_admin()) {return;}
            render_json(all_users()->toArray());
        });
        $app->get('/skills/:netid', function($netid) use ($app) {
            render_json(skills_netid($netid));
        });
        $app->post('/skills/:netid', function($netid) use ($app) {
            // We need to be logged in, AND have it be the correct user (or an admin)
            if (!require_authenticated(false,$netid,true)) {return;}

            $data = $app->request->getBody();
            if (!$data) {
                $app->stop();
            }
            $data = json_decode($data,true);
            update_skills($netid, $data);
            render_json(array("success"=>true));
        });
    });
    $app->get('/whoami', function() use ($app) {
        $who = get_loggedin_info();
        render_json($who);
    });
//});

$app->run();
