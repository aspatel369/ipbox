<?php  ($this_page = 'staffmanagement');?>
		<?php include "header.php";?>
    <!-- BEGIN CONTAINER -->
	<div class="page-container">		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content" style="min-height:1434px">
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
						<h3 class="page-title">Staff Management	<br><small>Add &amp; Edit Staff and their Settings</small></h3>
						<div class="page-bar" style="padding:23px;">			 
							<form class="form-inline col-lg-8" role="form" method="post"  action="<?php echo base_url() ?>index.php/admin/staffmanagement_view">
							  <div class="form-group">
								<label for="text">Staff Name:</label>
								<input type="text" class="form-control" id="" placeholder="Staff Name" name="staffName">
							  </div>
							  <div class="form-group">
								<label for="text">Extension:</label>
								<select class="form-control" name="extension">
								  <option value="">-Select-</option>
								  <?php foreach($extensearch as $value){?>
								  <option value="<?php echo $value['extension']; ?>"><?php echo $value['extension']; ?></option>
								  <?php } ?>
								  
								</select>
							  </div>
							  <button type="submit" class="btn btn-primary btn-sm" name="staff_submit_data" value="Search">Search</button>
							</form>		
						</div>						 
					<div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-graduation-cap"></i>Staff 
									</div>
                                    <div class="actions"> 
										<div class="btn-group">
											<a class="btn green-haze btn-outline" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i> </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-toggle="modal" data-target="#addStaff" onclick="houseDropdown()" data-backdrop="static" data-keyboard="true" aria-hidden="true"> <i class="fa fa-plus"></i> Add Staff</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#fileupload" onclick="houseDropdown()" data-backdrop="static" data-keyboard="true" aria-hidden="true"> <i class="fa fa-upload"></i> Bulk Upload </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="<?php echo base_url() ?>index.php/student/studentSampleFile"><i class="fa fa-download"></i> Sample File </a>
                                                </li>
                                            </ul>
                                        </div>
									</div>									
								</div>	
                                <div class="portlet-body">						
									<table class="table table-striped">
										<tr>
											<!--<th class="text-center">SI No</th>-->
											<th  class="text-center">Staff Name</th>
											<th  class="text-center">Extension</th>
											<th  class="text-center">Actions</th>
										</tr>

										<?php if($staffDetails){
										 foreach($staffDetails as $values){ 
											?>
										 <tr><input type="text" value="<?php echo $values['id'];?>" hidden>
											<!--<td  class="text-center"><?php echo $i; ?></td>-->
											<td  class="text-center"><?php echo $values['name'];?></td>
											<td  class="text-center"><?php echo $values['extension'];?></td>
											<td  class="text-center">
												<a data-toggle="modal" data-target="#editStaff" onclick="studentEditDetails(<?php echo $values['id'] ?>)" title="Edit Student" data-backdrop="static" data-keyboard="true" aria-hidden="true"><i class="fa fa-edit"></i> </a>
											  &nbsp;  <a href="#" data-toggle="tooltip" data-placement="bottom" class="delete-staff" title="Delete" deleteid="<?php echo $values['id'];?>"><i class="fa fa-trash"></i></a>
											</td>
											</tr><?php } ?>  <?php }else{?>
											<tr><td class="text-center" colspan="5">No records</td></tr>
											<?php } ?>
									</table>
									<div class="text-center">
										<nav>
										<ul class="pagination"> <?php  echo $links; ?> </ul>
										</nav>
									</div>
								</div>
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
	
	<!--****** ADD STAFF ******-->
	<!--id="addStaff"-->
	<div class="modal fade" role="dialog" id="addStaff">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">   
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                       <div class="panel-heading font-bold">Add Staff</div>
                          <div class="panel-body">			
				            <form role="form" method="POST" id="addStaffValidate" action="<?php echo base_url() ?>index.php/admin/createStaffDetails">
				               <div class="row">
                                 <div class="form-group">
                                   <label class="col-md-4">Staff Name<sup class="mandatory">*</sup></label>
					               <div class="col-md-4">
						              <input type="text" class="form-control" placeholder="Staff Name" name="staffName" id="staffName">
						                <span id="staffName_error"></span>
					               </div>
                                 </div> 
				              </div>
				              </br>
				            <div class="row">
				                <div class="form-group">  
                                  <label class="col-md-4">Extension<sup class="mandatory">*</sup></label>
					                <div class="col-md-4">
                                      <select class="form-control" id="extensionSelect" class="extensionSelect" name="extension" id="extension">
					                	<option value="">-Select-</option>
					                  </select>
					                    <span id="extension_error"></span>
					                </div>
                                </div>
				            </div>
				             <div class="row">
				               <div class="col-md-9"></div>
					             <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                <!--<button type="button" class="btn" data-dismiss="modal">Close</button>-->
                                <a href="<?php echo base_url() ?>index.php/admin/staffmanagement_view" class="btn btn-default">Close</a>
				             </div>
                            </form>
				           </div>
                    </div>
                  </div>
                </div>
              </div>
			</div><!-- END CONTENT BODY -->
		</div><!-- END CONTENT -->
	</div>	<!-- END CONTAINER -->

	<!--****** Edit STAFF ******-->

	<div id="editStaff" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">   
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                       <div class="panel-heading font-bold">Edit Staff</div>
                          <div class="panel-body">			
				            <form role="form" method="post" id="editStaffValidate" action="<?php echo base_url() ?>index.php/admin/updateStaffDetails">
				            <input type="text" value="" id="hiddenValues" name="hiddenValues" hidden>
				               <div class="row">
                                 <div class="form-group">
                                   <label class="col-md-4">Staff Name<sup class="mandatory">*</sup></label>
					               <div class="col-md-4">
						              <input type="text" class="form-control" value="" placeholder="Staff Name" id="sName" name="editstaffName">
									  <span id="editstaffName_error"></span>
					               </div>
                                 </div>
				              </div>
				              </br>
				             <div class="row">
				                <div class="form-group">  
                                  <label class="col-md-4">Extension<sup class="mandatory">*</sup></label>
					                <div class="col-md-4">
                                      <select class="form-control" id= "extensionEdit" name="editextension">
					              		</select>
					                </div>
                                </div>
                                 <span id="editextension_error"></span>
				             </div>
				             <div class="row">
				               <div class="col-md-9"></div>
					             <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                 <!--<button type="button" class="btn" data-dismiss="modal">Close</button>-->
                                 <a href="<?php echo base_url() ?>index.php/admin/staffmanagement_view" class="btn btn-default">Close</a>
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
	  <script>
      $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip(); 
       });
    </script>
</body>
</html>
