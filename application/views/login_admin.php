<?php $this->load->view('header'); ?>
<br>
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1 class="text-center">Login Administrator</h1><br>
                <div class="strip"></div>
                <?php echo $this->session->flashdata('msg'); ?>
                <form data-parsley-validate action="<?php echo base_url('login/aksi_loginadmin') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input class="form-control" type="text" name="username" data-parsley-type="username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>