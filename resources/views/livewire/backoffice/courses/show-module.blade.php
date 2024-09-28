<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion de module</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <a href="{{ route('course.add', ['module_id' => $module->id]) }}" class="btn btn-raised btn-success" role="button">Ajouter un cours</a>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>A propos</h2>
                    </div>
                    <div class="body">
                        <p class="m-b-0">Module</p>
                        <h4 class="col-blush">{{ $module->name }}</h4>
                        <p class="m-b-0">Début</p>
                        <h4>{{ \Carbon\Carbon::parse($module->start_date)->format('d-m-Y') }}</h4>
                        <p class="m-b-0">Fin</p>
                        <h4>{{ \Carbon\Carbon::parse($module->end_date)->format('d-m-Y') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Description</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#update">Modification</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="description">
                                <p>{{ $module->description }}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="update">
                                <h5>Modifer le module</h5>
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
            </div>
        </div>
        <div class="col-sm-12 block-header">
            <h3>Liste des cours</h3>
        </div>
        <div class="row clearfix">
            @foreach ($module->courses as $item)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="thumbnail card">
                        <div class="caption  body">
                            <h3>{{ $item->title }}</h3>
                            <p>Type: <strong class="col-green">{{ $item->courseType->name }}</strong></p>
                            <a href="{{ route('course.show', ['id' => $item->id]) }}" class="btn  btn-raised btn-info waves-effect" role="button">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- main content -->
