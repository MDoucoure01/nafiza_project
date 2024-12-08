
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{ route('payment.subscription') }}" class="btn btn-raised btn-xs btn-warning"><i class="zmdi zmdi-calendar"></i></i> Mensualités</a>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Liste des inscriptions</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Prénoms & Nom</th>
                                    <th>Comité</th>
                                    <th>Téléphone</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->subscription->student->user->firstname.' '.$item->subscription->student->user->lastname }}</td>
                                        <td>{{ $item->subscription->student->conseil->comite->name }}</td>
                                        <td>{{ $item->subscription->student->user->phone }}</td>
                                        <td>{{ number_format($item->amount, 0, '.', ' ') }} FCFA</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            @if ($item->status == 'completed')
                                                <span class="label bg-green">{{ $item->status }}</span>
                                            @else
                                                <span class="label bg-red">{{ $item->status }}</span>
                                            @endif
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
