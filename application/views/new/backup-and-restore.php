<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <meta charset="utf-8" />
        <title>CDR Reports | Spcas Telecon</title>
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


         <!-- Form Validation -->
                        <div class="row">
                            
                            <!-- Server Side -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Filters</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                        <form class="row g-3">
                                            <div class="col-md-2">
                                                        <label for="simpleinput" class="form-label">Roll No.</label>
                                                        <input type="text" id="simpleinput" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                        <label for="simpleinput" class="form-label">From</label>
                                                        <input type="date" id="simpleinput" class="form-control">
                                            </div>

                                             <div class="col-md-2">
                                                        <label for="simpleinput" class="form-label">To</label>
                                                        <input type="date" id="simpleinput" class="form-control">
                                            </div>

                                               <div class="col-md-2">
                                                        <label for="example-select" class="form-label">Source</label>
                                                        <select class="form-select" id="example-select">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <label for="example-select" class="form-label">Status</label>
                                                        <select class="form-select" id="example-select">
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                   
                                                        </select>
                                                    </div>


                                          
                                            <div class="col-md-1">
                                               <br>
                                                <button style="float: right;" class="btn btn-primary" type="submit">Search</button>
                                            </div>

                                            <div class="col-md-1">
                                               <br>
                                                <button style="float: right;" class="btn btn-primary" type="submit">Export</button>
                                            </div>
                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>


                                  
                    <div class="container-fluid">

                        <!-- Button Datatable -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">CDR Report
                                     
                                        </h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Date and Time</th>
                                                       <th>Backup Name</th>
                                                    <th>Download</th>
                                                       <th>Restore</th>
                                                </tr>
                                            </thead>
                         
<tbody>

<tr>
    <td>1</td>

    <td>2026-04-03 10:15:22</td>
    <td>Backup 1</td>
  <td><a class="btn btn-sm bg-primary-subtle me-1">Download</a></td>
    
    <td> <a class="btn btn-sm bg-danger-subtle">Restore</a></td>


</tr>

<tr>
    <td>1</td>

    <td>2026-04-03 10:15:22</td>
    <td>Backup 1</td>
  <td><a class="btn btn-sm bg-primary-subtle me-1">Download</a></td>
    
    <td> <a class="btn btn-sm bg-danger-subtle">Restore</a></td>


</tr>

<tr>
    <td>1</td>

    <td>2026-04-03 10:15:22</td>
    <td>Backup 1</td>
  <td><a class="btn btn-sm bg-primary-subtle me-1">Download</a></td>
    
    <td> <a class="btn btn-sm bg-danger-subtle">Restore</a></td>


</tr>

<tr>
    <td>1</td>

    <td>2026-04-03 10:15:22</td>
    <td>Backup 1</td>
  <td><a class="btn btn-sm bg-primary-subtle me-1">Download</a></td>
    
    <td> <a class="btn btn-sm bg-danger-subtle">Restore</a></td>


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
                    <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                           <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Job Role</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                            <!-- Server Side -->
                            <div class="col-xl-12">
                                <div class="card">
                                  
        
                                    <div class="card-body">
                                        <form class="row g-3">
                                            <div class="col-md-4">
                                                <label for="validationServer01" class="form-label">Job Role Name</label>
                                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                               <div class="col-md-4">
                                                <label for="validationServer04" class="form-label">Select Job Role Status</label>
                                                <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                                    <option selected disabled value="">Choose</option>
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                
                                                </select>
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>

                                                      <!-- Bordered Tables -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Select Rights as per Job Role</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Module Name</th>
                                                        <th scope="col">Add</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">Delete</th>

                                                    </tr>
                                                </thead>
                                              <tbody>

<tr>
<th scope="row">Manage Employees</th>
<td><input class="form-check-input" type="checkbox" id="empAdd"></td>
<td><input class="form-check-input" type="checkbox" id="empEdit"></td>
<td><input class="form-check-input" type="checkbox" id="empView"></td>
<td><input class="form-check-input" type="checkbox" id="empDelete"></td>
</tr>

<tr>
<th scope="row">Manage Departments</th>
<td><input class="form-check-input" type="checkbox" id="deptAdd"></td>
<td><input class="form-check-input" type="checkbox" id="deptEdit"></td>
<td><input class="form-check-input" type="checkbox" id="deptView"></td>
<td><input class="form-check-input" type="checkbox" id="deptDelete"></td>
</tr>

<tr>
<th scope="row">Manage Job Roles</th>
<td><input class="form-check-input" type="checkbox" id="roleAdd"></td>
<td><input class="form-check-input" type="checkbox" id="roleEdit"></td>
<td><input class="form-check-input" type="checkbox" id="roleView"></td>
<td><input class="form-check-input" type="checkbox" id="roleDelete"></td>
</tr>

<tr>
<th scope="row">Manage Candidates</th>
<td><input class="form-check-input" type="checkbox" id="candidateAdd"></td>
<td><input class="form-check-input" type="checkbox" id="candidateEdit"></td>
<td><input class="form-check-input" type="checkbox" id="candidateView"></td>
<td><input class="form-check-input" type="checkbox" id="candidateDelete"></td>
</tr>

<tr>
<th scope="row">Manage Clients</th>
<td><input class="form-check-input" type="checkbox" id="clientAdd"></td>
<td><input class="form-check-input" type="checkbox" id="clientEdit"></td>
<td><input class="form-check-input" type="checkbox" id="clientView"></td>
<td><input class="form-check-input" type="checkbox" id="clientDelete"></td>
</tr>

</tbody>
                                            </table>
                                        </div>
                                    </div>
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