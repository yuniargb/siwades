<!-- Page content -->
            <div id="page-content">
            <!-- User Profile Row -->
                <div class="row">
                    <div class="col-md-5 col-lg-4">
                    <?php 
                        if ($this->session->flashdata('alert')) {
                            echo $this->session->flashdata('alert');
                        }else{
                            echo "";
                        }
                    ?>
                        <div class="widget">
                            <div class="widget-image widget-image-sm">
                                <img src="<?= base_url()?>assets/img/photo1.jpg" alt="image">
                                <div class="widget-image-content text-center" >
                                    <img src="<?= base_url()?>assets/foto/<?php echo $prof['foto']?>" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
                                    <h2 class="widget-heading text-light"><strong></strong></h2>
                                    <a href="#modal-fade2" class="btn btn-effect-ripple btn-default" data-toggle="modal" title="Edit Tentang"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                            <div class="widget-content border-bottom">
                                <h4>
                                    <div class="col-md-10">Tentang</div>
                                </h4>
                                <br>
                                <br>
                                <br>
                                <p>
                                    <?php echo nl2br($prof['about']); ?>
                                </p>
                                <p>
                                    Lahir di <?php echo $prof['tempat_lahir'] ?>, <?php echo $prof['tanggal_lahir']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <div class="block full">
                            <!-- Block Tabs Title -->
                            <div class="block-title">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <li><a href="#profile-gallery"><strong>INFO LENGKAP <?php echo $prof['nama']; ?></strong></a></li>
                                </ul>
                            </div>
                            <!-- END Block Tabs Title -->

                            <!-- Tabs Content -->
                            <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                            <tbody>
                                <tr>
                                    <td><strong>NIK</strong></td>
                                    <td><?php echo $prof['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>NAMA</strong></td>
                                    <td><?php echo $prof['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>TTL</strong></td>
                                    <td><?php echo $prof['tempat_lahir'].", ".$prof['tanggal_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>JENIS KELAMIN</strong></td>
                                    <td><?php echo $prof['jk'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>GOL. DARAH</strong></td>
                                    <td><?php echo $prof['golongan_darah'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>PEKERJAAN</strong></td>
                                    <td><?php echo $prof['pekerjaan'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>PENDIDIKAN</strong></td>
                                    <td><?php echo $prof['pendidikan'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>STATUS PERKAWINAN</strong></td>
                                    <td><?php echo $prof['status_perkawinan'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>AGAMA</strong></td>
                                    <td><?php echo $prof['nama_agama'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>KLASIFIKASI</strong></td>
                                    <td><?php echo $prof['nama_klasifikasi'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>NO. KK</strong></td>
                                    <td><?php echo $prof['no_kk'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                            <!-- END Tabs Content -->
                        </div>
                    </div>
                </div>
                <!-- END User Profile Row -->
                </div>
<!-- END Page Content -->
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Regular Fade -->
<div id="modal-fade2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Upload Foto Profil Baru</strong></h3>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('updateprofile') ?>" method="POST" class="form-bordered" enctype="multipart/form-data">
                <div class="col-sm-8">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="<?= base_url('assets/') ?>/foto/<?php echo $prof['foto']?>" alt=""/>
                        </div>
                        <input type="hidden" name="foto_lawas" value="">
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileupload-new"><i class="fa fa-camera"></i> Ubah Foto</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" class="default" name="foto"/>
                            <input type="hidden" name="foto_lawas" value="<?php echo $prof['foto'] ?>" />
                            </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username_baru" class="form-control" value="<?php echo $prof['username']; ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password_baru" class="form-control" value="<?php echo base64_decode($prof['password']); ?>">
                </div>
                <div class="form-group">
                    <label>Tentang Anda</label>
                    <textarea name="tentang" cols="75" rows="10" class="form-control ui-wizard-content"><?php echo $prof['about']; ?></textarea>
                </div>
                <div class="form-group form-actions">
                    <button type="submit" class="btn btn-effect-ripple btn-primary">Edit Profil</button>
                    <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Regular Fade -->
