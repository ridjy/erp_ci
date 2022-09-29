 <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Utilisateurs</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Utilisateurs</a></li>
					<li class="active">Liste des utilisateurs</li>
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
					        <h3 class="panel-title">Liste des utilisateurs</h3>
					    </div>
					    
					    <div class="panel-body">
					    	<div class="row">
						    	<div class="col-xs-3">
							    	<a href='<?php echo site_url('user/affiche?type=nouveau'); ?>' class='btn btn-purple'>Ajouter un utilisateur</a>
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
					                    <th>#</th>
					                    <th>Identifiant</th>
					                    <th class="min-tablet">Mail</th>
					                    <th class="min-tablet">Poste</th>
					                    <th class="min-desktop">Statut</th>
					                    <th class="min-tablet">Dernière activité</th>
					                    <th >Actions</th>
					                </tr>
					            </thead>
					            <tbody>
					            <?php foreach($rowusers as $item) :?>
					                <tr class=''>
					                    <td><a href="#" class="btn-link"><?php echo $item->USER_ID ;?></a></td>
					                    <td><a href="#" class="btn-link"><?php echo $item->USER_LOGIN ?></a></td>
					                    <td><?php echo $item->USER_MAIL ?></td>
					                    <td><?php echo $item->USER_POSTE ?></td>
					                    <td><!--actif ou inactif--><?php 
					                    if ($item->USER_ACTIF==1) {
					                    	$lib='Actif';
					                 		$actif='success';	
					                    }else{
					                    	$lib='Inactif';
					                    	$actif='danger';
					                    }?><div class="label label-table label-<?php echo $actif ?>"><?php echo $lib; ?></div></td>
					                    
					                    <td><span class="text-danger text-semibold"><?php echo date('d-m-Y H:i:s',strtotime($item->USER_LASTACTIVITY)) ;?></span></td>
					                      <td>
					                    	<div class="btn-group">
		                                        <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="<?php echo site_url("user/affiche?id=$item->USER_ID&type=modif"); ?>" data-original-title="Modifier" data-container="body"></a>
		                                        <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="<?php echo site_url("user/affiche?id=$item->USER_ID&type=suppr"); ?>" data-original-title="Desactiver" data-container="body"></a>
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