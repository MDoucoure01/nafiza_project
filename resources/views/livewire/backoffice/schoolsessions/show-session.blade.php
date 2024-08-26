
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>{{ $session->name }}</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-accounts-outline col-blue"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Pensionnaires</div>
                        <div class="number">270</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-accounts col-green"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Professeurs</div>
                        <div class="number">12</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-city-alt col-blush"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Cohortes</div>
                        <div class="number">2</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-chart-donut col-cyan"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Groupe TD</div>
                        <div class="number">7</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <a href="#" class="btn btn-sm btn-primary text-white">Ajouter pensionnaires</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Liste des pensionnaires</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Dept. Name</th>
                                    <th>Brief</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>No. of Students</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>M.COM</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>B.COM</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>BBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>MBA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>MCA</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing</td>
                                    <td>info@gamil.com</td>
                                    <td>+123 456 7890</td>
                                    <td>Airi Satou</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Ajouter Cohortes </h2>
                    </div>
                    <div class="body">
                        <form class="row clearfix" action="{{ route('session.cohort.add', ['session_id' => $session->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="cohorts_number" type="number" min="{{ $session->cohorts->count() }}" max="{{ $allCohorts->count() }}" class="form-control" value="{{ $session->cohorts->count() }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-raised btn-primary m-l-15 waves-effect">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach ($session->cohorts as $item)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box-3 bg-blue-grey">
                        <div class="icon">
                            <div class="">
                                <a href="{{ route('cohort.show', ['slug' => $item->slug]) }}" class="btn btn-xs btn-success"><i class="zmdi zmdi-eye text-white"></i></a>
                                <a href="#" class="btn btn-xs btn-danger" onclick="if (!confirm('Es-tu sûr de vouloir supprimer cette cohorte de la session ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('removeCohort', {{ $item->id }}) }"><i class="zmdi zmdi-delete text-white"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size: 1.3em">{{ $item->name }}</div>
                            <div class="number">63 <i class="zmdi zmdi-accounts-outline"></i></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Autres sessions</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Session</th>
                                        <th>Début</th>
                                        <th>Fin</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schoolSessions as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="label bg-green">en cours</span>
                                                @else
                                                    <span class="label bg-red">expirée</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <form action="{{ route("session.delete", ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method("PUT")

                                                    <a href="{{ route('session.show', ['slug' =>$item->slug ]) }}" class="text-white btn btn-xs btn-success"><i class="zmdi zmdi-eye"></i></a>
                                                    <a href="{{ route('session.edit', ['id' => $item->id]) }}" class="text-white btn btn-xs btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                                    <button class="text-white btn btn-xs btn-danger" onclick="if(!confirm('Vous êtes sur le point de supprimer cette session. Voulez-vous continuer ?')) { event.preventDefault(); return false; }"><i class="zmdi zmdi-delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content -->
