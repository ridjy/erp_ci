

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Gestion des utilisateurs</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="<?php echo site_url('user')?>">Utilisateurs</a></li>
					<li class="active"><?php echo $titre?></li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
                    <div class="row">
                                <div class="col-xs-3">
                                   
                                </div>
                                
                                <div class="col-xs-6">  
                                    <?php if($msg!=''): ?>
                                    <div class="alert alert-success">
                                                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                                                <strong></strong> <?php echo $msg; ?>
                                    </div>
                                    <?php endif ?>
                                </div>
                    </div>      
                            <br/>
					
					<div class="row">
                          
                        <div class="col-lg-6">
                            <div class="panel">
                            
                                <form id="" action="<?php echo site_url("$action"); ?>" class="form-horizontal" method="POST">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label text-info" for="demo-hor-Identifiant">Identifiant</label>
                                            <div class="col-lg-7">
                                                <input type="text" name='login' placeholder="" class="form-control" value="" required>
                                            </div>
                                            <div class="col-lg-2">
                                            <div class="checkbox">
                                                        <input id="demo-checkbox-1" class="magic-checkbox" type="checkbox" name="actif" value="1" checked>
                                                        <label for="demo-checkbox-1" class="text-bold text-success" >ACTIF</label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-Matricule">Matricule</label>
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="" id="demo-hor-inputMatricule" class="form-control" name='matricule' value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-inputNom">Nom complet</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="" id="demo-hor-inputNom" class="form-control" name='nom' value="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="email" class="form-control" name="email" placeholder="email" value="" required>
                                                </div>
                                        </div>        
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-inputPoste">Poste</label>
                                            <div class="col-lg-9">
                                                <input type="texte" placeholder="" id="demo-hor-inputPoste" class="form-control" name='poste' value="">
                                            </div>
                                        </div>
                                        <!--IDENTICAL VALIDATOR-->
                                        <!--===================================================-->
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Mot de passe</label>
                                                <div class="col-lg-7">
                                                    <input type="password" class="form-control" name="password" placeholder="mot de passe" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Confirmation mot de passe</label>
                                                <div class="col-lg-7">
                                                    <input type="password" class="form-control" name="confirmPassword" placeholder="Retaper le mot de passe" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Sexe</label>
                                                <div class="col-lg-7">
                                                    <div class="radio">
                                                        <input id="demo-radio-7" class="magic-radio" type="radio" name="genre" value="homme" checked>
                                                        <label for="demo-radio-7">Homme</label>
                    
                                                        <input id="demo-radio-8" class="magic-radio" type="radio" name="genre" value="femme" >
                                                        <label for="demo-radio-8">Femme</label>
                    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </fieldset>

                                    </div>
                                    
                               
                            </div>
                        </div>
                    
					
                         <div class="col-lg-6">
                            <div class="panel">
                                    <div class="panel-body">
                                        
                                        <p class="bord-btm pad-ver text-main text-bold">Les droits d'accès</p>
                    
                                        <!--OTHER VALIDATOR-->
                                        <!--===================================================-->
                                        <fieldset>
                                            <!--<div class="form-group">
                                                <label class="col-lg-3 control-label">Member Type</label>
                                                <div class="col-lg-7">
                                                    <div class="radio">
                                                        <input id="demo-radio-7" class="magic-radio" type="radio" name="member" value="free">
                                                        <label for="demo-radio-7">Free</label>
                    
                                                        <input id="demo-radio-8" class="magic-radio" type="radio" name="member" value="personal">
                                                        <label for="demo-radio-8">Personal</label>
                    
                                                        <input id="demo-radio-9" class="magic-radio" type="radio" name="member" value="bussines">
                                                        <label for="demo-radio-9">Bussiness</label>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Accès</label>
                                                <div class="col-lg-7">
                    
                                                    <div class="checkbox">
                                                        <input id="" class="magic-checkbox" type="checkbox" name="accesrecrutement" value="1" >
                                                        <label for="">Gestion des recrutements</label>
                                                    </div>
                                                    
                    
                                                    <div class="checkbox">
                                                        <input id="demo-checkbox-3" class="magic-checkbox" type="checkbox" name="accesuser" value="1">
                                                        <label for="demo-checkbox-3">Gestion des utilisateurs</label>
                                                    </div>
                                                    
                                                    
                                                    <!--
                                                    <div class="checkbox">
                                                        <input id="demo-checkbox-5" class="magic-checkbox" type="checkbox" name="programs[]" value="php">
                                                        <label for="demo-checkbox-5">PHP</label>
                                                    </div>
                    
                                                    <div class="checkbox">
                                                        <input id="demo-checkbox-6" class="magic-checkbox" type="checkbox" name="programs[]" value="perl">
                                                        <label for="demo-checkbox-6">Perl</label>
                                                    </div>
                    
                                                    <div class="checkbox">
                                                        <input id="demo-checkbox-7" class="magic-checkbox" type="checkbox" name="programs[]" value="Ruby">
                                                        <label for="demo-checkbox-7">Ruby</label>
                                                    </div>
                                                </div>
                                            -->
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">CRM</label>
                                                <div class="col-lg-7">
                    
                                                    <div class="checkbox">
                                                        <input id="demo-checkbox-4" class="magic-checkbox" type="checkbox" name="accesstat" value="1">
                                                        <label for="demo-checkbox-4">Statistiques</label>
                                                    </div>
                                                    
                    
                                                    <div class="checkbox">
                                                        <input id="demo-checkbox-5" class="magic-checkbox" type="checkbox" name="accesenr" value="1">
                                                        <label for="demo-checkbox-5">Enregistrements</label>
                                                    </div>
                                                </div>    
                                                    
                                            </div>
                                            
                                        </fieldset>
                                        <!--===================================================-->
                                        
                                        
                                       <div class="row">
                                            <div class="col-sm-7 col-sm-offset-3">
                                                <input class="btn btn-mint" type="submit" value="Valider">
                                            </div>
                                        </div>
                    
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    
					</form>  
					
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
          