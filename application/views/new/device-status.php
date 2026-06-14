<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <meta charset="utf-8" />
        <title>Device Status | Spacs Telecon</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/head.js"></script>


    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">


            <!-- Topbar Start -->
           <?php include 'includes/head.php'; ?>
         
            <!-- end Topbar -->

       

                    <!--- Sidemenu -->
           <?php include 'includes/sidebar.php'; ?>
                
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
        
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Device Status</h4>
                            </div>
            
      
                        </div>

      

                            <div class="col-lg-6">
                                <div class="card">

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Device Status</h5>
                                    </div><!-- end card header -->
                                    
                                    <div class="card-body">

                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Device-Online1">
                                            <label class="form-check-label" for="Device-Online">Device Online1</label>
                                        </div>


                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Device-Online2">
                                            <label class="form-check-label" for="Device-Online">Device Online2</label>
                                        </div>


                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Device-Online3">
                                            <label class="form-check-label" for="Device-Online">Device Online3</label>
                                        </div>


                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Device-Online4">
                                            <label class="form-check-label" for="Device-Online">Device Online4</label>
                                        </div>
                            

                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


                <!-- Footer Start -->
           <?php include 'includes/footer.php'; ?>

                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>