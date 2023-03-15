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

    <style>
    .dropdown {

    }

    .icon {

      border: none;
      background: none;
      cursor: pointer;
    }

    .dropdown-menu {

      font-weight: bold;
      position: absolute;
      top: 100%;
      right: 0;
      z-index: 1;
      display: none;
      min-width: 160px;
      padding: 8px 0;
      background-color: #fff;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    .dropdown-menu a {
      display: block;
      padding: 8px 16px;
      text-decoration: none;
      color: #333;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .smth:hover
    {
      color:green;
    }

    .dataTables_length select
    {
      width:150%;
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
                <h3> </h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="font-size:125%; padding-left:5px;">Portal Users</h2>
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
                          <th>Name</th>
                          <th>Employee ID</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Admin Priviledge</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($user as $info)
                        <tr>
                          <td>{{$info->name}}</td>
                          <td>{{$info->employee_id}}</td>
                          <td>{{$info->email}}</td>
                          <td>{{$info->phone}}</td>
                          @if($info->is_admin == 0)
                          <td>No</td>
                          @else
                          <td>Yes</td>
                          @endif
                          <td class="dropdown">
                            <button class="icon"><i class="fa fa-gear"></i></button>
                            <div class="dropdown-menu">
                              <form action="{{ url('make_admin') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $info->id }}">
                                  <button class="smth" type="submit" style="padding-left:15px;">Make Admin</button>
                              </form>
                              <form action="{{ url('dismiss_admin') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $info->id }}">
                                  <button class="smth" type="submit" style="padding:15px;">Dismiss Admin</button>
                              </form>
                              <form action="{{ url('delete_user') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $info->id }}">
                                  <button class="smth" type="submit" style="padding-left:15px;">Delete User</button>
                              </form>
                            </div>
                          </td>
                          <td>
                            <form action="{{ url('edit_user') }}" method="POST">
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
