app.factory('userFactory', function($http, $q) {
        var service = {};

        service.getCurrentUser = function() {
            var deferred = $q.defer();
            $http({
                method:'GET',
                url:'api/whoami'
                }).success(function(data) {
                    deferred.resolve(data);
                }).error(function() {
                    deferred.reject("Error retrieving current user.");
                });
            return deferred.promise;
        }

        service.getAllUsers = function() {
            var deferred = $q.defer();
            $http({
                method:'GET',
                url:'api/users/list'
                }).success(function(data) {
                    deferred.resolve(data);
                }).error(function() {
                    deferred.reject("Error retrieving user list.");
                });
            return deferred.promise;
        }

        return service;
});
