<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("_partials/head.php");?>
<body>
    <?php $this->load->view("_partials/navbar.php");?>
    <section class="site-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-theme home-slider">
            <?php foreach($slider as $rowSlider) { ?> 
              <div>
                <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo base_url(); ?>assets/images/<?php echo $rowSlider->img_slider;?>'); ">
                  <div class="text half-to-full">
                    <div class="post-meta">
                      <span class="category"><?php echo $rowSlider->title_slider; ?></span>
                    </div>
                    <h3><?php echo $rowSlider->ket_slider; ?></h3>
                  </div>
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
              <h2 style="text-align:center;">---Upcoming Event---</h2>
              <hr class="newhr">
        <div class="row">
        <?php foreach($upcoming as $rowEvent) { ?> 
          <div class="col-md-6 col-lg-6">
            <a href="#" class="a-block d-flex align-items-center height-md" style="background-image: url('<?php echo base_url(); ?>assets/images/<?php echo $rowEvent->banner_event?>');" data-toggle="modal" data-target="#detailModal<?php echo $rowEvent->id_event; ?>">
              <div class="text">
                <div class="post-meta">
                  <span class="category"><?php echo $rowEvent->nama_kategori ;?></span>
                  <span class="mr-2"><?php echo $rowEvent->tanggal_event;?></span> &bullet;
                </div>
                <h3><?php echo $rowEvent->nama_event ;?></h3>		
              </div>
            </a>
          </div>
        <?php } ?>
        </div>
        <h2 style="text-align:center;">---Past Event---</h2>
              <hr class="newhr">
        <div class="row">
        <?php foreach($past as $rowEvent) { ?> 
          <div class="col-md-6 col-lg-6">
            <a href="#" class="a-block d-flex align-items-center height-md" style="background-image: url('<?php echo base_url(); ?>assets/images/<?php echo $rowEvent->banner_event?>'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category"><?php echo $rowEvent->nama_kategori ;?></span>
                  <span class="mr-2"><?php echo $rowEvent->tanggal_event;?></span> &bullet;
                  <span class="ml-2"><?php echo $rowEvent->nama_ruang ;?> </span>
                </div>
                <h3><?php echo $rowEvent->nama_event ;?></h3>		
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
      <?php foreach($upcoming as $rowEvent) { ?> 
      <div class="modal fade" id="detailModal<?php echo $rowEvent->id_event; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail <?php echo $rowEvent->nama_kategori ;?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <b>Nama Event:</b> <?php echo $rowEvent->nama_event ;?><br>
                  <b>Tanggal:</b> <?php echo $rowEvent->tanggal_event;?><br>
                  <b>Jam Event:</b> <?php echo $rowEvent->jam_event;?><br>
                  <b>Ruangan:</b> <?php echo $rowEvent->nama_ruang;?><br>
                  <b>Sisa Kuota:</b> <?php echo $rowEvent->sisa_kuota ?> Peserta<br>
                </div>
                <div class="modal-footer">
                <form action="<?php echo site_url('home/daftar_action');?>" method="post">
                  <input type="hidden" id="id_event" name="id_event" value="<?php echo $rowEvent->id_event; ?>">
                  <input type="hidden" id="id" name="id" value="<?=$id?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
      </div>
      <?php } ?>
      </div>
    </div>


    </section>
    <?php $this->load->view("_partials/footer.php");?>
    <?php $this->load->view("_partials/js.php"); ?>
</body>
</html>