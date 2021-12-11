<?php $this->load->view('admin/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tambah Fasilitas</h3>
            </div>
            <div class="box-body">
                <form data-parsley-validate action="<?php echo base_url('data_member/simpanedit') ?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="hidden" value="<?php echo (!empty($users[0]->user_id)) ? $users[0]->user_id : '' ?>" name="user_id" required>
                            <input class="form-control" type="username" value="<?php echo (!empty($users[0]->username)) ? $users[0]->username : '' ?>" readonly name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Lengkap</label>
                            <input class="form-control" type="text" value="<?php echo (!empty($users[0]->nama_lengkap)) ? $users[0]->nama_lengkap : '' ?>" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Telp</label>
                            <input class="form-control" type="number" value="<?php echo (!empty($users[0]->notelp)) ? $users[0]->notelp : '' ?>" name="notelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input class="form-control" type="text" value="<?php echo (!empty($users[0]->alamat)) ? $users[0]->alamat : '' ?>" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input class="form-control" type="email" value="<?php echo (!empty($users[0]->email)) ? $users[0]->email : '' ?>" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level" required>
                                <option value="<?php echo (!empty($users[0]->level)) ? $users[0]->level : '' ?>">Pilih Level</option>
                                <option value="Admin">Admin</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <button class="btn btn-info" type="submit">Simpan</button>
                            <a class="btn btn-default" href="<?php echo base_url('data_member') ?>">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer') ?>