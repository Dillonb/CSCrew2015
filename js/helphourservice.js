app.factory('helpHourFactory', function($http, $q, $interval) {
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
            var deferred = $q.defer();
            $http({
                method:'GET',
                url:'api/helphours/now'
            }).success(function(data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].StartTimeMoment = moment(moment().format("YYYY-MM-DD") + " " + data[i].StartTime);
                    data[i].duration = moment.duration(moment("1970-01-01 " + data[i].EndTime) - moment("1970-01-01 " + data[i].StartTime));


                    data[i].updateTimeRemaining = function() {
                        this.timeRemaining = moment() - this.StartTimeMoment;
                    }.bind(data[i]);
                    data[i].updateTimeRemaining();
                    data[i].timeRemainingInterval = $interval(data[i].updateTimeRemaining, 1000);
                }
                deferred.resolve(data);
            });
            return deferred.promise;
        };

        service.helpHoursToday = function() {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/today'
            }).success(function(data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].StartTimeMoment = moment(moment().format("YYYY-MM-DD") + " " + data[i].StartTime);
                    data[i].EndTimeMoment = moment(moment().format("YYYY-MM-DD") + " " + data[i].EndTime);
                    data[i].dateRange = moment.range(data[i].StartTimeMoment, data[i].EndTimeMoment);
                }
                deferred.resolve(data);
            });
            return deferred.promise;
        };

        service.helpHoursThisWeek = function() {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/thisweek'
            }).success(function(data) {
                deferred.resolve(data);
            });
            return deferred.promise;
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
