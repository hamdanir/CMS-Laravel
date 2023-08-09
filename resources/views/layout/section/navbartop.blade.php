<!--===================== NAVBAR TOP =====================-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- hAMBURGER SIDEBAR -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
  <!-- END -->



  <!-- NAVBAR RIGHT -->
  <ul class="navbar-nav ml-auto">

    <!-- NOTIFICATION -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="margin: 5px;">
          <i class="far fa-bell" style="width: 20px; height:30px; color:orange;"></i>
          <span class="badge badge-warning navbar-badge" style="font-size: 8px; margin-top:-10px;" >15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
    <!-- END -->

    <!-- PROFILE -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="text-bold">{{ session('Name') }}</span>
          <img src="{{ session('Profile_Picture') }}" alt="Forest" style="width: 30px;margin-left: 5px;height: 30px;border-radius: 60px;">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ url('/editprofil') }}" class="dropdown-item">
            Pengaturan
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/change-password') }}" class="dropdown-item">
            Ubah Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/logout') }}" class="dropdown-item">
            Keluar
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-user"></i></a>
      </li>-->
    

  </ul>
  <!-- END NAVBAR RIGHT -->

</nav>
<!--===================== END =====================-->