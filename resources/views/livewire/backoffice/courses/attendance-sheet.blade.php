<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Feuile de Présence</h2>
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
                        <h2>Cours de "{{ $seance->course->title }}" du {{ \Carbon\Carbon::parse($seance->date)->translatedFormat('l d F Y') }}</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Pensionnaires</th>
                                    <th>Heures d'arrivée</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seance->attendances->where('status', 'arrived') as $item)
                                    <tr>
                                        <td><a href="{{ route('student.profile', ['id' => $item->student->id]) }}">{{ $item->student->user->firstname.' '.$item->student->user->lastname }}</a></td>
                                        <td>{{ $item->attendance_time }}</td>
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
