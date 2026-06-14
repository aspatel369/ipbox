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
                        <h5 class="card-title mb-0">Manage Employees

                            <button style="float: right;" type="button" class="btn btn-primary" id="addBtn">
                                Add Employee
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
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Last Login</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo ucfirst($row['name']); ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td></td>
                                    <td><?php echo ucfirst($row['role']); ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                    <td></td>
                                    <td class="text-end">
                                        <a href="javascript:;" class="btn btn-sm bg-primary-subtle me-1 editBtn" data-id="<?php echo $row['id']; ?>"
                                            onclick="return confirm('Are you sure you want to edit this record?')">
                                                <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                        </a>

                                        <a href="<?php echo base_url('/'); ?>index.php/Staff/deleteRecord/<?php echo $row['id']; ?>" 
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Server Side -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="staffForm" method="post" action="<?php echo base_url('/') ?>index.php/Staff/saveDetails"  class="row g-3">
                            
                            <input type="hidden" name="id" id="staffId" value="0" />

                            <div class="col-md-4">
                                <label for="name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer02" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" >
                            </div>
                            <div class="col-md-4">
                                <label for="validationServer02" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" >
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer01" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" >
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer02" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password" >
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer04" class="form-label">Select Job Role</label>
                                <select class="form-select" id="validationServer04" name="role" id="role" aria-describedby="validationServer04Feedback">
                                    <option selected disabled value="">Choose</option>
                                    <option value="admin">Admin</option>
                                    <option value="employee">Spacs Employee</option>
                                    <!-- <option value="">School Login</option> -->
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer04" class="form-label">Status</label>
                                <select class="form-select" id="validationServer04" name="status" id="status" aria-describedby="validationServer04Feedback">
                                    <option selected disabled value="">Choose</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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
        $('#staffForm')[0].reset();
        $('#staffId').val(0);
        $('#staticBackdropLabel').text('Add New Employee');
        $('button[type="submit"]').text('Submit');
        $('#staticBackdrop').modal('show');
    });

    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('') ?>index.php/Staff/getDetails/" + id,
            type: "GET",
            dataType: "json",
            success: function(res) {

                // set data
                $('#staffId').val(id);
                $('#name').val(res.name);
                $('#email').val(res.email);
                $('#phone').val(res.phone);
                $('#username').val(res.username);
                $('select[name="role"]').val(res.role);
    			$('select[name="status"]').val(res.status);


                $('#staticBackdropLabel').text('Update Employee');

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