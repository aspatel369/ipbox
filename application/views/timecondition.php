<?php  ($this_page = 'timecondition');?>
<?php include "header.php";?>
	<div class="page-container"><!-- BEGIN CONTAINER -->		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper"><!-- BEGIN CONTENT BODY -->
			<div class="page-content" style="min-height:1434px"><!-- BEGIN CONTENT BODY -->
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
						<h3 class="page-title">Time Condition	<small>dashboard &amp; statistics</small></h3>
						<div class="page-bar">
							<ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Time Condition</span>
                            </li>
							</ul>						
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
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold uppercase font-dark">Time Conditions</span>
                                        <span class="caption-helper"> for calling time...</span>
                                    </div>
                                    <div class="actions">
									    <a class="btn btn-circle btn-icon-only btn-default delete" href="#" data-original-title="" title=""><i class="icon-trash"></i> </a>
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
									<div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
													<th>  </th>
                                                    <th> Group </th>
                                                    <th> From &nbsp;&nbsp; -  To  -&nbsp;&nbsp; Time</th>
                                                    <th> Week Days </th>
                                                </tr>
                                            </thead>
                                            <tbody id="condition" name="condition" >
												<tr><?php foreach($condition as $cond){ ?>
												<td class="bs-checkbox"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input data-index="2" name="btSelectItem" type="checkbox"><span></span></label></td>
													<td><a data-toggle="modal" data-target="#time_condition" title="Time Condition" onclick="edittimecon(<?php echo $cond['id'] ; ?>)"  class="primary-link"><?php echo $cond['house_id'] ; ?></a> </td>
													<td class="fit"> <?php echo $cond['from_time'].'-'.$cond['to_time'] ; ?> </td>
													<!--td> <?php echo $cond['to_time'] ; ?> </td-->
													<td> <?php echo $cond['weekdays'] ; ?> </td>
													<!--td> <div id="pulsate-regular" style="padding:5px;"> <?php echo $current['dur'] ; ?> </div> </td-->
												</tr><?php }?>
											</tbody>
										</table>
                                    </div>								
								</div>
                            </div>
                        </div>					
                    </div>
				</div>
			</div>
		</div>
	</div>
<!--script type="text/javascript">
var $results = $('#livecallers'),
    loadInterval = 2000;
(function loader() {
    $.get('dashboard/callers', function(html){
            $results.hide(200, function() {
                $results.empty();
                $results.html(html);
                $results.show(200, function() {
                    setTimeout(loader, loadInterval);
                });
            });
    });
})();
</script-->
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
	
	<div id="time_condition" class="modal fade in" tabindex="-1" aria-hidden="true" style="display: none;">
    
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="portlet light">
				<div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-clock font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Time Condition</span>
                    </div>
					<div class="actions">
         	       <a href="<?php echo base_url() ?>index.php/timecondition" class="close" ></a>
						<!--button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button-->
					</div>					
				</div>
				<div class="portlet-body">
				<form role="form" method="post" action="<?php echo base_url() ?>index.php/timecondition/updateTimeCondition" class="form-horizontal form-bordered">
					<input type="text" value="" id="hiddenVal" name="editGroupId" hidden>

                    <div class="form-body">
						<div class="form-group">
                            <label class="control-label col-md-3">Caller Group</label>
								<div class="col-md-8">
                                    <select class="form-control" name="editGroup" id="editGroup" disabled="disabled">
					                     
					                </select>
								</div>
						</div>							
						<div class="form-group">
                            <label class="control-label col-md-3">Duration</label>
                            <div class="col-md-8">
                                <div class="input-group"><span class="input-group-addon">From</span>
                                    <input type="text" class="form-control  timepicker timepicker-no-seconds" name="editfrom" id="editfrom">
                                    <span class="input-group-addon">To</span>
                                    <input type="text" class="form-control timepicker timepicker-no-seconds" name="editto" id="editto" placeholder="Right icon">
								</div>
                                <!-- /input-group -->
                            </div>
                        </div>
						<!--div class="form-group form-md-line-input">
							<label class="control-label col-md-3">Week Days</label>
							<div class="col-md-8">
							<select class="form-control select2-multiple select2-hidden-accessible" multiple="multiple" tabindex="-1" aria-hidden="true" >
								<optgroup label="Weekday Select" id="weekday" name="weekday"  >
									<option value="Mon">Monday</option>
									<option value="Tue">Tuesday</option>
									<option value="Wed">Wednesday</option>
									<option value="Thu">Thursday</option>
									<option value="Fri">Friday</option>
									<option value="Sat">Saturday</option>
									<option value="Sun">Sunday</option>
								</optgroup>
							</select>
							</div>
						</div-->
						<div class="form-group">
                            <label class="control-label col-md-3">Inline Checkboxes</label>
							<div class="col-md-9">
                            <div class="md-checkbox-inline">
                                <div class="md-checkbox has-info">
                                    <input type="checkbox" id="mon" name="mon" class="md-check">
                                    <label for="mon">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Monday </label>
                                </div>
                                <div class="md-checkbox has-info">
                                    <input type="checkbox" id="tue" name="tue" class="md-check">
                                    <label for="tue">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Tuesday </label>
                                </div>
                                <div class="md-checkbox has-info">
                                    <input type="checkbox" id="wed"  name="wed" class="md-check">
                                    <label for="wed">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Wednesday </label>
                                </div>
                                <div class="md-checkbox has-info">
                                    <input type="checkbox" id="thu"  name="thu" class="md-check">
                                    <label for="thu">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Thursday </label>
                                </div>
                            </div>
							</div>
                        </div>
						<div class="form-group form-md-checkboxes">
                            <label class="control-label col-md-3"></label>
							<div class="col-md-8">
                            <div class="md-checkbox-inline">
                                <div class="md-checkbox has-info">
                                    <input type="checkbox" id="fri"  name="fri" class="md-check">
                                    <label for="fri">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Friday </label>
                                </div>
                                <div class="md-checkbox has-info">
                                    <input type="checkbox" id="sat"  name="sat" class="md-check" >
                                    <label for="sat">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Saturday </label>
                                </div>
                                <div class="md-checkbox has-error">
                                    <input type="checkbox" id="sun"  name="sun" class="md-check">
                                    <label for="sun">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Sunday </label>
                                </div>
                            </div>
							</div>
                        </div>							
					</div>
         
			<div class="modal-footer">
                <!--button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button-->
                <a href="<?php echo base_url() ?>index.php/timecondition" class="btn btn-default">Close</a>
                <button type="submit" class="btn green">Save changes</button>
            </div>			  
				</form>
            </div>     
        </div>
    </div>	
</body>
</html>	
