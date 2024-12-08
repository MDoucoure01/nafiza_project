
<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Inscriptions</h2>
        </div>
        <div class="text-right">
            <a href="{{ route('payment.subscription') }}" class="btn btn-raised btn-xs btn-warning"><i class="zmdi zmdi-accounts"></i></i> Inscriptions</a>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Paiements du mois de {{ date('m') }}</h2>
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
                                    <th></th>
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
                                        <td>In Stock</td>
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
