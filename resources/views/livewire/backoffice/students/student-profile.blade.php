
<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Pensionnaire Profil</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class=" card">
                    <img style="width: 100%; height: 300px; object-fit: contain" src="{{ asset('backoffice/assets/images/logo.png') }}" class="img-fluid" alt="">
                </div>
                <div class="card">
                    <div class="body">
                        <strong>Prénoms & Nom</strong>
                        <p>{{ $student->user->firstname.' '.$student->user->lastname }}</p>
                        <strong>Cohorte</strong>
                        <p>{{ $currentCohort->name ?? '' }}</p>
                        <strong>Groupe TD</strong>
                        {{-- <p>{{ $currentCohort }}</p> --}}
                        <hr>
                        <strong>Matricule</strong>
                        <address>{{ $student->matricule }}</address>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#report">A propos</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Activitiés</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#payment">Paiements</a></li>
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#update">Mettre à jour</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="report">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <div class="post-box">
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                                        </div>
                                        {{-- <hr>
                                        <div class="post-box">
                                            <h4>Skill Set</h4>
                                            <div class="body p-l-0 p-r-0">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div>Cake PHP</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%"> <span class="sr-only">80% Complete (success)</span> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>CSS</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:50%"> <span class="sr-only">50% Complete</span> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>PHP</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>HTML</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:20%"> <span class="sr-only">20% Complete (danger)</span> </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                        <hr>
                                        <h4>Détails</h4>
                                        <strong>Comité</strong>
                                        <p>{{ $student->conseil->comite->name }}</p>
                                        <strong>Conseil</strong>
                                        <p>{{ $student->conseil->name }}</p>
                                        <strong>Phone</strong>
                                        <p>{{ $student->user->phone }}</p>
                                        <strong>Adresse</strong>
                                        <p>{{ $student->user->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border">
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small">Just now</div>
                                                <p>It is a long established.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">11:30</div>
                                                <p>There are many variations</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small">10:30</div>
                                                <p>Contrary to popular belief </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning">
                                            <div class="item-content">
                                                <div class="text-small">3 days ago</div>
                                                <p>vacation</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text--muted">Thu, 10 Mar</div>
                                                <p>Contrary to popular belief</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Sat, 5 Mar</div>
                                                <p>Routine Checkup</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text-small">Sun, 11 Feb</div>
                                                <p>Blood checkup test</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Thu, 17 Jan</div>
                                                <p>Admission</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="payment">
                                <p>Paiements</p>
                            </div>
                            <div role="tabpanel" class="tab-pane in active" id="update">
                                <form action="{{ route('student.update', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
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
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <label for="">Photo de profi</label>
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
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input name="firstname" type="text" value="{{ $student->user->firstname }}" class="form-control" placeholder="Prénoms">
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
                                                                    <input name="lastname" type="text" value="{{ $student->user->lastname }}" class="form-control" placeholder="Nom">
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
                                                                    <input type="date" title="Date de naissance" name="born_date" value="{{ $student->born_date }}" class="form-control" placeholder="Date de naissance">
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
                                                                    <input name="phone" type="text" value="{{ $student->user->phone }}" class="form-control" placeholder="No. Téléphone">
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
                                                                    <input type="email" name="email" value="{{ $student->user->email }}" class="form-control" placeholder="Email">
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
                                                                    <option value="{{ $student->conseil->id }}">__ Changer conseil __</option>
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
                                                                    <input type="text" name="address" value="{{ $student->user->address }}" class="form-control" placeholder="Adresse complète">
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
                                                                    <input type="text" value="{{ $student->specific_desease }}" name="specific_desease" class="form-control" placeholder="Maladie spécifique">
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
                                                                    <input type="text" value="{{ $student->allergies }}" name="allergies" class="form-control" placeholder="Allergies">
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
                                                                <select name="specific_skills" class="form-control show-tick">
                                                                    <option value="{{ $student->user->specific_skills }}">__ Profession __</option>
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
                                                                    <option value="{{ $student->user->sex }}">__ Sexe __</option>
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
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <textarea name="presentation" rows="4" class="form-control no-resize" placeholder="Présentation">{{ $student->user->presentation }}</textarea>
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
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group drop-custum">
                                                                <select class="form-control show-tick">
                                                                    <option value="A">__ Cohorte __</option>
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
                                                                    <option value="{{ $student->online }}">__ Régime de cours __</option>
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
                                                            <input name="fee_paid" value="1" @if($subscription->is_active == 1) checked @endif type="checkbox" id="remember_me"
                                                                class="filled-in">
                                                            <label for="remember_me">Frais d'inscription payés </label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12 text-right">
                                                            <button type="submit" class="btn btn-raised btn-success ">Enregistrer modification</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
