<?php $this->load->view('header') ?>
<div class="head-bread">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url('fasilitas')?>">Fasilitas</a></li>
        </ol>
    </div>
</div>

<div class="products-gallery">
<div class="shop-grid">
    <div class="container">
        <?php ;if (!empty($fasilitas)) {
          foreach ($fasilitas as $key => $p) {
            echo '
            <div class="col-md-4 grid-stn simpleCart_shelfItem">
              <div class="ih-item square effect3 bottom_to_top">
                  <div class="bottom-2-top">
                  
                      <div class="img"><img src="'.base_url('upload/'.$p->gambar).'" alt="/" height="200" width="300"></div>
                  <div class="info">
                      <div class="pull-left styl-hdn">
                          <h3>'.$p->nama_fasilitas.'</h3>
                      </div>
                      <div class="clearfix"></div>
                  </div></div>
              </div>
              <div class="quick-view">
                  <a href="'.base_url('fasilitas/detail/'.$p->fasilitas_id).'">Detail</a>
              </div>
            </div>';
          }
        } ?>
        <div class="clearfix"></div>
    </div>
    <br>
</div>
  <div class="clearfix"></div>
  </div>

   </div>
</div>

<?php $this->load->view('footer') ?>
