
<div class="row">
	<!-- /.col -->
	<div class="col-md-12">
	<h1> Plan comptable</h1>
	</div>
	</div>
<div class="row">
	<!-- /.col -->
	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-users"></i> Liste des comptes</a></li>
				<li><a href="#settings" data-toggle="tab"><i class="fa fa-plus"></i> Nouveau compte</a></li>
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
						<th>Télephone</th>
						<th>login</th>
						<th>privilege</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($utilisateurs)) :?>
									<?php foreach($utilisateurs as $user ):?>
					<tr>
						<td><?=$user['nom']?></td>
						<td><?=$user['prenom']?></td>
						<td><?=$user['telephone']?></td>
						<td><?=$user['login']?></td>
						<td><?=$user['profile']?></td>
					
						<td> <a href="#" title="modifier"> <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
								 <a href="#" title="Supprimer"> <i class="fa fa-trash"></i></a>&nbsp;&nbsp;
								 <a href="#" title="Reinitialiser mot de passe"> <i class="fa fa-refresh"></i></a>&nbsp;&nbsp;
							</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Nom</th>
						<th>Prénom(s)</th>
						<th>Télephone</th>
						<th>login</th>
						<th>privilege</th>
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
										 <div class="form-group">
												 <label class="col-md-3 control-label">Téléphone <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="tel" type="tel" required="true" name="telephone" placeholder="70XXXXXX" class="form-control required ">
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
												 <label class="col-md-3 control-label">Mot de passe <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="mdp" type="password" required="true" name="mdp" class="form-control required fonction">
												 </div>
										 </div>
										 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Profile<span class="required">*</span></label>
												 <div class="col-md-6">
														 <select required="true" id="profile" name='profile' class="form-control">
																 <option value='-1'>Selectionnez le profile de l'utilsateur</option>
																 <option>Administrateur</option>
																 <option>comptable</option>
														 </select>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Etat <span class="required">*</span></label>
												 <div class="col-md-6">
														 <select required="true" id="etat" name='etat' class="form-control">
																 <option value='-1'>Selectionnez l'etat de l'utilsateur</option>
																 <option>Actif </option>
																 <option>Inactif</option>
														 </select>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">photo <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="photo" type="file" name="photo" class="form-control" accept="image/*">
												 </div>
										 </div>
										 <div class="box-footer">
											<button id="annuler"  class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addUser" class="btn btn-primary pull-right">Enregistrer</button>
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
<!-- /.row -->
 <?php require_once("modal/updateProfile.php") ;?>
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
	$(function(){
		$("#annuler").click(effacer_formulaire);
		function effacer_formulaire () {
			$(':input')
			 .not(':button, :submit, :reset, :hidden')
			 .val('')
			 .prop('checked', false)
			 .prop('selected', false);
			};
		//on donne le focus au champ matricule
		$("#matricule").focus();

		$("#form").submit(function(e){ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			if($("#profile").val() == '-1')
			{
				alert("Veuillez preciser le profile de l'utilisateur");
				return false;
			}
			if($("#etat").val() == '-1')
			{
				alert("Veuillez preciser l'etat du compte utilisateur");
				return false;
			}
			
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé
			
			alert(donnees);
			console.log(donnees);
			//transmission des donnees
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Utilisateur/ajouter",
				type: "POST",
				data: donnees,
				dataType: 'json',
				success: function (data) {
					if(data.erreur == 1)
					{
						//il ya une erreur
						$("#retour").html(data.msg);
					}else
					{
						//il ya pas d'erreur
						$("#retour").html(data.msg);
						//effacer_formulaire();
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});
});


	})
</script>
