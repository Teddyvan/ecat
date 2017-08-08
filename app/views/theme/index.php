<div class="row">
	<!-- /.col -->
	<div class="col-md-12">
	<div id="retour"></div>
	</div>
	</div>
<div class="row">
	<!-- /.col -->
	<div class="col-md-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Theme"></i>  Theme</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Theme-plus"></i> Nouveau Theme</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-Theme-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Theme</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="Theme" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Domaine</th>
						<th>Abreviation Theme</th>
						<th>Theme</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($Theme)) :?>
									<?php foreach($Theme as $theme ):?>
					<tr>
						<td><?=$theme['domaine']?></td>
						<td><?=$theme['abreviation']?></td>
						<td><?=$theme['cplmt_theme']?></td>
					
						<td>
						<button class="seeTheme" title="Voir details du Theme" value="<?=$theme['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;
&nbsp;
				<button class="updTheme" title="Modifier le Theme" value="<?=$theme['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;
	<button type="button" value="<?=$theme['id']?>" class="delTheme" title="Supprimer le Theme" ><i class="fa fa-trash"></i> </button>&nbsp;
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Domaine</th>
						<th>Abreviation Theme</th>
						<th>Theme</th>
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
										 <legend>Ajout d'un Theme</legend>
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
												 <label class="col-md-3 control-label">Abreviation Theme <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="abreviation" type="text" required="true" name="abreviation" placeholder="Abreviation du Theme" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Complement Theme <span class="required">*</span></label>
												 <div class="col-md-6">
													<textarea class="form-control " id="cplmt_theme" name="cplmt_theme" rows="3" placeholder=""></textarea>
												 </div>
										 </div>
										
									 <div class="box-footer">
											<button id="UpdtAnnuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addTheme" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateTheme.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/theme.js"></script> 

