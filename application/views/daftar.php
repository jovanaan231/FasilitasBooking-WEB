<?php $this->load->view('header'); ?>
<br><br><br>
<div class="about-low-area">
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12  mx-auto">
                <div class="about-caption mb-50">
                    <h2>SIGN UP</h2>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <form data-parsley-validate action="<?php echo base_url('daftar') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input class="form-control" type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>">
                                    <span style="color: red">
                                        <?php echo form_error('nama_lengkap'); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <input class="form-control" type="number" name="notelp" value="<?php echo $notelp; ?>">
                                    <span style="color: red">
                                        <?php echo form_error('notelp'); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Lengkap</label>
                                    <textarea class="form-control" type="text" name="alamat" rows="5" value="<?php echo $alamat; ?>"><?php echo $alamat; ?></textarea>
                                    <span style="color: red">
                                        <?php echo form_error('alamat'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
                                    <span style="color: red">
                                        <?php echo form_error('email'); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="username" name="username" value="<?php echo $username; ?>">
                                    <span style="color: red">
                                        <?php echo form_error('username'); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" name="password" value="<?php echo $password; ?>">
                                    <span style="color: red">
                                        <?php echo form_error('password'); ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <img src="<?= base_url('daftar/captcha') ?>" width="85" height="35" alt="Kode Acak" />
                                    <br>
                                    <label for="">Masukkan Kode</label>
                                    <input class="form-control" type="text" name="kode" id="kodeval" size="6" maxlength="6" required>
                                </div>
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="SIGN UP">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mx-auto">
                <img src="<?= base_url('theme/') ?>about.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>