<!-- Page content -->
<div id="page-content">
<div class="row">
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
                        <li><a href="<?= base_url('penduduk') ?>">PENDUDUK</a></li>
                        <li>DETAIL</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    <?php 
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
        }else{
            echo "";
        }
    ?>
    <!-- Table Styles Block -->
    <div class="col-sm-6">
    <div class="block">
        <!-- Table Styles Title -->
        <div class="block-title clearfix">
            <h2><i class="fa fa-user sidebar-nav-icon"></i>  DETAIL <?php echo $penduduk['nama'] ?></h2>
        </div>
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <div class="table-responsive">
            <!--
            Available Table Classes:
                'table'             - basic table
                'table-bordered'    - table with full borders
                'table-borderless'  - table with no borders
                'table-striped'     - striped table
                'table-condensed'   - table with smaller top and bottom cell padding
                'table-hover'       - rows highlighted on mouse hover
                'table-vcenter'     - middle align content vertically
            -->
            <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                <tbody>
                    <tr>
                        <td colspan="2" align="center"><strong>FOTO</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <img src="<?php echo base_url('assets/foto/').$penduduk['foto']; ?>" style="width: 150px;" class="img4"/>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>NIK</strong></td>
                        <td><?php echo $penduduk['nik'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>NAMA</strong></td>
                        <td><?php echo $penduduk['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>TTL</strong></td>
                        <td><?php echo $penduduk['tempat_lahir'].", ".$penduduk['tanggal_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>JENIS KELAMIN</strong></td>
                        <td><?php echo $penduduk['jk'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>GOL. DARAH</strong></td>
                        <td><?php echo $penduduk['golongan_darah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>PEKERJAAN</strong></td>
                        <td><?php echo $penduduk['pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>PENDIDIKAN</strong></td>
                        <td><?php echo $penduduk['pendidikan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>STATUS PERKAWINAN</strong></td>
                        <td><?php echo $penduduk['status_perkawinan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>AGAMA</strong></td>
                        <td><?php echo $penduduk['nama_agama'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>KLASIFIKASI</strong></td>
                        <td><?php echo $penduduk['nama_klasifikasi'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>NO. KK</strong></td>
                        <td><?php echo $penduduk['no_kk'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>
    </div>
    <!-- END Table Styles Block -->

    <!-- Table Styles Block -->
    <div class="col-sm-6">
    <div class="block">
        <!-- Table Styles Title -->
        <div class="block-title clearfix">
            <h2><i class="fa fa-list sidebar-nav-icon"></i>  DOKUMEN <?php echo $penduduk['nama'] ?></h2>
        </div>
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <div class="table-responsive">
            <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                <tbody>
                <?php foreach($fl as $row): ?>
                    <tr>
                        <td><strong><?php echo $row['nama_dokumen'] ?></strong></td>
                        <td>
                            <?php
                                $id_dokumen = $row['id_dokumen']; 
                                $file = $this->penduduk->getFile($id_dokumen,$penduduk['nik'])->num_rows();
                                if ($file > 0) {
                                    $j = $this->penduduk->getFile($id_dokumen,$penduduk['nik'])->row_array();
                                    $files = $j['file'];
                                    $embed = "return embed('".base_url('embed/'.$files)."');";
                                    $nama   = "Lihat ".$row['nama_dokumen'];
                                    $idd    = $row['id_dokumen'];
                                    $nik    = $penduduk['nik'];
                                    $k1     = "<!--";
                                    $k2     = "-->";
                                    $k3     = "";
                                    $k4     = "";
                                    $submit = "return false;";
                                }else{
                                    $idd    = $row['id_dokumen'];
                                    $nik    = $penduduk['nik'];
                                    $nama   = "Tambah ".$row['nama_dokumen'];
                                    $k1     = "";
                                    $k2     = "";
                                    $k3     = "<!--";
                                    $k4     = "-->";
                                }

                            ?>
                            <?php echo $k1; ?>
                        <form action="<?= base_url('addpdf') ?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" class="form-control" id="example-file-input" required="Pilih File Dulu">
                            <br>
                            <input type="hidden" name="id_dokumen" value="<?php echo $idd; ?>">
                            <input type="hidden" name="lee" value="<?php echo $l; ?>">
                            <input type="hidden" name="nik" value="<?php echo $nik; ?>">

                            <button type="submit" data-toggle="tooltip" title="<?php echo $nama; ?>" class="btn btn-effect-ripple btn-info" name="tambah_file"><i class="fa fa-plus"></i> <?php echo $nama; ?></button>
                        </form> 
                            <?php echo $k2; ?>
                            <?php echo $k3; ?>
                        <form action="<?= base_url('deletepdf') ?>" method="post">
                            <input type="hidden" name="lee" value="<?php echo $l; ?>">
                            <input type="hidden" name="id_dokumen" value="<?php echo $idd; ?>">
                            <input type="hidden" name="nik" value="<?php echo $nik; ?>">

                            <a onclick="<?php echo $embed; ?>" data-toggle="tooltip" title="<?php echo $nama; ?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i> <?php echo $nama; ?></a>

                            <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama_dokumen'] ?> ?');" data-toggle="tooltip" title="Hapus <?php echo $row['nama_dokumen'] ?>" class="btn btn-effect-ripple btn-danger" name="hapus_file"><i class="fa fa-times"></i> Hapus <?php echo $row['nama_dokumen']; ?></button>
                        </form>
                            <?php echo $k4; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>
    </div>
    <!-- END Table Styles Block -->
</div>
</div>
<!-- END Page Content -->

</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->
<script LANGUAGE="JavaScript">
    function embed(bookURL){
       window.open(bookURL,"status=no","toolbar=no","menubar=no","left=355");
    }
</script>
