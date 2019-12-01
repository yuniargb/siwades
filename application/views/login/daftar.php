 <!-- Login Container -->
        <div id="login-container">
            <!-- Register Header -->
            <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                <i class="fa fa-plus"></i> <strong> Buat Akun Baru</strong>
            </h1>
            <!-- END Register Header -->

            <!-- Register Form -->
            <div class="block animation-fadeInQuickInv">
                <!-- Register Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="index.php" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Kembali ke halaman login"><i class="fa fa-user"></i></a>
                    </div>
                    <h2> Daftar</h2>
                </div>
                <!-- END Register Title -->

                <!-- Register Form -->
                <form id="form-validation" action="<?= base_url('actdaftar') ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="val-number" name="val-number" class="form-control" placeholder="Masukkan NIK" autofocus autocomplete="off">
                            <span class="help-block">NB : NIK harus sesuai dengan NIK di Kartu Keluarga</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="val-username" name="val-username" class="form-control" placeholder="Username" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="val-password" name="val-password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="val-confirm-password" name="val-confirm-password" class="form-control" placeholder="Verifikasi Password">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-6">
                            <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Setuju dengan aturan">
                                <input type="checkbox" id="register-terms" name="register-terms">
                                <span></span>
                            </label>
                            <a href="#modal-terms" data-toggle="modal">Aturan</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-success" name="daftar"><i class="fa fa-plus"></i> Buat Akun</button>
                        </div>
                    </div>
                </form>
                <!-- END Register Form -->
            </div>
            <!-- END Register Block -->

            <!-- Footer -->
            <footer class="text-muted text-center animation-pullUp">
                <small><span>2016</span> &copy; <a href="http://elfanrodhian.xyz">Elfan Rodh</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

        <!-- Modal Terms -->
        <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center"><strong>Aturan</strong></h3>
                    </div>
                    <div class="modal-body">
                        <h4 class="page-header">1. <strong>Aturan Umum</strong></h4>
                        <p>Web ini adalah sarana komunikasi dan pusat data Penduduk Desa A</p>
                        <h4 class="page-header">2. <strong>Akun</strong></h4>
                        <p>Penduduk yang bisa mendaftar dan login adalah Peduduk Desa A</p>
                        <h4 class="page-header">3. <strong>Layanan</strong></h4>
                        <p>Kritik dan Saran dapat anda ajukan ke Admin atau melalui halaman chatting</p>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="button" class="btn btn-effect-ripple btn-sm btn-primary" data-dismiss="modal">Terima</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Terms -->