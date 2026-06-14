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
                        <h5 class="card-title mb-0">House Reports

                        </h5>
                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <!-- <form class="row g-3"> -->
                                        <form class="row g-3" role="form" action = "<?php echo base_url();?>index.php/report/house_report" method="post" id="date_search">
                                            <div class="col-md-3">
                                                <label for="validationServer04" class="form-label">Select House Name</label>
                                                <select class="form-select " name="house"  id="validationServer04" >
                                                    <option selected disabled value="">Choose</option>
                                                    <?php foreach($house as $values){ ?>
                                                                       <option value="<?php echo $values['id'] ?>" <?php if ($search['house'] == $values['id']) {
                                                                        echo "selected";
                                                                       } ?> ><?php echo $values['house_name'] ?></option>
                                                      <?php } ?>
                                                </select>

                                            </div>

                                            <div class="col-md-2">
                                                        <label for="simpleinput" class="form-label">From</label>
                                                        <input type="date" name="fromdate" placeholder="From" id="from_date" value="<?php echo $search['from_date']; ?>" onkeyup="$('#to_date_error').html('')" class="form-control">
                                            </div>

                                             <div class="col-md-2" style="margin-right: 30px;">
                                                        <label for="simpleinput" class="form-label">To</label>
                                                        <!-- <input type="date" id="simpleinput" class="form-control"> -->

                                                        <input type="date" name="todate" placeholder="to" id="to_date" value="<?php echo $search['to_date']; ?>" onkeyup="$('#from_date_error').html('')" class="form-control">
                                            </div>
<!-- 
                                                 <div class="col-md-2">
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
                                                <button style="float: right; margin-right: 10px;" class="btn btn-primary" name="report_submit_data" type="submit" style="margin-left: 10px;">Search</button>
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
                                    <th>Unique Id</th>
                                    <th>Student Name</th>
                                    <th>House</th>
                                    <th>Roll No</th>
                                    <th>Called No.</th>
                                    <!-- <th>Extension</th> -->
                                    <th>Duration</th>
                                    <th>Cost</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>
                             <?php if($reportDetails){ $i = 1; foreach($reportDetails as $values){ ?>
                                            <tr>
                                                
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $values['uniqueid']; ?></td>
                                                <td><?php echo $values['name']; ?></td>
                                                <td><?php echo $values['house_name']; ?></td>
                                                <td><?php echo $values['roll_no']; ?></td>
                                                <td><?php echo $values['MobileNumber']; ?></td>
                                                <!-- <td></td> -->
                                                <td><?php echo round($values['FullCallLength'] / 60, 2); ?> Min</td>
                                                <td> <?php echo number_format($values['cost'], 2); ?></td>
                                                <td><?php echo date('d-m-Y H:i:s', strtotime($values['start_time'])); ?></td>
                                                <td><?php echo date('d-m-Y H:i:s', strtotime($values['end_time'])); ?></td>
                                            </tr>
                                            <?php  } } else { ?>
                                            <tr>
                                                <td colspan="10">No records</td>
                                            </tr>
                                            <?php } ?>
                            
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
                        <form id="houseForm" method="post" action="<?php echo base_url('/') ?>index.php/Houses/saveDetails" class="row g-3">

                            <input type="hidden" name="id" id="houseId" value="0" />

                            <div class="col-md-3">
                                <label for="house_name" class="form-label">House Name</label>
                                <input type="text" class="form-control" name="house_name" id="house_name" required>
                            </div>

                            <div class="col-md-3">
                                <label for="caller_group" class="form-label">Select Caller Group</label>
                                <select class="form-select" name="caller_group" id="caller_group" aria-describedby="caller_group" required>
                                    <option selected disabled value="">-- Select --</option>
                                    <?php foreach($callerGroups as $row) { ?>
                                        <?php if($row['status'] == 'Active') { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo ucfirst($row['group_name']); ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" aria-describedby="status" required>
                                    <option selected disabled value="">-- Select --</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="phone" class="form-label">Emergency Contact 1</label>
                                <input type="text" class="form-control" name="phone" id="phone" required pattern="[6-9][0-9]{9}" 
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-3">
                                <label for="phtwo" class="form-label">Emergency Contact 2</label>
                                <input type="text" class="form-control" name="phtwo" id="phtwo" required pattern="[6-9][0-9]{9}" 
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-3">
                                <label for="phthree" class="form-label">Emergency Contact 3</label>
                                <input type="text" class="form-control" name="phthree" id="phthree" required pattern="[6-9][0-9]{9}" 
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-3">
                                <label for="phfour" class="form-label">Emergency Contact 4</label>
                                <input type="text" class="form-control" name="phfour" id="phfour" required pattern="[6-9][0-9]{9}" 
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-3">
                                <label for="phfive" class="form-label">Emergency Contact 5</label>
                                <input type="text" class="form-control" name="phfive" id="phfive" required pattern="[6-9][0-9]{9}" 
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-12">
                                <label for="extensions" class="form-label">Extensions</label>
                                <textarea class="form-control" name="extensions" id="extensions" rows="5" spellcheck="false"></textarea>
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
            url: "<?= base_url('') ?>index.php/Houses/getDetails/" + id,
            type: "GET",
            dataType: "json",
            success: function (res) {

                // set data
                $('#houseId').val(id);
                $('#house_name').val(res.house_name);
                $('#extensions').val(res.extensions);

                $('#phone').val(res.phone);
                $('#phtwo').val(res.phtwo);
                $('#phthree').val(res.phthree);
                $('#phfour').val(res.phfour);
                $('#phfive').val(res.phfive);

                $('#caller_group').val(res.caller_group_id).change();
                $('#status').val(res.status).change();

                $('#staticBackdropLabel').text('Update House');

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
