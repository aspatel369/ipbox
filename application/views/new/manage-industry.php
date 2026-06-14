<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <meta charset="utf-8" />
        <title>Manage Industry | Right Hire</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

      <!-- Flatpickr Timepicker css -->
        <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- Datatables css -->
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

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

            <!-- Left Sidebar Start -->
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
<br>
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- Button Datatable -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Manage Industry
                                      
                                            <button style="float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Add Country
                                            </button>
                                        </h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                           
                                                <th>Industry Name</th>
                                                <th>Status</th>
                                                  <th>Created By</th>
                                                  <th>Created On</th>
                                                 <th>Updated By</th>
                                                  <th>Updated On</th>
                                                  
                                                 <th>Action</th>
                                                 

                                                </tr>
                                            </thead>
 <tbody>

<tr>
<td>IT Company</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Chetan Prajapat</td>
<td>2026-03-06T10:15:30</td>
<td>Admin</td>
<td>2026-03-06T12:20:10</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Healthcare</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Rahul Sharma</td>
<td>2026-03-05T11:25:40</td>
<td>Admin</td>
<td>2026-03-06T09:12:15</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Pharmaceutical</td>
<td><span class="badge bg-warning-subtle text-warning">In-Progress</span></td>
<td>Ankit Jain</td>
<td>2026-03-04T14:18:45</td>
<td>Admin</td>
<td>2026-03-05T16:20:18</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Education</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Priya Kapoor</td>
<td>2026-03-03T09:45:20</td>
<td>Admin</td>
<td>2026-03-04T12:30:55</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Banking & Finance</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Rohit Singh</td>
<td>2026-03-02T16:35:15</td>
<td>Admin</td>
<td>2026-03-03T10:30:22</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>E-commerce</td>
<td><span class="badge bg-danger-subtle text-danger">Inactive</span></td>
<td>Neha Sharma</td>
<td>2026-03-01T12:40:50</td>
<td>Admin</td>
<td>2026-03-02T14:10:10</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Manufacturing</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Amit Verma</td>
<td>2026-02-28T10:10:05</td>
<td>Admin</td>
<td>2026-03-01T11:12:35</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Telecommunications</td>
<td><span class="badge bg-warning-subtle text-warning">In-Progress</span></td>
<td>Mohit Gupta</td>
<td>2026-02-27T13:30:30</td>
<td>Admin</td>
<td>2026-02-28T15:20:40</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Logistics & Supply Chain</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Sneha Patel</td>
<td>2026-02-26T09:10:10</td>
<td>Admin</td>
<td>2026-02-27T11:12:12</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

<tr>
<td>Retail</td>
<td><span class="badge bg-success-subtle text-success">Active</span></td>
<td>Arjun Mehta</td>
<td>2026-02-25T08:55:45</td>
<td>Admin</td>
<td>2026-02-26T10:45:30</td>
<td class="text-end">
<a class="btn btn-sm bg-primary-subtle me-1"><i class="mdi mdi-pencil-outline fs-14 text-primary"></i></a>
<a class="btn btn-sm bg-danger-subtle"><i class="mdi mdi-delete fs-14 text-danger"></i></a>
</td>
</tr>

</tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div> <!-- container-fluid -->

                </div> <!-- content -->


          <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Industry</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                            <!-- Server Side -->
                            <div class="col-xl-12">
                                <div class="card">
                                  
        
                                    <div class="card-body">
                                        <form class="row g-3">
                                            <div class="col-md-12">
                                                <label for="validationServer01" class="form-label">Industry Name</label>
                                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                          
                                            <div class="col-12">
                                                <button style="float: right;" class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                       </div>
             </div>
         </div>


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

        <!-- Datatables js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

        <!-- dataTables.bootstrap5 -->
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

        <!-- buttons.colVis -->
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

        <!-- buttons.bootstrap5 -->
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>

          <!-- Flatpickr Timepicker Plugin js -->
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- dataTables.keyTable -->
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>

        <!-- dataTable.responsive -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

        <!-- dataTables.select -->
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>

        <!-- Datatable Demo App Js -->
        <script src="assets/js/pages/datatable.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>

    </body>
</html>