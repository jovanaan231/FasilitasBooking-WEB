<?php $this->load->view('header') ?>
<br>
<div class="head-bread">
  <div class="container">
    <?php echo $this->session->flashdata('msg'); ?>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <form data-parsley-validate action="<?php echo base_url('akun/simpan') ?>" method="post">
        <legend>Data Diri</legend>
        <div class="form-group">
          <label>Nama</label>
          <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>">
          <input type="text" name="nama" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" data-parsley-type="email" value="<?php echo $this->session->userdata('email') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input type="text" name="notelp" data-parsley-type="number" value="<?php echo $this->session->userdata('notelp') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" required><?php echo $this->session->userdata('alamat') ?></textarea>
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <input id="pswd" type="password" name="password" value="<?php echo $this->session->userdata('password') ?>" class="form-control" required>
            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-eye-open"></span></span>
          </div>
        </div>
        <div class="form-group">
          <label></label>
          <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </div>
      </form>
    </div>
    <div class="col-md-9">
      <legend>Data Peminjaman</legend>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pinjam</th>
            <th>Kategori</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Upload Kartu Identitas Mahasiswa</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php if (!empty($peminjaman_pinjam)) :
            date_default_timezone_set('Asia/Jakarta');
            foreach ($peminjaman_pinjam as $key => $p) {
              $currentTime = $p->waktupinjam;
              $hoursToAdd = 2;
              $secondsToAdd = $hoursToAdd * (60 * 60);
              $newTime = $currentTime + $secondsToAdd;

              $no = $key + 1;
              if ($p->status == '0') {
                $status = '<label class="label label-default">Menunggu</label>';
              } elseif ($p->status == '2') {
                $status = '<label class="label label-warning">Ditolak</label><br>(' . $p->keteranganditolak . ')';
              } elseif ($p->status == '3') {
                $status = '<label class="label label-success">Selesai</label>';
              } else {
                $status = '<label class="label label-success">Disetujui</label>';
              }

              echo '<tr>';
              echo '<td>' . $no . '</td>';
              echo '<td>' . $p->nama_fasilitas . '</td>';
              echo '<td>' . $p->nama_kategori . '</td>';
              echo '<td>' . $this->modelku->format_tanggal($p->tanggal) . '</td>';
              echo '<td>' . $this->modelku->format_tanggal($p->tanggalsampai) . '</td>';
              echo '<td>' . $p->deskripsikegiatan . '</td>';
              echo '<td>' . $status . '</td>';
              if (!empty($p->bukti)) {
                echo '<td><img src="' . base_url('upload/' . $p->bukti) . '" width="100" alt=""></td>';
              } else {
                echo '<td>Belum Upload Kartu Identitas Mahasiswa / Syarat</td>';
              }

              if ($p->status == '0') {
                if (time() - $p->waktupinjam < (86400)) {
                  $aksi = '<a href="' . base_url('uploadbukti/edit/' . $p->peminjaman_id) . '" class="label label-success"">Upload Kartu Identitas Mahasiswa
                </a><br><br><p></p>';
                } else {
                  $aksi = '<p>Pernyataan Telat / Kadaluarsa Karena Belum Mengupload Form 1 x 24 Jam</p>';
                  $status = '<label class="label label-warning">Ditolak</label>';
                }
              } elseif ($p->status == '2') {
                $aksi = '-';
              } elseif ($p->status == '3') {
                $aksi = 'Selesai';
              } else {
                $aksi = 'Di Setujui';
              }
              echo '<td>' . $aksi . '</td>';
            }
          endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<div style="margin-bottom:200px;">
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