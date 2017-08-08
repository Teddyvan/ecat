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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-users"></i> Mes utilisateurs</a></li>
				<li><a href="#settings" data-toggle="tab"><i class="fa fa-user-plus"></i> Nouveau utilisateur</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-user-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des utilisateurs</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="users" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom(s)</th>
						<th>login</th>
						<th>Groupe</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($utilisateurs)) :?>
									<?php foreach($utilisateurs as $user ):?>
					<tr>
						<td><?=$user['nom']?></td>
						<td><?=$user['prenom']?></td>
						<td><?=$user['login']?></td>
						<td><?=$user['groupe']?></td>
					
						<td>
						<button class="seeUser" title="Voir details de l'utilisateur" value="<?=$user['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updUser" title="Modifier l'utilisateur" value="<?=$user['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$user['id']?>" class="delUser" title="Supprimer l'utilisateur" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Nom</th>
						<th>Prénom(s)</th>
						<th>login</th>
						<th>Groupe</th>
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
										 <legend>Informations personnelles</legend>
								
										 <div class="form-group">
												 <label class="col-md-3 control-label">Nom <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="nom" type="text" required="true" name="nom" placeholder="Nom" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Prénom <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="prenom" type="text" required="true" name="prenom" placeholder="Prénom" class="form-control required ">
												 </div>
										 </div>
										 
								 </fieldset>
								 <fieldset>
										 <legend>Informations supplementaires</legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="login" type="text" required="true" name="login" placeholder="Identifiant" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label for="mdp" class="col-md-3 control-label">Mot de passe <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="mdp" type="password" required="true" name="password" class="form-control required ">
												 </div>
										 </div>
										 
										  <div class="form-group">
												 <label class="col-md-3 control-label">Groupe <span class="required">*</span></label>
												 <div class="col-md-6">
													 <select required="true" id="updtprofile" name='idGroupe' class="form-control">
															
															 <option value='1'>Admin</option>
																
													 </select>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Etat <span class="required">*</span></label>
												 <div class="col-md-6">
														 <select required="true" id="etat" name='etat' class="form-control">
																 <option value='-1'>Selectionnez l'etat de l'utilsateur</option>
																 <option value="1">Actif </option>
																 <option value="0">Inactif</option>
														 </select>
												 </div>
										 </div>
										<div class="form-group">
												 <label class="col-md-3 control-label">Logo <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="photo" type="file" name="photo" class="form-control" accept="image/*">
												 </div>
										 </div> 
										 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addUser" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateProfile.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?=SERVER?>/dist/js/script/Utilisateur.js"></script> 

