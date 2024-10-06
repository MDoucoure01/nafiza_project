
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div>
            <h2>Gestion des administrateurs</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div>
            <a href="{{ route('admin.list') }}" class="btn btn-raised btn-primary">Liste des admins</a>
            <a href="{{ route('admin.add') }}" class="btn btn-raised btn-success">Ajouter admin</a>
        </div>
        <form action="{{ route('admin.update', ['id' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Ajouter un nouvel utilisateur</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="firstname" type="text" value="{{ $admin->firstname }}" class="form-control" placeholder="Prénoms">
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
                                            <input name="lastname" type="text" value="{{ $admin->lastname }}" class="form-control" placeholder="Nom">
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
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="phone" type="text" value="{{ $admin->phone }}" class="form-control" placeholder="No. Téléphone">
                                        </div>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="address" value="{{ $admin->address }}" class="form-control" placeholder="Adresse complète">
                                        </div>
                                    </div>
                                    @error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group drop-custum">
                                        <select class="form-control show-tick" name="role" required>
                                            <option value="{{ $role->name }}">__ Rôle __</option>
                                            <option value="admin" title="L'utilisateur aura tous les droits dans l'application y compris la création et la suppression d'utilisateur.">Administrateur</option>
                                            <option value="secretary" title="L'utilisateur est restreint sur certaines actions. Ne peut ni ajouter ni supprimer des utilisateurs.">Secrétaire</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="">Photo de profil</label>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-raised btn-success ">Enregistrer</button>
                    <button type="reset" class="btn btn-raised btn-default ">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</section>
