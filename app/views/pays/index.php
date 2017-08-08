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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i>  Pays</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Pays-plus"></i> Nouveau Pays</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Pays</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="pays" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Pays</th>
						<th>Abreviation</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($pays)) :?>
									<?php foreach($pays as $pay ):?>
					<tr>
						<td><?=$pay['country']?></td>
						<td><?=$pay['abreviation']?></td>
					
						<td>
						<button class="seePays" title="Voir details du pays" value="<?=$pay['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updPays" title="Modifier le pays" value="<?=$pay['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$pay['id']?>" class="delPays" title="Supprimer le pays" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;

						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Pays</th>
						<th>Abreviation</th>
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
										 <legend>Ajout d'un Pays</legend>
										  <div class="form-group">
									
										 <div class="form-group">
												 <label class="col-md-3 control-label">Pays <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="country" type="text" required="true" name="country" placeholder="Nom du Pays" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Abreviation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="abreviation" type="text" required="true" name="abreviation" placeholder="Abreviation de l'Pays" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="updannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addpay" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updatePays.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/pays.js"></script> 

