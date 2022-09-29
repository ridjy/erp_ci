

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
                            
                                <form id="" action="<?php echo site_url("$action"); ?>" class="form-horizontal" method="POST">
                                    <div class="panel-body">
                                        <p>SMS envoyé par : <span class="text-info"><?php echo $this->session->userdata('logged_in')['nom']; ?></span></p>
                                        <br/>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-teldestinataire">Emetteur</label>
                                            <div class="col-lg-7">
                                                <input type="text" name='emetteur' placeholder="Msg en provenance de" class="form-control" value="<?php echo $row['sms_emetteur']?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-teldestinataire">Tel. destinataire</label>
                                            <div class="col-lg-7">
                                                <input type="text" name='tel' placeholder="Numéro téléphone" class="form-control" value="<?php echo $row['sms_tel']?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-nomdest">Nom destinataire</label>
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="nom du client" id="demo-hor-nomdest" class="form-control" name='nomdest' value="<?php echo $row['sms_dest']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label" for="demo-hor-IBAN">Code IBAN destinataire</label>
                                            <div class="col-lg-7">
                                                <input type="text" placeholder="son code IBAN vérifié" id="demo-hor-inputIBAN" class="form-control" name='IBAN' value="<?php echo $row['sms_codeIBAN']?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Email</label>
                                                <div class="col-lg-7">
                                                    <input type="email" class="form-control" name="emaildest" placeholder="email" value="<?php echo $row['sms_email']?>">
                                                </div>
                                        </div>

                                    </div>
                               
                            </div>
                        </div>
                    
                         <div class="col-lg-6">
                            <div class="panel">
                                    <div class="panel-body">
                                        
                                        <p class="bord-btm pad-ver text-main text-bold">Aperçu du SMS</p>
                    
                                        <!--OTHER VALIDATOR-->
                                        <!--===================================================-->
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                <textarea name="sms_contenu" placeholder="Tapez ici le message à envoyer" rows="10" class="form-control"><?php echo $row['sms_contenu']?></textarea>     
                                            </div>
                                            
                                        </fieldset>
                                        <!--===================================================-->
                                        
                                       <br/> 
                                       <div class="row">
                                            <div class="col-md-7"><button class="btn btn-md btn-mint">Retour</button>
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


            
          