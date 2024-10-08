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
            var calendarEl = document.getElementById('calendar');// Détecter la taille de l'écran
            var isSmallScreen = window.innerWidth < 768;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '8:00:00',
                slotMaxTime: '22:00:00',
                firstDay: 1,
                locale: 'fr',
                // Configurer headerToolbar en fonction de la taille de l'écran
                headerToolbar: isSmallScreen ? {
                    left: 'prev,next today',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                } : {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today:    'Aujourd\'hui',
                    month:    'Mois',
                    week:     'Semaine',
                    day:      'Jour',
                    list:     'Liste'
                },

                // Si tu veux que le calendrier s'adapte également lorsqu'on redimensionne la fenêtre
                windowResize: function(view) {
                    var isSmallScreen = window.innerWidth < 768;

                    calendar.setOption('headerToolbar', isSmallScreen ? {
                        left: 'prev,next',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    } : {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    });
                },

                events: @json($events),
                eventColor: '#bf9237', // Couleur jaune moutarde
                eventClick: function(info) {
                    if (info.event.url) {
                        window.location.href = info.event.url; // Redirige sur la même page
                        info.jsEvent.preventDefault(); // Empêche la navigation par défaut (si nécessaire)
                    }
                },

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

        /* Par défaut, le calendrier occupe toute la largeur */
        #calendar {
            width: 100%;
            margin: 0 auto;
        }

        /* Pour les petits écrans, ajuste la taille */
        @media (max-width: 768px) {
            #calendar {
                width: 100%;
            }
        }
    </style>
@endpush
