<?php $this->load->view('header') ?>
<br><br>
<div class="container">
<?php echo $this->session->flashdata('msg'); ?>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Fasilitas</th>
              <th>Waktu</th>
              <th>Tanggal</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = $this->cart->contents();
            if (!empty($data)) {
              $no = 1;
              foreach ($data as $k) {
                if ($k['waktu'] ==1) {
                  $nilai = "08.00 - 10.00";
                } elseif ($k['waktu'] ==2) {
                  $nilai = "10.00 - 12.00";
                } elseif ($k['waktu'] ==3) {
                  $nilai = "13.00 - 15.00";
                } elseif ($k['waktu'] ==4) {
                  $nilai = "15.00 - 17.00";
                } else {
                  $nilai = "19.00 - 21.00";
                }
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $k['name'] . '</td>';
                echo '<td>' . $nilai . '</td>';
                echo '<td>' . $k['tanggal'] . '</td>';
                echo '</tr>';
                $no++;
              }
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="panel-footer">
        <a href="<?php echo base_url('pinjam/simpan_pinjam') ?>" class="btn btn-info pull-right">Selesai</a>
        <br><br>

      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>