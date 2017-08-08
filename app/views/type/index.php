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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-TypeAlertes"></i> Type d'alertes</a></li>
				<li><a href="#settings" data-toggle="tab"><i class="fa fa-TypeAlerte-plus"></i> Nouveau Type</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-TypeAlerte-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des types</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="type_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Libelle(s)</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($types)) :?>
									<?php foreach($types as $TypeAlerte ):?>
					<tr>
						<td><?=$TypeAlerte['libelle']?></td>
					
						<td>
						<button class="seeTypeAlerte" title="Voir details du TypeAlerte" value="<?=$TypeAlerte['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updTypeAlerte" title="Modifier le gorupe" value="<?=$TypeAlerte['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$TypeAlerte['id']?>" class="delTypeAlerte" title="Supprimer le TypeAlerte" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Libelle(s)</th>
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
										 <legend>Ajout d'un nouveau Type d'alerte</legend>
								
										 <div class="form-group">
												 <label class="col-md-3 control-label">Libelle <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="libelle" type="text" required="true" name="libelle" placeholder="Nom du TypeAlerte" class="form-control required ">
												 </div>
										 </div>
																				
										  <div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit"  name="addTypeAlerte" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateTypeAlerte.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/type_alerte.js"></script> 

