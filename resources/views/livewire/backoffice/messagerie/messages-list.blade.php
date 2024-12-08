<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Students Profile</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#send">Envoyer un message</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sent">Boîte d'envoi</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#inbox">Boîte de réception</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="send">
                                <form action="{{ route('message.send') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <p for="">Destinataires</p>
                                                <select style="border: 2px solid #ccc; border-radius: 5px" name="destinataires" required class="form-control pl-2">
                                                    <option value="">__ Choisir une liste __</option>
                                                    <option value="all_students">Tous les pensionnaires</option>
                                                    <option value="prof">Professeurs et animateurs</option>
                                                    {{-- <option value="all">Tous le monde</option> --}}
                                                </select>
                                                @error('destinataires')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Objet</p>
                                                <input name="subject" value="{{ old('subject') }}" style="border: 2px solid #ccc; border-radius: 5px" type="text" class="form-control pl-2" placeholder="Objet du message">
                                                @error('subject')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <p>Canaux de diffusion</p>
                                                <input name="is_communique" value="1" type="checkbox" id="app"
                                                    class="filled-in">
                                                <label for="app" class="mr-3">Via l'application</label>
                                                <input name="is_mail" value="1" type="checkbox" id="email"
                                                    class="filled-in">
                                                <label for="email" class="mr-3">Via email</label>
                                                <input name="is_sms" value="1" type="checkbox" id="sms"
                                                    class="filled-in">
                                                <label for="sms">Via sms</label>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <p for="">Contenu du message</p>
                                                <div class="form-line">
                                                    <textarea id="ckeditor" name="contenu_message">{{ old('contenu_message') }}</textarea>
                                                </div>
                                                @error('contenu_message')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-raised btn-success ">Envoyer messages</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sent">
                                <div class="body table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Destinataires</th>
                                                <th>Objet</th>
                                                <th>Date d'envoi</th>
                                                <th>Canaux</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tout les pensionnaires</td>
                                                <td>Report des cours jusqu'au 12/10/2024</td>
                                                <td>08-09-2024</td>
                                                <td>SMS - Email - App</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tout les pensionnaires</td>
                                                <td>Report des cours jusqu'au 12/10/2024</td>
                                                <td>08-09-2024</td>
                                                <td>SMS - Email - App</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tout les pensionnaires</td>
                                                <td>Report des cours jusqu'au 12/10/2024</td>
                                                <td>08-09-2024</td>
                                                <td>SMS - Email - App</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="inbox">
                                <div class="body table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Expéditeur</th>
                                                <th>Objet</th>
                                                <th>Date d'envoi</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Doudou Ndiaye</td>
                                                <td>Report des cours jusqu'au 12/10/2024</td>
                                                <td>08-09-2024</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tout les pensionnaires</td>
                                                <td>Report des cours jusqu'au 12/10/2024</td>
                                                <td>08-09-2024</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tout les </td>
                                                <td>Report des cours jusqu'au 12/10/2024</td>
                                                <td>08-09-2024</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content -->
