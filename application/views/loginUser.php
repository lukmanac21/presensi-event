<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body class="hold-transition"">
	<br>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			
	<div class="card card-info">
		<div class="card-header">
		<h3 class="card-title">Login Form</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" action="<?php echo site_url('home/login_action');?>" method="post">
			<div class="card-body">
			<div class="form-group row">
				<label for="nrp" class="col-sm-2 control-label">NRP</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="nrp" id="nrp" placeholder="NRP">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>
			</div>
			<div class="form-group row">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck2">
				<label class="form-check-label" for="exampleCheck2">Remember me</label>
				</div>
			</div>
			</div>
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-info">Sign In</button>
            <a type="button" href="<?php echo site_url('login/signup')?>" class="btn btn-default">Sign Up</a>
		</div>
		<!-- /.card-footer -->
		</form>
	    </div>
	</div>
	</div>
	<!-- /#wrapper -->
	<?php $this->load->view("admin/_partials/js.php") ?>    
</body>
</html>
