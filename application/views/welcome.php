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
        <link href="/ipbx/assets/css/morris.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="/ipbx/assets/css/jqvmap.css" rel="stylesheet" type="text/css" />		
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
                    </div>
                    <!-- END MEGA MENU -->
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
                            <h1>Dashboard
                                <small>dashboard &amp; statistics</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
					</div>
				</div>
                <div class="page-content"><!-- BEGIN PAGE CONTENT BODY -->
                    <div class="container"><!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Dashbord</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
									<div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-equalizer font-dark hide"></i>
                                                <span class="caption-subject font-dark bold uppercase">Server Stats</span>
                                                <span class="caption-helper">monthly stats...</span>
                                            </div>
                                            <div class="tools">
                                                <a href="" class="collapse" data-original-title="" title=""> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                                <a href="" class="reload" data-original-title="" title=""> </a>
                                                <a href="" class="remove" data-original-title="" title=""> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="sparkline-chart">
                                                        <div class="number" id="sparkline_bar5"><canvas width="113" height="55" style="display: inline-block; width: 113px; height: 55px; vertical-align: top;"></canvas></div>
                                                        <a class="title" href="javascript:;"> Calls Processed
                                                            <i class="icon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="margin-bottom-10 visible-sm"> </div>
                                                <div class="col-md-4">
                                                    <div class="sparkline-chart">
                                                        <div class="number" id="sparkline_bar6"><canvas width="107" height="55" style="display: inline-block; width: 107px; height: 55px; vertical-align: top;"></canvas></div>
                                                        <a class="title" href="javascript:;"> CPU Load
                                                            <i class="icon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="margin-bottom-10 visible-sm"> </div>
                                                <div class="col-md-4">
                                                    <div class="sparkline-chart">
                                                        <div class="number" id="sparkline_line"><canvas width="100" height="55" style="display: inline-block; width: 100px; height: 55px; vertical-align: top;"></canvas></div>
                                                        <a class="title" href="javascript:;"> Load Rate
                                                            <i class="icon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>						
							<div class="row">
								<div class="col-md-6 col-sm-6">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption caption-md">
                                                <i class="icon-bar-chart font-dark hide"></i>
                                                <span class="caption-subject font-dark bold uppercase">Strength Summery</span>
                                                <span class="caption-helper">current stats...</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row number-stats margin-bottom-30">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="stat-left">
                                                        <div class="stat-chart">
                                                            <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
<div id="sparkline_bar"><canvas width="113" height="55" style="display: inline-block; width: 113px; height: 55px; vertical-align: top;"></canvas></div>
                                                        </div>
														<?php foreach($CallerGroup as $group){ ?>
                                                        <div class="stat-number">
                                                            <div class="title"><?php echo $group->caller_group;?></div>
                                                            <div class="number"><?php echo $group->total;?></div>
                                                        </div>
														<?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="stat-right">
                                                        <div class="stat-chart">
                                                            <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
<div id="sparkline_bar2"><canvas width="107" height="55" style="display: inline-block; width: 107px; height: 55px; vertical-align: top;"></canvas></div>
                                                        </div>
                                                        <div class="stat-number">
                                                            <div class="title"> Mayo Girls</div>
                                                            <div class="number"> 719 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-scrollable table-scrollable-borderless">
                                                <table class="table table-hover table-light">
                                                    <thead>
                                                        <tr class="uppercase">
                                                            <th> House </th>
                                                            <th> Active </th>
                                                            <th> Inactive </th>
                                                            <th> Strength </th>															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
													<?php foreach($stats as $stat){ ?>
													<tr>
                                                        <td>
                                                            <a href="javascript:;" class="primary-link"><?php echo $stat->House;?></a>
                                                        </td>
                                                        <td><?php echo $stat->Active;?></td>
                                                        <td>
                                                            <span class="bold theme-font"><?php echo $stat->Inactive;?></span>
                                                        </td>
                                                        <td><?php echo $stat->strength;?></td>												
                                                    </tr>
													<?php } ?>
                                                </tbody>
												</table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-4">
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <span aria-hidden="true" class="icon-call-out font-green"></span>
                                                <span class="caption-subject font-green bold uppercase"> Live Callers</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="mt-element-list">
                                                <div class="mt-list-container list-todo">
                                                    <div class="list-todo-line red"></div>
                                                    <ul>
                                                        <li class="mt-list-item">
                                                            <div class="list-todo-icon bg-white font-blue-steel">
                                                                <span aria-hidden="true" class="icon-call-out"></span>
                                                            </div>
                                                            <div class="list-todo-item blue-steel">
                                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-1-2" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase">
                                                                        <div class="list-toggle-title bold">Mayo Boys</div>
                                                                        <div class="badge badge-default pull-right bold">3</div>
                                                                    </div>
                                                                </a>
                                                                <div class="task-list panel-collapse collapse in" id="task-1-2">
                                                                    <ul>
                                                                        <li class="task-list-item">
                                                                            <div class="task-icon">
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-pencil"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="task-status">
                                                                                <a class="done" href="javascript:;">
                                                                                    <i class="fa fa-check"></i>
                                                                                </a>
                                                                                <a class="pending" href="javascript:;">
                                                                                    <i class="fa fa-close"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="task-content">
                                                                                <h4 class="uppercase bold">
                                                                                    <a href="javascript:;">Data Entry</a>
                                                                                </h4>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="task-footer bg-grey">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mt-list-item">
                                                            <div class="list-todo-icon bg-white font-green-meadow">
                                                                <span aria-hidden="true" class="icon-call-out"></span>
                                                            </div>
                                                            <div class="list-todo-item green-meadow">
                                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-2-2" aria-expanded="false">
                                                                    <div class="list-toggle done uppercase">
                                                                        <div class="list-toggle-title bold">Mayo Girls</div>
                                                                        <div class="badge badge-default pull-right bold">3</div>
                                                                    </div>
                                                                </a>
                                                                <div class="task-list panel-collapse collapse" id="task-2-2">
                                                                    <ul>
                                                                        <li class="task-list-item done">
                                                                            <div class="task-icon">
                                                                                <a href="javascript:;">
                                                                                    <i class="fa fa-file-image-o"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="task-status">
                                                                                <a class="done" href="javascript:;">
                                                                                    <i class="fa fa-check"></i>
                                                                                </a>
                                                                                <a class="pending" href="javascript:;">
                                                                                    <i class="fa fa-close"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="task-content">
                                                                                <h4 class="uppercase bold">
                                                                                    <a href="javascript:;">Concept Design</a>
                                                                                </h4>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="task-footer bg-grey">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>								
							</div>
						</div> <!-- END PAGE CONTENT BODY -->
				<!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
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
        <script src="/ipbx/assets/datatables/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="/ipbx/assets/js/morris.min.js" type="text/javascript"></script>
		<script src="/ipbx/assets/js/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/ipbx/assets/js/app.min.js" type="text/javascript"></script>
		<script src="/ipbx/assets/js/dashboard.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/ipbx/assets/datatables/layout.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/demo.min.js" type="text/javascript"></script>
        <script src="/ipbx/assets/datatables/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
