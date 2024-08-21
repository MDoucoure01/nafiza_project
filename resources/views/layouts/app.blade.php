

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>{{ env('APP_NAME') }}</title>

<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('backoffice/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('backoffice/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('backoffice/assets/css/themes/all-themes.css') }}"/>
<!-- Table -->
<link href="{{ asset('backoffice/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}} " rel="stylesheet">


@livewireStyles
</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Chargement ...</p>
    </div>
</div>
<!-- #END# Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Morphing Search  -->
<div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <div class="form-group m-0">
            <input style="color: white" value="" type="text" placeholder="Search..." class="form-control" />
            <button class="morphsearch-submit" type="submit">Search</button>
        </div>
    </form>
    {{-- <div class="morphsearch-content">
        <div class="column">
            <h2>People</h2>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar1.jpg" alt=""/>
                <h3>Sara Soueidan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar2.jpg" alt=""/>
                <h3>Rachel Smith</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar3.jpg" alt=""/>
                <h3>Peter Finlan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar4.jpg" alt=""/>
                <h3>Patrick Cox</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar5.jpg" alt=""/>
                <h3>Tim Holman</h3>
            </a>
        </div>
        <div class="column">
            <h2>Popular</h2>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar5.jpg" alt=""/>
                <h3>Sara Soueidan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar4.jpg" alt=""/>
                <h3>Rachel Smith</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar3.jpg" alt=""/>
                <h3>Peter Finlan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar2.jpg" alt=""/>
                <h3>Patrick Cox</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar1.jpg" alt=""/>
                <h3>Tim Holman</h3>
            </a>
        </div>
        <div class="column">
            <h2>Recent</h2>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar1.jpg" alt=""/>
                <h3>Sara Soueidan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar2.jpg" alt=""/>
                <h3>Rachel Smith</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar3.jpg" alt=""/>
                <h3>Peter Finlan</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar4.jpg" alt=""/>
                <h3>Patrick Cox</h3>
            </a>
            <a class="media-object" href="#">
                <img class="rounded-circle" src="assets/images/sm/avatar5.jpg" alt=""/>
                <h3>Tim Holman</h3>
            </a>
        </div>
    </div> --}}
    <!-- /morphsearch-content -->
    <span class="morphsearch-close"></span>
</div>

<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="">{{ env('APP_NAME') }}</a> </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i> <span class="label-count bg-warning" style="color: black">7</span> </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-green"><i class="zmdi zmdi-account-add"></i></div>
                                    <div class="menu-info">
                                        <h4>12 new members joined</h4>
                                        <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-cyan"><i class="zmdi zmdi-shopping-cart-plus"></i></div>
                                    <div class="menu-info">
                                        <h4>4 sales made</h4>
                                        <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                    <div class="menu-info">
                                        <h4><b>Nancy Doe</b> deleted account</h4>
                                        <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-orange"><i class="zmdi zmdi-edit"></i></div>
                                    <div class="menu-info">
                                        <h4><b>Nancy</b> changed name</h4>
                                        <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-blue-grey"><i class="zmdi zmdi-comment-alt-text"></i></div>
                                    <div class="menu-info">
                                        <h4><b>John</b> commented your post</h4>
                                        <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-green"><i class="zmdi zmdi-refresh-alt"></i></div>
                                    <div class="menu-info">
                                        <h4><b>John</b> updated status</h4>
                                        <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-purple"><i class="zmdi zmdi-settings"></i></div>
                                    <div class="menu-info">
                                        <h4>Settings updated</h4>
                                        <p> <i class="material-icons">access_time</i> Yesterday </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">Toutes les Notifications</a> </li>
                </ul>
            </li>
            <!-- #END# Notifications -->
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-sign-in"></i>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            {{-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li> --}}
        </ul>
    </div>
</nav>
<!-- #Top Bar -->

@livewire('partials.sidebar-component')

<!-- main content -->
{{ $slot }}
<!-- main content -->

<div class="color-bg"></div>

@livewireScripts

<!-- Jquery Core Js -->
<script src="{{ asset('backoffice/assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Lib Scripts Plugin Js -->
<script src="{{ asset('backoffice/assets/bundles/vendorscripts.bundle.js') }}"></script>

<!-- Main top morphing search -->
<script src="{{ asset('backoffice/assets/bundles/morphingsearchscripts.bundle.js') }}"></script>

<!-- Sparkline Plugin Js -->
<script src="{{ asset('backoffice/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Plugins Js -->
<script src="{{ asset('backoffice/assets/plugins/chartjs/Chart.bundle.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('backoffice/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('backoffice/assets/js/pages/charts/sparkline.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/js/pages/index.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('backoffice/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('backoffice/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('backoffice/assets/js/pages/tables/jquery-datatable.js') }}"></script>

<!-- Ckeditor -->
<script src="{{ asset('backoffice/assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backoffice/assets/js/pages/forms/editors.js') }}"></script>

<!-- Jquery Core Js -->

<script src="{{ asset('backoffice/assets/js/pages/ui/modals.js') }}"></script>
</body>
</html>
