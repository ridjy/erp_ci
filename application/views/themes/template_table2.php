<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo img_url('BPO.png');?>" />
    <title><?php echo $titre; ?></title>
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo css_url('bootstrap.min'); ?>" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo css_url('nifty.min'); ?>" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo css_url('demo/nifty-demo-icons.min'); ?>" rel="stylesheet">
    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo plugin_url('pace/pace.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo plugin_url('pace/pace.min.js'); ?>"></script>
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo css_url('demo/nifty-demo.min'); ?>" rel="stylesheet">

    <!--DataTables [ OPTIONAL ]-->
    <link href="<?php echo plugin_url('datatables/media/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo plugin_url('datatables/extensions/Responsive/css/responsive.dataTables.min.css'); ?>" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="<?php echo plugin_url('bootstrap-validator/bootstrapValidator.min.css'); ?>" rel="stylesheet">
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <?php echo $this->template->setStatics('navbar.php') ?>
        <?= $contents ?>
         <?php //echo $this->template->setStatics('aside_droit.php') ?>
         <!--aside droit est hide par defaut donc not important-->
         <?php echo $this->template->setStatics('navigation.php') ?>

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">
    <p class="pad-lft">&#0169; <?php echo date('Y');?> BPO Ocean Indien.</p>
    </footer>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
    <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!--JAVASCRIPT-->
<!--=================================================-->
<!--jQuery [ REQUIRED ]-->
<script src="<?php echo js_url('jquery.min'); ?>"></script>
<!--BootstrapJS [ RECOMMENDED ]-->
<script src="<?php echo js_url('bootstrap.min'); ?>"></script>
<!--NiftyJS [ RECOMMENDED ]-->
<script src="<?php echo js_url('nifty.min'); ?>"></script>

<!--=================================================-->

   <!--=================================================-->

    
    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo plugin_url('datatables/media/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo plugin_url('datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?php echo plugin_url('datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>


    <!--DataTables Sample [ SAMPLE ]-->
    <script src="<?php echo js_url('demo/tables-datatables'); ?>"></script>


    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="<?php echo plugin_url('bootstrap-wizard/jquery.bootstrap.wizard.min.js'); ?>"></script>


    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="<?php echo plugin_url('bootstrap-validator/bootstrapValidator.min.js'); ?>"></script>


    <!--Form Wizard [ SAMPLE ]-->
    <script src="<?php echo js_url('demo/form-wizard'); ?>"></script>

     <!--Form validation [ SAMPLE ]-->
    <script src="<?php echo js_url('demo/form-validation'); ?>"></script>
 

</body>

</html>

    
  