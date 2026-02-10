 <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">GF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">GARUDA FRAME</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" data-toggle="modal" data-target="#ModalAkun" class="dropdown-toggle" data-toggle="dropdown" title="Pengaturan">
              <i class="fa fa-gear"></i>
              <span class="label label-success"></span>
            </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url().'assets/images/user_blank.png'?>" class="user-image" alt="">
            <span class="hidden-xs"  title="User Login"><?php echo $nm;?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url().'assets/images/user_blank.png'?>" class="img-circle" alt="">

              <p>
                <?php echo $nm;?>
                <small><?php echo $lv; ?></small>
              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="<?php echo base_url().'keluar'?>"><i class="fa fa-sign-out" title="Keluar"></i></a>
        </li>
      </ul>
    </div>
  </nav>