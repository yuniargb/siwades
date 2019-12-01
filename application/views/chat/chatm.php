 <!-- Page content -->
<div id="page-content" class="inner-sidebar-right">
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
                        <li>Chat Room</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    <!-- Inner Sidebar -->
    <div id="page-content-sidebar">
        <!-- Collapsible People List -->
        <a href="javascript:void(0)" class="btn btn-block btn-effect-ripple btn-primary visible-xs" data-toggle="collapse" data-target="#people-nav">People</a>
        <div id="people-nav" class="collapse navbar-collapse remove-padding">
            <div class="block-section">
                <h4 class="inner-sidebar-header">
                    Online
                </h4>
                <ul class="nav-users nav-users-online">
                    <?php foreach ($online as $row):?>
                        <?php 
                            $nom = $row['nik'];
                            $gb = $this->db->query("SELECT * FROM penduduk WHERE penduduk.nik = '$nom'");

                            $gbr =$gb->row_array();
                            ?>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= base_url('assets/') ?>foto/<?php echo $gbr['foto']; ?>" alt="image" class="nav-users-avatar">
                            <span class="nav-users-heading"><?php echo $row['nama'] ?></span>
                            <span class="text-muted"><?php if ($row['jk'] == "L") {echo "Laki - Laki";}else{echo "Perempuan";} ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="block-section">
                <h4 class="inner-sidebar-header">
                    Offline
                </h4>
                <ul class="nav-users nav-users-offline">
                    <?php foreach ($offline as $rows):?>
                        <?php 
                            $nomm = $rows['nik'];
                            $gbb = $this->db->query("SELECT * FROM penduduk WHERE penduduk.nik = '$nomm'");

                            $gbrr =$gbb->row_array();
                            ?>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= base_url('assets/') ?>foto/<?php echo $gbrr['foto']; ?>" alt="image" class="nav-users-avatar">
                            <span class="nav-users-heading"><?php echo $rows['nama'] ?></span>
                            <span class="text-muted"><?php if ($rows['jk'] == "L") {echo "Laki - Laki";}else{echo "Perempuan";} ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
        </div>
        <!-- END Collapsible People List -->
    </div>
    <!-- END Inner Sidebar -->
<!-- Social Net Content -->
    <div class="header-section">
        <div class="row">
            <div class="col-sm-12">
                    <div id="boxpesan" style="height: 400px;">
                    </div>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="col-sm-10">
                <form method="post" action="" id="formpesan" class="form-inline">
                <textarea class="input-xlarge" style="width: 550px; height: 37px;" name="pesan" placeholder="Ketik Pesan kemudian Kirim !" required x-moz-errormessage="Masukkan Pesan !" autofocus></textarea>
                <input type='submit' value='Kirim' class='btn btn-info pull-right' id='pencet'>
                </form>
            <audio controls id="suara">
            <source src="chat.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio>
            </div>
            <div class="col-sm-2">
                <a href="#" class="btn btn-info emot" data-toggle="popover"  id="emott" type="button" data-placement="top" title="Emoticons (klik)">
                <i class="icon-eye-open icon-white"></i> Emoticons </a>
            </div>
        </div>
    </div>
<!-- END Social Net Content -->
</div>
<!-- END Page Content -->

</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->