
<!--Side menu and right menu -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img style="width: " src="{{ asset('backoffice/assets/images/logo-bw.png') }}" alt=""> </div>
            <div class="admin-action-info"> <span>Bienvenue</span>
                <h3 style="font-size: 0.8em">{{ Auth::user()->firstname }}</h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="{{ route('home') }}"><i class="zmdi zmdi-account"></i></a></li>
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           <i class="zmdi zmdi-sign-in"></i>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU DE NAVIGATION</li>
                <li class="active open"><a href="index.html"><i class="zmdi zmdi-home"></i><span>Tableau de bord</span></a></li>
                <li><a href="{{ route('calendar') }}"><i class="zmdi zmdi-calendar-check"></i><span>Emploi du temps</span> </a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Professeurs</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('professor.add') }}">Ajouter professeur</a></li>
                        <li><a href="{{ route('professors.list') }}">Liste des professeurs</a></li>

                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Pensionnaires</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('student.add') }}">Ajouter pensionnaire</a></li>
                        <li><a href="{{ route('students.list') }}">Liste pensionnaires</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-graduation-cap"></i><span>Cours</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('course.add') }}">Ajouter cours</a></li>
                        <li><a href="{{ route('courses.list') }}">Liste des cours</a></li>
                        <li><a href="{{ route('courses.modules') }}">Gestion modules</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Séances de cours</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('seance.add') }}">Ajouter séance</a></li>
                        <li><a href="{{ route('seances.list') }}">Liste des séances</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('cohorts.list') }}"><i class="zmdi zmdi-city-alt"></i><span>Cohortes</span> </a></li>
                <li><a href="{{ route('groupes.td') }}"><i class="zmdi zmdi-chart-donut"></i><span>Groupes TD</span> </a></li>
                <li><a href="{{ route('sessions.list') }}"><i class="zmdi zmdi-pages"></i><span>Sessions</span> </a></li>
                <li><a href="{{ route('admin.list') }}"><i class="zmdi zmdi-accounts"></i><span>Utilisateurs</span> </a></li>
            </ul>
        </div>
    </aside>
</section>
