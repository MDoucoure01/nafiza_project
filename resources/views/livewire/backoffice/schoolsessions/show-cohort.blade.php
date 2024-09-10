
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>{{ $cohort->name }}</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-accounts-outline col-blue"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1em">Pensionnaires</div>
                        <div class="number">{{ $cohort->subscriptions->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-accounts col-green"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Professeurs</div>
                        <div class="number">{{ request()->appActuSession->professors->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-chart-donut col-cyan"></i> </div>
                    <div class="content">
                        <div class="text" style="font-size: 1.3em">Groupe TD</div>
                        <div class="number">{{ $cohort->groups->count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <a href="{{ route('cohort.new.students', ['slug' => $cohort->slug]) }}" class="btn btn-sm btn-primary text-white"><i class="zmdi zmdi-sign-in"></i> Ajouter pensionnaires à la cohorte</a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Liste des pensionnaires</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ route('student.add') }}">Ajouter pensionnaire</a></li>
                                    <li><a href="{{ route('student.add') }}">Ajouter dans la cohorte</a></li>
                                    <li><a href="{{ route('students.pending.list') }}">En attente</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Matricule</th>
                                    <th>Prénoms & Nom</th>
                                    <th>Comité</th>
                                    <th>Téléphone</th>
                                    <th>Régime</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cohort->subscriptions as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('student.profile', ['id' => $item->student->id]) }}">
                                                <img style="height: 30px; width: 30px" src="{{ asset('backoffice/assets/images/logo.png') }}" alt="user" class="img-thumbnail img-fluid">
                                            </a>
                                        </td>
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
                                        <td>
                                            <button wire:click="detachStudent({{ $item->id }})" title="Enlever ce pensionnaire de cette cohorte"><span class="label bg-red">détacher</span></button>
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
            @foreach ($cohort->groups as $item)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="info-box-3 bg-blue">
                        <div class="icon">
                            <div class="">
                                <a href="{{ route('group.show', ['slug' => $item->slug]) }}" class="btn btn-xs btn-success"><i class="zmdi zmdi-eye text-white"></i></a>
                                @hasanyrole('admin|root')
                                    <a href="#" class="btn btn-xs btn-danger" onclick="if (!confirm('Es-tu sûr de vouloir supprimer ce groupe ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('removeGroup', {{ $item->id }}) }"><i class="zmdi zmdi-delete text-white"></i></a>
                                @endhasanyrole
                            </div>
                        </div>
                        <div class="content">
                            <div class="text">{{ $item->name }}</div>
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
                        <h2>Autres Cohortes</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cohortes</th>
                                        <th>Créé le</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($otherCohorts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-right">
                                                <form action="{{ route("cohort.delete", ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method("PUT")

                                                    <a href="{{ route('cohort.show', ['slug' => $item->slug]) }}" class="text-white btn btn-xs btn-success"><i class="zmdi zmdi-eye"></i></a>
                                                    @hasanyrole('admin|root')
                                                        <a href="{{ route('cohort.edit', ['id' => $item->id]) }}" class="text-white btn btn-xs btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                                        <button class="text-white btn btn-xs btn-danger" onclick="if(!confirm('Vous êtes sur le point de supprimer cette cohorte. Voulez-vous continuer ?')) { event.preventDefault(); return false; }"><i class="zmdi zmdi-delete"></i></button>
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
