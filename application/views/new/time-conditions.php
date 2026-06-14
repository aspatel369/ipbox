<?php include 'common/header.php'; ?>

<div class="content">
    <br>

    <div class="container-fluid">

        <!-- Button Datatable -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Time Conditions
                            <button style="float: right;" type="button" class="btn btn-primary" id="addBtn">
                                Add Time Conditions
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
                                    <th>Time Condition Group Name</th>
                                    <th>Houses</th>
                                    <th>Week Days</th>
                                    <th>From - To - Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($data as $row) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <a class="group-link editBtn" data-id="<?php echo $row['id']; ?>">
                                                <?php echo ucfirst($row['extensions'] ?? ''); ?>
                                            </a>
                                        </td>
                                        <td><?php echo $row['house_names']; ?></td>
                                        <td><?php echo $row['weekdays']; ?></td>
                                        <td>
                                            <?php echo date('h:i A', strtotime($row['from_time']))." - ".date('h:i A', strtotime($row['to_time'])); ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo base_url('/'); ?>index.php/TimeConditions/deleteRecord/<?php echo $row['id']; ?>" 
                                                onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-sm bg-danger-subtle">
                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Time Condition</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Server Side -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="TCForm" method="post" action="<?php echo base_url('/') ?>index.php/TimeConditions/saveDetails"  class="row g-3">

                            <input type="hidden" name="id" id="tcId" value="0" />

                            <div class="col-md-12">
                                <label for="new_time_condition_group_name" class="form-label">Time Condition Group Name</label>
                                <input type="text" class="form-control" name="new_time_condition_group_name" id="new_time_condition_group_name" 
                                    required>
                            </div>
                            
                            <div class="row" style="margin-top: 20px;">
                                <label for="validationServer04" class="form-label">Select House</label>

                                <div class="col-sm-12">
                                    <div class="row" style="padding-left: 10px;">

                                        <?php foreach($houses as $row) { ?>
                                            <div class="form-check col-sm-3">
                                                <input class="form-check-input" type="checkbox" name="houses[]" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>">
                                                <label class="form-check-label" for="<?php echo $row['id']; ?>"><?php echo $row['house_name']; ?></label>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="from_time" class="form-label">Duration From*</label>
                                <input type="time" class="form-control" name="from_time" id="from_time" required>
                                
                            </div>

                            <div class="col-md-6">
                                <label for="to_time" class="form-label">Duration To*</label>
                                <input type="time" class="form-control" name="to_time" id="to_time" required>
                            </div>


                            <div class="row" style="margin-top: 20px;">

                                <label for="validationServer04" class="form-label">Days</label>

                                <div class="col-sm-12">
                                    <div class="row" style="padding-left: 10px;">
                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Mon" id="Mon">
                                            <label class="form-check-label" for="Mon">Monday</label>
                                        </div>

                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Tue" id="Tue">
                                            <label class="form-check-label" for="Tue">Tuesday</label>
                                        </div>

                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Wed" id="Wed">
                                            <label class="form-check-label" for="Wed">Wednesday</label>
                                        </div>

                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Thu" id="Thu">
                                            <label class="form-check-label" for="Thu">Thursday</label>
                                        </div>

                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Fri" id="Fri">
                                            <label class="form-check-label" for="Fri">Friday</label>
                                        </div>

                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Sat" id="Sat">
                                            <label class="form-check-label" for="Sat">Saturday</label>
                                        </div>

                                        <div class="form-check col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="Sun" id="Sun">
                                            <label class="form-check-label" for="Sun">Sunday</label>
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

<script>
    $('#addBtn').on('click', function() {
        $('#TCForm')[0].reset();
        $('#tcId').val(0);
        $('#staticBackdropLabel').text('Add Time Condition');
        $('button[type="submit"]').text('Submit');
        $('#staticBackdrop').modal('show');
    });

    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('') ?>index.php/TimeConditions/getDetails/" + id,
            type: "GET",
            dataType: "json",
            success: function(res) {

                // set data
                $('#tcId').val(id);
                $('#new_time_condition_group_name').val(res.extensions ?? '');
                $('#from_time').val(res.from_time);
                $('#to_time').val(res.to_time);

                $('input[name="houses[]"]').prop('checked', false);
                let houseIds = res.house_name.split(',');
                houseIds.forEach(function(val) {
                    $('input[name="houses[]"][value="' + val.trim() + '"]').prop('checked', true);
                });

                $('input[name="days[]"]').prop('checked', false);
                let days = res.weekdays.split(',');
                days.forEach(function(val) {
                    $('input[name="days[]"][value="' + val.trim() + '"]').prop('checked', true);
                });

                $('#staticBackdropLabel').text('Update Time Condition');

                $('button[type="submit"]').text('Update');

                // open modal AFTER data set
                $('#staticBackdrop').modal('show');
            },
            error: function() {
                alert('Error fetching data');
            }
        });
    });

    $('#TCForm').on('submit', function(e) {
        if ($('input[name="houses[]"]:checked').length === 0) {
            e.preventDefault();
            alert('Please select at least one house');
        }

        if ($('input[name="days[]"]:checked').length === 0) {
            e.preventDefault();
            alert('Please select at least one day');
        }
    });
</script>

<?php include 'common/footer.php'; ?>