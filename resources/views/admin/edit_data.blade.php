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


						<div class="col-md-10 " style="padding-left:200px;">
							<div class="x_panel" >

                @if(session()->has('message'))

                  <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                  </div>

                @endif
								<div class="x_title">
									<h2 style="font-size:125%; padding-left:5px;">Edit Information of RAVPN User <small></small></h2>
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
									<form class="form-horizontal form-label-left" action="{{url('upload_edit')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Name</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="name" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>

                    <div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Employee ID</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="emid" type="text" class="form-control" placeholder="TW 220809">
											</div>
										</div>

                    <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Division</label>
											<div class="col-md-9 col-sm-9 ">
												<select name="division" class="form-control" required="required">
													<option></option>
													<option>Option one</option>
													<option>Option two</option>
													<option>Option three</option>
													<option>Option four</option>
												</select>
											</div>
										</div>

                    <div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Department</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="department" type="text" class="form-control" placeholder="">
											</div>
										</div>

                    <div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Designation</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="designation" type="text" class="form-control" placeholder="">
											</div>
										</div>

                    <div class="form-group row ">
                      <label class="control-label col-md-3 col-sm-3 ">Phone</label>
											<div class="col-md-9 col-sm-9 ">
                        <input name="phone" type="tel" class="form-control" id="inputSuccess5" placeholder="Phone">
  											<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
											</div>
										</div>

                    <div class="form-group row ">
                      <label class="control-label col-md-3 col-sm-3 ">Email</label>
											<div class="col-md-9 col-sm-9 ">
                        <input name="email" type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
  											<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>

                    <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Site</label>
											<div class="col-md-9 col-sm-9 ">
												<select name="site" class="form-control" required="required">
													<option></option>
													<option>Data Center 1</option>
													<option>Data Center 2</option>
												</select>
											</div>
										</div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 ">Access Type</label>
                      <div class="col-md-9 col-sm-9 ">
                        <select name="access" class="form-control" required="required">
                          <option></option>
                          <option>Portal</option>
                          <option>Terminal Server</option>
                          <option>PAM</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Date Of Request</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>

                    <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Business Justification</label>
											<div class="col-md-9 col-sm-9 ">
												<textarea name="justification" class="form-control" rows="3" placeholder="State the purpose of your request"></textarea>
											</div>
										</div>

                    <div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Line Manager (Validator)</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="validator" type="text" class="form-control" placeholder="">
											</div>
										</div>

                    <div class="form-group row " style="padding-top:10px;">
											<label class="control-label col-md-3 col-sm-3 ">Attachment</label>
											<div class="col-md-9 col-sm-9 ">
												<input name="attachment" type="file" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Status</label>
											<div class="col-md-9 col-sm-9 ">
												<select name="status" class="form-control" required="required">
													<option></option>
                          <option>Deactive</option>
													<option>Active</option>
                          <option>Deleted</option>
												</select>
											</div>
										</div>

                    <input type="hidden" name="id" value="{{ $row->id }}">

                    <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Note</label>
											<div class="col-md-9 col-sm-9 ">
												<textarea name="note" class="form-control" rows="3" placeholder="Note for updating the entry"></textarea>
											</div>
										</div>


											</div>
										</div>


										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="button" class="btn btn-primary" >Cancel</button>
												<button type="reset" class="btn btn-primary" >Reset</button>
												<button type="submit" class="btn btn-success" >Submit</button>
											</div>
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
