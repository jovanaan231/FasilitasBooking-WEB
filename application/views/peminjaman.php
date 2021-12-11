<?php $this->load->view('header') ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<br>
<div class="head-bread">
  <div class="container">
    <?php echo $this->session->flashdata('msg'); ?>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <legend>Data Peminjaman</legend>
      <table class="table table-stripped table-hover datatab">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pinjam</th>
            <th>Kategori</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Deskripsi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

          <?php if (!empty($peminjaman)) :
            date_default_timezone_set('Asia/Jakarta');
            foreach ($peminjaman as $key => $p) {
              $currentTime = $p->waktupinjam;
              $hoursToAdd = 2;
              $secondsToAdd = $hoursToAdd * (60 * 60);
              $newTime = $currentTime + $secondsToAdd;

              $no = $key + 1;
              if ($p->status == '0') {
                $status = '<label class="label label-default">Menunggu</label>';
              } elseif ($p->status == '2') {
                $status = '<label class="label label-warning">Ditolak</label><br>(' . $p->keteranganditolak . ')';
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
            }
          endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div style="margin-bottom:300px;">
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
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  });
</script>