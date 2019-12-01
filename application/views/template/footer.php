        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?= base_url() ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?= base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/plugins.js"></script>
        <script src="<?= base_url() ?>assets/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?= base_url() ?>assets/js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
        <!-- Load and execute javascript code used only in this page -->
        <!-- <script src="<?= base_url() ?>assets/js/pages/uiWidgets.js"></script>
        <script>$(function () { UiWidgets.init(); });</script> -->
        <!-- Load and execute javascript code used only in this page -->
        <?php if(isset($this->aktif)){ if($this->aktif == 'dashboard'){ ?>
            <script src="<?= base_url() ?>assets/js/pages/readyDashboard.js"></script>
            <script>$(function(){ ReadyDashboard.init(); });</script>
        <?php } } ?>
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?= base_url() ?>assets/js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>
        <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
        <script src="<?= base_url() ?>assets/js/plugins/ckeditor/ckeditor.js"></script>
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?= base_url() ?>assets/js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?= base_url() ?>assets/js/pages/uiProgress.js"></script>
        <script>$(function () { UiProgress.init(); });</script>
        <!--file upload-->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-fileupload.min.js"></script>
        <?php if(isset($this->aktif)){ if($this->aktif == 'chat'){ ?>
            <!-- Load and execute javascript code used only in this page -->
             <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
            <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
            <script src="//maps.googleapis.com/maps/api/js?key="></script>
            <script src="<?= base_url() ?>assets/js/plugins/gmaps.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/appSocial.js"></script>
            <script>$(function(){ AppSocial.init(); });</script>
        <?php } } ?>
    </body>
</html>