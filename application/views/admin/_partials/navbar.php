<nav class="navbar navbar-expand navbar-dark  static-top" style="background-color: #404E67;">
<div class="container-fluid">
    <div class="navbar-header">
       
        <a class="navbar-brand mr-1" style = "font-family:helvetica;"  href="<?php echo site_url(); ?>"><?php echo SITE_NAME ?></a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <!-- Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle fa-fw fa-lg "></i> 
                <span class="hidden-xs"><?php echo $user_info->name ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown"> 
                <a class="dropdown-item" href="<?php echo site_url('user/user/myProfile') ?>">Profile</a>
                <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>
</div>
</nav>
