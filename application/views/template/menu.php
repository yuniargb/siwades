 <div id="page-wrapper" class="page-loading">
<!-- Preloader -->
<!-- Preloader functionality (initialized in ../assets/js/app.js) - pageLoading() -->
<!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
<div class="preloader">
    <div class="inner">
        <!-- Animation spinner for all modern browsers -->
        <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

        <!-- Text for IE9 -->
        <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
    </div>
</div>
<!-- END Preloader -->

<!-- Page Container -->
<!-- In the PHP version you can set the following options from inc/config file -->
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">

    <!-- Main Sidebar -->
    <div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="<?= base_url('dashboard')?>" class="sidebar-title">
            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide"><strong>SIWADES</strong></span>
        </a>
    </div>
    <!-- END Sidebar Brand -->

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            
            <?php if ($this->session->userdata('level') == 'admin') { ?>
                <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="<?= base_url('dashboard')?>" class="<?php if($this->aktif == 'dashboard'){echo "active";} ?>"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>
                <li class="sidebar-separator">
                    <i class="fa fa-ellipsis-h"></i>
                </li>
                <li class="<?php if($this->aktif == 'klasifikasi' or $this->aktif == 'agama' or $this->aktif == 'dokumen'){echo "active";} ?>">
                    <a href="" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gift sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Master Data</span></a>
                    <ul>
                        <li >
                            <a href='<?= base_url('agama') ?>' class="<?php if($this->aktif == 'agama'){echo " active";} ?>">
                                <i class="fa fa-list sidebar-nav-icon"></i> Agama
                            </a>
                        </li>
                        <li >
                            <a href='<?= base_url('dokumen') ?>' class="<?php if($this->aktif == 'dokumen'){echo " active";} ?>">
                                <i class="fa fa-folder sidebar-nav-icon"></i> Dokumen
                            </a>
                        </li>
                        <li >
                            <a href='<?= base_url('klasifikasi') ?>' class="<?php if($this->aktif == 'klasifikasi'){echo " active";} ?>">
                                <i class="fa fa-child sidebar-nav-icon"></i> Klasifikasi Penduduk
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="<?php if($this->aktif == 'penduduk' or $this->aktif == 'kk' or $this->aktif == 'laporan'){echo "active";} ?>">
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Penduduk</span></a>
                    <ul>
                        <li >
                            <a href="<?= base_url('kartukeluarga') ?>" class="<?php if($this->aktif == 'kk'){echo " active";} ?>">
                                <i class="fa fa-cubes sidebar-nav-icon"></i> Kartu Keluarga
                            </a>
                        </li>

                        <li >
                            <a href="<?= base_url('penduduk') ?>" class="<?php if($this->aktif == 'penduduk'){echo " active";} ?>">
                                <i class="fa fa-user sidebar-nav-icon"></i> Data Penduduk
                            </a>
                        </li>
                        <li >
                            <a href="<?= base_url('laporan') ?>" class="<?php if($this->aktif == 'laporan'){echo " active";} ?>">
                                <i class="fa fa-server sidebar-nav-icon"></i> Laporan
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-separator">
                    <i class="fa fa-ellipsis-h"></i>
                </li>
                
                <li>
                    <a href="<?= base_url('chat') ?>" class="<?php if($this->aktif == 'chat'){echo "active";} ?>"><i class="fa fa-share-alt sidebar-nav-icon">
                        </i><span class="sidebar-nav-mini-hide">Chatting an</span>
                    </a>
                </li>
                
            </ul>
            <!-- END Sidebar Navigation -->
            <?php }else{ ?>
                 <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li>
                        <a href="<?= base_url('dashboard')?>" class="<?php if($this->aktif == 'dashboard'){echo "active";} ?>"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="sidebar-separator">
                        <i class="fa fa-ellipsis-h"></i>
                    </li>
                    <li>
                        <a href="<?= base_url('detailkartukeluarga/'.$this->session->userdata('data')['no_kk']) ?>" class="<?php if($this->aktif == 'penduduk' or $this->aktif == 'kk'){echo "active";} ?>"><i class="fa fa-cube sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Kartu Keluarga</span></a>
                    </li>
                    
                    <li class="sidebar-separator">
                        <i class="fa fa-ellipsis-h"></i>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('chat') ?>" class="<?php if($this->aktif == 'chat'){echo " active";} ?>"><i class="fa fa-share-alt sidebar-nav-icon">
                            </i><span class="sidebar-nav-mini-hide">Chatting an</span>
                        </a>
                    </li>
                    
                </ul>
                <!-- END Sidebar Navigation -->
            <?php } ?>
            

            <!-- Color Themes -->
            <!-- Preview a theme on a page functionality can be found in assets/js/app.js - colorThemePreview() -->
            <!-- END Color Themes -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->

    <!-- Sidebar Extra Info -->
    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
        <div class="text-center">
            <small><span>2016</span> &copy; <a href="http://www.elfanrodhian.xyz">Elfan Rodh</a></small>
        </div>
    </div>
    <!-- END Sidebar Extra Info -->
</div>
    <!-- END Main Sidebar -->

    <!-- Main Container -->
    <div id="main-container">
        <!-- Header -->
        <header class="navbar navbar-inverse navbar-fixed-top">
            <!-- Left Header Navigation -->
            <ul class="nav navbar-nav-custom">
                <!-- Main Sidebar Toggle Button -->
                <li>
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                        <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                        <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                    </a>
                </li>
                <!-- END Main Sidebar Toggle Button -->

                <!-- Header Link -->
                <li class="hidden-xs animation-fadeInQuick">
                    <a href="<?= base_url('dashboard') ?>"><strong>SELAMAT DATANG DI SISTEM INFORMASI WARGA DESA</strong></a>
                </li>
                <!-- END Header Link -->
            </ul>
            <!-- END Left Header Navigation -->

            <!-- Right Header Navigation -->
                <ul class="nav navbar-nav-custom pull-right">
                    <!-- Alternative Sidebar Toggle Button -->
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');this.blur();">
                            <h5><strong><?= $this->session->userdata('level')." ".$this->session->userdata('userdata') ?></strong> A.N. <strong><?= $this->session->userdata('data')['nama'] ?></strong></h5>
                        </a>
                    </li>
                    <!-- END Alternative Sidebar Toggle Button -->

                    <!-- User Dropdown -->
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url('assets/foto/') ?><?= $this->session->userdata('data')['foto']?>" alt="avatar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header">
                                <strong>ADMINISTRATOR</strong>
                            </li>
                            <li>
                                <a href="<?= base_url('profile') ?>">
                                    <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="divider"><li>
                            <li>
                                <a href="<?= base_url('logout') ?>" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?');">
                                    <i class="fa fa-power-off fa-fw pull-right"></i>
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END User Dropdown -->
                    </ul>
            <!-- END Right Header Navigation -->
        </header>
        <!-- END Header -->
