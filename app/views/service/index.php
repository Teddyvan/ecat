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
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Service-plus"></i> Nouvelle Offre de service</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-Service-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Service</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="offre_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Pays</th>
						<th>Domaine</th>
						<th>Intitulé de l'offre</th>
						<th>Ouverture</th>
						<th>Fermeture</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($services)) :?>
									<?php foreach($services as $service ):?>
					<tr>
						<td><?=$service['pays_name']?></td>
						<td><?=$service['domaine']?></td>
						<td><?=$service['offer_designation']?></td>
						<td><?=$service['date_ouverture']?></td>
						<td><?=$service['date_fermeture']?></td>
					
						<td>
						<button class="seeService" title="Voir details du Service" value="<?=$service['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;
							<button class="updService" title="Modifier le service" value="<?=$service['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;
							<button type="button" value="<?=$service['id']?>" class="delService" title="Supprimer le Service" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
						
				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Pays</th>
						<th>Domaine</th>
						<th>Intitulé de l'offre</th>
						<th>Date Ouverture</th>
						<th>Date Fermeture</th>
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
											<label class="col-md-3 control-label">Domaine(s) <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="domaine" name='domaine' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un domaine</option>
													<?php foreach($domaines as $domaine):?>
															 <option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
															<?php endforeach;?>
											  </select>
											</div>
										  </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Probleme identifie <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="probleme_identify" name='probleme_identify' rows="3" placeholder="Probleme identifie"></textarea>
											</div>
										  </div> 
										  <div class="form-group">
											<label class="col-md-3 control-label">Intitule offre <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " name='offer_designation' id="offer_designation" rows="3" placeholder="Intitule offre"></textarea>
											</div>
										  </div> 
										   <div class="form-group">
											<label class="col-md-3 control-label">Pays concerne <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="country_concerne" name='country_concerne' class="form-control">
												<!--<option value="">Choissisez l'agence</option>-->
												<option value='-1'>Selectionnez un pays</option>
												<?php foreach($pays as $pay):?>
															 <option value='<?=$pay['id']?>'><?=$pay['country']?></option>
															<?php endforeach;?>
											  </select>
											</div>
										  </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Ouverture <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="date_ouverture" type="date" required="true" name="date_ouverture" placeholder="Ouverture" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Cloture <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="date_fermeture" type="date" required="true" name="date_fermeture" placeholder="Cloture" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
											<label class="col-md-3 control-label">Regularite de l'offre  <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="frequence" name='frequence' class="form-control">
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
														 <input id="fichier" type="file"  name="fichier" class="form-control required ">
												 </div>
										 </div>
										
										
									 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addService" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateService.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/service.js"></script> 

