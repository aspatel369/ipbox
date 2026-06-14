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
                        <h5 class="card-title mb-0">Manage Students
                            <span style="float: right;">
                                <a href="<?php echo base_url('/'); ?>index.php/Students/downloadSampleCsv" class="btn btn-outline-secondary me-1">
                                    Sample CSV
                                </a>
                                <button type="button" class="btn btn-success me-1" id="importBtn">
                                    Import CSV
                                </button>
                                <button type="button" class="btn btn-primary" id="addBtn">
                                    Add Student
                                </button>
                            </span>
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
                                    <th>Student Name</th>
                                    <th>Roll No</th>
                                    <th>House Name</th>
                                    <th>Balance</th>
                                    <th>Used Balance</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo strtoupper($row['name']); ?></td>
                                    <td><?php echo $row['roll_no']; ?></td>
                                    <td><?php echo !empty($row['house_name']) ? $row['house_name'] : $row['house']; ?></td>
                                    <td><?php echo round($row['available_balance'], 2); ?></td>
                                    <td><?php echo round($row['used_balance'], 2); ?></td>
                                    <td>
                                        <?php
                                            $isActive = (strtolower($row['status']) === 'active');
                                            $span_class = $isActive
                                                ? 'badge bg-success-subtle text-success'
                                                : 'badge bg-danger-subtle text-danger';
                                        ?>
                                        <span class="<?php echo $span_class; ?>"><?php echo ucfirst($row['status']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <?php if ($isActive) { ?>
                                            <a href="<?php echo base_url('/'); ?>index.php/Students/toggleStatus/<?php echo $row['id']; ?>"
                                                onclick="return confirm('Deactivate this student?')"
                                                class="btn btn-sm bg-warning-subtle me-1" title="Deactivate">
                                                <i class="mdi mdi-account-off fs-14 text-warning"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url('/'); ?>index.php/Students/toggleStatus/<?php echo $row['id']; ?>"
                                                onclick="return confirm('Activate this student?')"
                                                class="btn btn-sm bg-success-subtle me-1" title="Activate">
                                                <i class="mdi mdi-account-check fs-14 text-success"></i>
                                            </a>
                                        <?php } ?>

                                        <a href="javascript:;" class="btn btn-sm bg-primary-subtle me-1 editBtn" data-id="<?php echo $row['id']; ?>">
                                            <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                        </a>

                                        <a href="<?php echo base_url('/'); ?>index.php/Students/deleteRecord/<?php echo $row['id']; ?>"
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


<!-- Add/Edit Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="studentForm" method="post" action="<?php echo base_url('/') ?>index.php/Students/saveDetails" class="row g-3">

                            <input type="hidden" name="id" id="stdId" value="0" />

                            <div class="col-md-4">
                                <label for="name" class="form-label">Student Name*</label>
                                <input type="text" class="form-control" name="name" id="name" value="" required>
                            </div>

                            <div class="col-md-4">
                                <label for="roll_no" class="form-label">Roll Number*</label>
                                <input type="text" class="form-control" name="roll_no" id="roll_no" value="" maxlength="11" required>
                            </div>

                            <div class="col-md-4">
                                <label for="pin_no" class="form-label">Pin Number*</label>
                                <input type="number" class="form-control" name="pin_no" id="pin_no" value="" maxlength="10" inputmode="numeric" required>
                            </div>

                            <div class="col-md-4">
                                <label for="DOB" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="DOB" id="DOB">
                            </div>

                            <div class="col-md-4">
                                <label for="house" class="form-label">Select House Name</label>
                                <select class="form-select" name="house" id="house" aria-describedby="house" required>
                                    <option selected disabled value="">-- Select --</option>
                                    <?php foreach($houses as $houseRow) { ?>
                                    <option value="<?php echo $houseRow['id']; ?>"><?php echo $houseRow['house_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="option1" class="form-label">Option 1*</label>
                                <input type="text" class="form-control" name="option1" id="option1" placeholder="Contact 1" pattern="[6-9][0-9]{9}"
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label for="option2" class="form-label">Option 2*</label>
                                <input type="text" class="form-control" name="option2" id="option2" placeholder="Contact 2" pattern="[6-9][0-9]{9}"
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label for="option3" class="form-label">Option 3</label>
                                <input type="text" class="form-control" name="option3" id="option3" placeholder="Contact 3" pattern="[6-9][0-9]{9}"
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-4">
                                <label for="option4" class="form-label">Option 4</label>
                                <input type="text" class="form-control" name="option4" id="option4" placeholder="Contact 4" pattern="[6-9][0-9]{9}"
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-4">
                                <label for="option5" class="form-label">Option 5</label>
                                <input type="text" class="form-control" name="option5" id="option5" placeholder="Contact 5" pattern="[6-9][0-9]{9}"
                                    minlength="10" maxlength="10" inputmode="numeric" title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" aria-describedby="status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button style="float: right;" class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import CSV Modal -->
<div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="importModalLabel">Import Students from CSV</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small">
                    CSV columns: rollnumber, studentname, pinnumber, housecode, option1, option2, option3, option4, option5, Points, Status.
                    Use <strong>housecode</strong> as the house ID. Download the sample file for reference.
                </p>
                <form method="post" action="<?php echo base_url('/'); ?>index.php/Students/importCsv" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" name="file" accept=".csv" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload CSV</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#addBtn').on('click', function() {
        $('#studentForm')[0].reset();
        $('#stdId').val(0);
        $('#status').val('active');
        $('#staticBackdropLabel').text('Add Student');
        $('button[type="submit"]').text('Submit');
        $('#staticBackdrop').modal('show');
    });

    $('#importBtn').on('click', function() {
        $('#importModal').modal('show');
    });

    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('') ?>index.php/Students/getDetails/" + id,
            type: "GET",
            dataType: "json",
            success: function(res) {
                if (!res || !res.id) {
                    alert('Unable to load student details');
                    return;
                }

                $('#stdId').val(id);
                $('#name').val(res.name);
                $('#roll_no').val(res.roll_no);
                $('#pin_no').val(res.pin_no);
                $('#DOB').val(res.DOB && res.DOB !== '0000-00-00' ? res.DOB : '');
                $('#option1').val(res.option1);
                $('#option2').val(res.option2);
                $('#option3').val(res.option3);
                $('#option4').val(res.option4);
                $('#option5').val(res.option5);
                $('#house').val(res.house);
                $('#status').val(res.status ? res.status.toLowerCase() : 'active');

                $('#staticBackdropLabel').text('Update Student');
                $('button[type="submit"]').text('Update');
                $('#staticBackdrop').modal('show');
            },
            error: function() {
                alert('Error fetching data');
            }
        });
    });
</script>

<?php include 'common/footer.php'; ?>
