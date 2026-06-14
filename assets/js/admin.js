$(document).ready(function () {

$("#login_form").validate({
        rules: {
            userName: "required",
            passWord: "required"
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == 'userName') {
                error.insertAfter('#username_error');
            }
            if (element.attr('name') == 'passWord') {
                error.insertAfter('#password_error');
            }


        },
        messages: {
            userName: "Please Enter Username",
            passWord: "Please Enter Password"       
        },
        submitHandler: function (form) {
            var username = $('#user_name').val(),password = $('#password').val();

                $.ajax({
                  type: "POST",
                  url: baseUrl + "index.php/admin/verifyLogin",
                  data: { username : username, password : password },
                  success: function (data) {      
                  
                  if(data === 'true'){
                    window.location.href = baseUrl + "index.php/dashboard/home";
                    } else
                    {
                        $("#empty_error").html('<span>Invalid username or password</span>');
                    }
                  }
              });

        

        }
    });
// jQuery.validator.addMethod("accept", function(value, element, param) {
//   return value.match(new RegExp("." + param + "$"));
// });
jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
});

$("#houseId").validate({
        rules: {
            houseName: 
            {
                
            required:true,
            minlength:3,
            maxlength:20,
             //alphanumeric: /^[a-zA-Z0-9]+$/,
           
                 remote: {
                    url: baseUrl + "index.php/house/checkHouseName",
                    type: "post",
                    async: false,
                    data: {
                        qName: function () {
                            return $.trim($("#house_Name").val());
                        }
                    }
                }
            },
            points: "required",
            extension : "required"
            //status:"required"
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == 'houseName') {
                error.insertAfter('#houseName_error');
            }
            if (element.attr('name') == 'points') {
                error.insertAfter('#pointEnter_error');
            }
             if (element.attr('name') == 'extension') {
                error.insertAfter('#extension_error');
             }
        },
        messages: {
           houseName:
           {
            required: "Please Enter House Name",
            remote: "Name Already Exists",
            minlength:"Minimum 3 Characters",
            maxlength:"Maximum 20 Characters",
            //alphanumeric:"Enter only alphanumeric values"
          },
            points: "Please Enter Points",
            extension: "please Select Extension"    
        },
      
    })


jQuery.validator.addMethod("accept", function(value, element, param) {
  return value.match(new RegExp("." + param + "$"));
});

$("#editStudentValidate").validate({
        rules: {
            editstudentName: {
              required: true,
              accept:"[\s\S]*"
               
            },
            editrollNumber:{
              required: true,
              digits:true,
              minlength:3,
              maxlength:5
            } ,
            editpinNumber:
            {
              required: true,
              digits: true,
              minlength:4,
              maxlength:4
            },
            editHousename:"required",
            editone: { 
             required: true,
             digits: true,
             minlength:8,
             maxlength:16
			 },

             edittwo: { 
             required: true,
             digits: true,
             minlength:8,
             maxlength:16
              },
             editthree: { required: false,
             digits: true,
             minlength:8,
             maxlength:16
              },
              editfour: { required: false,
             digits: true,
             minlength:8,
             maxlength:16
              },
              editfive: { required: false,
             digits: true,
             minlength:8,
             maxlength:16
              }
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == 'editstudentName') {
                error.insertAfter('#editstudentName_error');
            }
            if (element.attr('name') == 'editrollNumber') {
                error.insertAfter('#editrollNumber_error');
            }
            if (element.attr('name') == 'editpinNumber') {
               error.insertAfter('#editpinNumber_error');
            }
            if (element.attr('name') == 'editHousename') {
               error.insertAfter('#edithouse_error');
            }
            if (element.attr('name') == 'editone') {
               error.insertAfter('#editone_error');
            }
            if (element.attr('name') == 'edittwo') {
               error.insertAfter('#edittwo_error');
            }
             if (element.attr('name') == 'editthree') {
               error.insertAfter('#editthree_error');
            } 
            if (element.attr('name') == 'editfour') {
               error.insertAfter('#editfour_error');
            } 
            if (element.attr('name') == 'editfive') {
               error.insertAfter('#editfive_error');
            }
        },
        messages: {
            editstudentName: 
            {
              required:"Please Enter Student Name", 
            accept:"Enter only Alphabets" 
            //remote: "Name Already exist"          
          },
            editrollNumber: 
            {
            required: "Please Enter Roll Number",
            minlength:"Minimum 3 Numbers",
            maxlength:"Maximum 5 Numbers Only",
            digits:"Please Enter Only Number"
            },
            editpinNumber: {
              required:"Please Enter Pin Number" ,
              digits:"Please Enter Only Number",
              minlength:"Minimum 4 Numbers",
              maxlength:"Maximum 4 Numbers Only"
            },
            editHousename: "Please select House",    
              editone: {
                required: "Please Enter Phone Number",
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 numbers",
                maxlength:"Maximum 16  Numbers Only"
            },
            edittwo: {
                required: "Please Enter Phone Number",
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
             editthree: {
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
             editfour: {
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
            editfive: {
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 numbers",
                maxlength:"Maximum 16 Numbers Only"
            }  
        },

        submitHandler: function (form) {
                //alert("ok");
                if($('.editminus').prop("checked")=== true){
                  var total = $('#editpoints').val();
                  var minus = $('#editpointsMinus').val();
                 if(total < minus) {
				 //alert("Please Enter Below Total Point");
				 //return false;
                  //$('#editpoint_error').html("<font color='red'>Please Enter Below Total Point</font>");                 
                  swal({   
        title: 'Please Enter Below Total Point', 
        text: '',  
        type: 'warning',           
        closeOnCancel: true });
                 }
                 else {
                  
                 form.submit();
                 }
                  
                }
                else {
                  
                 form.submit();
                }
                

        

        }
      
    });

jQuery.validator.addMethod("accept", function(value, element, param) {
  return value.match(new RegExp("." + param + "$"));
});



  $("#createStudent").validate({
        rules: {
            studentName:{
             required:true,
             minlength:3,
             maxlength:20,
             accept: "[a-zA-Z]+"
            
           },
            rollNumber: { 
              required: true,
              digits:true,
              minlength:3,
              maxlength:5,
      remote: {
     
      url: baseUrl + "index.php/student/checkStudent",
       type: "POST",
       async: false,
       data: {
         rollNumber: function() {
           return $.trim($("#rollNumber").val());
         }
       }
    }
  },
            pinNumber:{ 
              required: true,
              digits: true,
              minlength:4,
              maxlength:4
              
    },
            houseName:"required",
             points:"required",

            one: { required: true,
             digits: true,
             minlength:8,
             maxlength:16
              },

             
            two: { required: true,
             digits: true,
             minlength:8,
             maxlength:16
              },
              three: { required: false,
             digits: true,
             minlength:8,
             maxlength:16
              },
              four: { required: false,
             digits: true,
             minlength:8,
             maxlength:16
              },
              five: { required: false,
             digits: true,
             minlength:8,
             maxlength:16
              }             

        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == 'studentName') {
                error.insertAfter('#studentName_error');
            }
            if (element.attr('name') == 'rollNumber') {
                error.insertAfter('#rollNumber_error');
            }
            if (element.attr('name') == 'pinNumber') {
               error.insertAfter('#pinNumber_error');
            }
            if (element.attr('name') == 'houseName') {
               error.insertAfter('#housename_error');
            }
            if (element.attr('name') == 'points') {
               error.insertAfter('#points_error');
            }

            if (element.attr('name') == 'one') {
               error.insertAfter('#one_error');
            }
            if (element.attr('name') == 'two') {
               error.insertAfter('#two_error');
            }
             if (element.attr('name') == 'three') {
               error.insertAfter('#three_error');
            }
             if (element.attr('name') == 'four') {
               error.insertAfter('#four_error');
            }
             if (element.attr('name') == 'five') {
               error.insertAfter('#five_error');
            }
        },
        messages: {
            studentName: {
              required: "Please Enter Student Name",   
              minlength:"Minimum 3 Characters",
              maxlength:"Maximum 20 Characters",         
              accept:"Enter only Alphabets"
               //remote:"Name already exists"
            },
            rollNumber:{
            required: "Please Enter Roll Number",
            minlength:"Minimum 3 Numbers",
            maxlength:"Maximum 5 Numbers Only",
            digits:"Please Enter Only Number",
            remote:"Roll number already exists"
          },
            pinNumber: {
            required: "Please Enter Pin Number" ,
            digits:"Please Enter Only Number",
            minlength:"Minimum 4 Numbers",
            maxlength:"Maximum 4 Numbers Only"
            //remote:"Pin Number already exists"
          },
            houseName: "Please Select House",    
            points: "Please Enter Points",    
           one: {
                required: "Please Enter Phone Number",
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 Numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
            two: {
                required: "Please Enter Phone Number",
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 Numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
             three: {
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 Numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
             four: {
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 Numbers",
                maxlength:"Maximum 16 Numbers Only"
            },
            five: {
                digits: "Please Enter Valid Number",
                minlength:"Minimum 8 Numbers",
                maxlength:"Maximum 16 Numbers Only"
            }
            
        },
      
    });


$("#editHouseValidate").validate({
        rules: {
            editHousePoints: "required",
            editExtension:"required"
        },
        errorPlacement: function (error, element) {
                if (element.attr('name') == 'editHousePoints') {
                error.insertAfter('#edit_pointEnter_error');
            }
            if (element.attr('name') == 'editExtension') {
               error.insertAfter('#editExtension_error');
            }
        },
        messages: {
            editHousePoints: "Please enter points",
            editExtension: "please select Extension"    
        },


      
    });

jQuery.validator.addMethod("accept", function(value, element, param) {
  return value.match(new RegExp("." + param + "$"));
});

$("#addStaffValidate").validate({
        rules: {
            staffName:{
               required: true,
               accept: "[a-zA-Z]+"
    //            remote: {
     
    //   url: baseUrl + "index.php/admin/checkStaffName",
    //    type: "POST",
    //    async: false,
    //    data: {
    //      staffName: function() {
    //        return $.trim($("#staffName").val());
    //      }
    //    }
    // }
           },
            extension:"required",
            
            
        
        },
        errorPlacement: function (error, element) {
                if (element.attr('name') == 'staffName') {
                error.insertAfter('#staffName_error');
            }
            if (element.attr('name') == 'extension') {
               error.insertAfter('#extension_error');
            }
        },
        messages: {
            staffName: {
              required:"Please Enter Staff Name",
              accept:"Enter only Alphabets",
              remote:"Name already exists"
            },
            extension: "Please Select Extension"    
            	
        
    },
      
    });


$("#editStaffValidate").validate({
        rules: {
            editstaffName: {
              required: true,
              accept: "[a-zA-Z]+"
            },
            editextension:"required"
        },
        errorPlacement: function (error, element) {
                if (element.attr('name') == 'editstaffName') {
                error.insertAfter('#editstaffName_error');
            }
            if (element.attr('name') == 'editextension') {
               error.insertAfter('#editextension_error');
            }
        },
        messages: {
            editstaffName: {
              required:"Please Enter Staff Name"
              //accept:"Enter only Alphabets"
            },
            editextension: "Please Select Extension"    
        },
      
    });


$("#passwordValidate").validate({
            rules: {
              old_password: "required",
              password:"required",
              rePwd: {
                equalTo: "#pass1"
                  }              
                },
        errorPlacement: function (error, element) {   
         if (element.attr('name') == 'old_password') {
                error.insertAfter('#oldpassword_error');
            }         
           
            if (element.attr('name') == 'password') {
                error.insertAfter('#password_error');
            }
            if (element.attr('name') == 'rePwd') {
                error.insertAfter('#repassword_error');
            }
                      
          },
        messages: {  
             old_password :"Please Enter Old Password",
             password:"Please Enter Password",
             rePwd:{
                 equalto : "Enter Same Password"
                 }
              },
              submitHandler: function (form) {
                //alert("ok");
                var old_psswd= $('#old_password').val();
                var password = $('#pass1').val();

                $.ajax({
                  type: "POST",
                  url: baseUrl + "index.php/admin/passwordUpdate",
                  data: { old_password : old_psswd, password : password },
                  success: function (data) {  

                  
                  if(data === 'true'){
                    alert("Password changed successfully");
                    window.location.href = baseUrl + "index.php/student/studentmanagement_view";
                    } else
                    {
                        $("#login_error").html('<label>Invalid Old password</label>');
                    }
                  }
              });

        

        }
    }); 

$("#date_search").validate({
    rules: {
      from_date: {
            dateISO: true
            },
        to_date: {
             dateISO: true
             }
    },
    errorPlacement: function (error, element) {
            if (element.attr('name') == 'from_date') {
                error.insertAfter('#from_date_error');
            }
            if (element.attr('name') == 'to_date') {
                error.insertAfter('#to_date_error');
            }
            },
    messages: {
      from_date: {
             dateISO: "<font color='red'>Please Enter valid date</font>"
             },
        to_date: {
             dateISO: "<font color='red'>Please Enter valid date</font>"
             }
    },
    submitHandler: function (form) {
        //alert("ok");

        var from=$('#from_date').val();
        var to=$('#to_date').val();
        if(from == '' && to != ''){
            $('#from_date_error').html("<font color='red'>Please Select The From Date</font>");
            // $('#from_date_error');
            // alert("Please Select The From Date");

        }
        else if(from != '' && to == ''){
            $('#to_date_error').html("<font color='red'>Please Select The To Date</font>");
            //  $('#to_date_error');
            // alert("Please Select The To Date");
        }   
        else if(from > to){
        $('#to_date_error').html("<font color='red'>To Date must be Greater than From date</font>");
        // $('#to_date_error');
        // alert("To Date must be Greater than From date");
        }else{
        $('#to_date_error').html('');
        form.submit();
        }
        
    }
});


      $('.delete-house').bind('click', function () {
        var house_delete_id = $(this).attr('deleteid'); 
         /*****************swal declaration **************************/
        swal({   
        title: 'Are you sure?', 
        text: '',  
        type: 'warning',  
        showCancelButton: true,  
        confirmButtonColor: '#3085d6',  
        cancelButtonColor: '#d33',  
        confirmButtonText: 'Yes, delete it!',  
        cancelButtonText: 'No, cancel plz!', 
        confirmButtonClass: 'confirm-class', 
        cancelButtonClass: 'cancel-class', 
        closeOnConfirm: false,  
        closeOnCancel: false 
        }, 
        function(isConfirm){ 
        	if (isConfirm) {   
			if (house_delete_id != '')
			{
                $(this).parents('tr').remove();
                var post_data = {
                    house_delete_id: house_delete_id
                };
                $.ajax({
                    type: 'POST',
                    url: baseUrl + "index.php/house/houseDelete",
                    data: post_data,
                    success: function (data) {
						if(data=='true'){
                        console.log(data);
						swal("Deleted", "This House is deleted!", "success");  
						window.location.href = baseUrl + "index.php/house/housemanagement_view";
					}
					else {
						
						swal("Cancelled", "This House Assigned to Students!", "error");
						console.log(data);
					}

                    }
                });
            }
		}
		else {
    swal('Cancelled', 'Your imaginary data is safe :)', 'error');
  }
    });
});


    $('.delete-staff').bind('click', function () {
        var staff_delete_id = $(this).attr('deleteid');   
         /*****************swal declaration **************************/
        swal({   
        title: 'Are you sure?', 
        text: '',  
        type: 'warning',  
        showCancelButton: true,  
        confirmButtonColor: '#3085d6',  
        cancelButtonColor: '#d33',  
        confirmButtonText: 'Yes, delete it!',  
        cancelButtonText: 'No, cancel plz!', 
        confirmButtonClass: 'confirm-class', 
        cancelButtonClass: 'cancel-class', 
        closeOnConfirm: true,  
        closeOnCancel: true }, 
        function(isConfirm) { 
        if (isConfirm) {   
        swal(       
        'Deleted!',      
        'Your file has been deleted.',   
        'success'   
        );   
        
                if (staff_delete_id != '') {
                $(this).parents('tr').remove();
                var post_data = {
                    staff_delete_id: staff_delete_id
                };

                $.ajax({
                    type: 'POST',
                    url: baseUrl + "index.php/admin/staffDelete",
                    data: post_data,
                    success: function (data) {
                        console.log(data);
                        window.location.href = baseUrl + "index.php/admin/staffmanagement_view";

                    }
                });
            }
        
  }
    });
});
      $('.delete-student').bind('click', function () {
        var student_delete_id = $(this).attr('deleteid');   
         /*****************swal declaration **************************/
        swal({   
        title: 'Are you sure?', 
        text: '',  
        type: 'warning',  
        showCancelButton: true,  
        confirmButtonColor: '#3085d6',  
        cancelButtonColor: '#d33',  
        confirmButtonText: 'Yes, delete it!',  
        cancelButtonText: 'No, cancel plz!', 
        confirmButtonClass: 'confirm-class', 
        cancelButtonClass: 'cancel-class', 
        closeOnConfirm: true,  
        closeOnCancel: true }, 
        function(isConfirm) { 
        if (isConfirm) {   
        swal(       
        'Deleted!',      
        'Your file has been deleted.',   
        'success'   
        );  
        //var confirmationvalues = confirm("Are you sure you want to delete this? Click Yes to continue or No to cancel");
         //if (confirmationvalues == true) {

            if (student_delete_id != '') {
                $(this).parents('tr').remove();
                var post_data = {
                    student_delete_id: student_delete_id
                };

                $.ajax({
                    type: 'POST',
                    url: baseUrl + "index.php/student/studentDelete",
                    data: post_data,
                    success: function (data) {
                      location.reload();
                        console.log(data);
                        //window.location.href = baseUrl + "index.php/admin/housemanagement_view";

                    }
                });
            }
        //}
  }
    });
});


//points in house


       $(".pointEnter").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //~ $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   }); 

       $(".points").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //~ $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   }); 


    $(".pointEnter").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //~ $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });


});

/*************************************************************/
function openAddStaff(){

       $.ajax({
                  type: "POST",
                  url: baseUrl + "index.php/admin/getExtension",
                  data: null,
                  success: function (data) {  

                    var myObject = eval('(' + data + ')');

                      for (var index in myObject) 
                   {
                    $('#extensionSelect').append('<option value="'+myObject[index].extension+'">'+myObject[index].extension+'</option>');
                   }

                }
              });

}

function studentEditDetails(id)
{
     
     $.ajax({ 
                  type: "POST",
                  url: baseUrl + "index.php/admin/getStaffEditDetails",
                  data: {id:id},
                  success: function (data) {  
                   
                    var myObject = eval('(' + data + ')');

                      var val1 =  myObject[0], val2 =  myObject[1];   
                      
                     for(var index in val2)
                     {                      
                        $('#sName').val(val2[index].name);
                    $('#extensionEdit').append('<option value="'+val2[index].extension+'" selected>'+val2[index].extension+'</option>');

                     }                  
                      //alert(myObject[1]['extension']);
                     // return false;
                     //console.log(val1)
                     console.log(val2)
                    $('#hiddenValues').val(id);
                    
                     for (var index in val1) 
                     {    
                        //console.log(val1[index].extension);
                       $('#extensionEdit').append('<option value="'+val1[index].extension+'">'+val1[index].extension+'</option>');          

                     }

                  }
            });
 }
 
function houseDropdown(){

            $.ajax({
                  type: "POST",
                  url: baseUrl + "index.php/house/getHouseDropdown",
                  data: null,
                  success: function (data) {  
                       
                    var myObject = eval('(' + data + ')');

                      for (var index in myObject) 
                   {
                    $('#houseSelect').append('<option value="'+myObject[index].id+'">'+myObject[index].house_name+'</option>');
                   }

                }
              });
}

function callerGroupDropdown(){
            $.ajax({
                  type: "POST",
                  url: baseUrl + "index.php/house/getCallerGroupDropdown",
                  data: null,
                  success: function (data) {  
                       
                    var myObject = eval('(' + data + ')');

                    for (var index in myObject) 
                   {
                    $('#callerSelect').append('<option value="'+myObject[index].id+'">'+myObject[index].group_name+'</option>');
                   }

                }
              });
}

function houseEditDetails(id)
{
     $.ajax({
                  type: "POST",
                  url: baseUrl + "index.php/house/getHouseEditDetails",
                  data: {id:id},
                  success: function (data) {  
                 // console.log(data);
                  var myObject = eval('(' + data + ')');
                  var val1 = myObject[0],val2 = myObject[1];
                  for (var index in val2){                     
                      $('#editCallername').append('<option value="'+val2[index].id+'">'+val2[index].group_name+'</option>');
                   }
                  for (var index in val1){    
                  var ext = val1[index].extensions;
                  var splitExt = ext.split(",");
                  for(var i = 0; i< splitExt.length; i++){                    
                  	var newOption = "<option value='"+splitExt[i]+"' selected>"+splitExt[i]+"</option>";
                    //$('#editExtension option[value="'+splitExt[i]+'"]').attr('selected',true);
					$('#editExtension').append(newOption);
                   }
                   $('#hiddenVal').val(val1[index].id);
                   $('#editHouseName').val(val1[index].house_name);
                   $('#editCallername option[value="'+val1[index].caller_group+'"]').attr('selected',true);
                   $('#editHouseStatus option[value="'+val1[index].status+'"]').attr('selected',true);
                  }

                }
         });

}
function edittimecon(id)
{
    $.ajax({
        type: "POST",
        url: baseUrl + "index.php/timecondition/getTimeCondition",
        data: {id:id},
        success: function (data) {  
			var myObject = eval('(' + data + ')');
                    var val1 = myObject[0],val2 = myObject[1];
			console.log(val1);
            for (var index in val2)
                   {                     
                      $('#editGroup').append('<option value="'+val2[index].id+'">'+val2[index].house_name+'</option>');
                   }
			for (var index in val1) 
			{    
			//	console.log(val1[index].weekdays);
				$('#hiddenVal').val(val1[index].id);
				$('#editfrom').val(val1[index].from_time);					
				$('#editto').val(val1[index].to_time);
                $('#editGroup option[value="'+val1[index].house_id+'"]').attr('selected',true);
			//	$('#weekday').val(val1[index].weekdays);
				var days = val1[index].weekdays;
				//console.log(days);
				var myArray = days.split(',');
			// display the result in myDiv
			for(var i=0;i<myArray.length;i++){
				if (myArray[i]=="Mon"){
				$('#mon').attr('checked','checked')
				}
				else if(myArray[i]=="Tue"){
				$('#tue').attr('checked','checked')
				}				
				else if(myArray[i]=="Wed"){
				$('#wed').attr('checked','checked')
				}				
				else if(myArray[i]=="Thu"){
				$('#thu').attr('checked','checked')
				}				
				else if(myArray[i]=="Fri"){
				$('#fri').attr('checked','checked')
				}				
				else if(myArray[i]=="Sat"){
				$('#sat').attr('checked','checked')
				}				
				else if(myArray[i]=="Sun"){
				$('#sun').attr('checked','checked')
				}				
			}
			}
        }
    });
	
}

function editStudentmgnt(id){

  $.ajax({ 
                  type: "POST",
                  url: baseUrl + "index.php/student/getStudentEditValues",
                  data: {id:id},
                  success: function (data) {  
                   
                    var myObject = eval('(' + data + ')');

                    var val1 = myObject[0],val2 = myObject[1];

                    console.log(val2);

                    for (var index in val2)
                   {                     
                      $('#editHousename').append('<option value="'+val2[index].id+'">'+val2[index].house_name+'</option>');

                   }

                      for (var index in val1) 
                   {

                      $('#hiddenValues').val(val1[index].id);
                      $('#totalPts').val(val1[index].available_Balance);
                    //  $('#weekPts').val(val1[index].week_points);
                      $('#spentPts').val(val1[index].used_Balance);
                      $('#availablePts').val(val1[index].available_Balance);
                      $('#editstudentName').val(val1[index].name);
                      $('#editrollNumber').val(val1[index].roll_no);
                      $('#editpinNumber').val(val1[index].pin_no);
                      //$('#editHousename').val(myObject[index].house);
                      $('#editHousename option[value="'+val1[index].house+'"]').attr('selected',true);
                     // alert(val1[index].point_minus);
                      $('#editdob').val(val1[index].dob);
                      //$('#editpointsMinus').val(val1[index].point_minus);
                   $('#editStatus option[value="'+val1[index].status+'"]').attr('selected',true);
                      $('#editone').val(val1[index].option1);
                      $('#edittwo').val(val1[index].option2);

                      if(val1[index].option3!=="0")
                      {
                        $('#editthree').val(val1[index].option3);
                      }
                      else{
                        $('#editthree').val("");
                      }
                     if(val1[index].option4!=="0"){
                      $('#editfour').val(val1[index].option4);
                    }
                     else{
                        $('#editfour').val("");
                      }

                     if(val1[index].option4!=="0"){
                      $('#editfive').val(val1[index].option5);
                    }
                    else{
                        $('#editfive').val("");
                      }

                   }                   
                }

              });



}

