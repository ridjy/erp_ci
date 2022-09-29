

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Plateforme envoi sms</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="<?php echo site_url('smsapi')?>">SMS</a></li>
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
                            
                                <form id="" action="<?php echo site_url("$action"); ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="panel-body">
                                        <p>SMS envoyé par : <span class="text-info"><?php echo $this->session->userdata('logged_in')['nom']; ?></span></p>
                                        <br/>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-teldestinataire">Emetteur</label>
                                            <div class="col-lg-7">
                                                <input type="text" id='emetteur' name='emetteur' placeholder="Msg en provenance de" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-teldestinataire">Nom de l'envoi</label>
                                            <div class="col-lg-7">
                                                <input type="text" name='tel' placeholder="Veuillez nommer cet envoi" class="form-control" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-nomdest">Fichier liste destinataire</label>
                                            <div class="col-lg-7">
                                                <input type="file" name="fichecsv" id="fileToUpload">
                                            </div>
                                        </div>

                                    </div>
                               
                            </div>
                        </div>
                    
                         <div class="col-lg-6">
                            <div class="panel">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="control-label text-dark">Modèle à utiliser</label>
                                            <select id="demo-select2" class="demo_select2 form-control" name="modelesms">
                                                <option value="0">Choisissez un modèle</option>
                                                <?php foreach($rowsms as $item) :?>
                                                <option value="<?php echo $item->id_modele ; ?>"><?php echo $item->nom_modele ; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        
                                        <p class="bord-btm pad-ver text-main text-bold">Aperçu du SMS</p>

                                        <fieldset>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                <textarea id="sms_contenu" name="sms_contenu" placeholder="Tapez ici le message à envoyer" rows="7" class="form-control" required></textarea>     
                                            </div>
                                            <!--<p class="infonbrcar"><span class="nbrcar"></span> caractères<p>-->
                                        </fieldset>
                                        <!--===================================================-->
                                        
                                       <br/> 
                                       <div class="row">
                                            <div class="col-md-7"><input class="btn btn-md btn-mint" type="submit" value="Envoyer">
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


            
          