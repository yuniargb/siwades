
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
                                            <li><a href="<?= base_url('agama') ?>">AGAMA</a></li>
                                            <li>EDIT</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->
                        
                        <!-- Input States Block -->
                        <div class="col-md-8">
                        <div class="block">
                            <!-- Input States Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">Borderless</a>
                                </div>
                                <h2>Edit Agama</h2>
                            </div>
                            <!-- END Input States Title -->

                            <!-- Input States Content -->
                            
                            <form action="<?= base_url('updateagama') ?>" method="post" class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <input type="hidden" name="id_agama" value="<?php echo $edit['id_agama']; ?>">
                                    <label class="col-md-3">Nama Agama</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_agama" class="form-control" placeholder="Nama Agama" value="<?php echo $edit['nama_agama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-12">
                                        <button type="submit" name="edit_proses" class="btn btn-effect-ripple btn-primary">Edit</button>
                                        <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            <!-- END Input States Content -->
                        </div>
                        <!-- END Input States Block -->


                    </div>
                    <!-- END Page Content -->

                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->
