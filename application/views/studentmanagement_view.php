<?php  ($this_page = 'studentmanagement');?>
		<?php include "header.php";?>
    <!-- BEGIN CONTAINER -->
	<div class="page-container">		
		<?php include "sideMenu.php";?>
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content" style="min-height:1434px">
				<div class="app-content-body ">
					<!-- BEGIN PAGE HEADER-->
						<h3 class="page-title">Student Management	<br><small>Add &amp; Edit Student and their Calling Numbers</small></h3>
						<div class="page-bar" style="padding:23px;">			 
							<form class="form-inline row" role="form" method="post"  action="<?php echo base_url() ?>index.php/student/studentmanagement_view">

							  <div class="form-group col-md-2">
								<label for="text">Name:</label><br>
								<input type="text" class="form-control" id="" placeholder="Student Name" name="searchName">
							  </div>
							  <div class="form-group col-md-2">
								<label for="text">Roll No:</label><br>
								<input type="text" class="form-control" id="" placeholder="Roll No" name="searchNumber">
							  </div>
							  <div class="form-group col-md-2">
								<label for="text">House:</label><br>
								<select class="form-control" name="searchHouse">
								<option value="">-Select-</option>
								<?php foreach($house as $values){ ?>
								  <option value="<?php echo $values['house_name'] ?>"><?php echo $values['house_name'] ?></option>
							  <?php } ?>
								</select>

							  </div>
                             <div class="form-group col-md-2" style="padding-top: 10px;">
								<label for="text"></label><br>
							  <button type="submit" value="Search" name="student_submit_data" class="btn default blue-stripe"><i class="fa fa-search"></i> Search </button>
								
							  <button type="submit" value="Export_to_Csv" name="student_export_data" class="btn default red-stripe"> Export <i class="fa fa-external-link"></i></button>
								</div>
							</form>	
						</div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-group"></i>Students 
									</div>
                                    <div class="actions"> 
										<div class="btn-group">
											<a class="btn green-haze btn-outline" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions <i class="fa fa-angle-down"></i> </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-toggle="modal" data-target="#addStudent" onclick="houseDropdown()" data-backdrop="static" data-keyboard="true" aria-hidden="true"> <i class="fa fa-plus"></i> Add Student</a>
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
											<th class="text">Student Name</th>
											<th class="text">Roll No</th>
											<th class="text">House Name</th>
											<th class="text">Balance</th>
											<th class="text">Used Balance</th>
											<th class="text">Actions</th>
										</tr><?php if($studentDetails){ foreach($studentDetails as $values){ ?>
										<tr>
											<td  class="text">&nbsp;<?php echo $values['name'];?></td>
											<td  class="text">&nbsp;<?php echo $values['roll_no'];?></td>								  
											<td  class="text">&nbsp;<?php echo $values['house_name'];?></td>
											<td  class="text">&nbsp;&nbsp;<?php echo $values['available_balance'];?></td>
											<td  class="text">&nbsp;&nbsp;<?php echo $values['used_balance'];?></td>
											<td  class="text">
											<a data-toggle="modal" data-target="#editStudent" title="Edit Student" onclick="editStudentmgnt(<?php echo $values['id'] ?>)" data-backdrop="static" data-keyboard="true" aria-hidden="true">
												<span style="background: #cfe8ff;padding: 4px 0px 2px 4px;"><i class="fa fa-edit"></i> </span>
											</a> &nbsp;   
											<a  data-toggle="tooltip" data-placement="bottom" title="Delete" class="delete-student" deleteid="<?php echo $values['id'];?>">
												<span style="background:#fad7e1;    padding: 4px 5px 2px 5px;"><i class="fa fa-trash font-red"></i></span>
											</a>
											</td>

										</tr><?php  } ?>  <?php }else{?>
											<tr><td class="text-center" colspan="5">No records</td></tr> <?php } ?>
									</table>
									<div class="text-right">
										<nav>
										<ul class="pagination"> <?php  echo $links; ?> </ul>
										</nav>
									</div>
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

	<!-- File Upload Model-->
	<div id="fileupload" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content"> 
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">File Upload</h4>
                </div>			
              <div class="modal-body">
                <div class="row">
					 <form class="form-inline col-lg-12" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>index.php/student/uploadStudentDetails">
					  <div class="form-group">
					   <input type="file" class="form-control" name="file" required>  
					   <span><label class="error"><?php echo $error; ?></label></span> 
					  </div>
					  <button type="submit" class="btn btn-default">Upload</button>
					  <!-- <input type="submit" style="margin-bottom:10px;" class="btn btn-primary btn-sm">-->
					  </form> 	
              </div>
            </div>     
        </div>
		</div>
	</div>					
				
<!--****** ADD STUDENT ******-->
	
	<div id="addStudent" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">   
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                       <div class="panel-heading font-bold">Add Student</div>
                          <div class="panel-body">			
				            <form role="form" method="post" id="createStudent" action="<?php echo base_url() ?>index.php/student/createStudentDetails">
				               <div class="row">
                                 <div class="form-group">
                                   

					               <div class="col-md-6">
									<label class="">Student Name<sup class="mandatory">*</sup></label><br>
						              <input type="text" class="form-control" placeholder="Student Name" id="studentName" name="studentName">
						               <span id="studentName_error"></span>
					               </div>
                                
                                 
				               	 <div class="col-md-6">
									<label class="">Roll Number<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Roll Number" id="rollNumber" name="rollNumber"> 
                                   <span id="rollNumber_error"></span>
					             </div>
                               </div>
				             </div>
				             </br>
				             <div class="row">
				              <div class="form-group">  
                               
					            <div class="col-md-6">
									 <label class="">Pin Number<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Pin Number" id="pinNumber" name="pinNumber">
                                   <span id="pinNumber_error"></span>
					            </div>
                              
                                  
					                <div class="col-md-6">
										<label class="">House Name<sup class="mandatory">*</sup></label><br>
                                      <select class="form-control" id="houseSelect" name="houseName">
					                    <option value="">-Select-</option>
					                  </select>
					                  <span id="housename_error"></span>
					                </div>
                                </div>
				             </div>
							 </br>
							 <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Option 1<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Contact1" id="idOne" name="one">
                                   <span id="one_error"></span>
					            </div>
                                
                               
					            <div class="col-md-6">
									 <label class="">Option 2<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Contact2" id="idTwo" name="two">
                                   <span id="two_error"></span>
					            </div>
                              </div>							  
				             </div>
				             </br>
							  <div class="row">
				              <div class="form-group">  
                               
					            <div class="col-md-6">
									 <label class="">Option 3</label><br>
                                   <input type="text" class="form-control" placeholder="Contact3" id="idThree" name="three">
                                   <span id="three_error"></span>
					            </div>                             
                                
					            <div class="col-md-6">
									<label class="">Option 4</label><br>
                                   <input type="text" class="form-control" placeholder="Contact4" id="idFour" name="four">
                                   	<span id="four_error"></span>
					            </div>
                              </div>							  
				             </div>
				             </br>
							  <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Option 5</label><br>
                                   <input type="text" class="form-control" placeholder="Contact5" id="idFive" name="five">
                                   <span id="five_error"></span>
					            </div>
					            <!--label class="col-md-3 left_30">Points<sup class="mandatory">*</sup></label>
					            <div class="col-md-3">
                                   <input type="text" class="form-control points" placeholder="Points" id="points" name="points">
                                   	<span id="points_error"></span>
					            </div-->
                                
					            <div class="col-md-6">
									<label class="" left_30>Date of Birth</label><br>
                                <input name="dob" placeholder="Date Of Birth" id="dob" class="form-control input-md form_date" data-date-format="yyyy-mm-dd" type="text">
                                   <!--input type="text" class="form-control" placeholder="dd-mm-yyyy" id="dob" name="dob"-->
                                   <span id="dob_error"></span>
					            </div>
                              </div>							  
				             </div>	<br>
				             <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Status</label><br>
                                  <select class="form-control" id="status" name="status">
					                    <option value="active">Active</option>
					                    <option value="inactive">In-active</option>
					                  </select>
                                   <span id="status_error"></span>
					            </div>					            
                              </div>							  
				             </div>				             
				             <br>
				             <div class="row">
				               <div class="col-md-9"></div>
					             <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                 <!--<button type="button" class="btn" data-dismiss="modal">Close</button> -->
                                  <a href="<?php echo base_url() ?>index.php/student/studentmanagement_view" class="btn btn-default">Close</a>               
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
	</div>	
	
	
	<!--****** Edit STUDENT ******-->
	
	<div id="editStudent" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">   
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                       <div class="panel-heading font-bold">Edit Student</div>
                          <div class="panel-body">			
				           <form role="form" method="post" id="editStudentValidate" action="<?php echo base_url() ?>index.php/student/updateStudentDetails" >
				           <input id="id" name="id" value="" class="form-control input-md" type="hidden">
				           <input id="spentPts" name="spentPts" value="" class="form-control input-md" type="hidden">
				           <input id="availablePts" name="availablePts" value="" class="form-control input-md" type="hidden">
				               <div class="row">
                                 <div class="form-group">
                                   
					               <div class="col-md-6">
									<label class="">Student Name<sup class="mandatory">*</sup></label><br>
						              <input type="text" class="form-control" placeholder="Student Name" id="editstudentName" name="editstudentName">
						               <span id="editstudentName_error"></span>
					               </div>
                                <input type="hidden" value="" name="hiddenValues" id="hiddenValues">
                                 
				               	 <div class="col-md-6">
									<label class="">Roll Number<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Roll Number" id="editrollNumber" name="editrollNumber" readonly>
                                   <span id="editrollNumber_error"></span>
					             </div>
                               </div>
				             </div>
				             </br>
				             <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Pin Number<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Pin Number" id="editpinNumber" name="editpinNumber">
                                   <span id="editpinNumber_error"></span>
					            </div>
                              
                                  
					                <div class="col-md-6">
										<label class="">House Name<sup class="mandatory">*</sup></label><br>
                                      <select class="form-control" name="editHousename" id="editHousename">
					                     
					                  </select>
					                  <span id="edithouse_error"></span>
					                </div>
                                </div>
				             </div>
							 </br>
							 <div class="row">
				              <div class="form-group">  
                               
					            <div class="col-md-6">
									 <label class="">Option 1<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Contact1" id="editone" name="editone">
                                   <span id="editone_error"></span>
					            </div>
                                
                                
					            <div class="col-md-6">
									<label class="">Option 2<sup class="mandatory">*</sup></label><br>
                                   <input type="text" class="form-control" placeholder="Contact2" id="edittwo" name="edittwo">
                                   <span id="edittwo_error"></span>
					            </div>
                              </div>							  
				             </div>
				             </br>
							  <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Option 3</label><br>
                                   <input type="text" class="form-control" placeholder="Contact3" id="editthree" name="editthree">
                                     <span id="editthree_error"></span>
					            </div>                             
                                
					            <div class="col-md-6">
									<label class="">Option 4</label><br>
                                   <input type="text" class="form-control" placeholder="Contact4" id="editfour" name="editfour">
                                     <span id="editfour_error"></span>
					            </div>
                              </div>							  
				             </div>
				             </br>
							  <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Option 5</label><br>
                                   <input type="text" class="form-control" placeholder="Contact5" id="editfive" name="editfive">
                                     <span id="editfive_error"></span>
					            </div>
					            
					            <div class="col-md-6">
									<label class="">Additional Points</label><br>
                                   <input type="text" class="form-control points pointsAdd" placeholder="Points Add" id="editpoints" name="editpoints">  

                                   <!--input type="Checkbox" class="editadd" name="editadd" style="margin-left:50px;" onclick="Add()"> +                          
                                   <input type="Checkbox" class="editminus" name="editminus" onclick="Minus()"> -   
                                   <input type="text" class="form-control pointsMinus" placeholder="Points Minus" id="editpointsMinus" name="editpointsMinus" disabled="disabled"-->                       
                                   	<span id="editpoint_error"></span>
					            </div>
					            
                                   
                              </div>							  
				             </div>	<br>
				             <div class="row">
				              <div class="form-group">  
                                
					            <div class="col-md-6">
									<label class="">Status</label><br>
                                  <select class="form-control" id="editStatus" name="editStatus">
					                    <option value="active">Active</option>
					                    <option value="inactive">In-active</option>
					                  </select>
                                   <span id="five_error"></span>
					            </div>	
                               
					            <div class="col-md-6">
									 <label class="" left_30>Date of Birth</label><br>
                                <input name="editdob" placeholder="Date Of Birth" id="editdob" class="form-control input-md form_date" data-date-format="yyyy-mm-dd" type="text">
                                   <!--input type="text" class="form-control" placeholder="dd-mm-yyyy" id="dob" name="dob"-->
                                   <span id="editdob_error"></span>
					            </div>
				            
                              </div>							  
				             </div>	
				             <br>
				             <div class="row">
				               <div class="col-md-9"></div>
					             <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                 <!--<button type="button" class="btn" data-dismiss="modal">Close</button> -->              
                                 <a href="<?php echo base_url() ?>index.php/student/studentmanagement_view" class="btn btn-default">Close</a>
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

    
      function Add(){
if($('.editadd').prop("checked")=== true){
	//alert("hi")
	$('.pointsMinus').prop("disabled", false);
$('.editminus').prop("disabled", true);
} else {
	$('.editminus').prop("disabled", false);
	$('.pointsMinus').prop("disabled", true);
}
      }
      function Minus(){
if($('.editminus').prop("checked")=== true){
	$('.pointsMinus').prop("disabled", false);
$('.editadd').prop("disabled", true);
}
else {
	$('.pointsMinus').prop("disabled", true);
	$('.editadd').prop("disabled", false);
}
      }

    </script>
</body></html>