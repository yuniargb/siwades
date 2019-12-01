<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?= $this->title ?></title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php 
         if(isset($this->aktif)){
            if($this->aktif == 'chat'){ ?>
        <script>var baseUrl = "<?= base_url() ?>"; </script>
        <link href="<?= base_url('assets/chat/') ?>bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url('assets/chat/') ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?= base_url('assets/chat/') ?>style_sesudah.css" rel="stylesheet">
        <script src="<?= base_url('assets/chat/') ?>bootstrap/js/jQuery.js"></script>
        <script src="<?= base_url('assets/chat/') ?>ajaxku.js"></script>
        <?php 
            }
        } 
        ?>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">

        <!-- Include a specific file here from <?= base_url() ?>assets/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?= base_url() ?>assets/js/vendor/modernizr-3.3.1.min.js"></script>
         <!--file upload-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-fileupload.min.css" />
        
    </head>
    <body>