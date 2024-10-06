<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Ajouter un cours</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            @if (request()->module_id)
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a href="{{ route('module.show', ['id' => request()->module_id ]) }}" class="btn btn-raised btn-primary">Retour au module</a>
                </div>
            @endif
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Informations du cours </h2>
					</div>
					<div class="body">
                        <form action="{{ route('course.create', ['module_id' => request()->module_id]) }}" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                @csrf
                                @method('PUT')
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Titre du cours" required>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if (!request()->module_id)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group drop-custum">
                                            <select class="form-control show-tick" name="module_id" required>
                                                <option value="">-- Module de cours --</option>
                                                @foreach ($modules as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="course_type_id" required>
                                            <option value="">-- Type de cours --</option>
                                            @foreach ($courseTypes as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <label for="">Ajouter fichier</label>
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
                                            <textarea id="ckeditor" name="description">{{ old('description') }}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-raised waves-effect btn-success">Ajouter cours</button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
    </div>
</section>
<!-- main content -->
