<?php  ($this_page = 'housereport');?>
		<?php include "header.php";?>
		<style>
    /* Button Styles (Maroon/Wine color) */
    .dt-buttons .dt-button {
        background-color: #8a335d !important;
        color: white !important;
        border: none !important;
        border-radius: 4px !important;
        padding: 6px 15px !important;
        font-weight: 500 !important;
    }

    /* Table Header Styling */
    #houseTable thead th {
        background-color: #f8f9fb;
        color: #5a6a82;
        border-bottom: 2px solid #ebedf2;
        padding: 12px;
    }

    /* Search Box Styling */
    .dataTables_filter input {
        border: 1px solid #d1d5db !important;
        border-radius: 5px !important;
        padding: 5px !important;
    }

    /* Pagination active color */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #007bff !important;
        color: white !important;
        border: 1px solid #007bff !important;
    }

    /* Container padding */
    .portlet.light {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .portlet.light .dataTables_wrapper .dt-buttons {
		 margin-top: 0px !important; 
	}
	.dataTables_wrapper .dt-buttons {
	    float: left;
	}
</style>
	<div class="page-container"><!-- BEGIN CONTAINER -->		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper"><!-- BEGIN CONTENT BODY -->
			<div class="page-content" style="min-height:1434px"><!-- BEGIN CONTENT BODY -->
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
						<h3 class="page-title">Extension Reports	<br><small>Search &amp; Call detail report</small></h3>
						<div class="page-bar" style="padding:23px;">
						 <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <!-- <h5 class="card-title mb-0">Extension Report</h5> -->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="performance-review" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>

                          
                        </div>
                        </div>
						<div class="page-bar" style="padding:23px;">
							<form class="form-inline col-lg-12" role="form" action = "<?php echo base_url();?>index.php/report/house_report" method="post" id="date_search">
							 <!--  <div class="form-group col-md-3">
								<label for="text">House</label><br>
								<select class="form-control" name="house" style="width: 100%;">
									<option value="">-Select-</option>
									<?php foreach($house as $values){ ?>
								  <option value="<?php echo $values['id'] ?>"><?php echo $values['house_name'] ?></option>
								  <?php } ?>
								</select>
								
							  </div>   -->

							<!--div class="form-group">
								<label for="text">Roll No:</label>
								<input type="text" class="form-control" name="student_id" id="" placeholder="Roll Number">
							  </div-->						  
							   <div class="form-group col-md-3">
								  <label class="" for=" "> From</label>  <br>									 
								  <input name="fromdate" placeholder="From" id="from_date" class="form-control input-md form_date" data-date-format="yyyy-mm-dd" type="text" onkeyup="$('#to_date_error').html('')" style="width: 100%;">
							   </div>
							  <div class="form-group col-md-3">
								<label class="" for=" ">To</label> <br> 									 
								  <input name="todate" placeholder="To" id="to_date" class="form-control input-md form_date" data-date-format="yyyy-mm-dd" onkeyup="$('#from_date_error').html('')" type="text" style="width: 100%;">
							  </div>
							  <!--div class="form-group">
								<label for="text">Status</label>
								<select class="form-control" name="status">
									<option value="">-Select-</option>								
									<option value="ANSWERED">ANSWERED</option>								
									<option value="UNANSWERED">UNANSWERED</option>								
								</select>								
							  </div--> 
							  <div class="form-group col-md-3" style="padding-top:10px;"> 
								<label class="  control-label" for=" "></label> <br> 	                      
							  <button type="submit" name="report_submit_data" value="Search" class="btn btn-primary btn-sm">Search</button>
							  <button type="submit" value="Export_to_Csv" name="report_export_data" class="btn btn-primary btn-sm">Export</button>
							  </div>
							</form>							
						</div>						
						<div>
							<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-2">
								<label class="error" id="from_date_error"></label>
							</div>
							<label class="error" id="to_date_error"></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-bar-chart"></i>Extension Reports 
										</div>
									<div class="portlet-body">	
									 <table id="houseTable" class="table table-striped table-bordered">					
									<!-- <table id="houseTable" class="table table-striped"> -->
									    <thead>
									        <tr>
									            <th>S.No</th>
                                                       <th>Extension Number</th>
                                                    <th>Last Call Made</th>
                                                  
                                                 
                                                    <th>Total Use</th>
                                                       <th>Location</th>
                                          

									        </tr>
									    </thead>
									    <tbody>
									        <?php if($reportDetails){ $key = 1; foreach($reportDetails as $values){ 
									        	$total_use = round($values['total_seconds'] / 60) . " Min";
									        	?>
									        <tr>
									            <td><?php echo $key; ?></td>
									            <td><?php echo $values['extension_number']; ?></td>
									            <td><?php echo $values['last_call']; ?></td>
									            <td><?php echo $total_use; ?></td>
									            <td></td>
									        </tr>
									        <?php $key++; } } else { ?>
									        <tr>
									            <td colspan="10">No records</td>
									        </tr>
									        <?php } ?>
									    </tbody>
									</table>
										<div><ul class="pagination pull-right pagination-sm"><?php  echo $links; ?></div>
											   
										   </ul>
										<!--<div class="row">
										   <ul class="pagination pull-right pagination-sm">
											  <li><a href="#">1</a></li>
											  <li class="active"><a href="#">2</a></li>
											  <li><a href="#">3</a></li>
											  <li><a href="#">4</a></li>
											  <li><a href="#">5</a></li>
										   </ul>
										</div>-->
									  </div>    
									</div>
									<!-- / main --> 
								</div>

								
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner"> 2015 © iPbx by www.polkazsoft.com
			<a href="#" title="Purchase iPbx and get lifetime updates for free" target="_blank">Purchase iPbx !</a>
		</div>
		<div class="scroll-to-top" style="display: none;">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- Include ApexCharts Library -->
	<script src="<?php echo base_url(); ?>assets/js/apexcharts.JS"></script>
<script>
    var options = {
        series: [{
            name: 'Total Use (Minutes)',
            data: <?php echo $chart_series; ?> // PHP Array from Controller
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
            categories: <?php echo $chart_categories; ?>, // PHP Array from Controller
            title: { text: 'Extension Number' }
        },
        yaxis: {
            title: { text: 'Minutes Used' }
        },
        fill: { opacity: 1 },
        colors: ['#008FFB'], // Matches the blue bars in image_bc6ed4.png
        title: {
            text: 'Extension Report',
            align: 'left'
        }
    };

    var chart = new ApexCharts(document.querySelector("#performance-review"), options);
    chart.render();
</script>
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

		<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>

		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
		<script>
		$(document).ready(function () {
		    $('#houseTable').DataTable({
		        // 'l' - length, 'B' - buttons, 'f' - filter, 'r' - processing, 't' - table, 'i' - info, 'p' - pagination
		        dom: '<"row"<"col-sm-6"B><"col-sm-6"f>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>',
		        buttons: [
		            { 
		                extend: 'copyHtml5', 
		                text: 'Copy',
		                className: 'btn-maroon' 
		            },
		            { 
		                extend: 'print', 
		                text: 'Print',
		                className: 'btn-maroon'
		            }
		        ],
		        language: {
		            search: "Search:",
		            searchPlaceholder: ""
		        },
		        pageLength: 20,
		        responsive: true
		    });
		});
		</script>
	<!-- END FOOTER -->	
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>
</html>	
