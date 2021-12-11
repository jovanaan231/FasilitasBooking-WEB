<?php $this->load->view('header'); ?>
<br><br>
<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(<?php echo base_url('upload/' . $detail[0]->gambar); ?>);">
      </div>
      <div class="col-md-6 wrap-about py-4 py-md-5 ftco-animate">
        <div class="heading-section">
          <div class="pl-md-5">
            <h2><?php echo $detail[0]->nama_fasilitas; ?></h2>
          </div>
        </div>
        <div class="pl-md-5">
          <p><?php echo $detail[0]->deskripsi; ?></p>
          <form class="" action="<?php echo base_url('pinjam/simpan_pinjam') ?>" method="post">
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Mulai</label>
              <input type="hidden" name="fasilitas_id" value="<?php echo $detail[0]->fasilitas_id; ?>" required>
              <input class="form-control" type="hidden" name="nama_fasilitas" value="<?php echo $detail[0]->nama_fasilitas; ?>" required>
              <input class="form-control" type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Sampai</label>
              <input class="form-control" type="date" name="tanggalsampai" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Kegiatan</label>
              <textarea class="form-control" rows="7" name="deskripsikegiatan" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label></label>
              <button type="submit" role="button" class="btn btn-success btn-block">Pinjam</button>
            </div>
          </form>
        </div>
        <div class="heading-section">
          <div class="pl-md-5">
          <p>Harap Menaati Protokol Kesehatan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('footer'); ?>