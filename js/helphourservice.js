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
                    data[i].EndTimeMoment = moment(moment().format("YYYY-MM-DD") + " " + data[i].EndTime);
                    data[i].duration = moment.duration(moment("1970-01-01 " + data[i].EndTime) - moment("1970-01-01 " + data[i].StartTime));
                    data[i].dateRange = moment.range(data[i].StartTimeMoment, data[i].EndTimeMoment);


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
                url: 'api/helphours/active'
            }).success(function(data) {
                var helphours = {};
                var week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

                // Initialize the helphours object
                for(var i = 0; i < week.length; i++) {
                    helphours[week[i]] = [];
                }

                // Sort the help hours into each weekday
                for (var i = 0; i < data.length; i++) {
                    for (var j = 0; j < week.length; j++) {
                        if (data[i][week[j]]) {
                            helphours[week[j]].push(data[i]);
                        }
                    }
                }
                deferred.resolve(helphours);
            });
            return deferred.promise;
        };

        service.unapprovedHelpHours = function() {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/unapproved'
            }).success(function(data) {
                deferred.resolve(data);
            });
            return deferred.promise;
        };

        service.numUnapproved = function() {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/unapproved/count'
            }).success(function(data) {
                deferred.resolve(data);
            });
            return deferred.promise;
        };

        service.allHelpHours = function() {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/all'
            }).success(function(data) {
                deferred.resolve(data);
            });
            return deferred.promise;
        };

        service.approveHelpHour = function(id) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/approve/' + id
            }).success(function(data) {
                deferred.resolve(data);
            });

            return deferred.promise;
        };

        service.denyHelpHour = function(id) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/unapprove/' + id
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
                deferred.reject();
            });
            return deferred.promise;
        };

        service.signin = function(id) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'api/helphours/signin/' + id
            }).success(function(data) {
                deferred.resolve(data);
            }).error(function() {
                deferred.reject();
            });

            return deferred.promise;
        };


        return service;
});
