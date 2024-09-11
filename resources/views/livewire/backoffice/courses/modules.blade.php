
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion des modules de cours</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <!-- Horizontal Layout -->
        @hasanyrole('admin|root')
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Ajouter un nouveau module </h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="{{ route('module.create') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Nom du module</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <input required name="name" value="{{ old('name') }}" type="text"
                                                class="form-control" placeholder="Entrer le nom du module">
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
                                                du: <input required name="start_date" value="{{ old('start_date') }}"
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
                                                au: <input required name="end_date" value="{{ old('end_date') }}"
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
                                            <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
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
                                <div class="offset-lg-2 col-lg-10 text-right">
                                    <button type="submit" class="btn btn-raised btn-warning m-t-15 waves-effect">Créer cohorte</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endhasanyrole
        <!-- #END# Horizontal Layout -->
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Les des modules</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Modules</th>
                                        <th>Date de début</th>
                                        <th>Date de fin</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
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
            <!-- #END# Task Info -->
        </div>
    </div>
</section>
