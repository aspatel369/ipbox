<!DOCTYPE html>
<html>
  <head>
  
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
  <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
   <script>
        var baseUrl = "<?php echo base_url(); ?>";
    </script>
     <title> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
	
   <!-- styles -->
    <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">

   <style>
	label {
    font-weight: normal;
	margin-bottom: 10px;
}
	.btn {
    padding: 10px 10px;
	}
   .btn-primary {
    color: #fff;
    background-color: #108dff;
    border-color: #108dff;
    width: 100%;
	}
	 label.error,#empty_error{
		   color:#ff0000;
		   font-size:9pt;
		   font-weight:normal;
		   
	   }
   </style>
  </head>
  <body class="" style="background-image: url(<?php echo base_url() ?>assets/img/login-bg.jpg);">



	<div class=" container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                 <img src="<?php echo base_url() ?>assets/img/SPACSTeleconlogo.png" width="175" style="filter: invert(1);" alt="mayo"></br>
			             <div class="social">
	                           
	                           
	                            <h3 class="text-dark fw-semibold mb-3" style="font-weight: 600;">Welcome back! Please Sign in to continue.</h3>
	                        </div>    
							<form method="POST" id="login_form" action="<?php echo base_url() ?>index.php/admin/verifyLogin" >
							<label for="emailaddress" class="form-label">Email address</label>
			                <input class="form-control" type="text" placeholder="User Name" onkeyup="$('#empty_error').html('')" name="userName" id="user_name">
			                <span id="username_error"></span>
							<label for="password" class="form-label">Password</label>
			                <input class="form-control" type="password" placeholder="Password" onkeyup="$('#empty_error').html('')" name="passWord" id="password">
			                <span id="password_error"></span>
			                <div><span id="empty_error"></span></div>
			                <div class="action"><!--<a class="btn btn-primary" >Login</a>-->
			                    <button class="btn btn-primary" type="submit">Login</button>
			                </div>
			                </form>                
			            </div>
			        </div>

			        
			    </div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
  </body>
</html>