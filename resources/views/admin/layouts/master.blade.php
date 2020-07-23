<!DOCTYPE html>
<html lang="en" class="loading">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    @include('admin.layouts.icon')
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('all-assets/admin/app-assets/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('all-assets/common/fontawesom5.7/css/all.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('all-assets/admin/app-assets/vendors/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all-assets/admin/app-assets/vendors/css/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all-assets/admin/app-assets/css/app.css') }}">

    @stack('styles')


<body data-col="2-columns" class=" 2-columns ">
    <div class="wrapper">

        <div data-active-color="white" data-background-color="man-of-steel" data-image="{{ asset('all-assets/admin/app-assets/img/sidebar-bg/01.jpg') }}" class="app-sidebar">
            <!-- Sidebar Header starts-->
            <div class="sidebar-header">
                <div class="logo clearfix"><a href="{{ route('home') }}" class="logo-text float-left tex-normal">
                        <div class="logo-img"><img src="{{ asset('all-assets/common/logo/logo/rahat-it.png') }}" class="rotate logoImg" /></div><span class="text align-middle h5">Rahat-IT</span>
                    </a>
                    <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
            </div>
            <!-- Sidebar Header Ends-->

            <!-- main menu content-->
            <div class="sidebar-content">
                <div class="nav-container">
                    <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">

                        <li class="nav-item"><a href="{{ route('home') }}"><i class="ft-home"></i><span class="menu-title">Dashboard</span></a></li>

                        <div class="dropdown-divider"></div>
                        @can('administration')

                            <li class="nav-item"><a href="{{ route('role.all') }}"><span class="menu-title"><i class="fab fa-r-project yellow"></i> All Roles</span></a></li>

                            <li class="nav-item"><a href="{{ route('admin.all') }}"><i class="fas fa-users green"></i><span class="menu-title">All Admins</span></a></li>

                            <div class="dropdown-divider"></div>
                        @endcan


                        <li class="nav-item"><a href="{{ route('hosting.all') }}"><span class="menu-title"><i class="fas fa-hospital-symbol yellow"></i> Hosting Services</span></a></li>


                        <li class="has-sub nav-item"><a href="#"><i class="fa fa-cogs pink"></i><span class="menu-title">Demo Product</span></a>
                            <ul class="menu-content">
                                <li class="nav-item"><a href="{{ route('demo.all') }}"><i class="fa fa-list info"></i><span class="menu-title">Demo</span></a>
                                </li>
                            @can('administration')
                                <li class="nav-item"><a href="{{ route('demo.deleted') }}"><i class="fa fa-trash red"></i><span class="menu-title">Deleted Data</span></a>
                                </li>
                            @endcan
                            </ul>
                        </li>






                        <li class="nav-item">
                        <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" ><i class="fas fa-sign-out-alt red"></i><span class="menu-title">Logout</span></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>






                    </ul>
                </div>
            </div>


            <!-- main menu content-->
            <div class="sidebar-background"></div>
            <!-- main menu footer-->

        </div>
        <!-- / main menu-->


        <!-- Navbar Header Starts-->
        <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
                    <span class="badge gradient-crystal-clear white">{{ Auth::user()->name }} </span>

                   @can('administration')
                    <span class="badge gradient-pomegranate white ml-1">Act as a Super Admin</span>
                   @endcan

                </div>
                <div class="navbar-container">
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">


                        <ul class="navbar-nav">
                            <li class="nav-item mr-2 d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                                    <p class="d-none">fullscreen</p>
                                </a></li>

                                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle" aria-expanded="false"><i class="ft-flag font-medium-3 blue-grey darken-4"></i><span class="selected-language d-none"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right text-left"><a href="javascript:;" class="dropdown-item py-1"><img src="{{ asset('all-assets/admin/app-assets/img/flags/us.png') }}" class="langimg"><span> English</span></a><a href="javascript:;" class="dropdown-item py-1"><img src="{{ asset('all-assets/admin/app-assets/img/flags/es.png') }}" class="langimg"><span> Spanish</span></a><a href="javascript:;" class="dropdown-item py-1"><img src="{{ asset('all-assets/admin/app-assets/img/flags/br.png') }}" class="langimg"><span> Portuguese</span></a><a href="javascript:;" class="dropdown-item"><img src="{{ asset('all-assets/admin/app-assets/img/flags/de.png') }}" class="langimg"><span> French</span></a></div>
                                  </li>
                                  <li class="dropdown nav-item"><a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-bell font-medium-3 blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger">4</span>
                                      <p class="d-none">Notifications</p></a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                      <div class="noti-list ps-container ps-theme-default" data-ps-id="0b0e9afd-c7f6-e577-4848-152e0d2215af"><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell info float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in, et!</span></span></a><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell warning float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in </span></span></a><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 danger">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametest?</span></span></a><a class="dropdown-item noti-container py-3"><i class="ft-bell success float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 success">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div><a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">Read All Notifications</a>
                                    </div>
                                  </li>
                                  <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                                      <p class="d-none">User Settings</p></a>
                                    <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right"><a href="../../../html/html/ltr/chat.html" class="dropdown-item py-1"><i class="ft-message-square mr-2"></i><span>Chat</span></a><a href="../../../html/html/ltr/user-profile-page.html" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>Edit Profile</span></a><a href="../../../html/html/ltr/inbox.html" class="dropdown-item py-1"><i class="ft-mail mr-2"></i><span>My Inbox</span></a>
                                      <div class="dropdown-divider"></div><a href="../../../html/html/ltr/login-page.html" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                                    </div>
                                  </li>
                                  <li class="nav-item d-none d-lg-block"><a href="javascript:;" class="nav-link position-relative notification-sidebar-toggle"><i class="ft-align-left font-medium-3 blue-grey darken-4"></i>
                                      <p class="d-none">Notifications Sidebar</p></a></li>

                            <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown"
                                    class="nav-link position-relative dropdown-toggle">
                                    <img src="{{ asset(Auth::user()->image_small) }}" alt="Admin" class="admin-img">
                                </a>
                                <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">

                                <!-- <div class="dropdown-divider"></div> -->
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item"><i
                                        class="ft-power mr-2 text-danger"></i><span>Logout</span></a>


                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar Header Ends-->

        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-wrapper">
                    <!-- Zero configuration table -->

                    @yield('content')


                </div>
            </div>
            <!-- END : End Main Content-->



            <!-- BEGIN : Footer-->
            <footer class="footer footer-static footer-light">
               <p class="clearfix text-muted text-sm-center px-2"><span>Copyright &copy; All rights reserved in Rahat IT Solutions.
                    </span></p>
            </footer>
            <!-- End : Footer-->

        </div>
    </div>



    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/core/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/prism.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/screenfull.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/vendors/js/pace/pace.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->

    <script src="{{ asset('all-assets/admin/app-assets/js/app-sidebar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/common/sweet-alert-2/sw-alert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('all-assets/admin/app-assets/js/components-modal.min.js') }}" type="text/javascript" ></script>



    {{-- Page Js  --}}
    @stack('scripts')




    {{-- Toastar Alert --}}
    <script type="text/javascript">

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        @if(Session::has('messege'))

            Toast.fire({
                icon: "{{ Session::get('alert-type') }}",
                title: "{{ Session::get('messege') }}"
            })

         {{ Session::forget('messege') }}
         @endif
    </script>


</body>
<!-- END : Body-->

</html>
