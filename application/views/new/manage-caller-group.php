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
                        <h5 class="card-title mb-0">Manage Caller Group

                            <button style="float: right;" type="button" class="btn btn-primary" id="addBtn">
                                Add Caller Group
                            </button>
                        </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <script>alert("<?= $this->session->flashdata('msg'); ?>");</script>
                        <?php } ?>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Group Name</th>
                                    <th>Credit Limit</th>
                                    <th>Pulse Rate</th>
                                    <th>Active On</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo ucfirst($row['group_name']); ?></td>
                                    <td><?php echo round($row['credit_limit'], 2); ?></td>
                                    <td><?php echo round($row['PulseRate'], 2); ?></td>
                                    <td><?php echo $row['ActiveOn']; ?></td>
                                    <td>
                                        <?php 
                                            $span_class = "badge bg-success-subtle text-success";
                                            if($row['status'] == 'Active') {
                                                $span_class = "badge bg-success-subtle text-success";
                                            } elseif($row['status'] == 'Inactive') {
                                                $span_class = "badge bg-danger-subtle text-danger";
                                            } else {
                                                $span_class = "badge bg-warning-subtle text-warning";
                                            }
                                        ?>
                                        <span class="<?php echo $span_class; ?>"><?php echo ucfirst($row['status']); ?></span>
                                    </td>
                                    <td><?php echo $row['date_created']; ?></td>
                                    <td class="text-end">
                                        <a href="javascript:;" class="btn btn-sm bg-primary-subtle me-1 editBtn" data-id="<?php echo $row['id']; ?>"
                                            onclick="return confirm('Are you sure you want to edit this record?')">
                                                <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                        </a>

                                        <a href="<?php echo base_url('/'); ?>index.php/CallerGroup/deleteRecord/<?php echo $row['id']; ?>" 
                                            onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-sm bg-danger-subtle">
                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Caller Group</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Server Side -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="callerForm" method="post" action="<?php echo base_url('/') ?>index.php/CallerGroup/saveDetails"  class="row g-3">
                            
                            <input type="hidden" name="id" id="callerId" value="0" />

                            <div class="col-md-3">
                                <label for="group_name" class="form-label">Caller Group Name</label>
                                <input type="text" class="form-control" name="group_name" id="group_name" required>
                            </div>

                            <div class="col-md-3">
                                <label for="credit_limit" class="form-label">Credit Limit</label>
                                <input type="number" class="form-control" name="credit_limit" id="credit_limit" required>
                            </div>
                            <div class="col-md-3">
                                <label for="PulseRate" class="form-label">Pulse Rate</label>
                                <input type="number" class="form-control" name="PulseRate" id="PulseRate" required>
                            </div>


                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" aria-describedby="status" required>
                                    <option selected disabled value="">-- Select --</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="ActiveOn" class="form-label">Active On</label>
                                <input type="text" class="form-control" name="ActiveOn" id="ActiveOn"required>
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
    $('#addBtn').on('click', function() {
        $('#callerForm')[0].reset();
        $('#callerId').val(0);
        $('#staticBackdropLabel').text('Add Caller Group');
        $('button[type="submit"]').text('Submit');
        $('#staticBackdrop').modal('show');
    });

    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('') ?>index.php/CallerGroup/getDetails/" + id,
            type: "GET",
            dataType: "json",
            success: function(res) {

                // set data
                $('#callerId').val(id);
                $('#group_name').val(res.group_name);
                $('#credit_limit').val(res.credit_limit);
                $('#PulseRate').val(res.PulseRate);
                $('#ActiveOn').val(res.ActiveOn);

                $('#status').val(res.status).change();

                $('#staticBackdropLabel').text('Update Caller Group');

                $('button[type="submit"]').text('Update');

                // open modal AFTER data set
                $('#staticBackdrop').modal('show');
            },
            error: function() {
                alert('Error fetching data');
            }
        });
    });
</script>

<?php include 'common/footer.php'; ?>