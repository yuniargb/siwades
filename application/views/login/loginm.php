
        <!-- Login Container -->
        <div id="login-container">
            <!-- Login Header -->
            <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                <i class="fa fa-users"></i> <br> <br> <strong>SELAMAT DATANG DI <br> SISTEM INFORMASI WARGA DESA</strong>
            </h1>
            <!-- END Login Header -->

            <!-- Login Block -->
            <div class="block animation-fadeInQuickInv">
                <!-- Login Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="<?= base_url('daftar') ?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Buat akun baru"><i class="fa fa-plus"></i></a>
                    </div>
                    <h2>Silahkan Login</h2>
                </div>
                <!-- END Login Title -->
                 <?php 
                    if ($this->session->flashdata('alert')) {
                        echo $this->session->flashdata('alert');
                    }else{
                        echo "";
                    }
                 ?>
                <!-- Login Form -->
                <form id="form-validation" action="<?= base_url('auth') ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="val-username" name="val-username" class="form-control" placeholder="Masukkan Username ..." autofocus autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="val-password" name="val-password" class="form-control" placeholder="Masukkan Password ..." autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-lock"></i> Login</button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </form>
                <!-- END Login Form -->
                
            </div>
            <!-- END Login Block -->

            <!-- Footer -->
            <footer class="text-muted text-center animation-pullUp">
                <small><span>2016</span> &copy; <a href="http://www.elfanrodhian.xyz">Elfan Rodh</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

