<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("_partials/head.php");?>
<body>
    <?php $this->load->view("_partials/navbar.php");?>
    <section class="site-section pt-5">
    <div class="container">
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row">
            <?php foreach($profile as $rowProfile){ ?> 
              <div class="col-md-12">
                <h2 class="mb-4">Hi <?php echo $rowProfile->nama_siswa ;?></h2>
                <table id="mytable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Event</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  <th colspan="2" style="text-align: center;">Option</th>
                </tr>
                </thead>
                <?php $i = 1 ; 
                foreach ($event as $row) 
                { ?>
                <tbody>
                  <th> <?php echo $i ; ?></th>
                  <th><?php echo $row->nama_event; ?></th>
                  <th><?php echo $row->tanggal_event; ?></th>
                  <th><?php echo $row->jam_event; ?></th>
                  <th><?php echo $row->jam_checkin; ?></th>
                  <th><?php echo $row->jam_checkout; ?></th>
                  <th style="text-align: center;">
                    <a data-toggle="modal" data-target="#checkin<?php echo $row->id_pendaftaran; ?>" class="btn btn-info btn-sm">
                      <span class="glyphicon glyphicon-pencil"></span> CheckIn 
                    </a>
                  </th>
                  <th style="text-align: center;">
                    <a data-toggle="modal" data-target="#checkout<?php echo $row->id_pendaftaran; ?>"class="btn btn-danger btn-sm">
                      <span class="glyphicon glyphicon-trash"></span> CheckOut 
                    </a>
                  </th>
                </tbody>
                <?php $i++; } ?>
              </table>
              </div>
            </div>         
          </div>
        </div>
        <?php } ?>
        <?php foreach($event as $rowEvent){?>
        <div class="modal fade" id="checkin<?php echo $rowEvent->id_pendaftaran;?>">
            <div class="modal-dialog">
                <form class="form-horizontal" action="<?php echo site_url('home/check_in');?>" method="post">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">CheckIN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                        <div class="form-group row">
                        <div class="col-sm-8">
                            <h3>Apakah anda yakin ?</h3>
                            <input type="hidden" value="<?php echo $rowEvent->id_pendaftaran ; ?>" name="id_pendaftaran" class="form-control">
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">CheckIn</button>
                    </div>
                    </div>
                </form>
            <!-- /.modal-content -->
            </div>
        </div>
        <div class="modal fade" id="checkout<?php echo $rowEvent->id_pendaftaran;?>">
            <div class="modal-dialog">
                <form class="form-horizontal" action="<?php echo site_url('home/check_out');?>" method="post">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">CheckOut</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                        <div class="form-group row">
                        <div class="col-sm-8">
                            <h3>Apakah anda yakin ?</h3>
                            <input type="hidden" value="<?php echo $rowEvent->id_pendaftaran ; ?>" name="id_pendaftaran" class="form-control">
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">CheckOut</button>
                    </div>
                    </div>
                </form>
            <!-- /.modal-content -->
            </div>
        </div>
        <?php } ?>
      </div>
    </section>
    <?php $this->load->view("_partials/footer.php");?>
    <?php $this->load->view("_partials/js.php"); ?>
</body>
</html>