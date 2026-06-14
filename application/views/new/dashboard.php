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
    transition: all .3s ease;
    border-radius:15px;
}

.device-card:hover{
    transform: translateY(-5px);
    box-shadow:0 8px 25px rgba(0,0,0,.15)!important;
}

.card-header{
    border-radius:15px 15px 0 0 !important;
}

.badge{
    font-size:12px;
    padding:8px 12px;
}

.card-body{
    min-height:180px;
}
.house-dashboard-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:
    0 4px 25px rgba(0,0,0,.06),
    0 2px 8px rgba(0,0,0,.03);
    transition:.35s;
    height:100%;
    border:none;
}

.house-dashboard-card:hover{
    transform:translateY(-8px);
    box-shadow:
    0 10px 35px rgba(0,0,0,.12),
    0 5px 15px rgba(0,0,0,.08);
}

.card-top{
    background:linear-gradient(135deg, #3e9ef5, #0529d9);
    color:#fff;
    padding:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.card-top h5{
    margin:0;
    font-size:18px;
    font-weight:700;
}

.card-top span{
    opacity:.85;
    font-size:13px;
}

.house-icon{
    width:55px;
    height:55px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.card-body-custom{
    padding:25px;
}

.stat-row{
    display:flex;
    gap:15px;
    margin-bottom:25px;
}

.stat-box{
    flex:1;
    padding:18px;
    border-radius:15px;
}

.stat-box span{
    display:block;
    font-size:13px;
    color:#6c757d;
    margin-bottom:8px;
}

.stat-box h3{
    margin:0;
    font-size:28px;
    font-weight:700;
}

.active-box{
    background:#ecfdf5;
    border-left:4px solid #10b981;
}

.active-box h3{
    color:#10b981;
}

.inactive-box{
    background:#fff1f2;
    border-left:4px solid #ef4444;
}

.inactive-box h3{
    color:#ef4444;
}

.usage-section{
    background:#f8fafc;
    border-radius:15px;
    padding:18px;
}

.usage-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:12px;
}

.usage-header span{
    color:#64748b;
    font-size:14px;
}

.usage-header strong{
    color:#1e293b;
    font-size:16px;
}

.modern-progress{
    height:10px;
    border-radius:50px;
    background:#e2e8f0;
    overflow:hidden;
}

.modern-progress .progress-bar{
    background:linear-gradient(
    90deg,
    #06b6d4,
    #3b82f6
    );
    border-radius:50px;
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

    $statusColor = ($val['Status'] == 'offline') ? 'danger' : 'success';
    $statusIcon  = ($val['Status'] == 'offline') ? 'bi-x-circle-fill' : 'bi-check-circle-fill';

?>
    <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 device-card">

            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-hdd-network me-2 text-primary"></i>
                        <?php echo $val['DeviceName']; ?>
                    </h5>

                    <span class="badge bg-<?php echo $statusColor; ?>">
                        <i class="bi <?php echo $statusIcon; ?>"></i>
                        <?php echo ucfirst($val['Status']); ?>
                    </span>
                </div>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <small class="text-muted d-block">
                        <i class="bi bi-router-fill me-1"></i> IP Address
                    </small>
                    <strong><?php echo $val['IPAddress']; ?></strong>
                </div>

                <div class="mb-3">
                    <small class="text-muted d-block">
                        <i class="bi bi-geo-alt-fill me-1"></i> Location
                    </small>
                    <strong><?php echo $val['DeviceLocation']; ?></strong>
                </div>

                <div class="mt-4 text-center">
                    <i class="bi bi-pc-display-horizontal fs-1 text-<?php echo $statusColor; ?>"></i>
                </div>

            </div>

            <div class="card-footer bg-light border-0 text-center">
                <small class="text-muted">
                    Device Monitoring Dashboard
                </small>
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
        <div class="row g-4 p-3">

            <?php if (!empty($house_summary)) { ?>
               <div class="row g-4">

<?php foreach($house_summary as $house){ ?>

<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="house-dashboard-card">

        <div class="card-top">
            <div>
                <h5><?php echo $house['house_name']; ?></h5>
                <span>House Overview</span>
            </div>

            <div class="house-icon">
                <i class="fas fa-building"></i>
            </div>
        </div>

        <div class="card-body-custom">

            <div class="stat-row">
                <div class="stat-box active-box">
                    <span>Active</span>
                    <h3><?php echo $house['active_students']; ?></h3>
                </div>

                <div class="stat-box inactive-box">
                    <span>Inactive</span>
                    <h3><?php echo $house['inactive_students']; ?></h3>
                </div>
            </div>

            <div class="usage-section">

                <div class="usage-header">
                    <span>Total Usage</span>
                    <strong>
                        <?php echo number_format($house['total_usage_minutes'],2); ?>
                        Min
                    </strong>
                </div>

                <?php
                $usage = $house['total_usage_minutes'];

                if($usage > 1000){
                    $percent = 100;
                }else{
                    $percent = ($usage/1000)*100;
                }
                ?>

                <div class="progress modern-progress">
                    <div class="progress-bar"
                         style="width:<?php echo $percent; ?>%">
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<?php } ?>

</div>
            <?php } else { ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        No house summary data available.
                    </div>
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
        isLoading = true;

        $.get(liveCallsUrl)
            .done(function (html) {
                $liveBody.html(html);
            })
            .fail(function () {
                $liveBody.html(
                    '<tr><td colspan="6" class="text-center text-danger">Unable to load live calls.</td></tr>'
                );
            })
            .always(function () {
                isLoading = false;
            });
    }

    function startPolling() {
        loadLiveCallers();
        if (!pollTimer) {
            pollTimer = setInterval(loadLiveCallers, loadInterval);
        }
    }

    function stopPolling() {
        if (pollTimer) {
            clearInterval(pollTimer);
            pollTimer = null;
        }
    }

    window.stopLiveCallsPolling = stopPolling;
    window.startLiveCallsPolling = startPolling;

    // Poll while Live Calling section is expanded; stop when collapsed
    var liveCallingItem = document.getElementById('live-calling-section');
    if (liveCallingItem) {
        var liveBtn = liveCallingItem.querySelector('.faq-question');
        liveBtn.addEventListener('click', function () {
            setTimeout(function () {
                if (liveBtn.classList.contains('active')) {
                    startPolling();
                } else {
                    stopPolling();
                }
            }, 50);
        });
    } else {
        startPolling();
    }
})();
</script>
<?php include 'common/footer.php'; ?>