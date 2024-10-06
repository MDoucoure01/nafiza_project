<div style="width: 100%" class="calendar-container">
    <div id="calendar"></div>
</div>

@push('scripts')
    <!-- FullCalendar CSS -->
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
                firstDay: 1,
                locale: 'fr',
                headerToolbar: {
                    left: 'prev,next today',  // Boutons de navigation (précédent, suivant, aujourd'hui)
                    center: 'title',          // Titre centré
                    right: 'dayGridMonth,timeGridWeek,timeGridDay' // Boutons pour changer la vue (Mois, Semaine, Jour)
                },
                buttonText: {
                    today:    'Aujourd\'hui',
                    month:    'Mois',
                    week:     'Semaine',
                    day:      'Jour',
                    list:     'Liste'
                },
                events: @json($events),
                eventColor: '#bf9237', // Couleur jaune moutarde
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

    <!-- CSS Customization -->
    <style>
        /* Style buttons inside calendar container */
        .calendar-container .fc .fc-button {
            color: white !important;
        }
    </style>
@endpush
