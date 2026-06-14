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
                        <h5 class="card-title mb-0">Server Performance Report	
                        	<div class="page-bar" style="padding:23px;">
						 <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <!-- <h5 class="card-title mb-0">Extension Report</h5> -->
                                        </div>
                                    </div>
                                    
                                    <!--  <div class="card-body">
                                       <form class="row g-3" role="form" action = "<?php echo base_url();?>index.php/report/extension_report" method="post" id="date_search">

                                       

                                                   <div class="col-md-2">
                                                        <label for="simpleinput" class="form-label">From</label>
                                                         <input type="date" name="fromdate" placeholder="From" id="from_date" onkeyup="$('#to_date_error').html('')" class="form-control">
                                            </div>

                                             <div class="col-md-2" style="margin-right: 30px;">
                                                        <label for="simpleinput" class="form-label">To</label>
                                                        <input type="date" name="todate" placeholder="to" id="to_date" onkeyup="$('#from_date_error').html('')" class="form-control">
                                            </div>



                                          
                                            <div class="col-md-1">
                                               <br>
                                                <button style="float: right; margin-right: 10px;" class="btn btn-primary" name="report_submit_data" type="submit">Search</button>
                                            </div>

                                            <div class="col-md-1">
                                               <br>
                                                <button style="float: right;" class="btn btn-primary" name="report_export_data" type="submit">Export</button>
                                            </div>
                                        </form>
                                    </div> --> <!-- end card-body -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div id="review-Thisweek" class="apex-charts"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div id="review-ram" class="apex-charts"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div id="review-disk" class="apex-charts"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div id="review-network" class="apex-charts"></div>
                                            </div>
                                        </div>
                                      <!--   <div class="col-md-6">
                                            <div class="card-body">
                                                <div id="performance-review" class="apex-charts"></div>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div id="ram-review" class="apex-charts"></div>
                                            </div> 
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div id="disk-review" class="apex-charts"></div>
                                            </div> 
                                        </div> -->
                                       <!--  <?php if($reportDetails['total_network_rx_kbps'] > 0 || $reportDetails['total_network_tx_kbps'] > 0) {
                                        ?>
                                            <div class="col-md-6">
                                                <div class="card-body">
                                                    <div id="network-review" class="apex-charts"></div>
                                                </div> 
                                            </div>
                                        <?php    
                                        } 
                                        ?> -->

                                    </div>

                                  
                                </div>
                            </div>

                          
                        </div>
                        </div>
                        </h5>
                    </div><!-- end card header -->

                  
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->


	<!-- Include ApexCharts Library -->
<script src="<?php echo base_url(); ?>assets/js/apexcharts.JS"></script>
<script>
    var options = {
        series: [
            {
                name: 'CPU Load 1min',
                data: <?php echo json_encode($cpu_load_1min); ?>
            },
            {
                name: 'Answered Call',
                data: <?php echo json_encode($cpu_load_5min); ?>
            },
            {
                name: 'Missed Call',
                data: <?php echo json_encode($cpu_load_15min); ?>
            }
        ],

        chart: {
            type: 'bar',
            height: 500,
            stacked: false,
            toolbar: {
                show: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '60%',
                borderRadius: 4,
                dataLabels: {
                    position: 'top'
                }
            }
        },

        dataLabels: {
            enabled: false
        },

        stroke: {
            show: true,
            width: 1,
            colors: ['transparent']
        },

        xaxis: {
            categories: <?php echo json_encode($datetime); ?>,

            title: {
                text: 'Date Time',
                offsetY: 90
            },

            labels: {
                rotate: -90,
                rotateAlways: true,
                // hideOverlappingLabels: false,
                trim: true,

                style: {
                    fontSize: '11px'
                }
            }
        },

        yaxis: {
            title: {
                text: 'CPU Load'
            }
        },

        fill: {
            opacity: 1
        },

        colors: [
            '#008FFB',
            '#008FFB',
            '#008FFB'
        ],

        legend: {
            position: 'top'
        },

        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Calls";
                }
            }
        },

        title: {
            text: 'CPU Load Report',
            align: 'left'
        },

        responsive: [{
            breakpoint: 768,
            options: {
                plotOptions: {
                    bar: {
                        columnWidth: '80%'
                    }
                },

                xaxis: {
                    labels: {
                        rotate: -90
                    }
                }
            }
        }]
    };

    var chart = new ApexCharts(
        document.querySelector("#review-Thisweek"),
        options
    );

    chart.render();
</script>
<script>
    var ramoptions = {
        series: [
            {
                name: 'RAM Total MB',
                data: <?php echo json_encode($ram_total_mb); ?>
            },
            {
                name: 'RAM Used MB',
                data: <?php echo json_encode($ram_used_mb); ?>
            },
            {
                name: 'RAM Free MB',
                data: <?php echo json_encode($ram_free_mb); ?>
            }
        ],

        chart: {
            type: 'bar',
            height: 500,
            stacked: false,
            toolbar: {
                show: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '60%',
                borderRadius: 4,
                dataLabels: {
                    position: 'top'
                }
            }
        },

        dataLabels: {
            enabled: false
        },

        stroke: {
            show: true,
            width: 1,
            colors: ['transparent']
        },

        xaxis: {
            categories: <?php echo json_encode($datetime); ?>,

            title: {
                text: 'Date Time',
                offsetY: 90
            },

            labels: {
                rotate: -90,
                rotateAlways: true,
                // hideOverlappingLabels: false,
                trim: true,

                style: {
                    fontSize: '11px'
                }
            }
        },

        yaxis: {
            title: {
                text: 'RAM Used MB'
            }
        },

        fill: {
            opacity: 1
        },

        colors: [
            '#008FFB',
            '#008FFB',
            '#008FFB'
        ],

        legend: {
            position: 'top'
        },

        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Ram";
                }
            }
        },

        title: {
            text: 'RAM Used Report',
            align: 'left'
        },

        responsive: [{
            breakpoint: 768,
            options: {
                plotOptions: {
                    bar: {
                        columnWidth: '80%'
                    }
                },

                xaxis: {
                    labels: {
                        rotate: -90
                    }
                }
            }
        }]
    };

    var ramchart = new ApexCharts(
        document.querySelector("#review-ram"),
        ramoptions
    );

    ramchart.render();
</script>


<script>
    var diskoptions = {
        series: [
            {
                name: 'Disk Total GB',
                data: <?php echo json_encode($disk_total_gb); ?>
            },
            {
                name: 'Disk Used GB',
                data: <?php echo json_encode($disk_used_gb); ?>
            },
            {
                name: 'Disk Free Percentage',
                data: <?php echo json_encode($disk_free_percentage); ?>
            }
        ],

        chart: {
            type: 'bar',
            height: 500,
            stacked: false,
            toolbar: {
                show: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '60%',
                borderRadius: 4,
                dataLabels: {
                    position: 'top'
                }
            }
        },

        dataLabels: {
            enabled: false
        },

        stroke: {
            show: true,
            width: 1,
            colors: ['transparent']
        },

        xaxis: {
            categories: <?php echo json_encode($datetime); ?>,

            title: {
                text: 'Date Time',
                offsetY: 90
            },

            labels: {
                rotate: -90,
                rotateAlways: true,
                // hideOverlappingLabels: false,
                trim: true,

                style: {
                    fontSize: '11px'
                }
            }
        },

        yaxis: {
            title: {
                text: 'Disk Used'
            }
        },

        fill: {
            opacity: 1
        },

        colors: [
            '#008FFB',
            '#008FFB',
            '#008FFB'
        ],

        legend: {
            position: 'top'
        },

        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Disk";
                }
            }
        },

        title: {
            text: 'Disk Used Report',
            align: 'left'
        },

        responsive: [{
            breakpoint: 768,
            options: {
                plotOptions: {
                    bar: {
                        columnWidth: '80%'
                    }
                },

                xaxis: {
                    labels: {
                        rotate: -90
                    }
                }
            }
        }]
    };

    var diskchart = new ApexCharts(
        document.querySelector("#review-disk"),
        diskoptions
    );

    diskchart.render();
</script>


<script>
    var networkoptions = {
        series: [
            {
                name: 'Network RX kbps',
                data: <?php echo json_encode($network_rx_kbps); ?>
            },
            {
                name: 'Network TX kbps',
                data: <?php echo json_encode($network_tx_kbps); ?>
            }
        ],

        chart: {
            type: 'bar',
            height: 500,
            stacked: false,
            toolbar: {
                show: true
            }
        },

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '60%',
                borderRadius: 4,
                dataLabels: {
                    position: 'top'
                }
            }
        },

        dataLabels: {
            enabled: false
        },

        stroke: {
            show: true,
            width: 1,
            colors: ['transparent']
        },

        xaxis: {
            categories: <?php echo json_encode($datetime); ?>,

            title: {
                text: 'Date Time',
                offsetY: 90
            },

            labels: {
                rotate: -90,
                rotateAlways: true,
                // hideOverlappingLabels: false,
                trim: true,

                style: {
                    fontSize: '11px'
                }
            }
        },

        yaxis: {
            title: {
                text: 'Network Used'
            }
        },

        fill: {
            opacity: 1
        },

        colors: [
            '#008FFB',
            '#008FFB'
        ],

        legend: {
            position: 'top'
        },

        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Network";
                }
            }
        },

        title: {
            text: 'Network Used Report',
            align: 'left'
        },

        responsive: [{
            breakpoint: 768,
            options: {
                plotOptions: {
                    bar: {
                        columnWidth: '80%'
                    }
                },

                xaxis: {
                    labels: {
                        rotate: -90
                    }
                }
            }
        }]
    };

    var networkchart = new ApexCharts(
        document.querySelector("#review-network"),
        diskoptions
    );

    networkchart.render();
</script>
<?php include 'common/footer.php'; ?>