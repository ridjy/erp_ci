<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo img_url('BPO.png');?>" />
    <title>Login | ERP - BPO</title>
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo css_url('bootstrap.min'); ?>" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo css_url('nifty.min'); ?>" rel="stylesheet">
    
    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo plugin_url('pace/pace.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo plugin_url('pace/pace.min.js'); ?>"></script>
    
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>    
    <div id="container" class="cls-container">
        
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay"></div>
		<!-- LOGIN FORM -->      
		<!--===================================================-->
		<div class="cls-content">
		    <div class="cls-content-sm panel">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
		            	 <img src="<?php echo img_url('BPO OI.png'); ?>" class="img-rounded" alt="Logo BPOOI" style="width:100%"> 
		                <!--<h1 class="h3">Account Login</h1>
		                <p>Connectez-vous</p>
		                <?php //echo site_url('Dashboard/check');?>-->
		            </div>
		            <form class="form-login" action="<?php echo site_url('Login/check'); ?>" method="POST">
                        
                        <?php if($e!=''): ?>
                        <div class="alert alert-danger">
                                        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                                        <strong>Erreur!</strong> <?php echo $e; ?>
                        </div>
                        <?php endif ?>

		                <div class="form-group">
		                    <input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur" autofocus required>
		                </div>
		                <div class="form-group">
		                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
		                </div>
		                <div class="checkbox pad-btm text-left">
		                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="rememberme">
		                    <label for="demo-form-checkbox">Se souvenir de moi</label>
		                </div>

		                <button class="btn btn-primary btn-lg btn-block" type="submit">Se connecter</button>
		            </form>
		        </div>
		
		        <div class="pad-all">
		            <a href="#" class="btn-link mar-rgt">Mot de passe oublié ?</a>
		            <a href="#" class="btn-link mar-lft">Se créer un compte</a>
		
		        </div>
		    </div>
		</div>
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

    <script type="text/javascript">
        var root = "<?php echo BASE_URL ?>"
    </script>

</body>
</html>
