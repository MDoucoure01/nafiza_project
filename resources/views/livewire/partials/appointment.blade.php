
<div style="width: 100%" id="calendar"></div>

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
                headerToolbar: {
                    left: 'prev,next today',  // Boutons de navigation (précédent, suivant, aujourd'hui)
                    center: 'title',          // Titre centré
                    right: 'dayGridMonth,timeGridWeek,timeGridDay' // Boutons pour changer la vue (Mois, Semaine, Jour)
                },
                events: @json($events),
                eventClick: function(info) {
                    if (info.event.url) {
                        window.location.href = info.event.url; // Redirige sur la même page
                        info.jsEvent.preventDefault(); // Empêche la navigation par défaut (si nécessaire)
                    }
                },
                windowResize: function(view) {
                    if (window.innerWidth < 768) {
                        calendar.changeView('timeGridDay'); // Changer la vue pour les petits écrans
                    }
                }

            });
            calendar.render();
        });
    </script>
@endpush
