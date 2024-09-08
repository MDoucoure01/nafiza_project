
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>{{ $group->name }}</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-accounts-outline col-blue"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1em">Pensionnaires</div>
                        <div class="number">{{ $group->subscriptions->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-file col-blue"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1em">Thèmatiques</div>
                        <div class="number">270</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Liste des pensionnaires</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Matricule</th>
                                    <th>Prénoms & Nom</th>
                                    <th>Comité</th>
                                    <th>Téléphone</th>
                                    <th>Régime</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->subscriptions as $item)
                                    <tr>
                                        <th>
                                            <a href="{{ route('student.profile', ['id' => $item->student->id]) }}">
                                                <img style="height: 30px; width: 30px" src="{{ asset('backoffice/assets/images/logo.png') }}" alt="user" class="img-thumbnail img-fluid">
                                            </a>
                                        </th>
                                        <td>{{ $item->student->matricule }}</td>
                                        <td>{{ $item->student->user->firstname.' '.$item->student->user->lastname }}</td>
                                        <td>{{ $item->student->conseil->comite->name }}</td>
                                        <td>{{ $item->student->user->phone }}</td>
                                        <td>
                                            @if ($item->student->online == 1)
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

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Autres Groupes</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Groupe</th>
                                        <th>Cohorte</th>
                                        <th>Créé le</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($otherGroups as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><a href="{{ route('cohort.show', ['slug' => $item->cohort->slug]) }}"><span class="label bg-gray">{{ $item->cohort->name }}</span></a></td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('group.show', ['slug' =>$item->slug ]) }}" class="text-white btn btn-xs btn-success"><i class="zmdi zmdi-eye"></i></a>
                                                @hasanyrole('admin|root')
                                                    <a href="{{ route('group.edit', ['id' => $item->id]) }}" class="text-white btn btn-xs btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                                    <a href="#" class="btn btn-xs btn-danger" onclick="if (!confirm('Es-tu sûr de vouloir supprimer ce groupe ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('removeGroup', {{ $item->id }}) }"><i class="zmdi zmdi-delete text-white"></i></a>
                                                @endhasanyrole
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
