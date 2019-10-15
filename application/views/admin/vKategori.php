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
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Master Kategori</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <button style="margin-bottom : 10px ;" type="button" class="btn btn-default" data-toggle="modal" data-target="#add">
            Tambah Kategori
            </button> 
              <table id="mytable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th colspan="2" style="text-align: center;">Option</th>
                </tr>
                </thead>
                <?php $i = 1 ; 
                foreach ($data as $row) 
                { ?>
                <tbody>
                  <th> <?php echo $i ; ?></th>
                  <th><?php echo $row->nama_kategori; ?></th>
                  <th style="text-align: center;">
                    <a data-toggle="modal" data-target="#edit<?php echo $row->id_kategori; ?>" class="btn btn-info btn-sm">
                      <span class="glyphicon glyphicon-pencil"></span> Edit 
                    </a>
                  </th>
                  <th style="text-align: center;">
                    <a data-toggle="modal" data-target="#delete<?php echo $row->id_kategori; ?>"class="btn btn-danger btn-sm">
                      <span class="glyphicon glyphicon-trash"></span> Delete 
                    </a>
                  </th>
                </tbody>
                <?php $i++; } ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
		</div>
	</div>
</div>
<div class="modal fade" id="add">
  <div class="modal-dialog">
  <form class="form-horizontal" action="<?php echo site_url('admin/Kategori/addKategori');?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
          <div class="form-group row">
            <label for="password" class="col-sm-4 control-label">Nama Kategori</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php foreach($data as $row) { ?>
  <div class="modal fade" id="edit<?php echo $row->id_kategori;?>">
    <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo site_url('admin/Kategori/editKategori');?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
            <div class="form-group row">
              <label for="password" class="col-sm-4 control-label">Nama Kategori</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $row->nama_kategori ?>">
                <input type="hidden" value="<?php echo $row->id_kategori ; ?>" name="id" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="delete<?php echo $row->id_kategori;?>">
    <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo site_url('admin/Kategori/deleteKategori');?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
            <div class="form-group row">
              <div class="col-sm-8">
                <h3>Apakah anda yakin ?</h3>
                <input type="hidden" value="<?php echo $row->id_kategori ; ?>" name="id" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" name="submit" class="btn btn-primary">Hapus</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<?php $this->load->view("admin/_partials/footer.php") ?>
<!-- /#wrapper -->
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
