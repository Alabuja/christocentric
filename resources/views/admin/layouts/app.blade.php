<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('css/custom.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/morris/morris.css')}}">

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            entity_encoding: 'raw',
            plugins: 'code link'
        });
    </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
        <!-- Logo -->
            <a href="{{ url('admin/dashboard')}}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Cr</b>C</span>
              <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Chri</b>ToC</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ URL::asset('img/default_avatar.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->username }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ URL::asset('img/default_avatar.jpg')}}" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::guard('admin')->user()->username }}
                                    </p>
                                </li>
                                <li class="pull-left">
                                  <a href="{{ url('admin/password-update') }}">Change password</a>
                                </li>
                                <br>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        {{-- <a href="{{url('admin/logout') }}" class="btn btn-default btn-flat">Sign out</a> --}}
                                        {{-- <li> --}}
                                            <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat" 
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Sign Out
                                            </a>

                                            <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        {{-- </li> --}}
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        {{-- <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </header>

    <!-- Left side column. contains the logo and sidebar -->
          <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('img/default_avatar.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::guard('admin')->user()->username }}</p>
          {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
        </div>
      </div>

       <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview {{ Request::is('admin/home') ? 'active' : '' }}">
          <a href="{{ url('admin/home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manage Artistes</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
	        <li class="{{ Request::is('admin/new-artiste') ? 'active' : '' }}">
	        	<a href="{{ url('admin/new-artiste')}}">
	        		<i class="fa fa-circle-o"></i> <span>New Artiste</span>
	        	</a>
	        </li> {{-- Add new Artiste is getting artiste name from the submission list for songs --}}
	        <li class="{{ Request::is('admin/artistes') ? 'active' : '' }}">
              <a href="{{ url('admin/artistes') }}">
                <i class="fa fa-circle-o"></i> View All Artistes
              </a>
            </li> {{-- View All Artiste is getting from the Artistes added aprove and from the approve songs for some things --}}
            <li class="{{ Request::is('admin/submission') ? 'active' : '' }}">
              <a href="{{ url('admin/submission') }}">
                <i class="fa fa-circle-o"></i> View All Submissions
              </a>
            </li> 
            <li class="{{ Request::is('admin/approved-submission') ? 'active' : '' }}">
              <a href="{{ url('admin/approved-submission') }}">
                <i class="fa fa-circle-o"></i> View Approved Submissions
              </a>
            </li> 
            <li class="{{ Request::is('admin/approve-artiste') ? 'active' : '' }}">
              <a href="{{ url('admin/approve-artiste') }}">
                <i class="fa fa-circle-o"></i> Add Approved Songs
              </a>
            </li> {{-- This is getting the artiste name from the artistes table as a foreign key i.e each artiste that appears under this able has a verified song on the platform --}}
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    
    @yield('content')

    </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ URL::asset('plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js')}}"></script>
</body>
</html>
