<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed"">
<div class="wrapper">
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div class="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5">26 New Messages!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5">11 New Tasks!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5">123 New Orders!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-life-ring"></i>
				</div>
				<div class="mr-5">13 New Tickets!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
		</div>
		</div>
		<!-- /.container-fluid -->
		<!-- Sticky Footer -->
	</div>
	<!-- /.content-wrapper -->
</div>
<?php $this->load->view("admin/_partials/footer.php") ?>
<!-- /#wrapper -->
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
