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

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-3 bg-green">
                    <div class="icon">
                        <i class="zmdi zmdi-accounts-outline"></i>
                    </div>
                    <div class="content">
                        <div class="text">Total Pensionnaires</div>
                        <div class="number">{{ $nbrStudentsActif }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-3 bg-blush">
                    <div class="icon">
                        <i class="zmdi zmdi-account"></i>
                    </div>
                    <div class="content">
                        <div class="text">Total Professeurs</div>
                        <div class="number">{{ request()->appActuSession->professors->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-3 bg-blue">
                    <div class="icon">
                        <i class="zmdi zmdi-graduation-cap"></i>
                    </div>
                    <div class="content">
                        <div class="text">Total cours</div>
                        <div class="number">{{ $nbrCourses }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-3 bg-blue-grey">
                    <div class="icon">
                        <i class="zmdi zmdi-accounts"></i>
                    </div>
                    <div class="content">
                        <div class="text">Inscrits en attente</div>
                        <div class="number">{{ request()->appActuSession->students->count() - $nbrStudentsActif }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Courbes des présences mensuelles par cohorte</h2>
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
                        <h2>Rapport Inscrits / En attente <small>Diagramme du nombre d'inscrits validés et en attente</small></h2>
                    </div>
                    <div class="body">
                        <div class="stats-report">
                          <div class="stat-item">
                            <h5>Valide</h5>
                            <b class="col-black">{{ round($nbrStudentsActif * 100 / request()->appActuSession->students->count()) }}%</b></div>
                          <div class="stat-item">
                            <h5>En attente</h5>
                            <b class="col-black">{{ round((request()->appActuSession->students->count() - $nbrStudentsActif) * 100 / request()->appActuSession->students->count()) }}%</b></div>
                        </div>
                        <div class="sparkline-pie text-center">{{ request()->appActuSession->students->count() - $nbrStudentsActif }},{{ $nbrStudentsActif }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>Rapport Présentiel / en ligne <small>Diagramme du nombre de pensionnaires en ligne et hors ligne</small></h2>
                    </div>
                    <div class="body">
                        <div class="stats-report">
                          <div class="stat-item">
                            <h5>Présentiel</h5>
                            <b class="col-black">{{ round(($nbrStudentsActif - $nbrStudentsOnLine) * 100 / $nbrStudentsActif) }}%</b></div>
                          <div class="stat-item">
                            <h5>En ligne</h5>
                            <b class="col-black">{{ round($nbrStudentsOnLine * 100 / $nbrStudentsActif) }}%</b></div>
                        </div>
                        <div class="sparkline-pie text-center">{{ $nbrStudentsOnLine }},{{ $nbrStudentsActif - $nbrStudentsOnLine }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>Rapport hommes / femmes <small>Diagramme du nombre de pensionnaires hommes et femmes</small></h2>
                    </div>
                    <div class="body">
                        <div class="stats-report">
                          <div class="stat-item">
                            <h5>Homme</h5>
                            <b class="col-black">{{ round(($nbrStudentsActif - $nbrStudentsFem) * 100 / $nbrStudentsActif) }}%</b></div>
                          <div class="stat-item">
                            <h5>Femme</h5>
                            <b class="col-black">{{ round($nbrStudentsFem * 100 / $nbrStudentsActif) }}%</b></div>
                        </div>
                        <div class="sparkline-pie text-center">20,4</div>
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
