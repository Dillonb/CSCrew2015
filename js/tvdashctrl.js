app.controller('MainCtrl', function($scope, $interval, signinFactory) {
        $scope.signins = [];
        $scope.helphours = [];
        $scope.updateSignins = function() {
            signinFactory.getSigninsToday().then(function(data) {
                $scope.signins = data;
                console.log(data);
                $scope.updateChart();
            });
        }

        $scope.updateChart = function() {
            var data = new google.visualization.DataTable();

            data.addColumn('string', 'Reason');
            data.addColumn('number', 'Count');

            var rows = [];
            var dataBuild = {};

            for (var i = 0; i < $scope.signins.length; i++) {
                var signin = $scope.signins[i];

                if (!dataBuild.hasOwnProperty(signin.reason.Text)) {
                    dataBuild[signin.reason.Text] = 0;
                }
                dataBuild[signin.reason.Text] += 1;
            }

            for (key in dataBuild) {
                if (dataBuild.hasOwnProperty(key)) {
                    rows.push([key,dataBuild[key]]);
                }
            }

            data.addRows(rows);

            var options = {
                'title': 'Room Usage',
                'width': 400,
                'height': 300};

            var chart = new google.visualization.PieChart(document.getElementById('usage-chart'));
            chart.draw(data, options);
        }

        var autoUpdate = $interval($scope.updateSignins, 10000);
        $scope.updateSignins();
});
