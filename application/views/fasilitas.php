<?php $this->load->view('header'); ?>
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Daftar Fasilitas Kampus</h2>
      </div>
    </div>
    <div class="row d-flex">
      <?php
      if (!empty($fasilitas)) {
        foreach ($fasilitas as $key => $p) {
          echo
          '
  
          <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
           
            <div class="img"><img src="' . base_url('upload/' . $p->gambar) . '" style="border-radius:5%;" alt="/" height="200" width="300"></div>
            <div class="text mt-3">
            <div class="meta mb-2 text-center">
          </div>
              <h3 class="heading text-center"><a href="#">' . $p->nama_fasilitas . '</a></h3>
            </div>
            <p class="text-center"><a href="' . base_url('fasilitas/detail/' . $p->fasilitas_id) . '" class="btn btn-primary">Pinjam</a>
          </div>
        </div>
            ';
        }
      } ?>
    </div>
  </div>
</section>
<?php $this->load->view('footer'); ?>