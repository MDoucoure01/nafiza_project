
<!-- main content -->
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Pensionnaires</h2>
                    <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
                </div>
                <div>
                    <a href="{{ route('student.add') }}" class="btn btn-raised btn-xs btn-primary"><i class="zmdi zmdi-plus"></i> Pensionnaire</a>
                    <a href="{{ route('students.pending.list') }}" class="btn btn-raised btn-xs btn-warning"><i class="zmdi zmdi-accounts"></i></i> En attente</a>
                </div>
            </div>
        </div>

        @if (Session::has('message'))
            <p class="alert alert-danger text-center" role="alert"><i class="zmdi zmdi-info"></i>
                {!! Session::get('message') !!} <a class="btn btn-secondary btn-xs" href="#"   onclick="if (!confirm('Es-tu sûr de vouloir restaurer ce pensionnaire ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('restoreStudent', {{ session('student_id') }}) }">Restaurer ?</a></p>
        @endif

        <div class="row clearfix">
            @foreach ($students as $item)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card all-patients">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 m-b-0 text-center">
                                <a href="{{ route('student.profile', ['id' => $item->id]) }}" class="p-profile-pix"><img src="{{ asset('backoffice/assets/images/logo.png') }}" alt="user" class="img-thumbnail img-fluid"></a>
                                <a href="#"  onclick="if (!confirm('En poursuivant cette action, vous allez désactiver le compte de ce pensionnaire. Voulez-vous continuer ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('disableStudent', {{ $item->id }}) }" class="edit m-r-10 text-success"><i class="material-icons">check_circle</i></a>
                                @hasanyrole('admin|root')
                                    <a href="#" onclick="if (!confirm('Es-tu sûr de vouloir supprimer ce pensionnaire ?')) { event.preventDefault(); event.stopImmediatePropagation(); } else { @this.call('removeStudent', {{ $item->id }}) }" class="edit text-danger"><i class="material-icons">delete</i></a>
                                @endhasanyrole
                            </div>
                            <div class="col-lg-8 col-md-12 m-b-0">
                                <h5 class="m-b-0"><a class="title" href="{{ route('student.profile', ['id' => $item->id]) }}">{{ $item->user->firstname.' '. $item->user->lastname }}</a></h5> <small>{{ $item->matricule }}</small>
                                <address class="m-t-10 m-b-0">
                                    Comité: {{ $item->conseil->comite->name }}<br>
                                    Conseil: {{ $item->conseil->name }}<br>
                                    @if($item->subscriptions->isNotEmpty() && $item->subscriptions->first()->cohort->isNotEmpty())
                                        {{ $item->subscriptions->first()->cohort->first()->name }}
                                    @else
                                        Pas de cohorte
                                    @endif
                                    <br>
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
