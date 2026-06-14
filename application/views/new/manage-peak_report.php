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
                        <h5 class="card-title mb-0"> Peak Usage Report

                        </h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div id="performance-review" class="apex-charts"></div>
                    </div>

                                    <div class="card-body">
                                        <div id="review-3Months" class="apex-charts"></div>
                                    </div>
                                     <div class="card-body">
                                        <div id="review-Months" class="apex-charts"></div>
                                    </div>
                                    <div class="card-body">
                                        <div id="review-Thisweek" class="apex-charts"></div>
                                    </div>
                                    <div class="card-body">
                                       <form class="row g-3" role="form" action = "<?php echo base_url();?>index.php/report/peak_usage_reports" method="post" id="date_search">
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
                                                <button style="float: right;" class="btn btn-primary" type="submit" name="report_export_data" value="Export">Export</button>
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
                                    <th>Date</th>
                                    <th>Max Concurrent Calls</th>        
                                </tr>
                            </thead>

                            <tbody>
                              <?php if(!empty($reportDetails)) { ?>
                                
                                <?php $i = 1; foreach($reportDetails as $row) { ?>

                                    <tr>
                                        <td><?php echo $i++; ?></td>

                                        <td><?php echo !empty($row['call_date']) 
                                                ? date('d-m-Y', strtotime($row['call_date']))
                                                : '-'; ?></td>

                                        <td><?php echo $row['max_calls']; ?></td>
                                        
                                    </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>
                                    <td colspan="6" class="text-center">
                                        No Peak Usage Found
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
<!-- Include ApexCharts Library -->
<script src="<?php echo base_url(); ?>assets/js/apexcharts.JS"></script>
<script>
    var options = {
        series: [{
            name: 'Total Call',
            data: <?php echo $chart_calls; ?> // PHP Array from Controller
        }],
        chart: {
            type: 'bar',
            height: 450, // Slightly increased height to make room for rotated labels
            toolbar: { show: true }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
                columnWidth: '70%', // Adjusted width for better spacing between crowded bars
            }
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: <?php echo $chart_dates; ?>, // PHP Array from Controller
            title: { 
                text: 'Extension Number',
                offsetY: 85 // Pushes the title down so it doesn't overlap the rotated numbers
            },
            labels: {
                show: true,
                rotate: -90,           // Rotates the labels to prevent overlap
                rotateAlways: true,    // Forces rotation even if ApexCharts thinks it fits
                hideOverlappingLabels: true, // Automatically hides labels if they still bump into each other
                style: {
                    fontSize: '11px',
                    colors: '#666'
                }
            }
        },
        yaxis: {
            title: { text: 'Total Calls' }
        },
        fill: { opacity: 1 },
        colors: ['#008FFB'], 
        title: {
            text: 'TotalUsage Till Date Report',
            align: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#performance-review"), options);
    chart.render();
</script>
<script>
    var This3Monthsoptions = {
        series: [{
            name: 'Total Call',
            data: <?php echo $TotalCallsToday; ?> // PHP Array from Controller
        }],
        chart: {
            type: 'bar', // Or 'line' if you prefer
            height: 350,
            toolbar: { show: true }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
                columnWidth: '55%',
            }
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: <?php echo $chart_dates; ?>, // PHP Array from Controller
            title: { text: 'Extension Number' }
        },
        yaxis: {
            title: { text: 'Total Calls' }
        },
        fill: { opacity: 1 },
        colors: ['#008FFB'], // Matches the blue bars in image_bc6ed4.png
        title: {
            text: 'Total Usage Past 3Months',
            align: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#review-3Months"), This3Monthsoptions);
    chart.render();
</script>
<script>
    var ThisMonthsoptions = {
        series: [{
            name: 'Total Call',
            data: <?php echo $TotalMinutesConsumedToday; ?> // PHP Array from Controller
        }],
        chart: {
            type: 'bar', // Or 'line' if you prefer
            height: 350,
            toolbar: { show: true }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
                columnWidth: '55%',
            }
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: <?php echo $chart_dates; ?>, // PHP Array from Controller
            title: { text: 'Extension Number' }
        },
        yaxis: {
            title: { text: 'Total Calls' }
        },
        fill: { opacity: 1 },
        colors: ['#008FFB'], // Matches the blue bars in image_bc6ed4.png
        title: {
            text: 'Total Usage This Month',
            align: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#review-Months"), ThisMonthsoptions);
    chart.render();
</script>
<script>
    var Thisweekoptions = {
        series: [{
            name: 'Total Call',
            data: <?php echo $TotalUniqueStudentCalledToday; ?> // PHP Array from Controller
        }],
        chart: {
            type: 'bar', // Or 'line' if you prefer
            height: 350,
            toolbar: { show: true }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
                columnWidth: '55%',
            }
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: <?php echo $chart_dates; ?>, // PHP Array from Controller
            title: { text: 'Extension Number' }
        },
        yaxis: {
            title: { text: 'Total Calls' }
        },
        fill: { opacity: 1 },
        colors: ['#008FFB'], // Matches the blue bars in image_bc6ed4.png
        title: {
            text: 'Total Usage This Week',
            align: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#review-Thisweek"), Thisweekoptions);
    chart.render();
</script>
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