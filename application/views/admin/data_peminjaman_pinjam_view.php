<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Peminjaman Fasilitas Kampus</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama User</th>
              <th>Nama Fasilitas</th>
              <th>Kategori</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Sampai</th>
              <th>Deskripsi Kegiatan</th>
              <th>Identitas Mahasiswa</th>
              <th>Status</th>
              <th>Verifikasi</th>
              <?php if ($this->session->userdata('level') == 'Admin') {
              ?>
                <th>Hapus</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($peminjaman)) :
              foreach ($peminjaman as $key => $p) {
                $no = $key + 1;
                if ($p->status == '0') {
                  $status = '<label class="label label-default">Menunggu</label>';
                } elseif ($p->status == '2') {
                  $status = '<label class="label label-warning">Di Tolak</label>';
                } elseif ($p->status == '3') {
                  $status = '<label class="label label-info">Selesai</label>';
                } else {
                  $status = '<label class="label label-success">Disetujui</label>';
                }
                if (!empty($p->bukti)) {
                  if ($p->status == '0') {
                    $setuju = '<a href="' . base_url('data_peminjaman_pinjam/setuju/' . $p->peminjaman_id . '/' . $p->fasilitas_id) . '" class="btn btn-info btn-xs">Setujui</a>';
                    $tolak = '<a href="' . base_url('data_peminjaman_pinjam/kembali/' . $p->peminjaman_id . '/' . $p->fasilitas_id) . '" class="btn btn-danger btn-xs">Tolak</a>';
                  } else {
                    $setuju = "-";
                    $tolak = "-";
                  }
                } else {
                  $setuju = "Upload Kartu Identitas Mahasiswa";
                  $tolak = "Upload Kartu Identitas Mahasiswa";
                }

                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $p->nama_lengkap . '</td>';
                echo '<td>' . $p->nama_fasilitas . '</td>';
                echo '<td>' . $p->nama_kategori . '</td>';
                echo '<td>' . $this->modelku->format_tanggal($p->tanggal) . '</td>';
                echo '<td>' . $this->modelku->format_tanggal($p->tanggalsampai) . '</td>';
                echo '<td>' . $p->deskripsikegiatan . '</td>';
                if (!empty($p->bukti)) {
                  echo '<td><img src="' . base_url('upload/' . $p->bukti) . '" width="100" alt=""><br><br><a target="_blank" href="' . base_url('upload/' . $p->bukti) . '" class="btn btn-primary btn-block text-center">Lihat</a></td>';
                } else {
                  echo '<td>Belum Upload Kartu Identitas Mahasiswa</td>';
                }
                echo '<td>' . $status . '</td>';
                if ($p->status == '0') {
                  echo '<td><a href="' . base_url('data_peminjaman_pinjam/verifikasi/' . $p->peminjaman_id) . '"class="btn btn-info btn-xs">Verifikasi</a>            
                    </td>';
                } elseif ($p->status == '2') {
                  echo '<td><a href="' . base_url('data_peminjaman_pinjam/verifikasi/' . $p->peminjaman_id) . '"class="btn btn-info btn-xs">Verifikasi</a>            
                    </td>';
                } elseif ($p->status == '3') {
                  echo '<td>-            
                    </td>';
                } else {
                  echo '<td><a href="' . base_url('data_peminjaman_pinjam/verifikasi/' . $p->peminjaman_id) . '"class="btn btn-info btn-xs">Verifikasi</a>            
                    </td>';
                }
                if ($this->session->userdata('level') == 'Admin') {
            ?>
                  <td><a class="btn btn-danger" href="<?= base_url('data_peminjaman_pinjam/hapus/' . $p->peminjaman_id) ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>
            <?php
                }
                echo '</tr>';
              }
            endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#example1').DataTable();
</script>
<?php $this->load->view('admin/footer') ?>