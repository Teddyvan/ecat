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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Assistant tecnhique"></i> Mes Assistants tecnhique</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-technique-plus"></i> Nouvelle Assistant tecnhique</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-technique-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Assistant tecnhique</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="technique_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Identifiant</th>
						<th>Abreviation</th>
						<th>Numéro</th>
						<th>Adresse</th>
						<th>mail</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($Techniques)) :?>
									<?php foreach($Techniques as $technique ):?>
					<tr>
						<td><?=$technique['login']?></td>
						<td><?=$technique['abreviation_at']?></td>
						<td><?=$technique['contact_phone']?></td>
						<td><?=$technique['contact_adresse']?></td>
						<td><?=$technique['contact_email']?></td>
					
						<td>
						<button class="seeTechnique" title="Voir details du technique" value="<?=$technique['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updTechnique" title="Modifier le gorupe" value="<?=$technique['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$technique['id']?>" class="delTechnique" title="Supprimer le technique" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
							<!--<button class="chngPass" title="reinitialiser le mot de passe" value="<?=$technique['id']?>"> <i class="fa fa-refresh"></i> </button>&nbsp;&nbsp; -->
				
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
										 <legend>Ajout d'un Assistant technique</legend>
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
												 <label class="col-md-3 control-label">Abreviation AT <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="abreviation_at" type="text" required="true" name="abreviation_at" placeholder="Abreviation de l'Assistant technique" class="form-control required ">
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
														 <input id="contact_site_web" type="text" required="true" name="contact_site_web" placeholder="Contact site" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Phone <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_phone" type="tel" required="true" name="contact_phone" placeholder="Contact phone" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Contact Email <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_email" type="email" required="true" name="contact_email" placeholder="Contact Email" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Logo <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="photo" type="file" name="photo" class="form-control" accept="image/*">
												 </div>
										 </div> 
									<div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addtechnique" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updatetechnique.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/technique.js"></script> 

