<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8" />
    <title>Spacs Telecon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('/'); ?>assets/images/favicon.ico">

    <!-- Flatpickr Timepicker css -->
    <link href="<?php echo base_url('/'); ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- Datatables css -->
    <link href="<?php echo base_url('/'); ?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/'); ?>assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/'); ?>assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/'); ?>assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/'); ?>assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo base_url('/'); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="<?php echo base_url('/'); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('/'); ?>assets/js/head.js"></script>

    <script src="<?php echo base_url('/'); ?>assets/js/jquery-3.6.0.min.js"></script>
</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">


        <!-- Topbar Start -->
        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <h5 class="mb-0">
                                <?php
                                    date_default_timezone_set('Asia/Kolkata'); // India timezone

                                    $hour = date('H'); // current hour (00–23)

                                    if ($hour >= 5 && $hour < 12) {
                                        echo "Good Morning, ";
                                    } elseif ($hour >= 12 && $hour < 17) {
                                        echo "Good Afternoon, ";
                                    } else {
                                        echo "Good Evening, ";
                                    }
                                ?>
                                Admin
                            </h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <!-- <li class="d-none d-lg-block">
                                <form class="app-search d-none d-md-block me-auto">
                                    <div class="position-relative topbar-search">
                                        <input type="text" class="form-control ps-4" placeholder="Search..." />
                                        <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                                    </div>
                                </form>
                            </li> -->

                        <!-- Button Trigger Customizer Offcanvas -->
                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                            </button>
                        </li>

                        <!-- Light/Dark Mode Button Themes -->
                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" id="light-dark-mode">
                                <i data-feather="moon" class="align-middle dark-mode"></i>
                                <i data-feather="sun" class="align-middle light-mode"></i>
                            </button>
                        </li>



                        <!-- User Dropdown -->
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo base_url('/'); ?>assets/images/users/user-13.jpg" alt="user-image" class="rounded-circle" />
                                <span class="pro-user-name ms-1">Admin <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                                <!-- item-->
                                <!-- <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div> -->

                                <!-- item-->
                                <!-- <a class='dropdown-item notify-item' href='employee-profile.php'>
                                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                        <span>My Account</span>
                                    </a> -->


                                <!-- <div class="dropdown-divider"></div> -->

                                <!-- item-->
                                <a class='dropdown-item notify-item'
                                    href='<?php echo base_url('/'); ?>index.php/admin/logout'>
                                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end Topbar -->
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <!-- Left Sidebar Start -->
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <div class="logo-box">
                        <a class='logo logo-light' href='<?php echo base_url('/'); ?>index.php/dashboard/home'>
                            <span class="logo-sm">
                                <img style="filter: invert(1);width: 220px;" src="<?php echo base_url('/'); ?>assets/img/SPACSTeleconlogo.png"
                                    alt="">
                            </span>
                            <span class="logo-lg">
                                <img style="filter: invert(1);width: 220px;" src="<?php echo base_url('/'); ?>assets/img/SPACSTeleconlogo.png"
                                    alt="">
                            </span>
                        </a>
                        <a class='logo logo-dark' href='<?php echo base_url('/'); ?>index.php/dashboard/home'>
                            <span class="logo-sm">
                                <img style="filter: invert(1);width: 220px;" src="<?php echo base_url('/'); ?>assets/img/SPACSTeleconlogo.png"
                                    alt="">
                            </span>
                            <span class="logo-lg">
                                <img style="filter: invert(1);width: 220px;" src="<?php echo base_url('/'); ?>assets/img/SPACSTeleconlogo.png"
                                    alt="">
                            </span>
                        </a>
                    </div>

                    <ul id="side-menu">

                        <li class="menu-title">Menu</li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/dashboard/home'>
                                <i data-feather="columns"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/Staff'>
                                <i data-feather="columns"></i>
                                <span> Manage Staff </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/Students'>
                                <i data-feather="columns"></i>
                                <span> Manage Students </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/CallerGroup'>
                                <i data-feather="columns"></i>
                                <span> Manage Caller Group </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/Houses'>
                                <i data-feather="columns"></i>
                                <span> Manage House </span>
                            </a>
                        </li>


                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/TimeConditions'>
                                <i data-feather="columns"></i>
                                <span> Time Conditions </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/Configuration'>
                                <i data-feather="settings"></i>
                                <span> Settings </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Reports</li>

                        <li>
                            <a class='tp-link'  href='<?php echo base_url('/'); ?>index.php/report/house_report'>
                                <i data-feather="columns"></i>
                                <span> House Reports </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/report/extension_report'>
                                <i data-feather="columns"></i>
                                <span> Extension Reports </span>
                            </a>
                        </li>
                        
                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/report/behavior_report'>
                                <i data-feather="columns"></i>
                                <span>  Behaviour Report  </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/report/peak_usage_reports'>
                                <i data-feather="columns"></i>
                                <span> Peak Usage Reports </span>
                            </a>
                        </li>


                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/report/server_performance_report'>
                                <i data-feather="columns"></i>
                                <span>Server Performance Reports </span>
                            </a>
                        </li>


                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/report/devices_ping_reports'>
                                <i data-feather="columns"></i>
                                <span>Device Status Reports </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/dashboard/invoice'>
                                <i data-feather="columns"></i>
                                <span>Invoice Genrate </span>
                            </a>
                        </li>
                       <!--  <li>
                            <a href="#sidebarAdvancedUI" data-bs-toggle="collapse" class="" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span> Behaviour Report </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse show" id="sidebarAdvancedUI" style="">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class="tp-link" href="<?php echo base_url('/'); ?>index.php/report/low_usage_report">Low Usage Student</a>
                                    </li>
                                    <li>
                                        <a class="tp-link" href="<?php echo base_url('/'); ?>index.php/report/high_usage_report">High Usage Student</a>
                                    </li>
                                    <li>
                                        <a class="tp-link" href="short-call-length.html">Short Call Length</a>
                                    </li>
                                    <li>
                                        <a class="tp-link" href="long-call-length.html">Long Call Length</a>
                                    </li>
                                    <li>
                                        <a class="tp-link" href="<?php echo base_url('/'); ?>index.php/report/not_usage_report">Student Not Call
                                            Since Days</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
 -->
                       <!--  <li class="menu-title mt-2">General</li>

                        <li>
                            <a class='tp-link' href='<?php echo base_url('/'); ?>index.php/Emergency'>
                                <i data-feather="columns"></i>
                                <span> Manodarpan </span>
                            </a>
                        </li>


                        <li>
                            <a class='tp-link' href='device-status.php'>
                                <i data-feather="columns"></i>
                                <span> Device Status </span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='backup-and-restore.php'>
                                <i data-feather="columns"></i>
                                <span> Backup & Restore </span>
                            </a>
                        </li>

                        <li>
                            <a href="#sidebarBaseui" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span> Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='index.php' target="_blank">Login</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='otp.php' target="_blank">OTP Verification</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='recover-password.php' target="_blank">Reset
                                            Password</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-confirm-mail.php' target="_blank">Auth
                                            Confirmation</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-logout.php' target="_blank">Session Out</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='offline-page.php' target="_blank">Internet Connect
                                            Lost</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='error-404.php' target="_blank">Error 404</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='error-500.php' target="_blank">Error 500</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='comming-soon.php' target="_blank">Coming Soon</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='maintenance.php' target="_blank">Maintenance</a>
                                    </li>

                                </ul>
                            </div>
                        </li> -->

                    </ul>

                </div>
                <!-- End Sidebar -->
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">