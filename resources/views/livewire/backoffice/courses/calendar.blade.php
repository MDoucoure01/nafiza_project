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
        <div class="row clearfix col-lg-12">
            @livewire('partials.appointment')
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
