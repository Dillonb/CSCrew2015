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
            console.log(data);
        });
    }
});
