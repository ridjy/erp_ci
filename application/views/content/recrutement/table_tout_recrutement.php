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
					<li><a href="#">Demandes</a></li>
					<li class="active">en cours</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<!-- Basic Data Tables -->
					<!--===================================================-->
					<div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title">Les demandes en cours</h3>
					    </div>
					    
					    <div class="panel-body">
					    	<div class="row">
						    	<div class="col-xs-3">
							    	<!-- <a href='<?php //echo site_url('recrutement/demande_recrutement'); ?>' class='btn btn-purple'>Faire une nouvelle demande</a> -->
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
					        
					        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
					            <thead class="thead-light">
					                <tr>
					                    <th>Date demande</th>
					                    <th>Deadline</th>
					                    <th class="min-tablet">Demandeur</th>
					                    <th class="min-tablet">Poste</th>
					                    <th class="min-desktop">Nbre</th>
					                    <th class="min-desktop">Type de contrat</th>
					                    <th class="min-tablet">Horaire</th>
					                    <!--<th class="min-desktop">Profil</th>-->
					                    <th >Actions</th>
					                </tr>
					            </thead>
					            <tbody>
					            	<?php foreach($row as $item) :?>
					                <tr class='warning'>
					                    <td><a href="#" class="btn-link"><?php echo date('d-m-Y H:i:s',strtotime($item->RECRUTEMENT_DATE_DEMANDE)) ;?></a></td>
					                    <td><span class="text-danger text-semibold"><?php echo date('d-m-Y',strtotime($item->RECRUTEMENT_DEADLINE)) ;?></span></td>
					                    <td><?php echo $item->RECRUTEMENT_DEMANDEUR ?></td>
					                    <td><?php echo $item->RECRUTEMENT_POSTE ?></td>
					                    <td><div class="label label-table label-warning"><?php echo $item->RECRUTEMENT_NOMBRE ?></div></td>
					                    <td><?php echo $item->RECRUTEMENT_TYPE_CONTRAT ?></td>
					                    <td><?php echo $item->RECRUTEMENT_HORAIRE_MENSUEL ?></td>
					                    <!--<td><?php //echo $item->RECRUTEMENT_QUALIFICATION ?></td>-->
					                    <td>

					                    	<div class="btn-group">
		                                        <a href="<?php echo site_url('recrutement/traiter?id='). $item->RECRUTEMENT_ID .'&status=traiter'; ?>" ><button class="btn btn-mint">Afficher</button></a>
					                        </div>
					                        
					                    </td>
					                </tr>
					            	<?php endforeach ?>
					            </tbody>
					        </table>
					    </div>
					</div>
					<!--===================================================-->
					<!-- End Striped Table -->
					

                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER--