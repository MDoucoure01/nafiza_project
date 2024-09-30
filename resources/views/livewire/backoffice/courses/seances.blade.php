<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion des séances de cours</h2>
            <small class="text-muted">Welcome to {{ env('APP_NAME') }} application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <a href="{{ route('seance.add') }}" class="btn btn-success text-white"><i class="zmdi zmdi-plus"></i> Ajouter séance</a>
                <a href="" class="btn btn-secondary"><i class="zmdi zmdi-plus"></i> Nouveau cours</a>
                <a href="" class="btn btn-secondary"><i class="zmdi zmdi-plus"></i> Nouveau professeur</a>
            </div>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Assets Details</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Cette semaine</a></li>
                                    <li><a href="javascript:void(0);">Ce mois ci</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Horaire</th>
                                    <th>Cours</th>
                                    <th>Professeur</th>
                                    <th>Cohorte</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seances as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l d F Y') }}</td>
                                        <td>{{ $item->start_time.' - '.$item->end_time }}</td>
                                        <td>{{ $item->course->title }}</td>
                                        <td>{{ $item->professor->user->firstname.' '.$item->professor->user->lastname }}</td>
                                        <td>{{ $item->cohort->name }}</td>
                                        <td>
                                            @if ($item->note)
                                                <i class="material-icons" title="{{ $item->note }}">info</i>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('seance.edit', ['id' => $item->id]) }}"><i class="zmdi zmdi-edit"></i></a></td>
                                        <td>
                                            <form action="{{ route('seance.delete', ['id' => $item->id]) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" onclick="if(!confirm('Vous êtes sur le point de supprimer cette séance. Voulez-vous continuer ?')) { event.preventDefault(); return false; }"><i class="zmdi zmdi-delete text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
