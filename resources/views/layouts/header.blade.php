<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Printerous</title>

        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/icomoon/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/uniform/css/default.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet"/>


        <link href="{{ asset('assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/datatables/css/jquery.datatables.min.css') }}" rel="stylesheet" type="text/css"/>	
        <link href="{{ asset('assets/plugins/datatables/css/jquery.datatables_themeroller.css') }}" rel="stylesheet" type="text/css"/>	
      
        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/space.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/admin3.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    @guest

    @else
        <body class="page-sidebar-fixed page-header-fixed">
            
            <!-- Page Container -->
            <div class="page-container">
                <!-- Page Sidebar -->
                <div class="page-sidebar">
                    <a class="logo-box" style="top: -10px;padding-top: 25px;padding-bottom: 20px;background: white;" href="{{ route('home') }}">
                        <span><img src="{{ asset('assets/images/logo-dark.svg') }}" style="height: 48px;" alt=""></span>
                        
                        <!-- <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i> -->
                        <!-- <i class="icon-close" id="sidebar-toggle-button-close"></i> -->
                    </a>
                    <div class="page-sidebar-inner" style="margin-top: 20px;">
                        <div class="page-sidebar-menu">
                            <ul class="accordion-menu">
                                

                                <li class="active-page menu-side" id="dashboard">
                                    <a href="{{ route('home') }}">
                                        <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="menu-side" id="Organization">
                                    <a href="{{ route('organization.index') }}">
                                        <i class="menu-icon icon-credit-card"></i><span>Organization</span>
                                    </a>
                                </li>

                                <li class="menu-side" id="Person">
                                    <a href="{{ route('person.index') }}">
                                        <i class="menu-icon icon-credit-card"></i><span>Person</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div><!-- /Page Sidebar -->
                <!-- Page Content -->
                <div class="page-content">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="search-form">
                            <form action="#" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <div class="logo-sm">
                                        <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                        <a class="logo-box" href="/"><span>Printerous</span></a>
                                    </div>
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                            
                                <!-- Collect the nav links, forms, and other content for toggling -->
                            
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                        <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                                        <li><a href="javascript:void(0)" id="search-button"><i class="fa fa-search"></i></a></li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="dropdown user-dropdown">
                                            
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>{{ Auth::user()->name }}</b> &nbsp;<img src="http://via.placeholder.com/36x36" alt="" class="img-circle"></a>
                                            <ul class="dropdown-menu">
                                                <!-- <li><a href="">Account Settings</a></li>
                                                <li><a href="">Change Password</a></li> -->
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div><!-- /Page Header -->
    @endguest