<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Détails cours</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <a href="{{ route('course.add') }}" class="btn btn-raised btn-success" role="button">Ajouter un cours</a>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>A propos</h2>
                    </div>
                    <div class="body">
                        <p class="m-b-0">Titre</p>
                        <h4 class="col-blush">{{ $course->title }}</h4>
                        <p class="m-b-0">Module</p>
                        <h5>{{ $course->module->name }}</h5>
                        <p class="m-b-0">Type</p>
                        <h5>{{ $course->courseType->name }}</h5>
                        @if ($course->file)
                            <p class="m-b-0">Fichier</p>
                            <a href="{{ asset('storage') }}/{{ $course->file }}" download="" class="btn btn-secondary"><i class="zmdi zmdi-download"></i> Télécharger fichier</a>
                        @endif
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
                                <p>{!! $course->description !!}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="update">
                                <h5>Modifer le cours</h5>
                                <form action="{{ route('course.update', ['id' => $course->id]) }}" method="POST" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="">Titre</label>
                                                    <input name="name" type="text" value="{{ $course->title }}" class="form-control" placeholder="Titre du cours" required>
                                                </div>
                                            </div>
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group drop-custum">
                                                <label for="">Module</label>
                                                <select class="form-control show-tick" name="module_id" required>
                                                    <option value="{{ $course->module->id }}">-- {{ $course->module->name }} --</option>
                                                    @foreach ($modules as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group drop-custum">
                                                <label for="">Type</label>
                                                <select class="form-control show-tick" name="course_type_id" required>
                                                    <option value="{{ $course->courseType->id }}">-- {{ $course->courseType->name }} --</option>
                                                    @foreach ($courseTypes as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <br>
                                            <label for="">Changer fichier</label>
                                            <div class="fallback">
                                                <input name="file" type="file" value="{{ old('file') }}" />
                                            </div>
                                            @error('file')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <p for="">Description du cours</p>
                                                <div class="form-line">
                                                    <textarea id="ckeditor" name="description">{{ $course->description }}</textarea>
                                                </div>
                                                @error('description')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-raised waves-effect btn-success">Modifier cours</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content -->
