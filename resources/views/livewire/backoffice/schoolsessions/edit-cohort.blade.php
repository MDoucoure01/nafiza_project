
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion des Cohortes</h2>
            <small class="text-muted">Welcome to Nafiza application</small>
        </div>
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Modifiée "{{ $cohort->name }}"</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="{{ route('cohort.update', ['id' => $cohort->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Nom de la cohorte</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <input required name="name" value="{{ $cohort->name }}" type="text"
                                                class="form-control" placeholder="Entrer le nom de la cohorte">
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
                                    <label>Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <textarea name="description" class="form-control" cols="30" rows="10">{{ $cohort->description }}</textarea>
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
                        <h2>Les des cohortes</h2>
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
                                    @foreach ($cohorts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-right">
                                                <form action="{{ route("cohort.delete", ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method("PUT")

                                                    <a href="{{ route('cohort.show', ['slug' => $item->slug]) }}" class="text-white btn btn-xs btn-success"><i class="zmdi zmdi-eye"></i></a>
                                                    <a href="{{ route('cohort.edit', ['id' => $item->id]) }}" class="text-white btn btn-xs btn-primary"><i class="zmdi zmdi-edit"></i></a>
                                                    <button class="text-white btn btn-xs btn-danger" onclick="if(!confirm('Vous êtes sur le point de supprimer cette cohorte. Voulez-vous continuer ?')) { event.preventDefault(); return false; }"><i class="zmdi zmdi-delete"></i></button>
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
