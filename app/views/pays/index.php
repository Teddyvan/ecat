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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i>  Liste des offres de service</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-groupe-plus"></i> Nouvelle Offre de service</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-groupe-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Service</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="assocations" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Libelle(s)</th>
						<th>Etat</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($assocations)) :?>
									<?php foreach($assocations as $groupe ):?>
					<tr>
						<td><?=$groupe['libelle']?></td>
						<td><?=$groupe['etat']?></td>
					
						<td>
						<button class="seeGroupe" title="Voir details du groupe" value="<?=$groupe['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updGroupe" title="Modifier le gorupe" value="<?=$groupe['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$groupe['id']?>" class="delGroupe" title="Supprimer le groupe" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
							<!--<button class="chngPass" title="reinitialiser le mot de passe" value="<?=$groupe['id']?>"> <i class="fa fa-refresh"></i> </button>&nbsp;&nbsp; -->
				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Libelle(s)</th>
						<th>Etat</th>
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
										 <legend>Ajout d'une Offre de service</legend>
										  <div class="form-group">
											<label class="col-md-3 control-label">Structure <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="natTitre" name='natTitre' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez une option</option>
										
											  </select>
											</div>
										  </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Domaine(s) <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="natTitre" name='natTitre' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un domaine</option>
										
											  </select>
											</div>
										  </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Probleme identifie <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="" rows="3" placeholder="Probleme identifie"></textarea>
											</div>
										  </div> 
										  <div class="form-group">
											<label class="col-md-3 control-label">Intitule offre <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="Insuffisance releve" rows="3" placeholder="Intitule offre"></textarea>
											</div>
										  </div> 
										   <div class="form-group">
											<label class="col-md-3 control-label">Pays concerne <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="natTitre" name='natTitre' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un pays</option>
										
											  </select>
											</div>
										  </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Ouverture <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="libelle" type="date" required="true" name="ouverture" placeholder="Ouverture" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Cloture <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="libelle" type="date" required="true" name="abreviation" placeholder="Cloture" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Regularite de l'offre  <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="natTitre" name='natTitre' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='1'>Journalier</option>
												<option value='2'>Hebdomadaire</option>
												<option value='2'>Mensuelle</option>
												<option value='3'>Trimestrielle</option>
												<option value='4'>Annuelle</option>
										
											  </select>
											</div>
										  </div>
										  	 <div class="form-group">
												 <label class="col-md-3 control-label">Formulaire a telecharger <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="photo" type="file" required="true" name="photo" class="form-control required ">
												 </div>
										 </div>
										
										
									 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addgroupe" class="btn btn-primary pull-right">Enregistrer</button>
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
	  </div>
		</div>
		
		<!-- BOITE MODEL-->
	<?php include_once("modal/updatePays.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/service.js"></script> 

