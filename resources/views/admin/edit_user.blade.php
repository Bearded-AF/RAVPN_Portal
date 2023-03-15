<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/blob.png" type="image/ico" />

    <title>Nagad | NetSec</title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">

    <style type="text/css">
      .btn-success
      {
        color: #169f85;
      }
      .btn-success:hover
      {
        color: white;
      }
      .btn-primary
      {
        color: #0071c7;
      }
      .btn-primary:hover
      {
        color: white;
      }

      .col-md-6
      {
        width: 50%; /* Set the width of the div */
			  margin: 0 auto; /* Set the left and right margins to "auto" */
      }
      .dropdown-item:hover
      {
        color:green;
      }
    </style>
  </head>

  <body class="nav-md" style="background-color:#ff6000">
    <div class="container body" style="background-color:#ff6000">
      <div class="main_container" style="background-color:#ff6000">
        <div class="col-md-3 left_col" style="background-color:#ff6000">
          <div class="left_col scroll-view" style="background-color:#ff6000">
            <div class="navbar nav_title" style=" border: 0; background-color:#ff6000">
              <a href="{{url('home')}}" class="issue" style="padding:15px;" > <img style= "width:95%; height:auto;" src="images/blob1.png" alt="Logo"><span style="padding-left:20px; color:#fff; font-size: 200%"‍></span></a>
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
              <li class="layout"> <x-app-layout></x-app-layout> </li>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3></h3>
						</div>


					</div>

					<div class="clearfix"></div>

					<div class="row">


						<div class="col-md-6 " style="">
							<div class="x_panel" >

                @if(session()->has('message'))

                  <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                  </div>

                @endif
								<div class="x_title">
									<h2 style="font-size:125%; padding-left:5px;">Edit Information of Portal User</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                  <form method="POST" action="{{ url('upload_edituser') }}" enctype="multipart/form-data">
                      @csrf

                      <div>
                          <x-label for="name" value="{{ __('Name') }}" />
                          <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
                      </div>

                      <div class="mt-4">
                          <x-label for="employee_id" value="{{ __('Employee ID') }}" />
                          <x-input id="employee_id" class="block mt-1 w-full" type="text" name="employee_id" :value="old('employee_id')"  />
                      </div>

                      <div class="mt-4">
                          <x-label for="email" value="{{ __('Email') }}" />
                          <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                      </div>

                      <br>

                      <div>
                          <x-label for="phone" value="{{ __('Phone') }}" />
                          <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"  />
                      </div>

                      <br>

                      <div class="mt-4">
                          <x-label for="password" value="{{ __('Password') }}" />
                          <x-input id="password" class="block mt-1 w-full" type="password" name="password"  />
                      </div>

                      <div class="mt-4">
                          <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                          <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  />
                      </div>



                      <div class="mt-4">
  											<x-label for="profile_pic" value="{{ __('Profile Picture') }}" />
  											<x-input id="profile_pic" class="block mt-1 w-full" type="file" name="profile_pic"  />
  										</div>

                      <input type="hidden" name="id" value="{{ $row->id }}">

                      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                          <div class="mt-4">
                              <x-label for="terms">
                                  <div class="flex items-center">
                                      <x-checkbox name="terms" id="terms" required />

                                      <div class="ml-2">
                                          {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                  'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                  'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                          ]) !!}
                                      </div>
                                  </div>
                              </x-label>
                          </div>
                      @endif

                      <div class="flex items-center justify-end mt-4">

                          <x-button class="ml-4">
                              {{ __('Submit') }}
                          </x-button>
                      </div>
                  </form>
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="assets/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="assets/vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="assets/vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="assets/vendors/moment/min/moment.min.js"></script>
	<script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="assets/vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="assets/vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="assets/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="assets/vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="assets/vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="assets/vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="assets/build/js/custom.min.js"></script>

</body></html>
