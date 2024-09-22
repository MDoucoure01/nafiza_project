
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Ajouter professeur</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <form action="{{ route('professor.create') }}" method="POST" enctype="multipart/form-data">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" value="{{ old('hire_date ') }}" name="hire_date " class="form-control">
                                        </div>
                                    </div>
                                    @error('hire_date ')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="{{ old('obtained_diplomas') }}" name="obtained_diplomas" class="form-control" placeholder="Diplômes obtenus">
                                        </div>
                                    </div>
                                    @error('obtained_diplomas')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" value="{{ old('experience_year') }}" name="experience_year" class="form-control" placeholder="Années d'expérience">
                                        </div>
                                    </div>
                                    @error('experience_year')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
    </div>
</section>
