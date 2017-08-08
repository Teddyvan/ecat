<div class="row">
	<!-- /.col -->
	<div class="col-md-12">
	<div id="retour"></div>
	</div>
	</div>
<div class="row">
	<!-- /.col -->
	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i> Liste des activités </a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Activite-plus"></i> Nouvelle Activité				 </a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-Activite-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des activités</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="activite_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Catégorie de l'activite</th>
						<th>Titre de l'activite</th>
						<th>Domaine</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($Activites)) :?>
									<?php foreach($Activites as $Activite ):?>
					<tr>
						<?php if($Activite['categorie'] == 1) :?>
						<td>Activite en cours </td>
						<?php endif ;?>
						<?php if($Activite['categorie'] == 2) :?>
						<td>Activite passé </td>
						<td><?php endif ;?></td>
						<td><?=htmlspecialchars($Activite['titre_activite'])?></td>
						<td><?=htmlspecialchars($Activite['domaine'])?></td>
						<td><?=htmlspecialchars($Activite['description_activite'])?></td>
					
						<td>
						<button class="seeActivite" title="Voir details du Activite" value="<?=$Activite['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updActivite" title="Modifier le gorupe" value="<?=$Activite['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$Activite['id']?>" class="delActivite" title="Supprimer le Activite" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;

						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Catégorie de l'activite</th>
						<th>Titre de l'activite</th>
						<th>Domaine</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
					<!-- /.post -->
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="settings">
				 <div class="box-body">
						 <form id="form" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <legend>Activite </legend>
										  <div class="form-group">
											<label class="col-md-3 control-label">Cat <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="categorie" name='categorie' class="form-control">
												<option value='1'>Activite en cours</option>
												<option value='2'>Activite passé</option>
										
											  </select>
											</div>
										  </div>
										  
										  <div class="form-group">
												 <label class="col-md-3 control-label">Titre activite <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="titre_activite" type="text" required="true" name="titre_activite" placeholder="titre de l'activite" class="form-control required ">
												 </div>
										 </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Domaine <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="domaine_concerne" name='domaine_concerne' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un domaine</option>
												<?php foreach($domaines as $domaine) :?>
													<option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
												<?php endforeach; ?>
											  </select>
											</div>
										  </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Description Activite <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="description_activite" name="description_activite" rows="3" placeholder="Description de l'activite"></textarea>
											</div>
										  </div> 
										
										 
									 <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addActivite" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
						 </form>
				</div>
				
				<!-- /.tab-pane -->
			</div>

			<!-- /.tab-content -->
			<div class="tab-pane" id="profile">
				
				 <div class="box-body">
						
				</div>
				
				<!-- /.tab-pane -->
			</div>
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
		<<div class="col-md-3">
                      <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Evenement</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
                        
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					 <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Ressource documentaire</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
                        
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					 <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Boite a outils</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
                        
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					  <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Partenaires du PRF</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
						  
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
						<div id="evts" class="demo"></div>
                       <img style="text-align:center;height:200px;width:200px" src="<?=SERVER?>/dist/img/partenaires_prf.jpg" alt="logo ecat" />
                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
					 <div class="box box-warning">
                      <div class="box-header with-border">
                         <h3 class="box-title">Organisation porteuse</h3>

                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                         </div>
                         <!-- /.box-tools -->
                       </div>
                       <!-- /.box-header -->

                       <div class="box-body">
                         <section class="sidebar">
					<div id="evts" class="demo"></div>
							 <img style="align:center" src="<?=SERVER?>/dist/img/logo_rame.jpg" alt="logo ecat" />

                       </section>
                       </div>

                       <!-- /.box-body -->
                     </div>
	  </div>
		</div>
		<!-- BOITE MODEL-->
	<?php include_once("modal/updateActivite.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/activite.js"></script> 

