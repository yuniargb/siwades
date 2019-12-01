<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1><?php echo $this->title; ?></h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li><a href="<?= base_url('dashboard') ?>">SIWADES</a></li>
                        <li>LAPORAN</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    <div class="row">
    <!-- Input States Block -->
    <div class="col-md-12">
    <div class="block">
        <!-- Input States Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">Borderless</a>
            </div>
            <h2>Laporan</h2>
        </div>
        <!-- END Input States Title -->

        <!-- Input States Content -->
        
        
        <form action="<?= base_url('exlaporan') ?>" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3">KK</label>
                <div class="col-md-8">
                    <select name="kk" id="example-chosen" class="select-chosen">
                        <option value="">--Pilih KK--</option>
                        <?php foreach ($kk as $row): ?>
                        <option value="<?php echo $row['no_kk'] ?>"><?php echo $row['no_kk']."--".$row['nama'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Agama</label>
                <div class="col-md-8">
                    <select name="agama" id="example-chosen" class="select-chosen">
                        <option value="">--Pilih Agama--</option>
                        <?php foreach ($agama as $row): ?>
                        <option value="<?php echo $row['id_agama'] ?>"><?php echo $row['nama_agama'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Klasifikasi</label>
                <div class="col-md-8">
                    <select name="klasifikasi" id="example-chosen" class="select-chosen">
                        <option value="">--Pilih Klasifikasi--</option>
                        <?php foreach ($klasifikasi as $row): ?>
                        <option value="<?php echo $row['id_klasifikasi'] ?>"><?php echo $row['nama_klasifikasi'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group form-actions">
                <div class="col-md-12">
                    <button type="submit" name="ekspor" class="btn btn-effect-ripple btn-primary center">Export</button>
                </div>
            </div>
        </form>
    </div>
        <!-- END Input States Content -->
    </div>
    <!-- END Input States Block -->
    </div>

</div>
<!-- END Page Content -->

</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->