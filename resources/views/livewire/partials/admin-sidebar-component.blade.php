
<!--Side menu and right menu -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="{{ asset('assets/images/user.jpeg') }}" alt=""> </div>
            <div class="admin-action-info"> <span>Bienvenue</span>
                <h3 style="font-size: 0.8em">{{ Auth::user()->name }}</h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="{{ route('user.profile') }}"><i class="zmdi zmdi-account"></i></a></li>                    
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
                <li class="header">MENU NAVIGATION</li>
                {{-- <li class="active open"><a href="index.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li><a href="events.html"><i class="zmdi zmdi-calendar-check"></i><span>Event Management</span> </a></li> --}}
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-file-text"></i><span>Qasîdas</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('qasida.create') }}">Ajouter qasidas</a></li>   
                        <li><a href="{{ route('qasidas') }}">Liste Qasîdas</a></li>                    
                        <li><a href="{{ route('qasida.all') }}">Gérer les qasidas</a></li>                    
                    </ul>
                </li>    
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Bibliothèques</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('library.create') }}">Ajouter œuvre</a></li>   
                        <li><a href="{{ route('library') }}">Liste des œuvres</a></li>                
                    </ul>
                </li>
                <li><a href="{{ route('conference') }}"><i class="material-icons">video_library</i><span>Bandothèques</span> </a></li>
                <li><a href="{{ route('podcasts') }}"><i class="material-icons">cast_connected</i><span>Podcasts</span> </a></li>
                <li><a href="{{ route('chronics') }}"><i class="zmdi zmdi-edit"></i><span>Chroniques</span> </a></li>

                <li class="header">Chroniqueurs</li>
                <li class="open"><a href="{{ route('chronic.create') }}"><i class="zmdi zmdi-file-add"></i><span>Ajouter article</span></a></li>
                <li class="open"><a href="{{ route('chronics') }}"><i class="zmdi zmdi-file"></i><span>Mes articles</span></a></li>

                <li class="header">Admin</li>
                <li class="open"><a href="index.html"><i class="zmdi zmdi-accounts"></i><span>Liste des abonnés</span></a></li>
                <li class="open"><a href="index.html"><i class="zmdi zmdi-delicious"></i><span>Rapport</span></a></li>
                <li class="open"><a href="index.html"><i class="zmdi zmdi-accounts"></i><span>Administrateurs</span></a></li>
                <li class="open"><a href="{{ route('admin.category') }}"><i class="zmdi zmdi-delicious"></i><span>Categories</span></a></li>
                <li class="header"></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-sign-in col-red"></i><span>Déconnexion</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span></span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 
</section>
<!--Side menu and right menu -->