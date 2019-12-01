 <!-- Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="assets/img/placeholders/layout/lock_full_bg.jpg" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
<!-- END Full Background -->

<!-- Login Container -->
<div id="login-container">
    <!-- Lock Header -->
    <h1 class="text-center text-light push-top-bottom animation-fadeInQuick">
        <strong>Pilih Akses</strong><br>
    </h1>
    <!-- END Lock Header -->
    <!-- Lock Form -->
    <?php foreach ($sesi as $row): ?>
    <form action="<?= base_url('goTo') ?>" method="post" class="form-horizontal push animation-fadeInQuick">
        <div class="form-group">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <div class="input-group input-group-lg">
                    <div class="input-group-btn">
                        <input type="hidden" name="nama_akses" value="<?php echo $row['nama_akses'] ?>" >
                        <button type="submit" name="validasi" class="btn btn-effect-ripple btn-block btn-primary"><i class="fa fa-unlock-alt"></i>  <?php echo $row['nama_akses'] ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php endforeach; ?>
    <!-- END Lock Form -->
</div>