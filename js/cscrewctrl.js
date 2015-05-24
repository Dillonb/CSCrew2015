app.controller('MainCtrl', function($scope, $interval, $timeout, userFactory) {
    $scope.users = [];

    $scope.loadUsers = function() {
        userFactory.getAllUsers().then(function(data) {
            $scope.users = data;
        });
    }
});
