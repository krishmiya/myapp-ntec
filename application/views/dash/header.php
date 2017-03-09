<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ntec | Digital Receptionist</title>

<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/dash/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url();?>assets/dash/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="<?php echo base_url();?>assets/dash/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- Datatables -->
<link href="<?php echo base_url();?>assets/dash/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dash/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dash/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dash/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dash/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="<?php echo base_url();?>assets/dash/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- PNotify -->
<link href="<?php echo base_url();?>assets/dash/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dash/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/dash/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
<!-- jVectorMap -->
<link href="<?php echo base_url();?>assets/dash/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

<!--Jquery Ui Date Picker-->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

<!-- Custom Theme Style -->
<link href="<?php echo base_url();?>assets/dash/build/css/custom.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/dash/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootbox -->
<script src="<?php echo base_url(); ?>assets/dash/js/bootbox/bootbox.min.js"></script>
<style>
.placeholder {
	color: grey;
}

</style>
</head>

<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0; border-bottom:1px solid #435b73;">
    	<div class="visible-xs hidden-sm hidden-md hidden-lg" style="position: absolute; opacity: 1; z-index: 999; max-width: 68px; padding: 10px;">
        	<a href="<?php echo base_url();?>Main/Digital_Receptionist" class="site_title">
  			<img class="img-responsive logo_transparent_static visible" src="<?php echo base_url();?>assets/dash/images/Ntec-large-Logo.png" alt="Ntec">
        </a>    
   </div>
   <div class="col-md-12 hidden-xs">
     <a href="<?php echo base_url();?>Main/Digital_Receptionist" class="site_title">
     	<span>My-App</span></a> 
   </div>
     </div>
    <div class="clearfix"></div>
    
    <!-- menu profile quick info --> 
    <!--    <div class="profile">
        <div class="profile_pic">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo $this->session->userdata('frstName').' '.$this->session->userdata('lstName');?></h2>
        </div>
    </div>--> 
    <!-- /menu profile quick info --> 
    
    <br />
    
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Ntec</h3>
        <ul class="nav side-menu">
          <?php
		$stuId = $this->session->userdata('stuId');
		$cmId = $this->session->userdata('cmId');
		$mcId = $this->session->userdata('mcId');
		$usrType = $this->session->userdata('usrType');
		
		$accId = $stuId.$cmId.$mcId.$usrType;
		$csa = $stuId.$mcId.$usrType;
		

		if($usrType == 0){
        ?>
          <li><a><i class="fa fa-file"></i> Application <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url(); ?>Main/change_csp">Change of Campus / School / Programme</a></li>
              <li><a href="<?php echo base_url(); ?>Main/second_year">2<sup>nd</sup> Year : Application Form</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-user"></i> Profile<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url(); ?>Main/show_profile">Create Profile</a></li>
              <li><a href="<?php echo base_url(); ?>Main/secondary_studies">Secondary Studies</a> </li>
              <li><a href="<?php echo base_url(); ?>Main/tertiary_tudies">Tertiary Studies</a></li>
            </ul>
          </li>
          <?php
		}
		if($usrType == 2 || $usrType == 3 || $usrType == 4 || $usrType == 6 || $usrType == 9 || $csa != 001 && $usrType != 0){
        ?>
          <li><a><i class="fa fa-tasks"></i> Process <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>Pending</a>
                <ul class="nav child_menu">
                  <?php
                    if($usrType != 4){
					?>
                  <li><a href="<?php echo base_url(); ?>Main/pending_csp">Change of Campus / School / Programme</a></li>
                  <?php
					}
					if($usrType == 4 || $usrType == 3 || $usrType == 6){
					?>
                  <li><a href="<?php echo base_url(); ?>Main/pending_second_year">2<sup>nd</sup> Year : Application Form</a></li>
                  <?php
					}
					?>
                </ul>
              </li>
            </ul>
          </li>
          <?php
		}
			if($usrType == 3 || $usrType == 6 || $usrType == 0){
			?>
          <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a>Check Status</a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo base_url(); ?>Main/rpt_csp">Change of Campus / School / Programme</a></li>
                  <li><a href="<?php echo base_url(); ?>Main/rpt_second_year">2<sup>nd</sup> Year : Application Form</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <?php
			  }
			  ?>
          <li><a><i class="fa fa-wrench"></i> Settings <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <?php
			if($accId == 0001){
			?>
              <li><a>Country<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_country">Add</a></li>
                  <li><a href="<?php echo base_url();?>Country/view_country">View</a></li>
                </ul>
              </li>
              <li><a>Citizenship<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_citizenship">Add</a></li>
                  <li><a href="<?php echo base_url();?>Citizenship/view_citizenship">View</a></li>
                </ul>
              </li>
              <li><a>Campus<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_campus">Add</a></li>
                  <li><a href="<?php echo base_url();?>Campus/view_campus">View</a></li>
                </ul>
              </li>
              <?php
			}
			if($accId == 0001 || $csa == 001){
			  ?>
              <li><a>School<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_school">Add</a></li>
                  <li><a href="<?php echo base_url();?>School/view_school">View</a></li>
                </ul>
              </li>
              <?php
              if($accId == 0001 || $csa == 001){
			  ?>
              <li><a>Department<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_department">Add</a></li>
                  <li><a href="<?php echo base_url();?>Department/view_department">View</a></li>
                </ul>
              </li>
              <?php
			  }
			  ?>
              <li><a>Course<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_course">Add</a></li>
                  <li><a href="<?php echo base_url();?>Course/view_course">View</a></li>
                </ul>
              </li>
              <?php
              if($accId == 0001 || $csa == 001){
			  ?>
              <li><a>Users<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="<?php echo base_url();?>Main/add_users">Add</a></li>
                  <!--<li><a href="<?php echo base_url();?>Login/view_users">View</a></li>-->
                </ul>
              </li>
              <?php
			  }
				}
				?>
              <li><a href="<?php echo base_url();?>Login/change_password">Change Password</a></li>
              <?php
			  //if($usrType == 2 || $usrType == 3 || $usrType == 4  && $mcId != 0){
			  ?>
              <li><a href="<?php echo base_url();?>Main/upload_signature">Upload Signature</a></li>
              <?php
			  //}
			  ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu --> 
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
          <!--<img src="<?php echo base_url();?>assets/dash/images/img.jpg" alt="">John Doe--> 
          <span>Welcome <i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>,</span> <?php echo $this->session->userdata('frstName');?> <span class=" fa fa-angle-down"></span> </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <!--<li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
            <li><a href="<?php echo base_url();?>Login/log_out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
        
        <!--<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url();?>assets/dash/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url();?>assets/dash/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url();?>assets/dash/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url();?>assets/dash/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>-->
      </ul>
      </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->

<div class="right_col" role="main">
