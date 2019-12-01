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
                        <li><a href="<?= base_url('siwades') ?>">SIWADES</a></li>
                        <li><a href="<?= base_url('klasifikasi') ?>">KLASIFIKASI</a></li>
                        <li>DETAIL</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->

    <!-- Datatables Block -->
    <!-- Datatables is initialized in ../assets/js/pages/uiTables.js -->
    <?php 
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
        }else{
            echo "";
        }
    ?>
    <div class="block full">
        <div class="block-title">
            <h2><i class="fa fa-child sidebar-nav-icon"></i> <?php echo $judul['nama_klasifikasi']; ?></h2>
        </div>
        <div class="row">
        <form action="<?= base_url('storedokumenklasifikasi') ?>" method="post">
        <div class="form-group col-md-10">
            <select id="example-chosen" name="id_dokumen" class="select-chosen" required="Pilih Dokumen Dulu">
                <option value=""> ---- Pilih Dokumen ---- </option>
                <?php foreach ($dokumen as $rows): ?>
                <option value="<?php echo $rows['id_dokumen'] ?>"><?php echo $rows['id_dokumen']."--".$rows['nama_dokumen'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="id_klasifikasi" value="<?php echo $id_klas; ?>">
        </div>
        <div class="col-md-2">
        <button type="submit" class="btn btn-effect-ripple btn-info" name="tambah_dokumen"><i class="fa fa-plus"></i> Tambah Dokumen</a>
        </form>
        </div>
        </div>
        <br>
        <br>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Dokumen</th>
                        <th style="width: 200px" class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0; foreach ($detail as $row): $no++?>
                    <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td><strong><?php echo $row['nama_dokumen'];?></strong></td>
                        <td class="text-center">
                            <form action="<?= base_url('deletedokumenklasifikasi') ?>" method ="post">
                            <input type="hidden" name="id_klasifikasi" value="<?php echo $row['id_klasifikasi']; ?>">
                            <input type="hidden" name="id_dokumen" value="<?php echo $row['id_dokumen']; ?>">
                            <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama_dokumen'] ?> ?');" data-toggle="tooltip" title="Delete <?php echo $row['nama_dokumen']?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->

</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->
