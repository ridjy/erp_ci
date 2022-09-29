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
                            <li class="active"><a href="#demo-bsc-tab-1" data-toggle="tab">Détails</a></li>
                            <li><a href="#demo-bsc-tab-2" data-toggle="tab">Profil</a></li>
                            <li><a href="#demo-bsc-tab-3" data-toggle="tab">Validation</a></li>
                        </ul>
            
                        <!-- Tabs Content -->
                        <form id="demo-bv-bsc-tabs" class="form-horizontal" action="<?php echo site_url('recrutement/reponse_demande'); ?>" method="post">
                            <div class="tab-content">


                                <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
                                    <p class="text-main text-bold">Les détails de la demande</p>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nom demandeur</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="nom_demandeur" value="<?php echo $demandeur['USER_NOMCOMPLET'] ?>" readonly>
                                             <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Fonction demandeur</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="fonction_demandeur" value="<?php echo $demandeur['USER_POSTE'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Poste à pourvoir</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="le poste à pourvoir" name="poste" class="form-control" value="<?php echo $row['RECRUTEMENT_POSTE'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Campagne</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="Campagne ou département" name="campagne" class="form-control" value="<?php echo $row['RECRUTEMENT_CAMPAGNE'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nombre</label>
                                        <div class="col-lg-8 pad-no">
                                            <div class="clearfix">
                                                <div class="col-lg-3">
                                                    <input type="integer" placeholder="nbre à pourvoir" name="nombre" class="form-control" value="<?php echo $row['RECRUTEMENT_NOMBRE'] ?>" readonly>
                                                </div>
                                                <div class="col-lg-3 text-lg-right"><label class="control-label">Type de contrat</label></div>
                                                <div class="col-lg-6"><input type="text" placeholder="CDD ou CDI" name="contrat" class="form-control" value="<?php echo $row['RECRUTEMENT_TYPE_CONTRAT'] ?>" readonly></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Horaire mensuel</label>
                                        <div class="col-lg-8">
                                             <input type="text" placeholder="" name="horaire" class="form-control" value="<?php echo $row['RECRUTEMENT_HORAIRE_MENSUEL'] ?>" readonly>
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="tab-pane fade" id="demo-bsc-tab-2">
                                    <p class="text-main text-bold">Profil recherché</p>
                                    <hr>
                                     <div class="form-group">
                                        <label class="col-lg-2 control-label">Qualifications</label>
                                        <div class="col-lg-9 pad-no">
                                              <textarea placeholder="les qualifications requises ..." rows="4" name="qualification" class="form-control" readonly=""><?php echo $row['RECRUTEMENT_QUALIFICATION'] ?></textarea>
                                        </div>
                                    </div>
                                                    
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Compétences</label>
                                        <div class="col-lg-9 pad-no">
                                              <textarea placeholder="compétences nécessaires ..." rows="4" name="competences" class="form-control" readonly=""><?php echo $row['RECRUTEMENT_COMPETENCE'] ?></textarea>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-lg-2 control-label">Atouts</label>
                                        <div class="col-lg-9 pad-no">
                                            <textarea placeholder="..." rows="4" name="atout" class="form-control" readonly=""><?php echo $row['RECRUTEMENT_ATOUT'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="demo-bsc-tab-3">
                                    <p class="text-main text-bold">Validation</p>
                                    <hr>
                                     <div class="form-group">
                                        <label class="col-lg-2 control-label">Deadline</label>
                                        <!--<div class="col-lg-7 col-lg-offset-2">-->
                                        <div class="col-lg-5 pad-no">  
                                            <input type="date" name="deadline" class="form-control" value="<?php echo $row['RECRUTEMENT_DEADLINE'] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group pad-ver">
                                        <label class="col-lg-2 control-label">Réponse</label>
                                        
                                         <div class="col-md-9">
                                            <div class="radio">
                    
                                                <!-- Inline radio buttons -->
                                                <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="validation" value="valide">
                                                <label for="demo-inline-form-radio">Valider la demande</label>
                    
                                                <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="validation" value="refus">
                                                <label for="demo-inline-form-radio-2">refuser</label>
                    
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" id="abandon">
                                        <label class="col-lg-2 control-label">Motif d'abandon</label>
                                        <div class="col-lg-9 pad-no">
                                            <textarea placeholder="Vous devez indiquer un motif pour refuser la demande de recrutement" rows="4" name="motif" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-2 pad-no">
                                            <input type="submit" class="btn btn-warning" value="Enregistrer ma réponse">
                                        </div>
                                    </div>                                    

                                </div>

                        </form>
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
