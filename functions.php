<?php
// LDAP
require_once('UVMLdap.php');

// Initialize Propel
require_once('vendor/propel/propel1/runtime/lib/Propel.php');
Propel::init('build/conf/cscrew-conf.php');
set_include_path("build/classes" . PATH_SEPARATOR . get_include_path());


function netid_info($netid) {
    $ld = new UVMLdap;
    $results = array();
    $filter = $ld->makeFilter("uid","=",$netid);
    $result = @ldap_search($ld->ldap, $ld->ldap_base, $filter);
    if ($result) {
        $entries = ldap_get_entries($ld->ldap,$result);
        render_json($entries);
        if (count($entries) != 2 || (array_key_exists("count", $entries) && $entries["count"] != 1)) {
            return false;
        }
        $person = $entries["0"];
        return $person;
    }
}

function get_user($netid) {
    $q = new UserQuery();
    $user = $q->findOneByNetid($netid);
    // The user exists in the database
    if ($user) {
        return $user;
    }
    else {
        // We need to build it.
        $netid_info = netid_info($netid);
        if ($netid_info) {
            $name = $netid_info["givenname"]["0"] . " " . $netid_info["sn"]["0"];
            $year = $netid_info["ou"]["0"];

            $user = new User();
            $user->setNetid($netid);
            if ($year) {
                $user->setYear($year);
            }
            if ($name) {
                $user->setName($name);
            }
            $user->save();
            return $user;
        }
        else {
            // User doesn't exist in ldap either
            return false;
        }
    }
}

function signin_netid($netid, $reason_id) {
    $reason = signInReasonQuery::create()->findPK($reason_id);
    $beginOfDay = strtotime("midnight", time());
    if (!$reason) {
        return array("error"=>true,"message"=>"Invalid reason.");
    }
    $user = get_user($netid);
    if (!$user) {
        return array("error"=>true,"message"=>"Invalid NetID.");
    }
    $signins = signInQuery::create()->filterByCreatedAt(array('min'=>$beginOfDay))->filterByUser($user)->find();
    $signins = $signins->toArray();
    // If the user has signed in already today...
    if (!empty($signins)) {
        // Don't let them do it again
        return array("error"=>true,"message"=>"You've already signed in today.");
    }
    // Otherwise, sign them in.
    $signinRecord = new signIn();
    $signinRecord->setUser($user);
    $signinRecord->setsignInReason($reason);
    $signinRecord->save();
    return array("error"=>false,"message"=>"Sign-in successful.");
}

function signins_today() {
    $beginOfDay = strtotime("midnight", time());
    $signins = signInQuery::create()->filterByCreatedAt(array('min'=>$beginOfDay))->find();
    $signins_return = array();
    foreach ($signins as $signin) {
        $obj = $signin->toArray();
        $user = $signin->getUser();
        $count = signInQuery::create()->filterByUser($user)->count();
        $obj['user'] = $user->toArray();
        $obj['numSignIns'] = $count;
        $obj['reason'] = $signin->getsignInReason()->toArray();
        $signins_return[] = $obj;
    }
    return $signins_return;
}

function get_loggedin_info() {
    $who = array();
    if (array_key_exists("WEBAUTH_USER", $_SERVER)) {
        $who['authenticated'] = true;
        $who['username'] = $_SERVER['WEBAUTH_USER'];
        $who['user'] = get_user($who['username'])->toArray();
    }
    else {
        $who['authenticated'] = false;
        $who['username'] = 'anonymous';
    }
    return $who;
}

function all_users() {
    return UserQuery::create()->find();
}
?>
