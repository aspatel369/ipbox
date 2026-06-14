<?php  ($this_page = 'userreport');?>
		<?php include "header.php";?>
	<div class="page-container"><!-- BEGIN CONTAINER -->		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper"><!-- BEGIN CONTENT BODY -->
			<div class="page-content" style="min-height:1434px"><!-- BEGIN CONTENT BODY -->
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
						<h3 class="page-title">CDR Report	<br><small>Search &amp; Call detail report</small></h3>
						<div class="page-bar" style="padding:23px;">
							<form class="form-inline col-lg-12" role="form" action = "<?php echo base_url();?>index.php/report/user_report" method="post" id="date_search">
							  <div class="row">
							<div class="form-group col-md-3">
								<label for="text">Roll No:</label><br>
								<input type="text" class="form-control" name="student_id" id="" placeholder="Roll Number" style="width: 100%;">
							  </div>						  
							   <div class="form-group col-md-3">
								  <label class=" " for=" "> From</label>  <br>									 
								  <input name="fromdate" placeholder="From" id="from_date" class="form-control input-md form_date" data-date-format="yyyy-mm-dd" type="text" onkeyup="$('#to_date_error').html('')" style="width: 100%;">
							   </div>
							  <div class="form-group col-md-3">
								<label class=" " for=" ">To</label>  <br>									 
								  <input name="todate" placeholder="To" id="to_date" class="form-control input-md form_date" data-date-format="yyyy-mm-dd" onkeyup="$('#from_date_error').html('')" type="text" style="width: 100%;">
							  </div>
							  <div class="form-group col-md-3">
								<label for="text">Source</label><br>
								<select class="form-control" name="source" style="width: 100%;">
									<option value="">-Select-</option>
									<?php foreach($source as $values){ ?>
								  <option value="<?php echo $values['source'] ?>"><?php echo $values['source'] ?></option>
								  <?php } ?>
								</select>
								
							  </div> 
							   </div>
							   <div class="row" style="padding-top: 15px;">
							  <div class="form-group col-md-3">
								<label for="text">Status</label><br>
								<select class="form-control" name="status" style="width: 100%;">
									<option value="">-Select-</option>								
									<option value="ANSWERED">ANSWERED</option>								
									<option value="UNANSWERED">UNANSWERED</option>								
								</select>
								
							  </div> 
							  <div class="form-group col-md-3" style="padding-top: 10px;"> 
								<label for="text"></label><br>                      
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
											<i class="fa fa-bar-chart"></i>CDR Report 
										</div>
									<div class="portlet-body">						
									<table class="table table-striped">
										<tr>
											<th class="">Date and Time</th>
											<th colspan="2">Student</th>
											<th class="text-left">Phone Number</th>
											<th class="">Extension</th>								
											<th class="">Status</th>								
											<th class="">Duration</th>
											<!--th class="text-center">Used Balance</th-->
										</tr>
											<?php 	 if($reportDetails){ foreach($reportDetails as $values){ ?>
										<tr>
											<td class=""><?php echo $values['call_datetime'];?></td>
											<td style="width : 220px;" class="text-left"><?php echo $values['name'].' ';?></td>
											<td class="fit"> <span class="badge badge-info"><?php echo $values['student_id'];?></span></td>
											<td class="text-left"><?php echo $values['phone_number'];?></td>
											<td class=""><?php echo $values['source'];?></td>
											<td class=""><?php if($values['status'] != '') { echo $values['status'];} else { echo "UNANSWERED"; } ?></td>
											<td class=""><?php echo $values['duration'];?></td>
											<!--td class="text-center"><?php echo $values['cost'];	?></td-->
										</tr>
											<?php  } ?>  <?php }else{?>
											<tr><td class="" colspan="5">No records</td></tr>
											<?php } ?>
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
