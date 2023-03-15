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

    .smth:hover
    {
      color:green;
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
              <a href="{{url('home')}}" style="padding:15px; padding-bottom:5px;" >
                <img src="images/blob1.png" alt="Logo">
              </a>
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
                  <li><a href="{{url('home')}}"><i class="fa fa-home"></i>  Home </a></li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-desktop"></i>  Portal </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{url('add_user')}}"><i class="fa fa-edit"></i> Add New User </a>
                      <a class="dropdown-item" href="{{url('view_user')}}"><i class="fa fa-user"></i> Portal Users </a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-book"></i>  RAVPN </a>
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
              <li> <x-app-layout></x-app-layout> </li>
            </nav>
          </div>
        </div>


        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block; padding-left: 20px;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <a href="{{url('view_data')}}">
              <span class="count_top"><i class="fa fa-user"></i> Total Users </span>
              <div class="count">{{$count}}</div>
            </a>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">

              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->


              <form action="{{ url('active_view') }}" method="POST">
                  @csrf
                  <input type="hidden" name="active" value="active">
                  <button type="submit">
                    <span class="count_top"><i class="fa fa-user"></i> Active Users </span>
                    <div class="count green" style="text-align:left;">{{$active}}</div>
                  </button>
              </form>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <form action="{{ url('deactive_view') }}" method="POST">
                  @csrf
                  <input type="hidden" name="deactive" value="deactive">
                  <button type="submit">
                    <span class="count_top"><i class="fa fa-user"></i> Deactive Users </span>
                    <div class="count red" style="text-align:left;">{{$deactive}}</div>
                  </button>
              </form>
              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <form action="{{ url('deleted_view') }}" method="POST">
                  @csrf
                  <input type="hidden" name="deleted" value="deleted">
                  <button type="submit">
                    <span class="count_top"><i class="fa fa-user"></i> Deleted Users </span>
                    <div class="count " style="text-align:left;">{{$deleted}}</div>
                  </button>
              </form>
              <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>-->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count"  style="visibility:hidden;">
              <span class="count_top"><i class="fa fa-user"  style="visibility:hidden;"></i> </span>
              <div class="count" style="visibility:hidden;">15000</div>

            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count"  style="visibility:hidden;">
              <span class="count_top"><i class="fa fa-user"  style="visibility:hidden;"></i> </span>
              <div class="count" style="visibility:hidden;">15000</div>

            </div>
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="">
                    <h3> <small></small></h3>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                  </div>
                </div>

                <div class="col-md-9 col-sm-8">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2> <small></small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <canvas id="pie"></canvas>
                    </div>
                  </div>
                </div>


                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />





        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>

        </footer>
        <!-- /footer content -->
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
    <!-- Chart.js -->
    <script src="assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="assets/vendors/Flot/jquery.flot.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/vendors/moment/min/moment.min.js"></script>
    <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>

    <script>
    var ctx = document.getElementById("pie").getContext('2d');
    var data = {
        labels: {!! json_encode(["Active", "Deactive", "Deleted"]) !!},
        datasets: [
            {
                data: {!! json_encode([$active, $deactive, $deleted]) !!},
                backgroundColor: {!! json_encode(["#26B99A", "#c95a49", "#c1cdcd"]) !!},

            }
        ]
    };
    var options = {

        title: {
            display: true,
            text: 'RAVPN Users'
        }
    };
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: data,
        options: options
    });
</script>


  </body>
</html>
