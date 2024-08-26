
<!-- main content -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Pensionnaires</h2>
                    <small class="text-muted">Welcome to Swift application</small>
                </div>
                <div>
                    <a href="add-students.html" class="btn btn-raised btn-primary">Ajouter pensionnaire</a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            @foreach ($students as $item)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card all-patients">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 m-b-0">
                                <a href="#" class="p-profile-pix"><img src="{{ asset('backoffice/assets/images/logo.png') }}" alt="user" class="img-thumbnail img-fluid"></a>
                                <a href="#" class="edit m-r-10"><i class="zmdi zmdi-edit"></i></a>
                                <a href="#" class="edit text-danger"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                            <div class="col-lg-8 col-md-12 m-b-0">
                                <h5 class="m-b-0">{{ $item->user->firstname.' '. $item->user->lastname }}</h5> <small>{{ $item->matricule }}</small>
                                <address class="m-t-10 m-b-0">
                                    Comité: {{ $item->conseil->comite->name }}<br>
                                    Conseil: {{ $item->conseil->name }}<br>
                                    Cohorte:<br>
                                    <abbr title="Phone">Tel:</abbr> {{ $item->user->phone }}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- main content -->
