
<!-- Page content -->
        <div id="page-content">

            <!-- First Row -->
                <div class="row">
                <!-- User Widgets -->
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-content themed-background-flat text-center">
                            <h3 class="widget-heading text-light">JUMLAH WARGA<br>BERDASARKAN KLASIFIKASI</h3>
                        </div>
                        <div class="widget-content themed-background-muted text-center">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default"><strong>JUMLAH TOTAL <?= $x->jumlah; ?> JIWA</strong></a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="row text-center">
                                <div class="col-xs-3">
                                    <h2><i class="fa fa-child"></i></h2><h4 class="widget-heading"><small> ANAK - ANAK</small><br><a href="javascript:void(0)" class="themed-color-flat"><?= $x->a ?></a></h4>
                                </div>
                                <div class="col-xs-3">
                                    <h2><i class="fa fa-street-view"></i></h2><h4 class="widget-heading"><small> REMAJA</small><br><a href="javascript:void(0)" class="themed-color-flat"><?= $x->b ?></a></h4>
                                </div>
                                <div class="col-xs-3">
                                    <h2><i class="fa fa-user"></i></h2><h4 class="widget-heading"><small> DEWASA</small><br><a href="javascript:void(0)" class="themed-color-flat"><?= $x->c ?></a></h4>
                                </div>
                                <div class="col-xs-3">
                                    <h2><i class="fa fa-user-plus"></i></h2><h4 class="widget-heading"><small> LANSIA</small><br><a href="javascript:void(0)" class="themed-color-flat"><?= $x->d ?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-content themed-background-creme text-center">
                            <h3 class="widget-heading text-light">JUMLAH WARGA<br>BERDASARKAN JENIS KELAMIN</h3>
                        </div>
                        <div class="widget-content themed-background-muted text-center">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default"><strong>JUMLAH TOTAL <?= $x->jumlah; ?> JIWA</strong></a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <h2><i class="fa fa-male"></i></h2><h4 class="widget-heading"><small> LAKI - LAKI</small><br><a href="javascript:void(0)" class="themed-color-flat"><?= $x->l ?></a></h4>
                                </div>
                                <div class="col-xs-6">
                                    <h2><i class="fa fa-female"></i></h2><h4 class="widget-heading"><small> PEREMPUAN</small><br><a href="javascript:void(0)" class="themed-color-flat"><?= $x->p ?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END User Widgets -->
            </div>
        </div>
<!-- END Page Content -->
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->