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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Assistant tecnhique"></i> Assistants tecnhique</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
				<div class="box-header">
					<h3 class="box-title">Assistant technique</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form id="form" class="form-horizontal" enctype="multipart/form-data">
								 <fieldset>
										 <legend>Mise a jour profil Assistant </legend>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Identifiant <span class="required">*</span></label>
												 <div class="col-md-6">
												 <input id="identifiant" type="text" required="true" name="login" placeholder="Identifiant de connexion" value='<?=$result['login']?>' class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Mot de passe <span class="required">*</span></label>
												 <div class="col-md-6">
													 <input id="password" type="password" required="true" name="password" placeholder="Mot de passe" value='<?=$result['password']?>' class="form-control required ">
												 </div>
										 </div>
										 <div class="form-group">
												 <label class="col-md-3 control-label">Abreviation AT <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="abreviation_at" type="text" required="true" name="abreviation_at" value='<?=$result['abreviation_at']?>' placeholder="Abreviation de l'Assistant result" class="form-control required ">
												 </div>
										 </div>
										  
										  <div class="form-group">
												 <label class="col-md-3 control-label">Contact Adresse <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_adresse" value='<?=$result['contact_adresse']?>' type="text" required="true" name="contact_adresse" placeholder="Contact Adresse" class="form-control required ">
												 </div>
										 </div> 
										 <div class="form-group">
												 <label class="col-md-3 control-label">Contact Site <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_site_web" value='<?=$result['contact_site_web']?>' type="text" required="true" name="contact_site_web" placeholder="Contact site" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Phone <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_phone" value='<?=$result['contact_phone']?>' type="tel" required="true" name="contact_phone" placeholder="Contact phone" class="form-control required ">
												 </div>
										 </div> <div class="form-group">
												 <label class="col-md-3 control-label">Contact Email <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="contact_email" value='<?=$result['contact_email']?>' type="email" required="true" name="contact_email" placeholder="Contact Email" class="form-control required ">
												 </div>
												 <input type='hidden'name='id' value='<?=$result['id']?>' />
										 </div>
									<div class="box-footer">
											<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addresult" class="btn btn-primary pull-right">Enregistrer</button>
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

