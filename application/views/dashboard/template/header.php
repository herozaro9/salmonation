<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="<?php echo base_url(); ?>administrator"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/icon.png" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <div class="left-header col horizontal-wrapper ps-0">
    </div>
    <div class="nav-right col-8 pull-right right-header p-0">
      <ul class="nav-menus">
        <li class="onhover-dropdown">
          <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">New </span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li><i data-feather="bell"></i>
              <h6 class="f-18 mb-0">Notitications</h6>
            </li>
            <?php if(!empty($notification)){ 
              foreach($notification as $notification){?>
              <li>
                <p><i class="fa fa-<?php echo $notification['icon']; ?> me-3 font-primary"> </i> <b><?php echo $notification['author']; ?></b> <?php echo $notification['notification']; ?> <span class="pull-right"><?php echo date('d/m/y', strtotime($notification['time_notification'])); ?></span></p>
              </li>
            <?php } } ?>
            <li><a class="btn btn-primary" href="<?php echo base_url(); ?>administrator/notification">Check all notification</a></li>
          </ul>
        </li>
        <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="profile-nav onhover-dropdown p-0 me-0">
          <div class="media profile-media"><img class="b-r-10" src="<?php echo base_url(); ?>assets/images/icon.png" alt="" width="30px">
            <div class="media-body"><span><?php echo $this->session->userdata('username'); ?></span>
              <p class="mb-0 font-roboto"><?php echo $this->session->userdata('role'); ?> <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#mymodalchangepassword"><i data-feather="edit"></i><span>Change Password </span></a></li>
            <li><a href="#" onclick="logout()"><i data-feather="log-out"> </i><span>Log Out</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>