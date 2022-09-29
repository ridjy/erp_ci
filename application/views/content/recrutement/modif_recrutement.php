

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Demande de recrutement</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="<?php echo site_url('recrutement') ?>">Recrutements</a></li>
					<li class="active">Formulaire de demande</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<div class="panel">
					    <div class="eq-height clearfix">
					        <div class="col-md-3 eq-box-md text-center box-vmiddle-wrap bord-hor">
					
					            <!-- Simple Promotion Widget -->
					            <!--===================================================-->
					            <div class="box-vmiddle pad-all">
					                <h3 class="text-main"></h3>
					                <div class="pad-ver">
					                    <i class="demo-pli-bag-coins icon-5x"></i>
					                </div>
					                <p class="pad-btn text-sm"><span class="text-lg text-bold text-main"></span> Cette demande est déjà envoyée au responsable de recrutement mais vous pouvez apporter des modifications tant qu'elle n'a pas été traitée</p>
					                <br>
					                <a class="btn btn-sm btn-purple" href="<?php echo site_url('recrutement'); ?>">Voir mes demandes</a>
					            </div>
					            <!--===================================================-->
					
					        </div>
					        <div class="col-md-9 eq-box-md eq-no-panel">
					
					            <!-- Main Form Wizard -->
					            <!--===================================================-->
					            <div id="demo-main-wz">
					
					                <!--nav-->
					                <ul class="row wz-step wz-icon-bw wz-nav-off mar-top">
					                    <li class="col-xs-3">
					                        <a data-toggle="tab" href="#demo-main-tab1">
					                            <span class="text-danger"><i class="demo-pli-information icon-2x"></i></span>
					                            <h5 class="mar-no">Demandeur</h5>
					                        </a>
					                    </li>
					                    <li class="col-xs-3">
					                        <a data-toggle="tab" href="#demo-main-tab3">
					                            <span class="text-info"><i class="demo-pli-home icon-2x"></i></span>
					                            <h5 class="mar-no">Poste</h5>
					                        </a>
					                    </li>
					                    <li class="col-xs-3">
					                        <a data-toggle="tab" href="#demo-main-tab2">
					                            <span class="text-warning"><i class="demo-pli-male icon-2x"></i></span>
					                            <h5 class="mar-no">Profil</h5>
					                        </a>
					                    </li>
					                    <li class="col-xs-3">
					                        <a data-toggle="tab" href="#demo-main-tab4">
					                            <span class="text-success"><i class="demo-pli-medal-2 icon-2x"></i></span>
					                            <h5 class="mar-no">Soumettre</h5>
					                        </a>
					                    </li>
					                </ul>
					
					                <!--progress bar-->
					                <div class="progress progress-xs">
					                    <div class="progress-bar progress-bar-primary"></div>
					                </div>
					
					
					                <!--form-->
					                <form class="form-horizontal" method="POST" action="<?php echo site_url('recrutement/demander'); ?>">
					                    <div class="panel-body">
					                        <div class="tab-content">
												<!--statut modif ou ajout-->
												<input type="hidden" class="form-control" name="statut" value="modification">
												<input type="hidden" class="form-control" name="id_recrutement" value="<?php echo $id ?>">
					                            <!--First tab-->
					                            <div id="demo-main-tab1" class="tab-pane">
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Nom</label>
					                                    <div class="col-lg-9">
					                                        <input type="text" class="form-control" name="nom_demandeur" value="<?php echo $this->session->userdata('logged_in')['nom'] ?>" readonly>
					                                         <input type="hidden" class="form-control" name="id_demandeur" value="<?php echo $this->session->userdata('logged_in')['id'] ?>">
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Fonction</label>
					                                    <div class="col-lg-9">
					                                        <input type="text" class="form-control" name="fonction_demandeur" value="<?php echo $this->session->userdata('logged_in')['poste'] ?>" readonly>
					                                    </div>
					                                </div>
					                                
					                            </div>
					
					                            <!--2e tab-->
					                            <div id="demo-main-tab3" class="tab-pane">
					                               <div class="form-group">
					                                    <label class="col-lg-2 control-label">Fonction</label>
					                                    <div class="col-lg-8">
					                                        <input type="text" placeholder="le poste à pourvoir" name="poste" value="<?php echo $row['nom_client'] ?>" class="form-control">
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Campagne</label>
					                                    <div class="col-lg-8">
					                                        <input type="text" placeholder="Campagne ou département" name="campagne" value="<?php echo $row['RECRUTEMENT_CAMPAGNE'] ?>" class="form-control">
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Nombre</label>
					                                    <div class="col-lg-8 pad-no">
					                                        <div class="clearfix">
					                                            <div class="col-lg-3">
					                                                <input type="integer" placeholder="nbre à pourvoir" name="nombre" class="form-control" value="<?php echo $row['RECRUTEMENT_NOMBRE'] ?>" >
					                                            </div>
					                                            <div class="col-lg-3 text-lg-right"><label class="control-label">Type de contrat</label></div>
					                                            <div class="col-lg-6"><input type="text" placeholder="CDD ou CDI" name="contrat" class="form-control" value="<?php echo $row['RECRUTEMENT_TYPE_CONTRAT'] ?>" ></div>
					                                        </div>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Horaire mensuel</label>
					                                    <div class="col-lg-8">
					                                         <input type="text" placeholder="" name="horaire" class="form-control" value="<?php echo $row['RECRUTEMENT_HORAIRE_MENSUEL']; ?>">
					                                    </div>
					                                </div>
					                            </div>

					                             <!--3e tab-->
					                            <div id="demo-main-tab2" class="tab-pane fade">
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Qualifications</label>
					                                    <div class="col-lg-9 pad-no">
					                                          <textarea placeholder="les qualifications requises ..." rows="4" name="qualification" class="form-control"><?php echo $row['RECRUTEMENT_QUALIFICATION'] ?></textarea>
					                                    </div>
					                                </div>
					                                
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Compétences</label>
					                                    <div class="col-lg-9 pad-no">
					                                          <textarea placeholder="compétences nécessaires ..." rows="4" name="competences" class="form-control"> <?php echo $row['RECRUTEMENT_COMPETENCE'] ?></textarea>
					                                    </div>
					                                </div>

					                            </div>
					
					                            <!--Fourth tab-->
					                            <div id="demo-main-tab4" class="tab-pane">
					                                <div class="form-group">
					                                    <label class="col-lg-2 control-label">Atouts</label>
					                                    <div class="col-lg-9">
					                                        <textarea placeholder="..." rows="4" name="atout" class="form-control"><?php echo $row['RECRUTEMENT_ATOUT'] ?></textarea>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                	<label class="col-lg-2 control-label">Deadline</label>
					                                    <!--<div class="col-lg-7 col-lg-offset-2">-->
					                                    <div class="col-lg-5">	
				                                            <input type="date" name="deadline" class="form-control" value="<?php echo $row['RECRUTEMENT_DEADLINE'] ?>">
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					
					
					                    <!--Footer buttons-->
					                    <div class="pull-right pad-rgt mar-btm">
					                        <button type="button" class="previous btn btn-primary">Précédent</button>
					                        <button type="button" class="next btn btn-primary">Suivant</button>
					                        <a href="<?php echo site_url('recrutement'); ?>"><button type="button" class="btn btn-danger">Annuler</button></a>
					                        <button type="submit" class="finish btn btn-warning" >Modifier</button>
					                    </div>
					
					                </form>
					            </div>
					            <!--===================================================-->
					            <!-- End of Main Form Wizard -->
					
					        </div>
					    </div>
					</div>
					
					
					
					
					
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
          