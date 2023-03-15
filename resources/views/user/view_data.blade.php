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
      .btn-danger
      {
        color: red;
      }
      .btn-danger:hover
      {
        color: white;
      }
      .dataTables_length select
      {
        width:150%;
      }
    </style>

  </head>

  <body class="nav-md" style="background-color:#ff6000">
    <div class="container body" style="background-color:#ff6000">
      <div class="main_container" style="background-color:#ff6000">
        <div class="col-md-3 left_col" style="background-color:#ff6000">
          <div class="left_col scroll-view" style="background-color:#ff6000">
            <div class="navbar nav_title" style=" border: 0; background-color:#ff6000">
              <a href="{{url('home')}}" style="padding:15px;" > <img style= "width:95%; height:auto;" src="images/blob1.png" alt="Logo"><span style="padding-left:20px; color:#fff; font-size: 200%"‍></span></a>
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
                  <li><a href="{{url('update_data')}}"><i class="fa fa-edit"></i> Add RAVPN User </a></li>
                  <li><a href="{{url('show_data')}}"><i class="fa fa-table"></i> RAVPN User </a></li>
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
                <h3> <small></small></h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="font-size:125%; padding-left:5px;">RAVPN Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <div class="row">
                    <div class="col-sm-12">


                      <div class="card-box table-responsive">
                        @if(session()->has('message'))

                          <div class="alert alert-success">

                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session()->get('message')}}
                          </div>
                        @endif
                  <!--  <p class="text-muted font-13 m-b-30">
                      DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p> -->
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Site</th>
                          <th>Name</th>
                          <th>Employee ID</th>
                          <th>Division</th>
                          <th>Department</th>
                          <th>Validator</th>
                          <th>Status</th>
                          <th>Profile</th>
                          <th>File</th>
                          <th>Edit</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($data as $info)
                        <tr>
                          <td>{{$info->site}}</td>
                          <td>{{$info->name}}</td>
                          <td>{{$info->employee_id}}</td>
                          <td>{{$info->division}}</td>
                          <td>{{$info->department}}</td>
                          <td>{{$info->validator}}</td>
                          <td>
                            @if($info->status == 'Active')
                            <button type="submit" class="btn btn-success" style=" font-size:80%;">{{$info->status}}</button>
                            @else
                            <button type="submit" class="btn btn-danger" style=" font-size:80%;">{{$info->status}}</button>
                            @endif
                          </td>
                          <td>
                            <form action="{{ url('upload_profile_detail') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $info->id }}">
                                <button type="submit" style="color:green">Details</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{ url('upload_detail') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $info->id }}">
                                <button type="submit" style="color:green"><i class="fa fa-file"></i></button>
                            </form>
                          </td>
                          <td>
                            <form action="{{ url('edit_data') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $info->id }}">
                                <button type="submit" style="color:green"><i class="fa fa-edit"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


                  </div>
              </div>
            </div>
                </div>
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
    <!-- iCheck -->
    <script src="assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>

  </body>
</html>
