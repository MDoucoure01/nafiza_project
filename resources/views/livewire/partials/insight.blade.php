
<div class="row clearfix top-report row-deck">
    <div class="col-lg-3 col-sm-6 col-md-6">
        <div class="card">
            <div class="body">
                <h3>1,100</h3>
                <p class="text-muted">New Admission</p>
                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <span class="text-small">10% higher than last month</span> </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-md-6">
        <div class="card">
            <div class="body">
                <h3>60,800</h3>
                <p class="text-muted">Total Students</p>
                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <span class="text-small">4% higher than last month</span> </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-md-6">
        <div class="card">
            <div class="body">
                <h3>12,521</h3>
                <p class="text-muted">Master</p>
                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <span class="text-small">4% higher than last month</span> </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-md-6">
        <div class="card">
            <div class="body">
                <h3>$ 24,500</h3>
                <p class="text-muted">Total Earnings(Years)</p>
                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                </div>
                <span class="text-small">15% higher than last month</span> </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>University Earnings</h2>
            </div>
            <div class="body">
                <canvas id="line_chart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Income Analysis <small>18% High then last month</small></h2>
            </div>
            <div class="body">
                <div class="stats-report">
                  <div class="stat-item">
                    <h5>Overall</h5>
                    <b class="col-black">80%</b></div>
                  <div class="stat-item">
                    <h5>Montly</h5>
                    <b class="col-black">15%</b></div>
                  <div class="stat-item">
                    <h5>Day</h5>
                    <b class="col-black">5%</b></div>
                </div>
                <div class="sparkline-pie text-center">20,4</div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Income Analysis <small>18% High then last month</small></h2>
            </div>
            <div class="body">
                <div class="stats-report">
                  <div class="stat-item">
                    <h5>Overall</h5>
                    <b class="col-black">80%</b></div>
                  <div class="stat-item">
                    <h5>Montly</h5>
                    <b class="col-black">15%</b></div>
                  <div class="stat-item">
                    <h5>Day</h5>
                    <b class="col-black">5%</b></div>
                </div>
                <div class="sparkline-pie text-center">20,4</div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>Income Analysis <small>18% High then last month</small></h2>
            </div>
            <div class="body">
                <div class="stats-report">
                  <div class="stat-item">
                    <h5>Overall</h5>
                    <b class="col-black">80%</b></div>
                  <div class="stat-item">
                    <h5>Montly</h5>
                    <b class="col-black">15%</b></div>
                  <div class="stat-item">
                    <h5>Day</h5>
                    <b class="col-black">5%</b></div>
                </div>
                <div class="sparkline-pie text-center">20,4</div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    "use strict";
    var realtime = 'on';

    function initSparkline() {
        $(".sparkline").each(function () {
            var $this = $(this);
            $this.sparkline('html', $this.data());
        });
    }

    function initDonutChart() {
        "use strict";
        Morris.Donut({
            element: 'donut_chart',
            data: [{
                label: 'Chrome',
                value: 37
            }, {
                label: 'Firefox',
                value: 30
            }, {
                label: 'Safari',
                value: 18
            }, {
                label: 'Opera',
                value: 12
            },
            {
                label: 'Other',
                value: 3
            }],
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
            formatter: function (y) {
                return y + '%'
            }
        });
    }

    var data = [], totalPoints = 110;
    function getRandomData() {
        if (data.length > 0) data = data.slice(1);

        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
            if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

            data.push(y);
        }

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]]);
        }

        return res;
    }

    "use strict";
    $(function () {
        new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
        new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));

    });

    function getChartJs(type) {
        var config = null;

        if (type === 'line') {
            config = {
                type: 'line',
                data: {
                    labels: ["Janvier", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: "My First dataset",
                        data: [5, 59, 80, 72, 56, 55, 54],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }, {
                            label: "My Second dataset",
                            data: [67, 48, 40, 32, 80, 50, 89],
                            borderColor: 'rgba(233, 30, 99, 0.75)',
                            backgroundColor: 'rgba(233, 30, 99, 0.3)',
                            pointBorderColor: 'rgba(233, 30, 99, 0)',
                            pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                            pointBorderWidth: 1
                        }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        }
        else if (type === 'bar') {
            config = {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: "My First dataset",
                        data: [55, 69, 70, 81, 56, 55, 82],
                        backgroundColor: '#dd5e89'
                    }, {
                            label: "My Second dataset",
                            data: [28, 48, 51, 19, 86, 32, 81],
                            backgroundColor: '#f7bb97'
                        }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        }

        return config;
    }


</script>
@endpush
