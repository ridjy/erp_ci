
             <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <?php $img = ($this->session->userdata('logged_in')['sexe']=='homme') ? '1.png' : '6.png';  ?>
                                            <img class="img-circle img-md" src="<?php echo img_url('profile-photos/').$img ; ?>" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo $this->session->userdata('logged_in')['nom']?></p>
                                            <span class="mnp-desc"><?php echo $this->session->userdata('logged_in')['poste']?></span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="<?php echo site_url('user/moncompte'); ?>" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Mon profil
                                        </a>
                                        <a href="<?php echo site_url('Dashboard/logout');?>" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Se déconnecter
                                        </a>
                                    </div>
                                </div>


                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->


                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Navigation</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="<?php echo site_url('Dashboard/accueil'); ?>">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Accueil</span>
						                </a>
						
						            </li>
						
								 <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Modules</li>
						
						            <!--Menu list item-->
						            <!--<li>
						                <a href="#">
						                    <i class="demo-pli-computer-secure"></i>
						                    <span class="menu-title">Recrutements</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <!--<ul class="collapse">
                                            <?php /*if ($this->session->userdata('droit')['droit_recrutement']=='1') { ?> 
						                    <li><a href="<?php echo site_url('recrutement/demande_encours'); ?>">Toutes les demandes</a></li>
                                            <li><a href="<?php echo site_url('recrutement/recrutement_encours'); ?>">Les recrutements en cours</a></li>
                                            <li><a href="<?php echo site_url('recrutement/recrutement_abandon'); ?>">Les recrutements abandonnés</a></li>
                                            <li><a href="#<?php //echo site_url('recrutement/recrutement_cloture'); ?>">Les recrutements clôturés</a></li>

                                            <?php } else if ($this->session->userdata('logged_in')['poste']=='Chargée de Recrutement') { ?>
                                            <!--pour le profil chargé de recrutement-->
											<li><a href="<?php echo site_url('recrutement/recrutement_encours'); ?>">Les recrutements en cours</a></li>
                                            <li><a href="<?php echo site_url('recrutement/recruteur_abandon'); ?>">Les recrutements abandonnés</a></li>
                                            <li><a href="#<?php //echo site_url('recrutement/recrutement_cloture'); ?>">Les recrutements clôturés</a></li>
                                            
                                            <?php } else { ?>
                                            <li><a href="<?php echo site_url('recrutement'); ?>">Recruter</a></li>
                                            
                                            <?php } */?>
						                </ul>
						            </li>-->

                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="demo-pli-bar-chart"></i>
                                            <span class="menu-title">Vicidial</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <?php if ($this->session->userdata('droit')['droit_statistique']=='1') : ?> 
                                            <li><a href="#">Statistiques</a></li>
                                           <?php endif ?>
                                           <?php if ($this->session->userdata('droit')['droit_enregistrement']=='1') : ?> 
                                            <li><a href="<?php echo site_url('enregistrement'); ?>">Enregistrements</a></li>
                                           <?php endif ?>
                                        </ul>
                                    </li>

                                     <!--Menu list item-->
                                    <?php if ($this->session->userdata('droit')['droit_utilisateur']=='1') :?> 
                                    <li>
                                        <a href="<?php echo site_url('user'); ?>">
                                            <i class="demo-pli-male"></i>
                                            <span class="menu-title">Utilisateurs</span>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                    <li>
                                        <a href="">
                                            <i class="demo-pli-mail"></i>
                                            <span class="menu-title">SMS</span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?php echo site_url('smsapi'); ?>">Envoi SMS</a></li>
                                            <li><a href="<?php echo site_url('smsapi/modelesms') ?>">Modèles SMS</a></li>
                                        </ul>  
                                    </li>
                                    <!--ajout des nouveaux menu de module-->

                                    <!--fin-->

                                    <!-- Hide the content on collapsed navigation 
                                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                        <ul class="list-group">
                                            <li class="list-header pad-no mar-ver">Server Status</li>
                                            <li class="mar-btm">
                                                <span class="label label-primary pull-right">15%</span>
                                                <p>CPU Usage</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                        <span class="sr-only">15%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mar-btm">
                                                <span class="label label-purple pull-right">75%</span>
                                                <p>Bandwidth</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                        <span class="sr-only">75%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">Bouton</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--================================-->
                                <!--End widget-->

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->