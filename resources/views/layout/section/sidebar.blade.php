<!--===================== SIDEBAR =====================-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- BRAND LOGO -->
    <a href="{{ url('/') }}" class="brand-link" style="background-color: white; color: black;">
        <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text">Home</span>
    </a>
    <!-- END -->

    <!-- SIDEBAR -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item @yield('home')">
                    <a href="{{ url('/') }}" class="nav-link warna">
                        <i class="nav-icon fas fa-home warna"></i>
                        <p class="warna">
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview @yield('menu1')" style="display: block"  id="Menu1">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-concierge-bell warna"></i>
                        <p class="warna">
                            Latihan 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item  @yield('Sub-menu-1')" style="display: block" id="SubMenu1">
                            <a href="{{ url('/brands') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p class="warna">brand</p>
                            </a>
                        </li>
                        <li class="nav-item  @yield('Sub-menu-2')" style="display: block" id="SubMenu2">
                            <a href="{{ url('/types') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p class="warna">Type</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- END -->

</aside>
<!--===================== END =====================-->
<style>
    .active-sidebar {
        background-color: #F68F1E;
        font-weight: bold;
        color: black;
    }

    .warna {
        color: white;
    }
</style>
