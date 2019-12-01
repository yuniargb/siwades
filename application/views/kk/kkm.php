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
                        <li>KARTU KELUARGA</li>
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
            <h2><i class="fa fa-cubes sidebar-nav-icon"></i> KARTU KELUARGA</h2>
        </div>
        <a href="#modal-fade" title="Tambah kk" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah KK</a>
        <br>
        <br>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Nomor KK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>RT / RW</th>
                        <th>Jumlah Keluarga</th>
                        <th class="text-center" style="width: 200px;"><i class="fa fa-flash"></i> Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0; foreach ($kk as $row): $no++?>
                    <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td><?php echo $row['no_kk'];?></td>
                        <td>
                            <?php 
                            if ($row['jumlah'] < 1) {
                                echo "<i>KK Belum di Update</i>";
                            }else{
                                echo "<strong>".$row['nama']."</strong>";
                            }
                            ?>
                            
                        </td>
                        <td><?php echo $row['rt'];?> / <?php echo $row['rw'];?></td>
                        <td><span class="label label-warning"><?php echo $row['jumlah']." Orang"; ?></span></td>
                        <td class="text-center">
                            <a href="<?= base_url('detailkartukeluarga/'.$row['no_kk']) ?>" data-toggle="tooltip" title="Detail <?php echo $row['no_kk']?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                            <a href="<?= base_url('editkartukeluarga/'.$row['no_kk']) ?>" data-toggle="tooltip" title="Edit <?php echo $row['no_kk']?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['no_kk'] ?> ? , DATA PENDUDUK DALAM KK <?php echo $row['no_kk'] ?> JUGA AKAN TERHAPUS');" href="<?= base_url('deletekartukeluarga/'.$row['no_kk']) ?>" data-toggle="tooltip" title="Hapus <?php echo $row['no_kk']?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
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
    <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah kk</strong></h3>
</div>
<div class="modal-body">
    <form action="<?= base_url('storekartukeluarga') ?>" method="post" class="form-bordered">
        <div class="form-group">
            <label>ID KK</label>
            <input type="text" name="id_kk" class="form-control" value="<?php echo $id_new['id_new']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>No KK</label>
            <input type="text" name="no_kk" class="form-control" placeholder="Masukkan No KK" required>
        </div>
        <div class="form-group">
            <label>RT</label>
            <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" required>
        </div>
        <div class="form-group">
            <label>RW</label>
            <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
        </div>
        <div class="form-group">
            <label>Desa</label>
            <input type="text" name="desa" class="form-control" placeholder="Masukkan Desa" required>
        </div>
        <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" required>
        </div>
        <div class="form-group">
            <label>Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten" required>
        </div>
        <div class="form-group">
            <label>Kode Pos</label>
            <input type="text" name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos" required>
        </div>
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" name="provinsi" class="form-control" placeholder="Masukkan Provinsi" required>
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