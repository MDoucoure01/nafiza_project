
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Ajouter pensionnaire</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
<<<<<<< HEAD
        <form action="{{ route('student.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Informations personnelles</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="firstname" type="text" value="{{ old('firstname') }}" class="form-control" placeholder="Prénoms">
                                        </div>
                                    </div>
                                    @error('firstname')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="lastname" type="text" value="{{ old('lastname') }}" class="form-control" placeholder="Nom">
                                        </div>
                                    </div>
                                    @error('lastname')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" title="Date de naissance" name="born_date" value="{{ old('born_date') }}" class="form-control" placeholder="Date de naissance">
                                        </div>
                                    </div>
                                    @error('born_date')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="phone" type="text" value="{{ old('phone') }}" class="form-control" placeholder="No. Téléphone">
                                        </div>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="conseil_id">
                                            <option value="">__ Conseil __</option>
                                            @foreach ($comites as $comite)
                                                <optgroup label="{{ $comite->name }}">
                                                    @foreach ($comite->conseils as $conseil)
                                                        <option value="{{ $conseil->id }}">{{ $conseil->name }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('conseil_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Adresse complète">
                                        </div>
                                    </div>
                                    @error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ old('specific_desease') }}" name="specific_desease" class="form-control" placeholder="Maladie spécifique">
                                        </div>
                                    </div>
                                    @error('specific_desease')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ old('allergies') }}" name="allergies" class="form-control" placeholder="Allergies">
                                        </div>
                                    </div>
                                    @error('allergies')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick">
                                            <option value="">__ Profession __</option>
                                            @foreach ($professions as $profession)
                                                <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('profession')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="sex" required>
                                            <option value="">__ Sexe __</option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                    </div>
                                    @error('sex')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="fallback">
                                        <input name="profile_photo" type="file" />
                                    </div>
                                    @error('profile_photo')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Présentation"></textarea>
                                        </div>
=======
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Informations personnelles</h2>
					</div>
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="firstname" type="text" value="{{ old('firstname') }}" class="form-control" placeholder="Prénoms">
                                    </div>
                                </div>
                                @error('firstname')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="lastname" type="text" value="{{ old('lastname') }}" class="form-control" placeholder="Nom">
                                    </div>
                                </div>
                                @error('lastname')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="phone" type="text" value="{{ old('phone') }}" class="form-control" placeholder="No. Téléphone">
                                    </div>
                                </div>
                                @error('phone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="born_date" value="{{ old('born_date') }}" class="datepicker form-control" placeholder="Date de naissance">
                                    </div>
                                </div>
                                @error('born_date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick" name="sexe">
                                        <option value="">__ Comité - Conseil __</option>
                                        <option value="10">Male</option>
                                        <option value="20">Female</option>
                                    </select>
                                </div>
                                @error('sexe')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sex" class="form-control" placeholder="Adresse complète">
                                    </div>
                                </div>
                                @error('sex')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick">
                                        <option value="">__ Profession __</option>
                                        <option value="10">Male</option>
                                        <option value="20">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Présentation"></textarea>
>>>>>>> f5abbd3cf794dafa6828fdd56a12722e915c3115
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Informations scholaires</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick">
                                            <option value="">__ Cohorte __</option>
                                            @foreach (request()->appActuSession->cohorts as $cohort)
                                                <option value="{{ $cohort->id }}">{{ $cohort->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('profession')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select name="TD_group" class="form-control show-tick">
                                            <option value="">__ Groupe TD __</option>
                                            @foreach (request()->appActuSession->cohorts as $cohort)
                                                <optgroup label="{{ $cohort->name }}">
                                                    @foreach ($cohort->groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('TD_group')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select name="languages" class="form-control show-tick">
                                            <option value="">__ Langues parlées __</option>
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}">{{ $language->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('languages')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select name="online" class="form-control show-tick">
                                            <option value="">__ Régime de cours __</option>
                                            <option value="0">Présentiel</option>
                                            <option value="1">En ligne</option>
                                        </select>
                                    </div>
                                    @error('languages')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <input name="fee_paid" value="1" type="checkbox" id="remember_me"
                                        class="filled-in">
                                    <label for="remember_me">Frais d'inscription payés</label>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-raised btn-success ">Enregistrer</button>
                                    <a href="" class="btn btn-raised btn-default ">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
=======
				</div>
			</div>
		</div>
        <div class="row clearfix">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h2>Informations scholaires</h2>
						<ul class="header-dropdown">
							<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised btn-success ">Enregistrer</button>
                                <button type="submit" class="btn btn-raised btn-default ">Annuler</button>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
>>>>>>> f5abbd3cf794dafa6828fdd56a12722e915c3115
    </div>
</section>
