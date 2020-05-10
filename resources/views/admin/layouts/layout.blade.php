<!doctype html>
<html lang="en">

<head>
  <title>Admin Panel</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{ asset('assets/admin/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="javascript:;" class="simple-text logo-normal">
          Cricket Assignment
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ (request()->segment(2) == 'teams') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.teams.index') }}">
              <i class="material-icons">person</i>
              <p>Teams</p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(2) == 'players') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.players.index') }}">
              <i class="material-icons">person</i>
              <p>Players</p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(2) == 'matches') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.matches.index') }}">
              <i class="material-icons">library_books</i>
              <p>Matches</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
		  @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                
              </li>
            </ul>
          </nav>
          
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/admin/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('assets/admin/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/admin/js/material-dashboard.js?v=2.1.0') }}"></script>
</body>

</html>