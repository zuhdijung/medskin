<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/asset_default/css/cus-register.css')?>">
  	<?php $this->load->view('default/common/header');?>
</head>
<body>
	<header>
		<nav class="navbar navbar-default cus-nav">
			<div class="head">
			  	<div class="back">
			  		<a href="<?php echo base_url('page/login')?>" type="button" class="icon-back"></a>
			  	</div>
			  	<div class="title-page">Sign Up</div>

				<a href="#" class="btn-save">SAVE</a>
		    </div>
		</nav>
	</header>
	<div class="register">
		<div class="container">
			<form class="form-horizontal form-register">
				<div class="form-group list-error">
					<span class="error">Correct the following error: Username.</span>
				</div>
				<div class="form-group">
					<label for="inputFname" class="col-xs-12 control-label">Name</label>
				    <div class="col-xs-6">
				      <input type="text" class="form-control" id="inputFname" placeholder="First Name">
				    </div>
				    <div class="col-xs-6">
				      <input type="text" class="form-control" id="inputLname" placeholder="Last Name">
				    </div>
				</div>
				<div class="form-group">
				  	<label for="inputUsername" class="col-xs-12 control-label">Username</label>
				    <div class="col-xs-12">
				      <input type="text" class="form-control input-error" id="inputUsername" placeholder="Username">
				      <span class="error">This name is already taken.</span>
				    </div>
				</div>
			  <div class="form-group">
			  	<label for="inputPassword" class="col-xs-12 control-label">Password</label>
			    <div class="col-xs-12">
			      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			  	<label for="inputConPassword" class="col-xs-12 control-label">Confirm Password</label>
			    <div class="col-xs-12">
			      <input type="password" class="form-control" id="inputConPassword" placeholder="Confirm Password">
			    </div>
			  </div>
			  <div class="form-group">
			  	<label for="inputBirth" class="col-xs-12 control-label">Birthday</label>
			    <div class="col-xs-4">
			    	<select class="form-control">
			    	<?php 
			    		for($iM =1;$iM<=12;$iM++){
							?>
							<option><?php echo date("M", strtotime("$iM/12/10"))?></option>
							<?php
						}
			    	?>
					</select>
			    </div>
			    <div class="col-xs-4">
			    	<input type="text" class="form-control" id="inputDay" placeholder="Day">
			    </div>
			    <div class="col-xs-4">
			    	<input type="text" class="form-control" id="inputYear" placeholder="Year">
			    </div>
			  </div>

			  
			</form>
		</div>
	</div>
</body>
</html>