<?php  ($this_page = 'housemanagement');?>
	<?php include "header.php";?>
	<div class="page-container"><!-- BEGIN CONTAINER -->		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper"><!-- BEGIN CONTENT BODY -->
			<div class="page-content" style="min-height:1434px"><!-- BEGIN CONTENT BODY -->
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
					<h3 class="page-title">Caller Group <small>Add &amp; Edit Caller Group  </small></h3>
						<div class="page-bar">
							<ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Caller Group</span>
                            </li>
							</ul>						
						</div>					
			          <!--div class="page-bar" style="padding:23px;">		 
						<form class="form-inline col-lg-5" role="form" method="post" action="<?php echo base_url() ?>index.php/house/housemanagement_view">
                          <div class="form-group">
                            <label for="text">House Name:</label>
                            <input type="text" class="form-control" placeholder="House Name" name="houseName">
                          </div>
                          <button type="submit" value="Search" name="house_submit_data" class="btn btn-primary btn-sm">Search</button>
						</form>
						<div class="col-md-1">					 
						   <a data-toggle="modal" class="btn btn-info" data-target="#addHouse" onclick="callerGroupDropdown()" data-backdrop="static" data-keyboard="true" 
						   aria-hidden="true">
                           <i class="fa fa-plus"></i> Add</a>
						</div>
						<!--  <form class="form-inline col-lg-5" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>index.php/house/uploadHouseDetails">
						  <div class="form-group">
                           <input type="file" name="file" required>  
						   <span><label class="error"><?php echo $error; ?></label></span>
                          </div>
						  <input type="submit" style="margin-bottom:13px;" class="btn btn-primary btn-sm">
						  </form>
						   <form class="form-inline col-lg-2" role="form" action="<?php echo base_url() ?>index.php/house/houseSampleFile">
						  <input type="submit" class="btn btn-primary btn-sm" value="sample file">
						  </form>             	 
					  </div><!-- END PAGE HEADER-->
					<div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-call-end"></i>Caller Group 
									</div>
										<div class="actions">
										<a class="btn green-haze btn-outline" data-toggle="modal" class="btn btn-info" data-target="#addHouse" onclick="callerGroupDropdown()" data-backdrop="static" data-keyboard="true" aria-hidden="true"><i class="fa fa-plus"></i> Add </a>
										
										<!--a data-toggle="modal" data-target="#addStudent" onclick="houseDropdown()" data-backdrop="static" data-keyboard="true" aria-hidden="true"> <i class="fa fa-plus"></i> Add Student</a-->
										</div>									
                                </div>
                                <div class="portlet-body">						
									<table class="table table-striped">
										<tr>
											<!--<th class="text-center">SI No</th>								-->
											<th>Group Name</th>
											<!-- <th style="width:200px;" class="text-center">Points</th> -->
											<th >Extenisons</th>
											<!--th class="text-center">From Time</th>
											<th class="text-center">To Time</th-->
											<th class="text-center">Status</th>
											<!--<th  class="text-center">Status</th>-->
											<th  class="text-center">Actions</th>
										</tr>
										<?php 	 if($houseDetails){ foreach($houseDetails as $values){ ?>
										 <tr>							
											<!--<td  class="text-center"><?php echo $i; ?></td>-->
											<td><?php echo $values['house_name'];?></td>
											<!-- <td  class="text-center"><?php echo $values['points'];?></td> -->
											<td style="width : 600px; word-break: break-all"><?php echo $values['extensions'];?></td>							
											<!--td class="text-center"><?php echo $values['from_time'];?></td>							
											<td class="text-center"><?php echo $values['to_time'];?></td-->							
											<td class="text-center"><?php echo $values['status'];?></td>
											<td class="text-center">
												<a data-toggle="modal" data-target="#editHouse" onclick="houseEditDetails(<?php echo $values['id'] ?>)" title="Edit Student" data-backdrop="static" data-keyboard="true" aria-hidden="true"><i class="fa fa-edit"></i> </a>

											</td>
										</tr>
										<?php  } ?>  <?php }else{?>
											<tr><td class="text-center" colspan="5">No records</td></tr>
											<?php } ?>
									</table>
								</div>
								<div class="row">
								   <!--<ul class="pagination pull-right pagination-sm">
									  <li><?php  echo $links; ?></li>    
								   </ul>-->
								   <div><ul class="pagination pull-right pagination-sm"><?php  echo $links; ?></div>
									   
								   </ul>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div><!-- END CONTENT BODY -->
		</div><!-- END CONTENT -->
	</div>	<!-- END CONTAINER -->
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
	  <script>
      $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip(); 
       });
    </script>	
</body></html>	

<!--****** ADD House ******-->
	<div id="addHouse" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">   
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                       <div class="panel-heading font-bold">Add House</div>
                          <div class="panel-body">			
				            <form role="form" method="post" action="<?php echo base_url() ?>index.php/house/createHouse" id="houseId">
				               <div class="row">
                                 <div class="form-group">
                                   <label class="col-md-3">House Name<sup class="mandatory">*</sup></label>
					               <div class="col-md-3">
						              <input type="text" class="form-control" placeholder="House Name" id="house_Name" name="houseName">
									  <span id="houseName_error"></span>
					               </div>
                                 </div> 
				              </div>
				              </br>
				             <!-- <div class="row">
				               <div class="form-group">  
                                 <label class="col-md-4">Points<sup class="mandatory">*</sup></label>
				               	 <div class="col-md-4">
                                   <input type="text" class="form-control pointEnter" placeholder="Points" name="points" id="pointEnter">
								   <span id="pointEnter_error"></span>
					             </div>
                               </div>
				             </div> -->
				             </br>
				             <div class="row">
				               <div class="form-group">  
                                 <label class="col-md-3">Extension<sup class="mandatory">*</sup></label>
				               	 <div class="col-md-4">
                                   <select class="form-control" name="extension[]" multiple>
	                          <option value="">-Select-</option>
	                          <?php foreach($extensearch as $value){ ?>
		                      <option value="<?php echo $value['extension']; ?>"><?php echo $value['extension']; ?></option>
		                      <?php } ?>
	                        </select>
								   <span id="extension_error"></span>
					             </div>
					                <div class="col-md-4">
                                      <select class="form-control" id="callerSelect" name="callerName">
					                    <option value="">-Caller Group-</option>
					                  </select>
					                  <span id="housename_error"></span>
					                </div>
                               </div>
				             </div>
				             </br>
				              <div class="row">
				               <div class="form-group">  
                                 <label class="col-md-3">From</label>
				               	 <div class="col-md-4">
				               	 <select class="form-control" name="fromHour">
									<?php $x = 0;
									while($x <= 23) {
									if($x <= 9){ ?>
									<option value=<?php echo "0". $x; ?> > <?php echo "0". $x; ?> </option><br>
									<?php } else { ?>
									<option value=<?php echo $x; ?> > <?php echo $x; ?> </option><br>
									<?php } $x++; } ?>   
									</select>
					             </div>
				               	 <div class="col-md-4">
                                   <select class="form-control" name="fromMin">
	                          <?php  $x = 0;  
									while($x <= 59) {
									if($x <= 9) { ?>
	  								<option value=<?php echo "0". $x; ?> > <?php echo "0". $x; ?> </option><br>
	   								<?php } else { ?>
	  								<option value=<?php echo $x; ?> > <?php echo $x; ?> </option><br>
									<?php } $x++; }?>
									</select>
					             </div>					              
                               </div>
				             </div>
				             </br>
				             <div class="row">
				               <div class="form-group">  
                                 <label class="col-md-3">To</label>
				               	 <div class="col-md-4">
				               	 <select class="form-control" name="toHour">
									<?php $x = 0;
									while($x <= 23) {
									if($x <= 9){ ?>
									<option value=<?php echo "0". $x; ?> > <?php echo "0". $x;?> </option><br>
									<?php } else { ?>
									<option value=<?php echo $x; ?> <?php if($x == 23) echo "selected"?>> <?php echo $x; ?> </option><br>
									<?php } $x++; } ?>   
									</select>
					             </div>
				               	 <div class="col-md-4">
                                   <select class="form-control" name="toMin">
	                          <?php  $x = 0;  
									while($x <= 59) {
									if($x <= 9){ ?>
	  								<option value=<?php echo "0". $x;?> > <?php echo "0". $x; ?> </option><br>
	   								<?php } else { ?>
	  								<option value=<?php echo $x; ?> <?php if($x == 59) echo "selected" ?>><?php echo $x; ?> </option><br>
									<?php } $x++; }?>
									</select>
					             </div>
                              </div>
				             </div>				             
				             </br>
				             <div class="row">
				                <div class="form-group">  
                                  <label class="col-md-3">Status</label>
					                <div class="col-md-4">
                                      <select class="form-control" name="status">
					                    <option value="active">Active</option>
					                    <option value="inactive">In-Active</option>
					                  </select>
									   <span id="status_error"></span>
					                </div>
									
                                </div>
				             </div>
				             <div class="row">
				               <div class="col-md-9"></div>
					             <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                 <!--<button type="button" class="btn" data-dismiss="modal">Close</button>-->
                                 <a href="<?php echo base_url() ?>index.php/house/housemanagement_view" class="btn btn-default">Close</a>                
				             </div>
                            </form>
				           </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>     
        </div>
    </div>

<!--****** EDIT House ******-->
	<div id="editHouse" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="portlet light">
				<div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-clock font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Edit Caller Group</span>
                    </div>
					<div class="actions">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					</div>					
				</div>			
				<div class="portlet-body">
				<form class="form-horizontal form-bordered" method="post" id="editHouseValidate" role="form" action="<?php echo base_url();?>index.php/house/updateHouseDetails">
					<input type="text" value="" id="hiddenVal" name="editHouseId" hidden>
						<div class="form-group">
							<label class="control-label col-md-3">Caller Group</label>
							<div class="col-md-5">
							<input type="text" class="form-control" placeholder="House Name" name="editHousename" id="editHouseName" disabled>
							</div>
						</div> 
						<div class="form-group">  
							<label class="control-label col-md-3">Extension<sup class="mandatory">*</sup></label>
							<div class="col-md-5">
								<select class="form-control" name="editExtension[]" id="editExtension" multiple="">
									<option value="">-Select-</option>
									<?php foreach($extensearch as $value){?>
									<option value="<?php echo $value['extension']; ?>"><?php echo $value['extension']; ?></option>
									<?php } ?>
								</select>
								<span id="editExtension_error"></span>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-3">Inline Checkboxes</label>
								<div class="col-md-5">
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox has-success">
                                        <input type="checkbox" id="active" name="active" class="md-check" checked="">
                                        <label for="active">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Active </label>
                                    </div>
                                    <div class="md-checkbox has-error">
                                        <input type="checkbox" id="inactive" name="inactive" class="md-check" Checked="">
                                        <label for="inactive">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Inactive </label>
                                    </div>
                                </div>
								</div>
                        </div>							 
						 <div class="row">
							<div class="form-group">  
							  <label class="col-md-3">Status</label>
								<div class="col-md-4">
								  <select class="form-control" name="editHousestatus" id="editHouseStatus">
									<option value="active">Active</option>
									<option value="inactive">In-Active</option>
								  </select>
								  <span id="edit_status_error"></span>
								</div>
							</div>
						 </div>
						 <div class="row">
						   <div class="col-md-9"></div>
							 <button type="submit" class="btn btn-sm btn-primary">Update</button>
							 <!--<button type="button" class="btn" data-dismiss="modal">Close</button>                -->
							 <a href="<?php echo base_url() ?>index.php/house/housemanagement_view" class="btn btn-default">Close</a>
						 </div>
                </form>
				</div>
            </div>
        </div>
    </div>

