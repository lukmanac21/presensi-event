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
              <h3 class="card-title">Data Event</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <button style="margin-bottom : 10px ;" type="button" class="btn btn-default" data-toggle="modal" data-target="#add">
            Tambah Event
            </button> 
              <table id="mytable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Nama Event</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Ruang</th>
                  <th>Kuota</th>
                  <th colspan="2" style="text-align: center;">Option</th>
                </tr>
                </thead>
                <?php $i = 1 ; 
                foreach ($data as $row) 
                { ?>
                <tbody>
                  <th> <?php echo $i ; ?></th>
                  <th><?php echo $row->nama_kategori; ?></th>
                  <th><?php echo $row->nama_event; ?></th>
                  <th><?php echo $row->tanggal_event; ?></th>
                  <th><?php echo $row->jam_event; ?></th>
                  <th><?php echo $row->nama_ruang; ?></th>
                  <th><?php echo $row->kuota_event; ?></th>
                  <th style="text-align: center;">
                    <a data-toggle="modal" data-target="#edit<?php echo $row->id_event; ?>" class="btn btn-info btn-sm">
                      <span class="glyphicon glyphicon-pencil"></span> Edit 
                    </a>
                  </th>
                  <th style="text-align: center;">
                    <a data-toggle="modal" data-target="#delete<?php echo $row->id_event; ?>"class="btn btn-danger btn-sm">
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
  <form class="form-horizontal" action="<?php echo site_url('admin/Event/addEvent');?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="custom-select col-sm-12">
                <option>Not Selected</option>
                <?php foreach ($kategori as $row) {?>
                <option value="<?php echo $row->id_kategori ;?>"><?php echo $row->nama_kategori ;?></option>
                <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label for="namaevent" class="col-sm-4 control-label">Nama Event</label>
            <div>
              <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Nama Event">
            </div>
          </div>
          <div class="form-group">
            <label for="date" class="col-sm-4 control-label">Tanggal</label>
            <div>
              <input type="date" class="form-control" name="tanggal_event" id="tanggal_event" placeholder="Tanggal">
            </div>
          </div>
          <div class="form-group">
            <label for="clock" class="col-sm-4 control-label">Jam</label>
            <div>
              <input type="time" class="form-control" name="jam_event" id="jam_event" placeholder="Jam">
            </div>
          </div>
          <div class="form-group">
            <label>Ruang</label>
            <select name="id_ruang" class="custom-select col-sm-12">
                <option>Not Selected</option>
                <?php foreach ($ruang as $row) {?>
                <option value="<?php echo $row->id_ruang ;?>"><?php echo $row->nama_ruang ;?></option>
                <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label for="kuota" class="col-sm-4 control-label">Kuota</label>
            <div>
              <input type="number" class="form-control" name="kuota_event" id="kuota_event" placeholder="Kuota">
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
  <div class="modal fade" id="edit<?php echo $row->id_event;?>">
    <div class="modal-dialog">
    <form class="form-horizontal" action="<?php echo site_url('admin/Event/editEvent');?>" method="post">
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
              <label for="password" class="col-sm-4 control-label">Nama Event</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Nama Jurusan" value="<?php echo $row->nama_event ; ?>">
                <input type="hidden" value="<?php echo $row->id_event ; ?>" name="id" class="form-control">
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
<?php } ?>
<?php $this->load->view("admin/_partials/footer.php") ?>
<!-- /#wrapper -->
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
