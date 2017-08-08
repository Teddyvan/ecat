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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Assistant tecnhique"></i> Administrateur</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
				<div class="box-header">Administrateur</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form id="form" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <legend>Informations personnelles</legend>
								
										 <div class="form-group">
												 <label class="col-md-3 control-label">Nom <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="nom" type="text" value='<?=$result['nom']?>' required="true" name="nom" placeholder="Nom" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">PrÃ©nom <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="prenom" type="text" value='<?=$result['prenom']?>' required="true" name="prenom" placeholder="PrÃ©nom" class="form-control required ">
												 </div>
										 </div>
										 
								 </fieldset>
								 <fieldset>
										 <legend>Informations supplementaires</legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="login" type="text" value='<?=$result['login']?>' required="true" name="login" placeholder="Identifiant" class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label for="mdp" class="col-md-3 control-label">Mot de passe <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="mdp" value='<?=$result['password']?>' type="password" required="true" name="password" class="form-control required ">
												 </div>
										 </div>
										 
										  <div class="form-group">
												 <label class="col-md-3 control-label">Groupe <span class="required">*</span></label>
												 <div class="col-md-6">
													 <select required="true" id="updtprofile" name='idGroupe' class="form-control">
															 <option value='-1'>Selectionnez le groupe de l'utilsateur</option>
															 
																<?php foreach($groupes as $groupe):?>
																 <option value ='<?=$groupe['id']?>'><?=$groupe['libelle']?></option>
																<?php endforeach ; ?>
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
										 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addUser" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
						 </form>
				</div>
				<!-- /.box-body -->
			</div>
					<!-- /.post -->
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
		
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script >
$(function(){
	//enregistrement des mise a jours de l'Association
		$("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			//transmission des donnees
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Technique/saveUpdate",
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
						//rafraichir la liste
//						window.location.reload();
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});
});
})
</script> 

