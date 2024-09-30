<!-- main content -->
<section class="content staff">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Gestion des administrateurs</h2>
                    <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
                </div>
                <div>
                    <a href="{{ route('admin.add') }}" class="btn btn-raised btn-primary">Ajouter admin</a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            @foreach ($admins as $item)
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="member-card row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="member-thumb m-b-20">
                                        <img style="height: 100px; width: 100%; object-fit: cover" src="{{ asset('backoffice/assets/images/logo.png') }}" alt="user" class="img-thumbnail rounded-circle">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="s-profile">
                                        <h4 class="m-b-0">{{ $item->firstname.' '.$item->lastname }}</h4>
                                        <p class="">
                                            @foreach ($item->roles as $role)
                                            <span class="label bg-orange">{{ $role->name }}</span>
                                            @endforeach
                                            <span> <a href="#" class="text-pink">{{ $item->email }}</a>
                                            <a href="#" class="text-pink">{{ $item->phone }}</a>
                                            {{ $item->address }}
                                        </p>
                                        <form action="{{ route('admin.delete', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <a href="{{ route('admin.edit', ['id' => $item->id]) }}"  class="btn btn-sm btn-default"><i class="zmdi zmdi-edit text-primary"></i></a>
                                            <button type="submit" onclick="if(!confirm('Vous êtes sur le point de supprimer cet utilisateur. Voulez-vous continuer ?')) { event.preventDefault(); return false; }" class="btn btn-sm btn-default"><i class="zmdi zmdi-delete text-danger"></i></button>
                                        </form>
                                    </div>
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
