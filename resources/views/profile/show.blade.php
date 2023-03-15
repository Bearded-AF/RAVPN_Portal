<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="{{ asset('images/blob.png') }}" type="image/ico" />

    <title>Nagad | NetSec</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">

  </head>

  <body class="nav-md" style="background-color:#ff6000">
    <div class="container body" style="background-color:#ff6000">
      <div class="main_container" style="background-color:#ff6000">
        <div class="col-md-3 left_col" style="background-color:#ff6000">
          <div class="left_col scroll-view" style="background-color:#ff6000">
            <div class="navbar nav_title" style=" border: 0; background-color:#ff6000">
              <a href="{{url('home')}}" style="padding:15px;" > <img style= "width:95%; height:auto;" src="{{ asset('images/blob1.png') }}" alt="Logo"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix" style="background-color:#ff6000">

            </div>
            <!-- /menu profile quick info -->

            <br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="background-color:#ff6000">
              <div class="menu_section">
                <h3>     </h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Home </a></li>
                  @if(Auth::user()->is_admin == '1')
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-desktop"></i> Portal </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{url('add_user')}}"><i class="fa fa-edit"></i> Add New User </a>
                      <a class="dropdown-item" href="{{url('view_user')}}"><i class="fa fa-user"></i> Portal Users </a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-book"></i> RAVPN </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{url('add_data')}}"><i class="fa fa-edit"></i> Add RAVPN User </a>
                      <a class="dropdown-item" href="{{url('view_data')}}"><i class="fa fa-table"></i> RAVPN Users </a>
                    </div>
                  </li>
                  @else
                  <li><a href="{{url('update_data')}}"><i class="fa fa-edit"></i> Add RAVPN User </a></li>
                  <li><a href="{{url('show_data')}}"><i class="fa fa-table"></i> RAVPN User </a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            <nav class="nav navbar-nav">
              <li> <x-app-layout></x-app-layout> </li>
            </nav>
          </div>
        </div>


        <!-- /top navigation -->


      <!--Main Content-->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" >
          <div class="col-md-12 col-sm-12 ">

              <x-slot name="header">
                  <a style="color:orange;" class="font-semibold text-xl text-gray-800 leading-tight" href="{{url('home')}}">
                    <i style="color:black;" class="fa fa-chevron-circle-left"></i>
                      {{ __('Go Back to Home') }}
                  </a>
              </x-slot>

              <div>
                  <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                      @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                          @livewire('profile.update-profile-information-form')

                          <x-section-border />
                      @endif

                      @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                          <div class="mt-10 sm:mt-0">
                              @livewire('profile.update-password-form')
                          </div>

                          <x-section-border />
                      @endif

                      @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                          <div class="mt-10 sm:mt-0">
                              @livewire('profile.two-factor-authentication-form')
                          </div>

                          <x-section-border />
                      @endif

                      <div class="mt-10 sm:mt-0">
                          @livewire('profile.logout-other-browser-sessions-form')
                      </div>

                      @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                          <x-section-border />

                          <div class="mt-10 sm:mt-0">
                              @livewire('profile.delete-user-form')
                          </div>
                      @endif
                  </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>

      <!-- jQuery -->
      <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
      <!-- NProgress -->
      <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
      <!-- Chart.js -->
      <script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
      <!-- gauge.js -->
      <script src="{{ asset('assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
      <!-- bootstrap-progressbar -->
      <script src="{{ asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
      <!-- iCheck -->
      <script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
      <!-- Skycons -->
      <script src="{{ asset('assets/vendors/skycons/skycons.js') }}"></script>
      <!-- Flot -->
      <script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
      <script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
      <script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
      <script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
      <script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
      <!-- Flot plugins -->
      <script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
      <script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
      <script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
      <!-- DateJS -->
      <script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
      <!-- JQVMap -->
      <script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
      <script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
      <script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
      <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

      <!-- Custom Theme Scripts -->
      <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>
    </body>
  </html>
