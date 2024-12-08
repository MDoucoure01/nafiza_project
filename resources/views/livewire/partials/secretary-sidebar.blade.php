
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
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i><span>Tableau de bord</span></a></li>
                <li class="{{ Route::currentRouteName() == 'calendar' ? 'active' : '' }}"><a href="{{ route('calendar') }}"><i class="zmdi zmdi-calendar-check"></i><span>Emploi du temps</span> </a></li>

                @php
                    $professorRoutes = ['professor.add', 'professors.list', 'professor.profile'];
                    $isActiveProfessor = in_array(Route::currentRouteName(), $professorRoutes) ? 'active' : '';
                @endphp
                <li class="{{ $isActiveProfessor }}"><a href="{{ route('professors.list') }}"><i class="zmdi zmdi-accounts"></i><span>Professeurs</span> </a></li>

                @php
                    $studentsRoutes = ['student.add', 'students.list', 'student.profile', 'students.pending.list'];
                    $isActiveStudent = in_array(Route::currentRouteName(), $studentsRoutes) ? 'active open' : '';
                @endphp
                <li class="{{ $isActiveStudent }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Pensionnaires</span> </a>
                    <ul class="ml-menu">
                        <li class="{{ Route::currentRouteName() == 'student.add' ? 'active' : '' }}"><a href="{{ route('student.add') }}">Ajouter pensionnaire</a></li>
                        <li class="{{ Route::currentRouteName() == 'students.list' ? 'active' : '' }}"><a href="{{ route('students.list') }}">Liste pensionnaires</a></li>
                    </ul>
                </li>

                @php
                    $coursesRoutes = ['course.add', 'courses.list', 'courses.modules', 'course.show', 'module.show'];
                    $isActiveCourse = in_array(Route::currentRouteName(), $coursesRoutes) ? 'active' : '';
                @endphp
                <li class="{{ $isActiveCourse }}"><a href="{{ route('courses.list') }}"><i class="zmdi zmdi-graduation-cap"></i><span>Cours</span> </a></li>

                @php
                    $seancesRoutes = ['seance.add', 'seances.list', 'attendance.sheet', 'seance.edit'];
                    $isActiveSeance = in_array(Route::currentRouteName(), $seancesRoutes) ? 'active' : '';
                @endphp
                <li class="{{ $isActiveSeance }}"><a href="{{ route('seances.list') }}"><i class="zmdi zmdi-assignment"></i><span>Séances de cours</span> </a></li>

                @php
                    $cohortsRoutes = ['cohort.new.students', 'cohorts.list', 'cohort.show', 'cohort.edit'];
                    $isActiveCohort = in_array(Route::currentRouteName(), $cohortsRoutes) ? 'active' : '';
                @endphp
                <li class="{{ $isActiveCohort }}"><a href="{{ route('cohorts.list') }}"><i class="zmdi zmdi-city-alt"></i><span>Cohortes</span> </a></li>

                @php
                    $groupsRoutes = ['group.new.students', 'groupes.td', 'group.show', 'group.edit'];
                    $isActiveGroup = in_array(Route::currentRouteName(), $groupsRoutes) ? 'active' : '';
                @endphp
                <li class="{{ $isActiveGroup }}"><a href="{{ route('groupes.td') }}"><i class="zmdi zmdi-chart-donut"></i><span>Groupes TD</span> </a></li>

                @php
                    $sessionsRoutes = ['session.add', 'sessions.list', 'session.show', 'session.edit'];
                    $isActiveSession = in_array(Route::currentRouteName(), $sessionsRoutes) ? 'active' : '';
                @endphp
                <li class="{{ $isActiveSession }}"><a href="{{ route('sessions.list') }}"><i class="zmdi zmdi-pages"></i><span>Sessions</span> </a></li>
            </ul>
        </div>
    </aside>
</section>
