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
		            <h3 class="card-title">Sign Up</h3>
		        </div>
                <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputNRP">NRP</label>
                    <input type="text" class="form-control" id="exampleInputNRP" placeholder="NRP">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNama">Nama</label>
                    <input type="text" class="form-control" id="exampleInputNama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                        <label>Jurusan</label>
                        <select class="custom-select">
                          <option>Not Selected</option>
                          <?php foreach ($jurusan as $row) {?>
                          <option value="<?php echo $row->id_jurusan ;?>"><?php echo $row->nama_jurusan ;?></option>
                          <?php }?>
                        </select>
                      </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
	        </div>
		</div>
	</div>
	<?php $this->load->view("admin/_partials/js.php") ?>    
</body>
</html>
