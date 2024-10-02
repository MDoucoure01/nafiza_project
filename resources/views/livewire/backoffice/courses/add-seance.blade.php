
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion des séances de cours</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <a href="{{ route('seances.list') }}" class="btn btn-primary text-white"><i class="zmdi zmdi-calendar"></i> Liste des séances</a>
                <a href="" class="btn btn-secondary"><i class="zmdi zmdi-plus"></i> Nouveau cours</a>
                <a href="" class="btn btn-secondary"><i class="zmdi zmdi-plus"></i> Nouveau professeur</a>
            </div>
        </div>
        <!-- Horizontal Layout -->
        @hasanyrole('admin|root')
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Ajouter une séance de cours</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="{{ route('seance.create') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix col-lg-12">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="cohort_id" required>
                                            <option value="">-- Cohort --</option>
                                            @foreach ($cohorts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="professor_id" required>
                                            <option value="">-- Professeur / Animateur --</option>
                                            @foreach ($professors as $item)
                                                <option value="{{ $item->id }}">{{ $item->user->firstname.' '.$item->user->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="course_id" required>
                                            <option value="">-- Cours --</option>
                                            @foreach ($courses as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix col-lg-12">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            Date: <input required name="date" value="{{ old('date') }}"
                                                type="date" class="form-control">
                                            @error('date')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            Heure de début: <input required name="start_time" value="{{ old('start_time') }}"
                                                type="time" class="form-control">
                                            @error('start_time')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            Heure de fin: <input required name="end_time" value="{{ old('end_time') }}"
                                                type="time" class="form-control">
                                            @error('end_time')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group mt-0 mb-4">
                                        <div class="form-line">
                                            <label for="">Note sur le cours</label>
                                            <textarea name="note" maxlength="255" class="form-control" cols="30" rows="10">{{ old('note') }}</textarea>
                                            @error('note')
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
                                    <button type="submit" class="btn btn-raised btn-warning m-t-15 waves-effect">Ajouter séance</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endhasanyrole
        <!-- #END# Horizontal Layout -->
    </div>
</section>
