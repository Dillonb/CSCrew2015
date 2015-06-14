app.controller('MainCtrl', function($scope, $interval, $timeout, userFactory) {
    $scope.users = [];

    $scope.loadUsers = function() {
        userFactory.getAllUsers().then(function(data) {
            $scope.users = data;
            console.log(data);
        });
    }
    $scope.currentUser = function() {
        userFactory.getCurrentUser().then(function(data) {
            $scope.currentUser = data;
        });
    }
    $scope.loadCurrentUserSkills = function() {
        // Wait until currentUser becomes defined to load the skills
        $scope.$watch('currentUser', function(currentUser) {
            if (currentUser.user) {
                userFactory.getUserSkills(currentUser.user.Netid).then(function(data) {
                    $scope.currentUserSkills = data;
                });
            }
        });
    }
    $scope.submitSkills = function() {
        $scope.skillsSubmitting = true;
        userFactory.submitUserSkills($scope.currentUser.user.Netid, $scope.currentUserSkills).then(function(data) {
            $scope.skillsSubmitting = false;
            $scope.skillsSubmitError = false;
        }, function(reason) {
            $scope.skillsSubmitting = false;
            $scope.skillsSubmitError = true;
        });
    }
});
