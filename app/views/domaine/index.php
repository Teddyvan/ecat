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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-domaine"></i>  domaine</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-domaine-plus"></i> Nouveau domaine</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-domaine-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des domaine</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="domaine" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Code</th>
						<th>Intitule domaine</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($domaines)) :?>
									<?php foreach($domaines as $domaine ):?>
					<tr>
						<td><?=$domaine['code']?></td>
						<td><?=$domaine['designation']?></td>
					
						<td>
						<button class="seeDomaine" title="Voir details du domaine" value="<?=$domaine['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updDomaine" title="Modifier le domaine" value="<?=$domaine['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$domaine['id']?>" class="delDomaine" title="Supprimer le domaine" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;

				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
					<th>Code</th>
					<th>Intitule domaine</th>
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
										 <legend>Ajout d'un domaine</legend>
										  <div class="form-group">
									
										 <div class="form-group">
												 <label class="col-md-3 control-label">Code <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="code" type="text" required="true" name="code" placeholder="Code" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Intitule domaine <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="designation" type="text" required="true" name="designation" placeholder="Intitule du domaine" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="Updannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addpay" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
						 </form>
				</div>
				
				<!-- /.tab-pane -->
			</div>

			<!-- /.tab-content -->
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
		<div class="col-md-3">
			  <div id="retour" style="padding-top:300px;text-align : center;margin:auto"></div>       
		</div>
		<!-- BOITE MODEL-->
	<?php include_once("modal/updateDomaine.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/domaine.js"></script> 

