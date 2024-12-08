<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Ajouter un cours</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="text-right">
            <a href="{{ route('payment.subscription') }}" class="btn btn-raised btn-xs btn-success"><i class="zmdi zmdi-accounts"></i></i> Inscriptions</a>
            <a href="{{ route('payment.subscription') }}" class="btn btn-raised btn-xs btn-primary"><i class="zmdi zmdi-calendar"></i></i> Mensualités</a>
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
						<h2>Ajouter paiement </h2>
					</div>
					<div class="body">
                        <form action="{{ route('course.create', ['module_id' => request()->module_id]) }}" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                @csrf
                                @method('PUT')
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group drop-custum">
                                        <label for="">Pensionnaires </label>
                                        <select multiple class="form-control show-tick" name="course_type_id" required>
                                            <option value="">-- Choisir les pensionnaires --</option>
                                            <option value="Espece">Doudou</option>
                                            <option value="Virement">Toto</option>
                                            <option value="Orange Money">Tata</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Date de paiement</label>
                                            <input name="date" type="date" value="{{ old('date') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    @error('date')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <label for="">Mode de paiement </label>
                                        <select class="form-control show-tick" name="course_type_id" required>
                                            <option value="">-- Choisir un mode --</option>
                                            <option value="Espece">En espéce</option>
                                            <option value="Virement">Virement</option>
                                            <option value="Orange Money">Par Orange Money</option>
                                            <option value="Free Money">Par Free Money</option>
                                            <option value="Wave">Par Wave</option>
                                            <option value="Non précisé">Non précisé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-raised waves-effect btn-success">Ajouter paiement</button>
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
