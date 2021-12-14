<div class="sidebar-wrapper">
  <div>
    <div class="logo-wrapper"><a href="<?php echo base_url(); ?>admin/log"><img class="img-fluid for-light" src="<?php echo base_url(); ?>assets/images/salmon.svg" alt="" width="130px"><img class="img-fluid for-dark" src="<?php echo base_url(); ?>assets/images/salmon.svg" alt="" width="130px"></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="<?php echo base_url(); ?>assets/images/icon.png"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/icon.png" alt="" width="30px"></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="<?php echo base_url(); ?>assets/images/icon.png"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/icon.png" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == ''){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator"><i data-feather="home"> </i><span>Dashboard</span></a></li>
            <li class="sidebar-main-title">
              <div>
                <h6 class="lan-1">General</h6>
                <p class="lan-2">News, Registration, Team</p>
              </div>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'news'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/news"><i data-feather="file"> </i><span>News</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'registration'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/registration"><i data-feather="user"> </i><span>Registrations</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'jointeam'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/jointeam"><i data-feather="user-check"> </i><span>Join Team</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'team'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/team"><i data-feather="users"> </i><span>Teams</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'schedule'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/schedule"><i data-feather="calendar"> </i><span>Schedules</span></a></li>
          <?php if($this->session->userdata('role') == 'Admin'){ ?>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'user'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/user"><i data-feather="user-plus"> </i><span>Users</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'video'){echo 'active-nav';} ?>" href="<?php echo base_url(); ?>administrator/video"><i data-feather="video"> </i><span>Videos</span></a></li>
          <?php } ?>
          <li class="sidebar-main-title">
            <div>
              <h6>Other</h6>
              <p>Logout</p>
            </div>
          </li>
            <li class="sidebar-list"><a href="#" class="sidebar-link sidebar-title link-nav" onclick="logout()"><i data-feather="log-out"> </i><span>Logout</span></a></li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>