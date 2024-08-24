<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion des sessions</h2>
            <small class="text-muted">Welcome to Nafiza application</small>
        </div>
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Modifier la session {{ $session->name }}</h2>
                    </div>
                    <div class="body">
                        @if (Session::has('message'))
                            <p class="alert alert-danger text-center" role="alert"><i class="zmdi zmdi-info"></i>
                                {!! Session::get('message') !!}</p>
                        @endif
                        <form class="form-horizontal" action="{{ route('session.update', ['id' => $session->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nom de la session</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <input required name="name" value="{{ $session->name }}" type="text"
                                                class="form-control" placeholder="Entrer le nom de la session">
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Période</label>
                                </div>
                                <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                                        <div class="form-group mt-0 mb-4">
                                            <div class="form-line">
                                                du: <input required name="start_date" value="{{ $session->start_date }}"
                                                    type="date" class="form-control">
                                                @error('start_date')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                                        <div class="form-group mt-0 mb-4">
                                            <div class="form-line">
                                                au: <input required name="end_date" value="{{ $session->end_date }}"
                                                    type="date" class="form-control">
                                                @error('end_date')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <textarea name="description" class="form-control" cols="30" rows="10">{{ $session->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                @if ($session->status == 1)
                                    <div class="offset-lg-2 col-lg-10">
                                        <input name="status" checked value="1" type="checkbox" id="remember_me"
                                            class="filled-in">
                                        <label for="remember_me">Décocher pour désactiver la session</label>
                                    </div>
                                @else
                                    <div class="offset-lg-2 col-lg-10">
                                        <input name="status" value="1" type="checkbox" id="remember_me"
                                            class="filled-in">
                                            <label for="remember_me">Cocher pour désactiver la session</label>
                                        </div>
                                @endif
                            </div>
                            <div class="row clearfix text-right">
                                <div class="offset-lg-2 col-lg-10">
                                    <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">Modifier
                                        session</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Horizontal Layout -->
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Liste des sessions</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i
                                        class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
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

                                                    <a href="#" class="text-white btn btn-xs btn-success"><i class="zmdi zmdi-eye"></i></a>
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
            <!-- #END# Task Info -->
        </div>
    </div>
</section>
