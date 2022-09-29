 <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Plateforme d'envoi SMS</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">SMS</a></li>
					<li class="active">Liste des sms envoyés</li>
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
					        <h3 class="panel-title">Liste de vos sms envoyés <span class="label label-danger">( <?php echo $nbr.' envoi(s) jusqu\'ici';?> )</span> </h3>
					    </div>
					    
					    <div class="panel-body">
					    	<div class="row">
						    	<div class="col-xs-2">
							    	<a href='<?php echo site_url('smsapi/affiche?type=nouveau'); ?>' class='btn btn-purple'>Envoyer un nouvel sms</a>
							    </div>

							    <div class="col-xs-3">
							    	<a href='<?php echo site_url('smsapi/multiple?type=nouveau'); ?>' class='btn btn-purple'>Envoi sms multiple</a>
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
					                    <th>Numéro du SMS</th>
					                    <th class="min-tablet">Numéro téléphone</th>
					                    <th class="min-tablet">Nom destinataire</th>
					                    <th class="min-desktop">Code IBAN</th>
					                    <th class="min-tablet">Mail destinataire</th>
					                    <th >Actions</th>
					                </tr>
					            </thead>
					            <tbody>
					            <?php foreach($rowsms as $item) :?>
					                <tr class=''>
					                    <td><a href="#" class="btn-link"><?php echo $item->id_sms ;?></a></td>
					                    <td><a href="#" class="btn-link"><?php echo $item->sms_tel ?></a></td>
					                    <td><?php echo $item->sms_dest ?></td>
					                    <td><?php echo $item->sms_codeIBAN ?></td>
					                    <td><?php echo $item->sms_email ?></td>
					                    <td>
					                    	<div class="btn-group">
		                                        <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="<?php echo site_url("smsapi/affiche?id=$item->id_sms&type=visualiser"); ?>" data-original-title="Afficher" data-container="body"></a>
		                                        <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Supprimer" data-container="body"></a>
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
            <!--END CONTENT CONTAINER-->