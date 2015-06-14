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

        service.getUserSkills = function(netid) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/users/skills/' + netid,
                }).success(function(data) {
                    deferred.resolve(data);
                }).error(function() {
                    deferred.reject("Error retrieving user's skills.");
                });
            return deferred.promise;
        }
        service.submitUserSkills = function(netid, skills) {
            var deferred = $q.defer();
            $http.post('api/users/skills/' + netid, skills)
                .success(function() {
                    deferred.resolve(true);
                }).error(function() {
                    deferred.reject(false);
                });
            return deferred.promise;
        }
        return service;
});
