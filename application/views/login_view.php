<?php $this->load->view('header'); ?>
<br>
<div class="login">
    <div class="container">
        <div class="login-grids">
            <div class="col-md-12 log">
                <h2>Login</h2>
                <?php echo $this->session->flashdata('msg'); ?>
                <form data-parsley-validate action="<?php echo base_url('login/aksi_login') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input class="form-control" type="text" name="username" data-parsley-type="username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div style="margin-bottom:200px;">
</div>
<?php $this->load->view('footer') ?>