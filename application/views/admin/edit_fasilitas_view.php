<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Fasilitas</h3>
      </div>
      <div class="box-body">
        <form data-parsley-validate action="<?php echo base_url('data_fasilitas/simpan_edit') ?>" method="post" enctype="multipart/form-data">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Fasilitas</label>
              <input class="form-control" type="hidden" name="fasilitas_id" value="<?php echo (!empty($fasilitas[0]->fasilitas_id)) ? $fasilitas[0]->fasilitas_id : '' ?>">
              <input class="form-control" type="text" name="nama_fasilitas" value="<?php echo (!empty($fasilitas[0]->nama_fasilitas)) ? $fasilitas[0]->nama_fasilitas : '' ?>" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="kategori" required>
                <option value="" selected>Pilih Kategori</option>
                <?php foreach ($kategori as $key => $k) :
                  $kid = (!empty($fasilitas[0]->kategori_id)) ? $fasilitas[0]->kategori_id : '';
                  if ($kid == $k->kategori_id) {
                    echo '<option value="' . $kid . '" selected>' . $k->nama_kategori . '</option>';
                  } else {
                    echo '<option value="' . $k->kategori_id . '">' . $k->nama_kategori . '</option>';
                  }
                endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea id="summernote" rows="10" name="deskripsi" required><?php echo (!empty($fasilitas[0]->deskripsi)) ? $fasilitas[0]->deskripsi : '' ?></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar" accept="image/*" required><br>
              <?php if (!empty($fasilitas[0]->gambar)) : ?>
                <img src="<?php echo base_url('upload/' . $fasilitas[0]->gambar); ?>" width="100" alt="">
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label></label>
              <button class="btn btn-info" type="submit">Simpan</button>
              <a class="btn btn-default" href="<?php echo base_url('data_fasilitas') ?>">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/footer') ?>