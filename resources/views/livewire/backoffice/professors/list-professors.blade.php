<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>All Professors</h2>
                    <small class="text-muted">Welcome to Swift application</small>
                </div>
                <div>
                    <a href="#" class="btn btn-raised btn-primary">Add Professor</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            @foreach ($professors as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="member-card verified">
                                <div class="thumb-xl member-thumb">
                                    <img style="width: 100%; height: 100px;" src="{{ asset('backoffice/assets/images/logo.png') }}" class="img-thumbnail rounded-circle" alt="profile-image">
                                </div>

                                <div class="m-t-20">
                                    <h4 class="m-b-0">{{ $item->user->firstname.' '.$item->user->lastname }}</h4>
                                    <p class="text-muted">
                                        <i class="zmdi zmdi-phone"></i> {{ $item->user->phone }}
                                        <span><a href="mailto: {{ $item->user->email }}" class="text-pink"><i class="zmdi zmdi-email"></i> {{ $item->user->email }}</a> </span>
                                    </p>
                                </div>

                                <a href="profile.html"  class="btn btn-raised btn-default">Voir Profil</a>
                                <ul class="social-links  m-t-10">
                                    <li><a href="#"><i class="zmdi zmdi-account text-success"></i></a></li>
                                    <li><a href="#" ><i class="zmdi zmdi-delete text-danger"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- main content -->
