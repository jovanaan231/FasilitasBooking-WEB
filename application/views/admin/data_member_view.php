<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pengguna</h3>
        <div class="box-tools pull-right">
          <a href="<?php echo base_url('data_member/tambahmember') ?>" class="btn btn-primary ">Tambah</a>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>No Handphone</th>
              <th>Alamat</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($member)) :
              foreach ($member as $key => $p) {
                $no = $key + 1;
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $p->nama_lengkap . '</td>';
                echo '<td>' . $p->email . '</td>';
                echo '<td>' . $p->notelp . '</td>';
                echo '<td>' . $p->alamat . '</td>';
                echo '<td>' . $p->level . '</td>';
                echo '<td>
                <a href="' . base_url('data_member/edit/' . $p->user_id) . '" class="btn btn-info btn-xs">Edit</a>    
                    <a href="' . base_url('data_member/hapus/' . $p->user_id) . '" class="btn btn-danger btn-xs">Hapus</a>              
                    </td>';
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