app.factory('signinFactory', function($http, $q) {
        var service = {};

        service.getSigninsToday = function() {
            var deferred = $q.defer();
            $http({
                method:'GET',
                url:'api/signins/today'
                }).success(function(data) {
                    deferred.resolve(data);
                }).error(function() {
                    deferred.reject("Error retrieving list of signins");
                });
            return deferred.promise;
        };

        service.getReasons = function() {
            var deferred = $q.defer();
            $http({
                method:'GET',
                url:'api/signins/reasons'
                }).success(function(data) {
                    deferred.resolve(data);
                }).error(function() {
                    deferred.reject("Error retrieving list of reasons.");
                });
            return deferred.promise;
        };

        service.signinNetid = function(netid,reason) {
            var deferred = $q.defer();
            $http({
                method:'GET',
                url:'api/signin/'+netid+'/'+reason
            }).success(function(data) {
                deferred.resolve(data);
            }).error(function() {
                deferred.reject("Error signing in.");
            });
            return deferred.promise;
        };

        service.stats = function() {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/signins/stats'
            }).success(function(data) {
                deferred.resolve(data);
            }).error(function() {
                deferred.reject("Error getting stats.");
            });
            return deferred.promise;
        };
        return service;
});
