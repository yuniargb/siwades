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
                                            <li><a href="<?= base_url('kartukeluarga') ?>">KK</a></li>
                                            <li>ANGGOTA</li>
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
                                <h2><i class="fa fa-user sidebar-nav-icon"></i>  KELUARGA <?php echo $judul['nama'] ?></h2>
                            </div>
                            <a href="#modal-fade" title="Tambah Agama" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Keluarga</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>KK</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($penduduk as $row): $no++?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center">
                                                <?php
                                                $id = $row['nik'];
                                                $jum = $this->db->query("SELECT penduduk.nama FROM penduduk, kk 
                                                                        WHERE penduduk.nik = kk.kepala_keluarga
                                                                        AND kk.kepala_keluarga = '$id'");
                                                $jumlah = $jum->num_rows();
                                                if ($jumlah > 0) {
                                                    echo '<a href="#" data-toggle="tooltip" title="Kepala Keluarga" class="btn btn-effect-ripple btn-primary"><i class="fa fa-users"></i></a>';
                                                }else{
                                                    echo '
                                                <form action="'.base_url('kepalakeluarga').'" method="post">
                                                    <input type="hidden" name="no_kk" value="'.$row['no_kk'].'">
                                                    <input type="hidden" name="nik" value="'.$row['nik'].'">
                                                    <button type="submit" name="edit_kk" href="" data-toggle="tooltip" title="Jadikan Kepala Keluarga" class="btn btn-effect-ripple btn-default"><i class="fa fa-cube"></i></button>
                                                </form>'; 
                                                }
                                                ?>
                                            </td>
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
                                            <td class="text-center" width="200px">
                                                <a href="<?= base_url('detailpenduduk/'.$row['nik'].'/2') ?>" data-toggle="tooltip" title="Detail <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                                                <a href="<?= base_url('editanggota/'.$row['nik']) ?>" data-toggle="tooltip" title="Edit <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="<?= base_url('deleteanggota/'.$row['nik']) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama']?>');" data-toggle="tooltip" title="Hapus <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
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
                        <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah Penduduk</strong></h3>
                    </div>
                    <div class="modal-body">
                        <form id="form-validation" action="<?= base_url('storeanggota') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" id="val-number" required placeholder="Masukkan NIK">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control"  placeholder="Masukkan Tempat Lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input id="example-datepicker3" type="text" name="tanggal_lahir" class="form-control input-datepicker"  placeholder="Tanggal/Bulan/Tahun" data-date-format="dd-mm-yyyy" required>
                            </div>
                            <div class="form-group">
                                <label>JK</label>
                                <select name="jk" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <select name="golongan_darah" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Golongan Darah--</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <select name="pendidikan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Pendidikan--</option>
                                    <option value="SD">SD Sederajat</option>
                                    <option value="SMP">SMP Sederajat</option>
                                    <option value="SMA">SMP Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4 / S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="pekerjaan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Pekerjaan--</option>
                                    <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                                    <option value="PNS">PNS</option>
                                    <option value="PELAJAR/MAHASISWA">PELAJAR/MAHASISWA</option>
                                    <option value="PETANI" >PETANi</option>
                                    <option value="WIRAUSAHA">WIRAUSAHA</option>
                                    <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                                    <option value="Lainnya">WIRAUSAHA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Perkawinan</label>
                                <select name="status_perkawinan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Status Perkawinan--</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kewarganegaraan</label>
                                <select name="kewarganegaraan" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Kewarganegaraan--</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="id_agama" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Pilih Agama--</option>
                                <?php foreach($agama as $row): ?>
                                    <option value="<?php echo $row['id_agama'] ?>"><?php echo $row['nama_agama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Klasifikasi</label>
                                <?php 
                                    //tahun_sekarang
                                    date_default_timezone_set('Asia/Jakarta');
                                    $sekarang = date("Y");
                                ?>
                                <select name="id_klasifikasi" id="example-chosen" class="select-chosen" required>
                                    <option value="">--Klasifikasi Penduduk--</option>
                                <?php foreach($klasifikasi as $rows): ?>
                                    <option value="<?php echo $rows['id_klasifikasi'] ?>"><?php echo $rows['nama_klasifikasi'] ?></option>
                                <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="no_kk" value="<?php echo $detail ?>">
                            </div>
                            <div class="form-group">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="" alt=""/>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-camera"></i> Tambah Foto</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                       <input type="file" class="default" name="foto" required/>
                                       </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" name="tambah_anggota">Tambah</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Regular Fade -->