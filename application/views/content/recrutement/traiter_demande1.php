<div class="boxed">

    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
        <div id="page-head">
            
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Recrutements</h1>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->


            <!--Breadcrumb-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">Demandes </a></li>
			<li class="active">Traitement de la demande</li>
            </ol>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End breadcrumb-->

        </div>


        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">

            <div class="row">
               <div class="col-lg-12">
                           
                    <!-- FORM VALIDATION ON TABS -->
                    <!--===================================================-->
                    <div class="tab-base">
            
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#demo-bsc-tab-1" data-toggle="tab">Détails de la demande</a></li>
                            <li><a href="#demo-bsc-tab-2" data-toggle="tab">Traitement</a></li>
                            <li><a href="#demo-bsc-tab-3" data-toggle="tab">Sélection de dossier</a></li>
                        </ul>
            
                        <!-- Tabs Content -->
                        <form id="demo-bv-bsc-tabs" class="form-horizontal" action="<?php echo site_url('recrutement/reponse_demande'); ?>" method="post">
                            <div class="tab-content">
                                <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
                                    
                                    <!--row-->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="text-main text-bold">Ces détails sont fournis par le demandeur</p>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Nom demandeur</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="nom_demandeur" value="<?php echo $demandeur['USER_NOMCOMPLET'] ?>" readonly>
                                                                                                     </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Fonction demandeur</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="fonction_demandeur" value="<?php echo $demandeur['USER_POSTE'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Poste à pourvoir</label>
                                                <div class="col-lg-8">
                                                    <input type="text" placeholder="le poste à pourvoir" name="poste" class="form-control" value="<?php echo $row['RECRUTEMENT_POSTE'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Campagne</label>
                                                <div class="col-lg-8">
                                                    <input type="text" placeholder="Campagne ou département" name="campagne" class="form-control" value="<?php echo $row['RECRUTEMENT_CAMPAGNE'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Nombre</label>
                                                <div class="col-lg-3">
                                                            <input type="integer" placeholder="nbre à pourvoir" name="nombre" class="form-control" value="<?php echo $row['RECRUTEMENT_NOMBRE'] ?>" readonly>
                                                        </div>
                                                   
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Type de contrat</label>
                                                <div class="col-lg-8">
                                                     <input type="text" placeholder="" name="horaire" class="form-control" value="<?php echo $row['RECRUTEMENT_TYPE_CONTRAT'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Horaire mensuel</label>
                                                <div class="col-lg-8">
                                                     <input type="text" placeholder="" name="horaire" class="form-control" value="<?php echo $row['RECRUTEMENT_HORAIRE_MENSUEL'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>    
                                    

                                    <!--fin row-->
                                    <div class="col-lg-6">
                                        <br/><br/><br/>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Qualifications</label>
                                            <div class="col-lg-9 pad-no">
                                                  <textarea placeholder="les qualifications requises ..." rows="4" name="qualification" class="form-control" readonly=""><?php echo $row['RECRUTEMENT_QUALIFICATION'] ?></textarea>
                                            </div>
                                        </div>
                                                        
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Compétences</label>
                                            <div class="col-lg-9 pad-no">
                                                  <textarea placeholder="compétences nécessaires ..." rows="4" name="competences" class="form-control" readonly=""><?php echo $row['RECRUTEMENT_COMPETENCE'] ?></textarea>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-lg-3 control-label">Atouts</label>
                                            <div class="col-lg-9 pad-no">
                                                <textarea placeholder="..." rows="4" name="atout" class="form-control" readonly=""><?php echo $row['RECRUTEMENT_ATOUT'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>    

                                </div>        
                                </div>    

                                <div class="tab-pane fade" id="demo-bsc-tab-2">
                                    <p class="text-main text-bold">Validation</p>
                                    <hr>
                                      <?php if($row['RECRUTEMENT_DEBUT']=='NULL') { ?>
                                    <div class="form-group" >
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-2 pad-no">
                                            <a class="btn btn-warning" href="<?php echo site_url('recrutement/debut_recrutement?id=').$id; ?>">Traiter cette demande à partir de ce jour</a>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                        <div class="form-group">
                                        <label class="col-lg-2 control-label">Date début</label>
                                        <!--<div class="col-lg-7 col-lg-offset-2">-->
                                        <div class="col-lg-5 pad-no">  
                                            <input type="date" name="deadline" class="form-control" value="<?php echo $row['RECRUTEMENT_DEBUT'] ?>" readonly>
                                        </div>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Deadline</label>
                                        <!--<div class="col-lg-7 col-lg-offset-2">-->
                                        <div class="col-lg-5 pad-no">  
                                            <input type="date" name="deadline" class="form-control" value="<?php echo $row['RECRUTEMENT_DEADLINE'] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <a href="<?php echo site_url('recrutement/terminer') ?>" class="btn btn-success">Clôturer</a>   
                                    </div>

                                </div>

                        </form>

                        <div class="tab-pane fade" id="demo-bsc-tab-3">
                            <p class="text-main text-bold">Les dossiers sélectionnés pour cette demande</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4">
                               
                                    <div class="panel">
                                        <div class="panel-body">
                                            <p class="text-main text-bold mar-no">Déposez ici les CV selectionnés pour cette demande</p>
                                            <br>
                                    
                                              <!--Dropzonejs-->
                                            <!--===================================================-->
                                            <form id="demo-dropzone" method="POST" action="<?php echo site_url('recrutement/uploadCV') ?>" enctype="multipart/form-data">
                                                <label for='nom_postulant' class='text-danger'>Nom postulant</label>
                                                <input type="text" name="nom_postulant" required>
                                                <br/> 
                                                <!-- <div class="dz-default dz-message">
                                                    
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                                                    <div class="dz-icon">
                                                        <i class="demo-pli-upload-to-cloud icon-5x"></i>
                                                    </div>
                                                    <div>
                                                        <span class="dz-text">Déposez le fichier ici pour l'envoyer au serveur</span>
                                                        <p class="text-sm text-muted">ou cliquez pour explorer</p>

                                                    </div>
                                                </div>--><input type="hidden" class="form-control" name="recrutement_id" value="<?php echo $id ?>">

                                                <input type="file" name="cv" >
                                                <br/>
                                                
                                                <input type='submit' class='btn btn-purple' value="Envoyer">
                                            </form>
                                            <!--===================================================-->
                                            <!-- End Dropzonejs -->

                                    
                                        </div>
                                    </div>
                                </div>    

                            
                            <div class="col-lg-8">
                                 <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Date d'envoi</th>
                                            <th>Lien</th>
                                            <th>Nom du postulant</th>
                                            <th >Selection</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($rowcv as $item) :?>
                                        <tr>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($item->CV_DATEUPLOAD)) ;?></td>
                                            <td><a href="<?php echo site_url('recrutement/afficheCV?chemin=').$item->CV_CHEMIN;?>" target='_blank' class='text-info'><?php echo $item->CV_NOM_FICHIER ;?></a></td>
                                            <td><?php echo $item->CV_NOM ;?></td>
                                            <td><?php //echo $item->CV_DATEUPLOAD ;?></td>
                                        </tr>    
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                            
                    </div>
                    </div>
                    <!--===================================================-->
                    <!-- END FORM VALIDATION ON TABS -->
                </div>
            </div>


        </div>
        <!--===================================================-->
        <!--End page content-->

    </div>
    </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

<script>

</script> 

