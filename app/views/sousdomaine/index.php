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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Sous domaine"></i>  Sous domaine</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Sousdomaine-plus"></i> Nouveau Sous domaine</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-Sousdomaine-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Sous domaine</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="Sous domaine" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Domaine</th>
						<th>Sous domaine</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($sousdomaine)) :?>
									<?php foreach($sousdomaine as $Sousdomaine ):?>
					<tr>
						<td><?=$Sousdomaine['domaine']?></td>
						<td><?=$Sousdomaine['sous_domaine_designation']?></td>
					
						<td>
						<button class="seeSousdomaine" title="Voir details du Sous domaine" value="<?=$Sousdomaine['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updSousdomaine" title="Modifier le Sous domaine" value="<?=$Sousdomaine['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$Sousdomaine['id']?>" class="delSousdomaine" title="Supprimer le Sous domaine" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
							<!--<button class="chngPass" title="reinitialiser le mot de passe" value="<?=$Sousdomaine['id']?>"> <i class="fa fa-refresh"></i> </button>&nbsp;&nbsp; -->
				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Nom</th>
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
										 <legend>Ajout d'un Sous domaine</legend>
									 <div class="form-group">
												 <label class="col-md-3 control-label">Domaine <span class="required">*</span></label>
												 <div class="col-md-6">
													 <select required="true" id="domaine_concern" name='domaine_concern' class="form-control">
															 <option value='-1'>Selectionnez le domaine</option>
															<?php foreach($domaines as $domaine):?>
															 <option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
															<?php endforeach;?>
													 </select>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Intitule Sous domaine <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="sous_domaine_designation" type="text" required="true" name="sous_domaine_designation" placeholder="Intitule du Sous domaine" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addSousdomaine" class="btn btn-primary pull-right">Enregistrer</button>
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
			  <div id="retour" style="padding-top:300px;text-align : center;margin:auto"></div>       
		</div>
		<!-- BOITE MODEL-->
	<?php include_once("modal/updateSousDomaine.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/sous_domaine.js"></script> 

