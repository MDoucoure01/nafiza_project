
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
                        <div class="number">{{ $session->students->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-accounts col-green"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Professeurs</div>
                        <div class="number">{{ $session->professors->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-city-alt col-blush"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Cohortes</div>
                        <div class="number">{{ $session->cohorts->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-chart-donut col-cyan"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Groupe TD</div>
                        <div class="number">{{ $session->groups->count() }}</div>
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
                                    <li><a href="{{ route('student.add') }}">Ajouter pensionnaire</a></li>
                                    <li><a href="{{ route('students.pending.list') }}">Pensionnaires en attente</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Matricule</th>
                                    <th>Prénoms & Nom</th>
                                    <th>Cohorte</th>
                                    <th>Comité</th>
                                    <th>Téléphone</th>
                                    <th>Régime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($session->students as $item)
                                    <tr>
                                        <th>
                                            <a href="{{ route('student.profile', ['id' => $item->id]) }}">
                                                <img style="height: 30px; width: 30px" src="{{ asset('backoffice/assets/images/logo.png') }}" alt="user" class="img-thumbnail img-fluid">
                                            </a>
                                        </th>
                                        <td>{{ $item->matricule }}</td>
                                        <td>{{ $item->user->firstname.' '.$item->user->lastname }}</td>
                                        <td>{{ $item->subscription->activeCohort->name ?? '' }}</td>
                                        <td>{{ $item->conseil->comite->name }}</td>
                                        <td>{{ $item->user->phone }}</td>
                                        <td>
                                            @if ($item->online == 1)
                                                <span class="label bg-blue">en ligne</span>
                                            @else
                                                <span class="label bg-green">présentiel</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <div class="row clearfix">
            @hasanyrole('admin|root')
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
            @endhasanyrole
            @foreach ($session->cohorts as $item)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="info-box-3 bg-blue-grey">
                        <div class="icon">
                            <div class="">
                                <a href="{{ route('cohort.show', ['slug' => $item->slug]) }}" class="btn btn-xs btn-success"><i class="zmdi zmdi-eye text-white"></i></a>
                                @hasanyrole('admin|root')
                                    <a href="#" class="btn btn-xs btn-danger" onclick="if (!confirm('Es-tu sûr de vouloir supprimer cette cohorte de la session ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('removeCohort', {{ $item->id }}) }"><i class="zmdi zmdi-delete text-white"></i></a>
                                @endhasanyrole
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
                                                    @hasanyrole('admin|root')
                                                        <a href="{{ route('session.edit', ['id' => $item->id]) }}" class="text-white btn btn-xs btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                                        <button class="text-white btn btn-xs btn-danger" onclick="if(!confirm('Vous êtes sur le point de supprimer cette session. Voulez-vous continuer ?')) { event.preventDefault(); return false; }"><i class="zmdi zmdi-delete"></i></button>
                                                    @endhasanyrole
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
