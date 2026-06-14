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
                        <h5 class="card-title mb-0">Manodarpan
                        </h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>House Name</th>
                                    <th>Emergency Contact 1</th>
                                    <th>Emergency Contact 2</th>
                                    <th>Emergency Contact 3</th>
                                    <th>Emergency Contact 4</th>
                                    <th>Emergency Contact 5</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo ucfirst($row['house_name']); ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['phtwo']; ?></td>
                                    <td><?php echo $row['phthree']; ?></td>
                                    <td><?php echo $row['phfour']; ?></td>
                                    <td><?php echo $row['phfive']; ?></td>                                    
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
                        <form class="row g-3">
                            <div class="col-md-3">
                                <label for="validationServer01" class="form-label">House Name</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationServer04" class="form-label">Select Caller Group</label>
                                <select class="form-select is-invalid" id="validationServer04"
                                    aria-describedby="validationServer04Feedback" required>
                                    <option selected disabled value="">Choose</option>
                                    <option>Caller Group 1</option>
                                    <option>Caller Group 2</option>

                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationServer04" class="form-label">Status</label>
                                <select class="form-select is-invalid" id="validationServer04"
                                    aria-describedby="validationServer04Feedback" required>
                                    <option selected disabled value="">Choose</option>
                                    <option>Active</option>
                                    <option>Inactive</option>

                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="validationServer01" class="form-label">Emergency Contact 1</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationServer01" class="form-label">Emergency Contact 2</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationServer01" class="form-label">Emergency Contact 3</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationServer01" class="form-label">Emergency Contact 4</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationServer01" class="form-label">Emergency Contact 5</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer01" class="form-label">Extensions</label>
                                <textarea class="form-control" id="example-textarea" rows="5"
                                    spellcheck="false"></textarea>
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

<?php include 'common/footer.php'; ?>