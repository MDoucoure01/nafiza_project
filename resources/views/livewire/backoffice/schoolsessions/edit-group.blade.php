
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion des groupes TD</h2>
            <small class="text-muted">Welcome to Nafiza application</small>
        </div>
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Modifier le groupe "{{ $group->name }}" </h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" method="POST" action="{{ route('group.update', ['id' => $group->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nom du groupe</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <input required name="name" value="{{ $group->name }}" type="text"
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
                                    <label for="email_address_2">Cohort</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <select name="cohort_id" class="form-control" required>
                                                <option value="{{ $group->cohort_id }}">Selectionner une cohorte</option>
                                                @foreach (request()->appActuSession->cohorts as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <textarea name="description" class="form-control" cols="30" rows="10">{{ $group->description }}</textarea>
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
                                    <button type="submit" class="btn btn-raised btn-warning m-t-15 waves-effect">Enregistrer modifications</button>
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
                        <h2>Liste des groupes</h2>
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
                                    @foreach (request()->appActuSession->groups as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><a href="{{ route('cohort.show', ['slug' => $item->cohort->slug]) }}"><span class="label bg-gray">{{ $item->cohort->name }}</span></a></td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('group.show', ['slug' =>$item->slug ]) }}" class="text-white btn btn-xs btn-success"><i class="zmdi zmdi-eye"></i></a>
                                                <a href="{{ route('group.edit', ['id' => $item->id]) }}" class="text-white btn btn-xs btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" onclick="if (!confirm('Es-tu sûr de vouloir supprimer ce groupe ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('removeGroup', {{ $item->id }}) }"><i class="zmdi zmdi-delete text-white"></i></a>
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
