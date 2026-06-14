<?php include 'common/header.php'; ?>

<div class="content">
    <br>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Button Datatable -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Devices Ping Report

                        </h5>
                         <button style="float: right;" type="button" class="btn btn-primary" id="addBtn">
                                Add Devices
                            </button>
                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <form class="row g-3" role="form" action = "<?php echo base_url();?>index.php/report/devices_ping_reports" method="post" id="date_search">
<!-- 
                                            <div class="col-md-3">
                                                <label for="validationServer04" class="form-label">Select House Name</label>
                                                <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                                    <option selected disabled value="">Choose</option>
                                                    <option>Guru Kripa - 14 Boys</option>
                                                    <option>Guru Kripa - 14 Girls</option>
                                               
                                                </select>

                                            </div> -->

                                            <div class="col-md-2">
                                                        <label for="simpleinput" class="form-label">From</label>
                                                        <input type="date" id="simpleinput" class="form-control">
                                            </div>

                                             <div class="col-md-2" style="margin-right: 30px;">
                                                        <label for="simpleinput" class="form-label">To</label>
                                                        <input type="date" id="simpleinput" class="form-control">
                                            </div>

                                               <!--   <div class="col-md-2">
                                                <label for="validationServer04" class="form-label">Call Lenght</label>
                                                <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                                    <option selected disabled value="">Choose</option>
                                                    <option>Short(0-02 Min)</option>
                                                    <option>Medium(02-20 Min)</option>
                                                    <option>Long(20 Min+)</option>

                                               
                                                </select>

                                            </div> -->



                                          
                                            <div class="col-md-1">
                                               <br>
                                                <button style="float: right; margin-right: 10px;" class="btn btn-primary" type="submit">Search</button>
                                            </div>

                                            <div class="col-md-1">
                                               <br>
                                                <button style="float: right;" class="btn btn-primary" name="report_export_data" type="submit" value="Export">Export</button>
                                            </div>
                                        </form>
                                    </div> <!-- end card-body -->
    

                    <div class="card-body">
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <script>alert("<?= $this->session->flashdata('msg'); ?>");</script>
                        <?php } ?>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                 <tr>
                                    <th>S.No</th>
                                    <th>Device Name</th>
                                    <th>Device Location</th>
                                    <th>IP Address</th>
                                    <th>Status</th>   
                                    <th>Last Ping Request</th>
                                    <th>Last Ping Positive Response</th>
                                    <th>Last Negative Response</th>             
                                    <th>RefreshedAt</th>        
                                    <th></th>        
                                </tr>
                            </thead>

                            <tbody>
                              <?php if(!empty($reportDetails)) { ?>
                                
                                <?php $i = 1; foreach($reportDetails as $row) { ?>

                                    <tr>
                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> ><?php echo $i++; ?></td>

                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> ><?php echo $row['DeviceName']; ?></td>

                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> ><?php echo $row['DeviceLocation']; ?></td>

                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> ><?php echo $row['IPAddress']; ?></td>

                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> >
                                            <?php echo $row['Status']; ?>
                                        </td>


                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> >
                                            <?php 
                                                echo (!empty($row['LastPingRequest']) && $row['LastPingRequest'] != "0000-00-00 00:00:00")
                                                ? date('d-m-Y h:i A', strtotime($row['LastPingRequest']))
                                                : '-';
                                            ?>
                                        </td>
                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> >
                                             <?php 
                                                echo (!empty($row['LastPingPositiveResponse']) && $row['LastPingPositiveResponse'] != "0000-00-00 00:00:00")
                                                ? date('d-m-Y h:i A', strtotime($row['LastPingPositiveResponse']))
                                                : '-';
                                            ?>
                                        </td>
                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> >
                                             <?php 
                                                echo (!empty($row['LastNegativeResponse']) && $row['LastNegativeResponse'] != "0000-00-00 00:00:00")
                                                ? date('d-m-Y h:i A', strtotime($row['LastNegativeResponse']))
                                                : '-';
                                            ?>
                                        </td>
                                        <td <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> >
                                            <?php 
                                                echo !empty($row['RefreshedAt']) 
                                                ? date('d-m-Y h:i A', strtotime($row['RefreshedAt']))
                                                : '-';
                                            ?>
                                        </td>
                                        <td class="text-end" <?php if($row['Status'] === 'offline') { ?> style="background-color: #f1051040;" <?php }else{ ?> style="background-color: #d7f5b6;" <?php } ?> >
                                            <a href="javascript:;" class="btn btn-sm bg-primary-subtle me-1 editBtn" data-id="<?php echo $row['Id']; ?>"
                                                onclick="return confirm('Are you sure you want to edit this record?')">
                                                    <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                            </a>

                                            <a href="<?php echo base_url('/'); ?>index.php/report/deleteDevice/<?php echo $row['Id']; ?>" 
                                                onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-sm bg-danger-subtle">
                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>
                                    <td colspan="6" class="text-center">
                                        No Low Usage Students Found
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add House</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Server Side -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="houseForm" method="post" action="<?php echo base_url('/') ?>index.php/report/saveDevice" class="row g-3">

                            <input type="hidden" name="id" id="deviceId" value="0" />

                            <div class="col-md-3">
                                <label for="device_name" class="form-label">Device Name</label>
                                <input type="text" class="form-control" name="device_name" id="device_name" required>
                            </div>

                            <div class="col-md-3">
                                <label for="device_location" class="form-label">Device Location</label>
                                <input type="text" class="form-control" name="device_location" id="device_location" required>
                            </div>

                            <div class="col-md-3">
                                <label for="ip_address" class="form-label">IP Address</label>
                                <input type="text" class="form-control" name="ip_address" id="ip_address" required>
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

<script>
    $('#addBtn').on('click', function () {
        $('#houseForm')[0].reset();
        $('#houseId').val(0);
        $('#staticBackdropLabel').text('Add House');
        $('button[type="submit"]').text('Submit');
        $('#staticBackdrop').modal('show');
    });

    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('') ?>index.php/report/getdevice/" + id,
            type: "GET",
            dataType: "json",
            success: function (res) {

                // set data
                $('#deviceId').val(res.Id);
                $('#device_name').val(res.DeviceName);
                $('#device_location').val(res.DeviceLocation);

                $('#ip_address').val(res.IPAddress);

                $('button[type="submit"]').text('Update');

                // open modal AFTER data set
                $('#staticBackdrop').modal('show');
                
            },
            error: function () {
                alert('Error fetching data');
            }
        });
    });
</script>

<?php include 'common/footer.php'; ?>