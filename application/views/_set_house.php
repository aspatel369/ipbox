<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>iPBX</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="/ipbx/assets/css/css.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/ipbx/assets/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/datatables/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/datatables/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />	
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/ipbx/assets/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/ipbx/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/ipbx/assets/datatables/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/datatables/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/ipbx/assets/datatables/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="<?php echo base_url();?>assets/img/logo-default.jpg" alt="logo" class="logo-default">
                        </a>
                    </div>
                    <!-- END LOGO -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                     <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <li class="menu-dropdown classic-menu-dropdown active">
                                <a href="welcome"> Dashboard
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown">
                                <a href="settings"><span aria-hidden="true" class="icon-settings"></span> Settings
                                </a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown">
                                <a href="user"><span aria-hidden="true" class="icon-users"></span> User Master</a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="javascript:;"><span aria-hidden="true" class="icon-call-out"></span> Reports </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class="dropdown-submenu ">
                                        <a href="javascript:;" class="nav-link nav-toggle ">
                                            <i class="icon-user"></i> User
                                            <span class="arrow"></span>
                                        </a>
                                    </li>
                                    <li class="dropdown-submenu ">
                                        <a href="javascript:;" class="nav-link nav-toggle ">
                                            <i class="icon-social-dribbble"></i> General
                                            <span class="arrow"></span>
                                        </a>
                                    </li>
                                    <li class="dropdown-submenu ">
                                        <a href="javascript:;" class="nav-link nav-toggle ">
                                            <i class="icon-settings"></i> System
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class=" ">
                                                <a href="page_system_coming_soon.html" class="nav-link " target="_blank"> Coming Soon </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper"><!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Settings
                                <small>House &amp; extensions</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
					</div>
				</div>
				<div class="page-content"><!-- BEGIN PAGE CONTENT BODY -->
                    <div class="container">
                        <ul class="page-breadcrumb breadcrumb"><!-- BEGIN PAGE BREADCRUMBS -->
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Settings</span>
                            </li>
                        </ul><!-- END PAGE BREADCRUMBS -->
                        <div class="page-content-inner"><!-- BEGIN PAGE CONTENT INNER -->
                            <div class="row">
                                <div class="col-md-8 col-sm-8">        
                                    <div class="portlet light "><!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <i class="icon-home font-dark"></i>
                                                <span class="caption-subject bold uppercase">House Management</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" id="house">
                                                <thead>
                                                    <tr>
                                                        <th class="all"> House </th>
														<th> Caller Group </th>
														<th> From Time</th>
														<th> To Time </th>
														<th> Status </th>
														<th class="none"> Extensions </th>
                                                    </tr>
													
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- END EXAMPLE TABLE PORTLET-->
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="portlet portlet-sortable box blue-hoki">
                                        <div class="portlet-title ui-sortable-handle">
                                            <div class="caption">
                                                <i class="icon-call-end"></i>Caller Group </div>
                                            <div class="actions">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-default" href="javascript:;" data-toggle="dropdown">
                                                        <i class="fa fa-user"></i> Action
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Delete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-ban"></i> Disable </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a class="btn btn-sm btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body"> 
											<div class="table-stripped">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr><th> # Name </th>
                                                            <th class="hidden-xs"> Balance </th>
                                                            <th> Pulse Rate </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr><td class="highlight">
                                                            <div class="md-checkbox has-error">
                                                                    <input type="checkbox" id="checkbox1" class="md-check">
                                                                    <label for="checkbox1">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span><div class="success"></div><a href="javascript:;"> Mayo Boys </a></label>
                                                            </div>
															</td>
                                                            <td class="hidden-xs"> 80 Min </td>
                                                            <td> 30 Sec </td>
                                                        </tr>
                                                        <tr><td class="highlight">
                                                            <div class="md-checkbox has-error">
                                                                    <input type="checkbox" id="checkbox2" class="md-check">
                                                                    <label for="checkbox2">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span><div class="success"></div><a href="javascript:;"> Mayo Girls </a></label>
                                                            </div>
															</td>
                                                            <td class="hidden-xs"> 60 Min </td>
                                                            <td> 30 Sec </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
										</div>
                                    </div>
								</div>									
							</div>
						</div> <!-- END PAGE CONTENT BODY -->
					</div><!-- END CONTENT BODY -->
            
				</div><!-- END CONTENT -->
			</div>
		</div><!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
            <div class="container"> 2014 &copy; iPbx by Polkaz Soft.
                <a href="#" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase iPbx!</a>
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="/ipbx/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/ipbx/assets/datatables/datatable.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/ipbx/assets/js/app.min.js" type="text/javascript"></script>
		<script src="/ipbx/assets/datatables/table-datatables-buttons.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/ipbx/assets/datatables/layout.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/demo.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>