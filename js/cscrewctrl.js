app.controller('MainCtrl', function($scope, $interval, $timeout, userFactory, helpHourFactory, signinFactory) {
    $scope.users = [];
    $scope.timeNow = moment();
    $scope.today = function() { return moment().format("YYYY-MM-DD"); };
    $scope.now = function() { return moment(); };

    $scope.loadUsers = function() {
        userFactory.getAllUsers().then(function(data) {
            $scope.users = data;
            console.log(data);
        });
    };
    $scope.currentUser = function() {
        userFactory.getCurrentUser().then(function(data) {
            $scope.currentUser = data;
            $scope.currentUserLoaded = true;
        });
    };
    $scope.loadCurrentUserSkills = function() {
        // Wait until currentUser becomes defined to load the skills
        $scope.$watch('currentUser', function(currentUser) {
            if (currentUser.user) {
                userFactory.getUserSkills(currentUser.user.Netid).then(function(data) {
                    $scope.currentUserSkills = data;
                });
            }
        });
    };
    $scope.submitSkills = function() {
        $scope.skillsSubmitting = true;
        userFactory.submitUserSkills($scope.currentUser.user.Netid, $scope.currentUserSkills).then(function(data) {
            $scope.skillsSubmitting = false;
            $scope.skillsSubmitError = false;
        }, function(reason) {
            $scope.skillsSubmitting = false;
            $scope.skillsSubmitError = true;
        });
    };
    $scope.submit_helphour_form = function(data) {
        helpHourFactory.submitHelpHourRequest(data).then(function(data) {
            //Re-request the user's help hours
            $scope.loadCurrentUserHelpHours();
        }, function(reason) {
            alert(reason);
        });
    };
    $scope.loadCurrentUserHelpHours = function() {
        var load = function(currentUser) {
            if (currentUser.user) {
                helpHourFactory.getUserHelpHours(currentUser.user.Id, true).then(function(data) {
                    $scope.currentUserHelpHours = data;
                });
            }
        };

        // Wait until currentUser becomes defined to load the hours
        if ($scope.currentUser.user) {
            load($scope.currentUser);
        }
        else {
            $scope.$watch('currentUser', load);
        }
    };
    $scope.loadHelpHoursNow = function() {
        helpHourFactory.helpHoursNow().then(function(data) {
            $scope.helpHoursNow = data;
        });
    };
    $scope.pendingHelpHourSignins = [];
    $scope.loadHelpHoursToday = function() {
        helpHourFactory.helpHoursToday().then(function(data) {
            $scope.helpHoursToday = data;
            $scope.pendingHelpHourSignins = [];
            // Check and see if the current user has any help hours they're not signed in for
            if ($scope.currentUser.authenticated) {
                for (var i = 0; i < $scope.helpHoursToday.length; i++) {
                    if ($scope.helpHoursToday[i].User.Netid === $scope.currentUser.user.Netid && $scope.helpHoursToday[i].dateRange.contains($scope.now())) {
                        if (!$scope.helpHoursToday[i].SignedIn) {
                            $scope.pendingHelpHourSignins.push($scope.helpHoursToday[i]);
                        }
                    }
                }
            }
        });
    };
    $scope.submitProfile = function() {
        var userAvatar = document.getElementById('userAvatar');
        var doSubmit = function(netid, data) {
            $scope.profileSubmitting = true;
            userFactory.submitProfile($scope.currentUser.user.Netid, $scope.currentUser.profile).then(function(response) {
                $scope.profileSubmitting = false;
            });
        };
        // Check if the user uploaded an avatar.
        if (userAvatar.files && userAvatar.files.length) {
            var file = userAvatar.files[0];
            // Make sure we're processing an image.
            if (!file.type.match('image.*')) {
                return;
            }
            var reader = new FileReader();

            reader.onload = function(ev) {
                // File as a data url
                var contents = ev.target.result;
                console.log(contents);
                var submitData = $scope.currentUser.profile;
                submitData.profileImage = contents;

                doSubmit($scope.currentUser.user.Netid, submitData);
            };
            reader.readAsDataURL(file);
        }
        // No avatar
        else {
            doSubmit($scope.currentUser.user.Netid, $scope.currentUser.profile);
        }
    };
    $scope.getMembers = function() {
        userFactory.getMembers().then(function(data) {
            $scope.members = data;
        });
    };
    $scope.loadPendingAdminNotifications = function() {
        helpHourFactory.numUnapproved().then(function(data) {
            $scope.numUnapprovedHelpHours = data;
        });
    };

    $scope.weekdays = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];

    $scope.loadHelpHoursThisWeek = function() {
        helpHourFactory.helpHoursThisWeek().then(function(data) {
            $scope.helpHoursThisWeek = data;
        });
    };

    $scope.loadSigninStats = function() {
        signinFactory.stats().then(function(data) {
            $scope.signinStats = data;
        });
    };
    $scope.signinHelpHour = function(helphour) {
        helpHourFactory.signin(helphour.Id).then(function(response) {
            $scope.loadHelpHoursToday();
        });
    };
});
