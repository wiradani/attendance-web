<!-- Sidebar -->
<ul class="sidebar-menu sidebar navbar-nav " data-widget="tree">

    
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('index.php/welcome') ?>" onclick="goLogGeneral('Home','Open by Sidebar')" >
            <i class="fa fa-home"></i>
            <span>Home</span>
        </a>
    </li>



    <li class="nav-item <?php echo $this->uri->segment(3) == 'atd' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('user/atd/index') ?>" >
            <i class="fa fa-map"></i>
            <span>My Attandance</span>
        </a>
    </li>



   

   

    <?php if($level === "superadmin" || $acc_user['have_access'] || $acc_rmaster['have_access']  || $acc_rdetail['have_access']  ){ ?>
    <li class="nav-item dropdown  <?php echo $this->uri->segment(2) == 'account' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle  " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-universal-access"></i>
            <span>Access Management</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php if($level === "superadmin" || $acc_user['have_access'] ){ ?>
                <a class="dropdown-item" href="<?php echo site_url('user/user/index') ?>" onclick="goLogGeneral('Manage User','Open by Sidebar')" >Manage Users</a>
            <?php } ?>
            <!-- <?php if($level === "superadmin" || $acc_user['have_access']  ){ ?>
                <a class="dropdown-item" href="<?php echo site_url('user/form/index') ?>" onclick="goLogGeneral('Manage Form','Open by Sidebar')" >Manage Form</a>
            <?php } ?>
            <?php if(strtolower($user_info->client_code) === "pcs"){ ?>
                <a class="dropdown-item" href="<?php echo site_url('user/Client/index') ?>" onclick="goLogGeneral('Manage Client','Open by Sidebar')" >Manage Client</a>
            <?php } ?> -->
            <?php if($level === "superadmin" || $acc_rmaster['have_access'] ){ ?>
                <a class="dropdown-item" href="<?php echo site_url('user/RoleMaster/index') ?>" onclick="goLogGeneral('Manage Role','Open by Sidebar')">Manage Role</a>
            <?php } ?>
        </div>
    </li>
    <?php } ?>
                


    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'account' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="far fa-user"></i>
            <span>Account</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('user/user/myProfile') ?>" onclick="goLogGeneral('My Profile','Open by Sidebar')">My Profile</a>
            <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
    </li>
</ul>
