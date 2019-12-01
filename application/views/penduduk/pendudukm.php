<?php
if ($this->session->userdata('level') == 'admin') {
    $menu = "../menu.php";
    $komen = "";
    $komen2 = "";
}else{
    $menu = "../menu_user.php";
    $komen = "<!--";
    $komen2 = "-->";
}
?>
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
                        <li>PENDUDUK</li>
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
    <h2><i class="fa fa-user sidebar-nav-icon"></i>  PENDUDUK</h2>
</div>
<div class="table-responsive">
    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Status</th>
                <?php echo $komen; ?>
                <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                <?php echo $komen2; ?>
            </tr>
        </thead>
        <tbody>
        <?php $no=0; foreach ($penduduk as $row): $no++?>
            <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td><strong><?php echo $row['nik'] ?></strong></td>
                <td><?php echo $row['nama'] ?></td>
                <td>
                    <?php 
                        if ($row['jk'] == "L") {$tampil = "LAKI - LAKI";} 
                        else {$tampil = "PEREMPUAN";}
                    ?>
                    <?php echo "$tampil"; ?>
                </td>
                <td><?php echo $row['tempat_lahir'].", ".$row['tanggal_lahir'] ?></td>
                <td class="text-center">
                    <?php 
                        if ($row['status'] == 1) {$klas = "label label-info"; $tampil = "ONLINE";} 
                        else {$klas = "label label-danger"; $tampil = "OFFLINE";}
                    ?>
                    <span class="<?php echo $klas; ?>">
                        <?php echo $tampil; ?>
                    </span>
                </td>
                <?php echo $komen; ?>
                <td class="text-center" width="200px">
                    <a href="<?= base_url('detailpenduduk/'.$row['nik'].'/1') ?>" data-toggle="tooltip" title="Detail <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                    <a href="<?= base_url('editpenduduk/'.$row['nik']) ?>" data-toggle="tooltip" title="Edit <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="<?= base_url('deletependuduk/'.$row['nik']) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama']?>');" data-toggle="tooltip" title="Hapus <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
                </td>
                <?php echo $komen2; ?>
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