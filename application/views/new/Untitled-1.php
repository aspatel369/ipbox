<?php include 'common/header.php'; ?>
<style>
    .faq-container {
  max-width: 800px; /* Limit the width for better readability */
  margin: 50px auto; /* Center the container and add vertical spacing */
  padding: 20px;
  font-family: 'Arial, sans-serif';
  color: #333; /* Base text color */
}

/* Style for the main title */
.faq-container h1 {
  text-align: center;
  margin-bottom: 40px;
  color: #2c3e50; /* Dark blue color for the title */
}

/* Style for each FAQ item */
.faq-item {
    width:100%;
  border-bottom: 1px solid #ddd; /* Light gray border between items */
  overflow: hidden; /* Hide overflowing content */
}

/* Style for the question buttons */
.faq-question {
  background-color: #ecf0f1; /* Light gray background */
  width: 100%;
  padding: 20px;
  text-align: left;
  font-size: 18px;
  border: none;
  outline: none;
  cursor: pointer;
  position: relative;
  transition: background-color 0.3s ease; /* Smooth background transition on hover */
}

/* Hover effect for question buttons */
.faq-question:hover {
  background-color: #d0d7de; /* Slightly darker gray on hover */
}

/* Style for the arrow icon */
.faq-question .arrow {
  position: absolute;
  right: 20px;
  transition: transform 0.3s ease; /* Smooth rotation transition */
}

/* Rotate the arrow when the question is active (expanded) */
.faq-question.active .arrow {
  transform: rotate(180deg); /* Rotate arrow 180 degrees */
}

/* Style for the answer sections */
.faq-answer {
  max-height: 0; /* Initially hide the answer */
  overflow: hidden;
  transition: max-height 0.3s ease; /* Smooth transition for expanding */
  background-color: #fff; /* White background for answers */
}

/* Style for the answer text */
.faq-answer p {
  padding: 20px;
  font-size: 16px;
  line-height: 1.5; /* Increase line height for better readability */
  color: #555; /* Slightly lighter text color for answers */
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
.device-card{
    background:#fff;
    border-radius:18px;
    padding:20px;
    box-shadow:0 4px 20px rgba(0,0,0,.08);
    transition:.3s;
    position:relative;
    overflow:hidden;
    border:1px solid #edf2f7;
}

.device-card:hover{
    transform:translateY(-6px);
    box-shadow:0 10px 35px rgba(0,0,0,.15);
}

.device-card:before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:5px;
    background:linear-gradient(90deg,#0d6efd,#00c6ff);
}

.device-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.status-dot{
    width:12px;
    height:12px;
    border-radius:50%;
    animation:pulse 2s infinite;
}

@keyframes pulse{
    0%{box-shadow:0 0 0 0 rgba(0,255,0,.6);}
    70%{box-shadow:0 0 0 10px rgba(0,255,0,0);}
    100%{box-shadow:0 0 0 0 rgba(0,255,0,0);}
}

.device-title{
    font-size:18px;
    font-weight:700;
}

.device-icon{
    margin:15px 0 25px;
}

.device-icon i{
    font-size:60px;
    color:#0d6efd;
    background:#eef5ff;
    padding:20px;
    border-radius:50%;
}

.device-info{
    margin-top:10px;
}

.info-row{
    display:flex;
    align-items:center;
    margin-bottom:18px;
}

.info-icon{
    width:45px;
    height:45px;
    border-radius:10px;
    background:#f4f7fb;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-right:15px;
}

.info-icon i{
    color:#0d6efd;
    font-size:20px;
}

.info-row small{
    color:#6c757d;
}

.info-row h6{
    margin:0;
    font-weight:600;
}

.device-footer{
    margin-top:25px;
    border-top:1px solid #ececec;
    padding-top:15px;
    display:flex;
    justify-content:space-between;
}

.health-box{
    text-align:center;
}

.health-box span{
    display:block;
    color:#6c757d;
    font-size:12px;
}

.health-box strong{
    font-size:15px;
}
</style>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
            </div>
        </div>

        <!-- Start Main Widgets -->
        
            <div class="faq-item">
                <button class="faq-question">
                    Device Status
                    <span class="arrow">&#9660;</span>
                </button>
                <div class="faq-answer">
             
<div class="row">
<?php foreach($details_device as $val) {

    $isOnline = ($val['Status'] == 'online');

    $statusClass = $isOnline ? 'success' : 'danger';
    $statusText  = $isOnline ? 'ONLINE' : 'OFFLINE';
?>
<div class="col-xl-4 col-lg-6 col-md-6 mb-4">

    <div class="device-card">

        <!-- Top Status Bar -->
        <div class="device-header">
            <div class="status-dot bg-<?php echo $statusClass; ?>"></div>

            <div>
                <h5 class="device-title mb-0">
                    <?php echo $val['DeviceName']; ?>
                </h5>
                <small class="text-muted">
                    Network Device
                </small>
            </div>

            <span class="badge bg-<?php echo $statusClass; ?>">
                <?php echo $statusText; ?>
            </span>
        </div>

        <!-- Device Icon -->
        <div class="device-icon text-center">
            <i class="bi bi-pc-display"></i>
        </div>

        <!-- Device Information -->
        <div class="device-info">

            <div class="info-row">
                <div class="info-icon">
                    <i class="bi bi-router"></i>
                </div>
                <div>
                    <small>IP Address</small>
                    <h6><?php echo $val['IPAddress']; ?></h6>
                </div>
            </div>

            <div class="info-row">
                <div class="info-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <small>Location</small>
                    <h6><?php echo $val['DeviceLocation']; ?></h6>
                </div>
            </div>

            <div class="info-row">
                <div class="info-icon">
                    <i class="bi bi-activity"></i>
                </div>
                <div>
                    <small>Status</small>
                    <h6 class="text-<?php echo $statusClass; ?>">
                        <?php echo $statusText; ?>
                    </h6>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="device-footer">

            <div class="health-box">
                <span>Health</span>
                <strong class="text-<?php echo $statusClass; ?>">
                    <?php echo $isOnline ? '100%' : '0%'; ?>
                </strong>
            </div>

            <div class="health-box">
                <span>Network</span>
                <strong>
                    <?php echo $isOnline ? 'Connected' : 'Disconnected'; ?>
                </strong>
            </div>

        </div>

    </div>

</div>
<?php } ?>
</div>                
                    </div>
                </div>
            </div>
        
            <div class="faq-item mt-2">
                <button class="faq-question">
                    Server Performance
                    <span class="arrow">&#9660;</span>
                </button>
                <div class="faq-answer">
                    <div class="row p-3">

                        <!-- CPU Graph -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">CPU</h5>
                                </div>
                                <div class="card-body">
                                    <div id="cpuChart"></div>
                                </div>
                            </div>
                        </div>

                        <!-- RAM Gauge -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">RAM</h5>
                                </div>
                                <div class="card-body">
                                    <div id="ramChart"></div>
                                </div>
                            </div>
                        </div>

                        <!-- HDD Gauge -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">HDD</h5>
                                </div>
                                <div class="card-body">
                                    <div id="hddChart"></div>
                                </div>
                            </div>
                        </div>

                        </div>
                </div>
            </div>
            
            <div class="faq-item mt-2">
                <button class="faq-question">
                    House Summary
                    <span class="arrow">&#9660;</span>
                </button>
                <div class="faq-answer">
                    <div class="row p-3">
                        <?php if (!empty($house_summary)) { ?>
                            <?php foreach ($house_summary as $house) { ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="widget-first" style="background-color: #ecf0f1;">
                                                <div class="d-flex align-items-center mb-2">
                                                    <p class="mb-0 text-dark fs-15" style="width: 100%; border-bottom: 1px solid;">
                                                        <strong><?php echo htmlspecialchars($house['house_name']); ?></strong>
                                                    </p>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <p class="mb-0 text-dark fs-14">Active students: <?php echo (int) $house['active_students']; ?></p>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <p class="mb-0 text-dark fs-14">Inactive (no calls): <?php echo (int) $house['inactive_students']; ?></p>
                                                </div>
                                                <div class="d-flex text-center">
                                                    <p class="text-dark fs-13 mb-0" style="width: 100%; border-top: 1px solid;">
                                                        Total usage: <?php echo number_format((float) $house['total_usage_minutes'], 2); ?> min
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-12">
                                <p class="text-muted mb-0">No house summary data available.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            
            <div class="faq-item mt-2">
                <button class="faq-question">
                    Extension Usage
                    <span class="arrow">&#9660;</span>
                </button>
                <div class="faq-answer faq-answer-has-table">
                    <div class="row p-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Extension Number</th>
                                            <th>Total Call</th>
                                            <th>Last Call Made</th>
                                            <th>Total Use</th>
                                            <th>Last 3 Month Total Call</th>
                                            <th>Last 3 Month Total Use</th>
                                            <th>This Month Total Call</th>
                                            <th>This Month Total Use</th>
                                            <th>This Week Total Call</th>
                                            <th>This Week Total Use</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($reportDetails)) { $i = 1; foreach ($reportDetails as $values) {
                                            $string = $values['TotalUsageTillDate'];
                                            $Past3Monthsstring = $values['TotalUsagePast3Months'];
                                            $PastThisMonthsstring = $values['TotalUsageThisMonth'];
                                            $PastThisWeekstring = $values['TotalUsageThisWeek'];

                                            preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $PastThisWeekstring, $PastthisWeekstrmatches);
                                            preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $PastThisMonthsstring, $PastthisMonthsstrmatches);
                                            preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $Past3Monthsstring, $Past3Monthsstrmatches);
                                            preg_match('/(\d+)\s+Sec\s+from\s+(\d+)\s+Calls/', $string, $matches);
                                            $total_use = round($matches[1] / 60) . " Min";
                                            $Past3Monthstotal_use = round($Past3Monthsstrmatches[1] / 60) . " Min";
                                            $PastthisMonthstotal_use = round($PastthisMonthsstrmatches[1] / 60) . " Min";
                                            $Pastthisweektotal_use = round($PastthisWeekstrmatches[1] / 60) . " Min";
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo htmlspecialchars($values['extension_number']); ?></td>
                                            <td><?php echo $matches[2]; ?></td>
                                            <td><?php echo htmlspecialchars($values['LastUsedAt']); ?></td>
                                            <td><?php echo $total_use; ?></td>
                                            <td><?php echo $Past3Monthsstrmatches[2]; ?></td>
                                            <td><?php echo $Past3Monthstotal_use; ?></td>
                                            <td><?php echo $PastthisMonthsstrmatches[2]; ?></td>
                                            <td><?php echo $PastthisMonthstotal_use; ?></td>
                                            <td><?php echo $PastthisWeekstrmatches[2]; ?></td>
                                            <td><?php echo $Pastthisweektotal_use; ?></td>
                                            <td><?php echo htmlspecialchars($values['location']); ?></td>
                                        </tr>
                                        <?php } } else { ?>
                                        <tr>
                                            <td colspan="12">No records</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-item mt-2" id="live-calling-section">
                <button class="faq-question">
                    Live Calling 
                    <span class="arrow">&#9660;</span>
                </button>
                <div class="faq-answer faq-answer-live-calls">
                    <div class="row p-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Roll No</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Duration</th>
                                            <th>Answered At</th>
                                        </tr>
                                    </thead>
                                    <tbody id="livecallers">
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Loading live calls…</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Main Widgets -->



    </div> <!-- container-fluid -->
</div> <!-- content -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

// =====================================
// CPU LINE GRAPH
// =====================================
var cpuOptions = {
    chart: {
        type: 'line',
        height: 200,
        toolbar: {
            show: false
        }
    },
    series: [{
        name: 'CPU %',
        data: <?php echo $cpuData; ?>
    }],
    stroke: {
        curve: 'smooth',
        width: 3
    },
    xaxis: {
        categories: <?php echo $cpuLabels; ?>
    },
    yaxis: {
        max: 1
    }
};

new ApexCharts(document.querySelector("#cpuChart"), cpuOptions).render();


// =====================================
// RAM DONUT
// =====================================
var ramOptions = {
    chart: {
        type: 'donut',
        height: 220
    },
    series: [<?php echo $ramUsedPercent; ?>, <?php echo $ramFreePercent; ?>], // Used, Free
    labels: ['Used', 'Free'],
    plotOptions: {
        pie: {
            donut: {
                size: '70%'
            }
        }
    },
    legend: {
        position: 'bottom'
    }
};

new ApexCharts(document.querySelector("#ramChart"), ramOptions).render();


// =====================================
// HDD DONUT
// =====================================
var hddOptions = {
    chart: {
        type: 'donut',
        height: 220
    },
    series: [<?php echo $diskUsedPercent; ?>, <?php echo $diskFreePercent; ?>], // Used, Free
    labels: ['Used', 'Free'],
    plotOptions: {
        pie: {
            donut: {
                size: '70%'
            }
        }
    },
    legend: {
        position: 'bottom'
    }
};

new ApexCharts(document.querySelector("#hddChart"), hddOptions).render();

</script>
<script>
    // Select all question buttons
const faqQuestions = document.querySelectorAll('.faq-question');

// Loop through each question button
faqQuestions.forEach(question => {
    // Add a click event listener to each question
    question.addEventListener('click', () => {
        // Close any other open answers except the one clicked
        faqQuestions.forEach(item => {
            if (item !== question) {
                item.classList.remove('active'); // Remove 'active' class to reset arrow rotation
                item.nextElementSibling.style.maxHeight = null; // Collapse the answer
                if (item.closest('#live-calling-section') && window.stopLiveCallsPolling) {
                    window.stopLiveCallsPolling();
                }
            }
        });

        // Toggle 'active' class on the clicked question to rotate the arrow
        question.classList.toggle('active');

        // Select the corresponding answer div
        const answer = question.nextElementSibling;

        const expandFull = answer.classList.contains('faq-answer-has-table')
            || answer.classList.contains('faq-answer-live-calls');

        // Check if the answer is already open
        if (answer.style.maxHeight) {
            // If open, close it by resetting max-height
            answer.style.maxHeight = null;
        } else {
            // If closed, expand (tables / live calls need full height)
            answer.style.maxHeight = expandFull ? 'none' : (answer.scrollHeight + 'px');

            if (answer.classList.contains('faq-answer-has-table') && typeof $ !== 'undefined' && $('#datatable-buttons').length) {
                setTimeout(function () {
                    if ($.fn.DataTable.isDataTable('#datatable-buttons')) {
                        $('#datatable-buttons').DataTable().columns.adjust().draw(false);
                    }
                }, 100);
            }
        }
    });
});
</script>
<script>
(function () {
    var $liveBody = $('#livecallers');
    if (!$liveBody.length) {
        return;
    }

    var liveCallsUrl = '<?php echo base_url("index.php/dashboard/live_callers"); ?>';
    var loadInterval = 2000;
    var pollTimer = null;
    var isLoading = false;

    function loadLiveCallers() {
        if (isLoading) {
            return;
        }
    });
});
</script>
<?php include 'common/footer.php'; ?>