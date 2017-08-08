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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i> Associations</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-assoc-plus"></i> Nouvelle association</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-assoc-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des assocations</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="assocations_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>

						<th>Abreviation</th>
						<th>Annee de creation</th>
						<th>Pays</th>
						<th>Contact Site</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($associations)) :?>
									<?php foreach($associations as $assoc ):?>
					<tr>
						<td><?=$assoc['abreviation']?></td>
						<td><?=$assoc['annee_creation']?></td>
						<td><?=$assoc['pays_name']?></td>
						<td><?=$assoc['contact_site']?></td>

						<td>
						<button class="seeAssociation" title="Voir details du assoc" value="<?=$assoc['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updAssociation" title="Modifier le gorupe" value="<?=$assoc['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$assoc['id']?>" class="delAssociation" title="Supprimer le assoc" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
							<!--<button class="chngPass" title="reinitialiser le mot de passe" value="<?=$assoc['id']?>"> <i class="fa fa-refresh"></i> </button>&nbsp;&nbsp; -->

						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>

					</tbody>
					<tfoot>
					<tr>
					<th>Abreviation</th>
						<th>Annee de creation</th>
						<th>Pays</th>
						<th>Contact Site</th>
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
										 <legend>Ajout d'une association</legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="identifiant" type="text" required="true" name="login" placeholder="Identifiant de connexion" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Mot de passe <span class="required">*</span></label>
												 <div class="col-md-6">
													 <input id="password" type="password" required="true" name="password" placeholder="Mot de passe" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Abreviation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="abreviation" type="text" required="true" name="abreviation" placeholder="Abreviation de l'association" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Annee de creation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="libelle" type="text" required="true" name="annee_creation" placeholder="année de creation de l'association" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Pays <span class="required">*</span></label>
											 <div class="col-md-6">
													 <select required="true" id="pays_association" name='pays_association' class="form-control">
															 <option value='-1'>Selectionnez le pays de l'association</option>
															 <?php foreach($pays as $pay):?>
																<option value='<?=$pay['id']?>'><?=$pay['country']?> - <?=$pay['abreviation']?> </option>
															<?php endforeach;?>

													 </select>
											 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Contact Adresse <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_adresse" type="text" required="true" name="contact_adresse" placeholder="Contact Adresse" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Contact Site <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_site" type="text" required="true" name="contact_site" placeholder="Contact site" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Phone <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_phone" type="text" required="true" name="contact_phone" placeholder="Contact phone" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Email <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_email" type="email" required="true" name="contact_email" placeholder="Contact Email" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addassoc" class="btn btn-primary pull-right">Enregistrer</button>
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
			  <div id="retour" style="padding-top:300px;text-align : center;margin:auto"></div>
		</div>
		<!-- BOITE MODEL-->
	<?php include_once("modal/updateAssociation.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=SERVER?>/dist/js/script/association.js"></script>
