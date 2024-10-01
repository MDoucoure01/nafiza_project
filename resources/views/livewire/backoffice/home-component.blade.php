<!-- main content -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Tableau de bord</h2>
                    <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
                </div>
                {{-- <div>
                    <a href="#" class="btn btn-raised btn-defualt">Download Report</a>
                    <a href="#" class="btn btn-raised btn-primary">Export</a>
                </div> --}}
            </div>
        </div>

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
                        <div class="sparkline-pie text-center">13,45</div>
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
                        <div class="sparkline-pie text-center">47,40</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix col-lg-12">
            <div class="block-header">
                <h2>Calendrier des cours</h2>
            </div>
            @livewire('partials.appointment')
        </div>
	</div>
</section>
<!-- main content -->

@push('scripts')
<script>
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
                    labels: {!! json_encode($months) !!},
                    datasets: [{
                        label: "Cohorte A",
                        data: {!! json_encode($attendancesByMonthA) !!},
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }, {
                            label: "Cohorte B",
                            data: {!! json_encode($attendancesByMonthB) !!},
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
