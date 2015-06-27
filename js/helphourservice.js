app.factory('helpHourFactory', function($http, $q) {
        var service = {};

        service.submitHelpHourRequest = function(data) {
            var deferred = $q.defer();

            $http({
                method:'POST',
                url:'api/helphours/submit',
                data: data
            }).success(function(data) {
                deferred.resolve(data);
            }).error(function() {
                deferred.reject("Error submitting help hours.");
            });

            return deferred.promise;
        };

        service.helpHoursNow = function() {
        };

        service.helpHoursToday = function() {
        };

        service.helpHoursThisWeek = function() {
        };

        service.getUserHelpHours = function(userid, include_unapproved) {
            var deferred = $q.defer();
            var url = 'api/helphours/get/' + userid;
            if (include_unapproved) {
                url += '?unapproved=1';
            }
            $http({
                method:'GET',
                url:url,
            }).success(function(data) {
                deferred.resolve(data);
            }).error(function() {
                deferred.reject(data);
            });
            return deferred.promise;
        };


        return service;
});
