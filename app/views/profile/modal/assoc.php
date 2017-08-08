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
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form id="form" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <legend>Mise a jour d'une association</legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="identifiant" type="text" required="true" name="login" placeholder="Identifiant de connexion" class="form-control required" value="<?=$result['login']?>">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Mot de passe <span class="required">*</span></label>
												 <div class="col-md-6">
													 <input id="password" type="password" required="true" name="password" placeholder="Mot de passe" class="form-control required" value='<?=$result['password']?>'>
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Abreviation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="abreviation" type="text" required="true" name="abreviation" placeholder="Abreviation de l'association" class="form-control required" value='<?=$result['abreviation']?>'>
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Annee de creation <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="libelle" type="text" required="true" name="annee_creation" placeholder="année de creation de l'association" class="form-control required" value='<?=$result['annee_creation']?>'>
												 </div>
										 </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Pays <span class="required">*</span></label>
											 <div class="col-md-6">
													 <select required="true" id="pays_association" name='pays_association' class="form-control">
													  <option value='<?=$result['pays_association']?>'><?=$result['pays_name']?></option>
															 <?php foreach($pays as $pay):?>
																<option value='<?=$pay['id']?>'><?=$pay['country']?> - <?=$pay['abreviation']?> </option>
															<?php endforeach;?>
														
													 </select>
											 </div>
										 </div>	
										  <div class="form-group">
												 <label class="col-md-3 control-label">Contact Adresse <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_adresse" type="text" required="true" name="contact_adresse" placeholder="Contact Adresse" class="form-control required" value='<?=$result['contact_adresse']?>'>
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Contact Site <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_site" type="text" required="true" name="contact_site" placeholder="Contact site" class="form-control required" value='<?=$result['contact_site']?>' >
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Phone <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_phone" type="text" required="true" name="contact_phone" placeholder="Contact phone" class="form-control required" value='<?=$result['contact_phone']?>'>
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Contact Email <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_email" type="email" required="true" name="contact_email" placeholder="Contact Email" class="form-control required" value='<?=$result['contact_email']?>'>
												 </div>
												 <input type='hidden'name='id' value='<?=$result['id']?>' />
										 </div>
									 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addassoc" class="btn btn-primary pull-right">Enregistrer</button>
										 </div>
								 </fieldset>
						 </form>
			</div>
			<!-- /.box-body -->
		</div>
					<!-- /.post -->
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
				url: "index.php?p=Association/saveUpdate",
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



