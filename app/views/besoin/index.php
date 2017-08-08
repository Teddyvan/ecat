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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i> Liste  des besoins</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-besoin-plus"></i> Nouveau Besoin </a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Besoin association</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="besoin_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Désignation</th>
						<th>Domaine</th>
						<th>Sous domaine</th>
						<th>Insuffisance </th>
						<th>Appuie technique </th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($besoins)) :?>
									<?php foreach($besoins as $besoin ):?>
					<tr>
						<td><?=$besoin['designation']?></td>
						<td><?=$besoin['domaine']?></td>
						<td><?=$besoin['sous_domaine']?></td>
						<td><?=$besoin['insuffisance_releve']?></td>
						<td><?=$besoin['appui_technique']?></td>
					
						<td>
						<button class="seeBesoin" title="Voir details du besoin" value="<?=$besoin['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updBesoin" title="Modifier le gorupe" value="<?=$besoin['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$besoin['id']?>" class="delBesoin" title="Supprimer le besoin" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;

				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
					<th>Désignation</th>
						<th>Domaine</th>
						<th>Sous domaine</th>
						<th>Insuffisance </th>
						<th>Appuie technique </th>
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
										 <legend>Ajout d'un Besoin association</legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Designation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="designation" type="text" required="true" name="designation" placeholder="Désignation du Besoin association" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Domaines <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="domain_concerne" name='domain_concerne' class="form-control">
													<option value="-1">Choissisez le domaine</option>
												<?php foreach($domaines as $domaine) :?>
													<option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
												<?php endforeach; ?>
										
											  </select>
											</div>
										  </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Sous-domaines <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="sous_domaine" name='sous_domaine' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez le sous-domaines</option>

											  </select>
											</div>
										  </div>
										 <div class="form-group">
											<label class="col-md-3 control-label">Insuffisance releve <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " name="insuffisance_releve" id="insuffisance_releve" rows="3" placeholder="Insuffisance releve"></textarea>
											</div>
										  </div> 
										  <div class="form-group">
											<label class="col-md-3 control-label">Objet de l'appui technique <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " name="appui_technique" id="appui_technique" rows="3" placeholder=""></textarea>
											</div>
										  </div>
										    <div class="form-group">
												 <label class="col-md-3 control-label">Piece jointe <span class="required">*</span></label>
												 <div class="col-md-6">
												 <input id="fichier" type="file" required="true" name="fichier"  class="form-control required ">
												 </div>
										 </div>
										
									 <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addbesoin" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
						 </form>
				</div>
				
				<!-- /.tab-pane -->
			</div>

			
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
		<div class="col-md-3">
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
	<?php include_once("modal/updateBesoin.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/besoin.js"></script> 

