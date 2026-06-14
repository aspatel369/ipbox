<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
 <script>
        var baseUrl = "<?php echo base_url(); ?>";
         <?php $hash = base64_encode('unset0'); ?>
   </script>
<head>
        <meta charset="utf-8" />
        <title>SPACS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="polkazsoft" name="description" />
        <meta content="polkazsoft" name="polkazsoft" />
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">-->

		<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!--link href="<?php echo base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css"-->
        <link href="<?php echo base_url(); ?>assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/plugins.min.css" rel="stylesheet" type="text/css"> 
		<link href="<?php echo base_url(); ?>assets/css/sweetalert.css" rel="stylesheet" type="text/css">
		        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/css/clockface.css" rel="stylesheet" type="text/css" />   
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
		
        <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />				
        <link href="<?php echo base_url(); ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/blue.min.css" rel="stylesheet" type="text/css" id="style_color">
        <link href="<?php echo base_url(); ?>assets/css/custom.min.css" rel="stylesheet" type="text/css">
	    <link href="<?php echo base_url(); ?>assets/css/app.css" type="text/css" />
      <!-- DataTables CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

<!-- Buttons CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/buttons.dataTables.min.css">
		   <script src="<?php echo base_url(); ?>assets/js/apexcharts.JS"></script>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="/">
                        <img src="<?php echo base_url(); ?>assets/img/SPACSTeleconlogo.png" width="125" style="filter: invert(1);" alt="logo" class="logo-default"> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
							<!-- BEGIN NOTIFICATION DROPDOWN -->
							<!-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-users"></i>
                                    <span class="badge badge-danger"> 12 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 Inactive</span> Students</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                </ul>
                            </li>
							<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-users"></i>
                                    <span class="badge badge-success"> 320 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">320 Active</span> Students</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                </ul>
                            </li> -->
							<!-- END NOTIFICATION DROPDOWN -->							
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/img/a0.jpg">
									<?php   $sessionValues = $this->session->userdata('logged_in'); ?>
                                    <span class="username username-hide-on-mobile"><?php echo $sessionValues['username']; ?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a data-toggle="modal" data-target="#caseModal" data-backdrop="static" data-keyboard="true" aria-hidden="true" href="">
                                        <i class="icon-lock"></i> Change Password </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>index.php/admin/logout">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte 
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>-->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
 <!-- <header id="header" class="app-header navbar" role="menu">
    <div class="page-header navbar navbar-fixed-top">
        <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>

        <a href="#/" class="navbar-brand text-lt">
          <i class="fa fa-asterisk"></i>          
          <span class="hidden-folded m-l-xs">SPACS</span>
        </a>

    </div>

    <div class="collapse pos-rlt navbar-collapse box-shadow bg-info">

        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="<?php echo base_url(); ?>assets/img/a0.jpg" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
              <?php   $sessionValues = $this->session->userdata('logged_in'); ?>
              <span class="hidden-sm hidden-md"> <?php echo $sessionValues['username']; ?></span> <b class="caret"></b>
            </a>

            <ul class="dropdown-menu animated fadeIn w">              
              <li>
                <a data-toggle="modal" data-target="#caseModal" data-backdrop="static" data-keyboard="true" aria-hidden="true" href="">Change Password</a>
              </li>
              <li>
                <a href="<?php echo base_url() ?>index.php/admin/logout">Logout</a>
              </li>
            </ul>
            
          </li>
        </ul>
        
    </div>
	-->
	   
<div id="caseModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
     
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">Edit Password</div>
              <div class="panel-body">			
				 <form role="form" method="post" id="passwordValidate" action=<?php echo base_url() .'index.php/admin/passwordUpdate'?>>
        <div class="row">
           <div class="form-group">  
                   
          <div class="col-md-12">
             <label class="">Old Password<sup class="mandatory">*</sup></label><br>
                    <input type="password" class="form-control" placeholder="Old Password" id="old_password" name="old_password" style="width: 100%;">
           <span id="oldpassword_error"></span>
           <div><span id="login_error" class="error"></span></div>
          </div>
                  </div>
                 
          </div>
           </br>

				 <div class="row">
				   <div class="form-group">  
                   
					<div class="col-md-12">
             <label class="">New Password<sup class="mandatory">*</sup></label><br>
                    <input type="password" class="form-control" placeholder="New Password" id="pass1" name="password" style="width: 100%;">
					 <span id="password_error"></span>
					</div>
                  </div>
                 
				  </div>
				   </br>
				    <div class="row">
				   <div class="form-group">  
                   
					<div class="col-md-12">
             <label class="">Confirm New Password<sup class="mandatory">*</sup></label><br>
                    <input type="password" class="form-control" placeholder="Confirm New Password" name="rePwd" style="width: 100%;">
					<span id="repassword_error"></span>
					</div>
                  </div>
                   
				  </div> 
          
				  <div class="row" style=" padding-top: 15px;">
				    <div class="col-md-9"></div>
					 <button type="submit" class="btn btn-sm btn-primary">Update</button>
           <button type="button" class="btn" data-dismiss="modal">Close</button>
                   
				  </div>
                </form>
				 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/ui-nav.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/ui-toggle.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>    
  <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/components-select2.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/portlet-ajax.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.pulsate.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/components-date-time-pickers.min.js" ></script>
  <!--script src="<?php echo base_url(); ?>assets/js/ui-general.min.js"></script-->
  <!--script src="<?php echo base_url(); ?>assets/js/ui-modals.min.js"></script-->
  <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

</body>
</html>
  
