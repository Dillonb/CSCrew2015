app.controller('MainCtrl', function($scope, $interval, signinFactory, helpHourFactory) {
        $scope.signins = [];
        $scope.helphours = [];
        $scope.today = function() { return moment().format("YYYY-MM-DD"); };
        $scope.now = function() { return moment(); };
        $scope.updateSignins = function() {
            signinFactory.getSigninsToday().then(function(data) {
                $scope.signins = data;
                console.log(data);
                $scope.updateCharts();
            });
        };
        $scope.updateHelphours = function() {
            helpHourFactory.helpHoursNow().then(function(data) {
                $scope.helphours = data;
                console.log(data);
            });
        };

        $scope.updateCharts = function() {
            var usageData = new google.visualization.DataTable();
            var yearData = new google.visualization.DataTable();

            usageData.addColumn('string', 'Reason');
            usageData.addColumn('number', 'Count');


            yearData.addColumn('string', 'Year');
            yearData.addColumn('number', 'Count');

            var usageRows = [];
            var usageDataBuild = {};

            var yearRows = [];
            var yearDataBuild = {};

            for (var i = 0; i < $scope.signins.length; i++) {
                var signin = $scope.signins[i];

                if (!usageDataBuild.hasOwnProperty(signin.reason.Text)) {
                    usageDataBuild[signin.reason.Text] = 0;
                }
                usageDataBuild[signin.reason.Text] += 1;

                if (!yearDataBuild.hasOwnProperty(signin.user.Year)) {
                    yearDataBuild[signin.user.Year] = 0;
                }
                yearDataBuild[signin.user.Year] += 1;
            }

            for (var key in usageDataBuild) {
                if (usageDataBuild.hasOwnProperty(key)) {
                    usageRows.push([key,usageDataBuild[key]]);
                }
            }

            for (key in yearDataBuild) {
                if (yearDataBuild.hasOwnProperty(key)) {
                    yearRows.push([key, yearDataBuild[key]]);
                }
            }

            usageData.addRows(usageRows);
            yearData.addRows(yearRows);

            var usageOptions = {
                'title': 'Room Usage',
                'width': 400,
                'height': 300};
            var yearOptions = {
                'title': 'Year Distribution',
                'width': 400,
                'height': 300};

            var usageChart = new google.visualization.PieChart(document.getElementById('usage-chart'));
            var yearChart = new google.visualization.PieChart(document.getElementById('year-chart'));
            usageChart.draw(usageData, usageOptions);
            yearChart.draw(yearData, yearOptions);
        };

        function refreshData() {
            $scope.updateSignins();
            $scope.updateHelphours();
        }

        var autoUpdate = $interval(refreshData, 10000);
        refreshData();
});
