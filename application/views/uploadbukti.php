<?php $this->load->view('header') ?>
<br><br>
<div class="container">
  <form data-parsley-validate class="col-sm-12" action="<?php echo base_url('uploadbukti/simpan_bukti') ?>" method="post" enctype="multipart/form-data">
    <legend>Upload Kartu Identitas Mahasiswa</legend>
    <p class="text-primary"> Bahwa Anda Benar Mahasiswa dan Bertanggung Jawab Apabila ada Kerusakan dan Kehilangan</p>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="form-group">
      <label>Bukti Pernyataan</label>
      <input class="form-control" type="hidden" name="peminjaman_id" value="<?php echo $peminjaman[0]->peminjaman_id ?>">
      <input type="file" name="gambar" accept="image/*" required>
    </div>
    <div class="form-group">
      <label></label>
      <button type="submit" class="btn btn-success btn-lg">Simpan</button>
    </div>
  </form>
  </tbody>
  </table>
</div>
</div>
<div style="margin-bottom:500px;">
</div>
<?php $this->load->view('footer') ?>
<script type="text/javascript">
  $('#basic-addon2').mousedown(function() {
    $('#pswd').attr('type', 'text');
  });
  $('#basic-addon2').mouseup(function() {
    $('#pswd').attr('type', 'password');
  });
</script>