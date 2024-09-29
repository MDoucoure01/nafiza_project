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
            <div style="width: 100%" id="calendar"></div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>

@push('scripts')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css' rel='stylesheet' />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '8:00:00',
                slotMaxTime: '22:00:00',
                events: @json($events),
            });
            calendar.render();
        });
    </script>
@endpush
