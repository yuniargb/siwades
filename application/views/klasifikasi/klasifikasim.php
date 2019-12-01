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
                                            <li>KLASIFIKASI</li>
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
                                <h2><i class="fa fa-child sidebar-nav-icon"></i> KLASIFIKASI</h2>
                            </div>
                            <a href="#modal-fade" title="Tambah klasifikasi" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Klasifikasi</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>Klasifikasi</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th style="width: 200px" class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($klas as $row): $no++?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td><strong><?php echo $row['nama_klasifikasi'];?></strong></td>
                                            <td><span class="label label-warning"><?php echo $row['jumlah']." Orang"; ?></span></td>
                                            <td>
                                                <?php 
                                                    if ($row['status'] == 1) {$klas = "label label-info"; $tampil = "AKTIF";} 
                                                    else {$klas = "label label-danger"; $tampil = "NONAKTIF";}
                                                ?>
                                                <span class="<?php echo $klas; ?>">
                                                    <?php echo $tampil; ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('detailklasifikasi/'.$row['id_klasifikasi']) ?>" data-toggle="tooltip" title="Detail <?php echo $row['nama_klasifikasi']?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                                                <a href="<?= base_url('editklasifikasi/'.$row['id_klasifikasi']) ?>" data-toggle="tooltip" title="Edit <?php echo $row['nama_klasifikasi']?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                                                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama_klasifikasi'] ?> ?');" href="<?= base_url('deleteklasifikasi/'.$row['id_klasifikasi']) ?>" data-toggle="tooltip" title="Delete <?php echo $row['nama_klasifikasi']?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
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

        <!-- Regular Fade -->
        <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah Klasifikasi</strong></h3>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('storeklasifikasi') ?>" method="post" class="form-bordered">
                            <div class="form-group">
                                <label>ID Klasifikasi</label>
                                <input type="text" name="id_klasifikasi" class="form-control" value="<?php echo "K".$id_new['id_new']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Klasifikasi</label>
                                <input type="text" name="nama_klasifikasi" class="form-control">
                                <span class="help-block">Masukkan Nama Klasifikasi</span>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" name="tambah">Tambah</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Regular Fade -->