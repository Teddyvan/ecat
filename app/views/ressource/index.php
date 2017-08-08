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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i>  Liste des ressources</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-ressource-plus"></i> Nouvelle Ressource</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des ressources</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="ressource_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Date</th>
						<th>Type</th>
						<th>Theme</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($ressources)) :?>
									<?php foreach($ressources as $ressource ):?>
					<tr>
						<td><?=$ressource['date']?></td>
						<td><?=$ressource['type']?></td>
						<td><?=$ressource['theme_name']?></td>
						<td><?=$ressource['description_activite']?></td>
					
						<td>
					<!--	<button class="seeRessource" title="Voir details du ressource" value="<?=$ressource['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp; -->
						<!--	<button class="updRessource" title="Modifier le gorupe" value="<?=$ressource['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;-->
							<button type="button" value="<?=$ressource['id']?>" class="delRessource" title="Supprimer le ressource" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
						<!--	<button type="button" value="<?=$ressource['id']?>" class="downloadRessource" title="Telecharger" ><i class="fa fa-cloud-download"></i> </button>&nbsp;&nbsp;-->
							

						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Date</th>
						<th>Type</th>
						<th>Theme</th>
						<th>Description</th>
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
										 <legend>Ressource</legend>
										  <div class="form-group">
											<label class="col-md-3 control-label">Type <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="type" name='type' class="form-control">
												<option value='-1'>Type de fichier</option>
												<option value='2'>Rapport</option>
												<option value='3'>Publication</option>
												<option value='4'>Module de formation</option>
												<option value='5'>Autres</option>
										
											  </select>
											</div>
										  </div>
										   <div class="form-group">
											<label class="col-md-3 control-label">Description ressource <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="description_activite"  name="description_activite" rows="3" placeholder="Description de la ressource"></textarea>
											</div>
										  </div> 
										 
										   <div class="form-group">
											<label class="col-md-3 control-label">Theme de ratachement <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="theme" name='theme' class="form-control">
											   <option value='-1'>Selectionnez le theme </option>
												<?php foreach($domaines as $domaine):?>
															 <option value='<?=$domaine['id']?>'><?=$domaine['designation']?></option>
															<?php endforeach;?>
											  </select>
											</div>
										  </div>
										   <div class="form-group">
												 <label class="col-md-3 control-label">Fichier concerné 1 <span class="required">*</span></label>
												 <div class="col-md-6">
														 <input id="fichier1" type="file" required='true' name="fichier[]" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Fichier concerné 2 </label>
												 <div class="col-md-6">
														 <input id="fichier2" type="file"  name="fichier[]" class="form-control required ">
												 </div>
										 </div>
										  <div class="form-group">
												 <label class="col-md-3 control-label">Fichier concerné 3</label>
												 <div class="col-md-6">
														 <input id="fichier3" type="file"  name="fichier[]" class="form-control required ">
												 </div>
										 </div>
									 <div class="box-footer">
											<button id="annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" name="addressource" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateRessource.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript">
		$(function(){
		//le datatable
		$("#ressource_list").DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": false,
 			"language": {
 					 "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
 				 }
     });

		$("#annuler").click(effacer_formulaire);
		function effacer_formulaire () {
			$(':input')
			 .not(':button, :submit, :reset, :hidden')
			 .val('')
			 .prop('checked', false)
			 .prop('selected', false);
			 $('.modal').modal('hide') ;
			}


		//ajout d'un Ressource
		$("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire

			if($("#type").val() == '-1')
			{
				alert("Veuillez preciser le type ");
				return false;
			}
			if($("#theme").val() == '-1')
			{
				alert("Veuillez preciser le theme de ratachement");
				return false;
			}

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			console.log(donnees);
			//transmission des donnees
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Ressources/ajouter",
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
						effacer_formulaire();
						window.location.reload();
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});
});


		//enregistrement des mise a jours de l'Ressource
		$("#formUpdate").submit(function(e)
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
				url: "index.php?p=Ressources/saveUpdate",
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
						$('.modal').modal('hide') ;
						window.location.reload();
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});
});
	//suppression d'un Ressource
	$(".delRessource").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		console.log(donnees);
		//supprimer l'Ressource
		console.log("on supprime dans la BD");
		$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
		$.ajax({
			url: "index.php?p=Ressources/supprimer",
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
				}
			},
			error: function (jqxr, status,erreur) {
				console.log(jqxr.responseText+"<br />"+status);
			}
		});
		//supprimer la ligne
		console.log("on supprime la ligne");
		$(this).parent().parent().remove();
		console.log("on recharge la page");
	});

	/**
	* Affiche les details  modale avec les donnees
	*de l'Ressource preremplit
	*/
$(".seeRessource").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'Ressource selon l'id
	$.ajax({
		url: "index.php?p=Ressources/modifier",
		type: "POST",
		data: data,
		dataType: 'json',
		success: function (data) {
			if(data.erreur == 1)
			{
				//il ya une erreur
				$("#retour").html(data.msg);
			}else
			{
				//lancer la boite modal et preremplir les champs

				//il ya pas d'erreur
				//on lance la boite modale
				$("#updtid").val(id);
				$("#updidentifiant").val(data.data.Ressource.login);
				$("#updidentifiant").attr("disabled","disabled");

				$("#upddesignation").val(data.data.Ressource.designation);
				$("#upddesignation").attr("disabled","disabled");

				$("#updabreviation").val(data.data.Ressource.abreviation);
				$("#updabreviation").attr("disabled","disabled");

				$("#updannee").val(data.data.Ressource.annee_creation);
				$("#updannee").attr("disabled","disabled");

				$("#updpays_Ressource").val(data.data.Ressource.pays_Ressource);
				$("#updpays_Ressource").attr("disabled","disabled");

				$("#updcontact_adresse").val(data.data.Ressource.contact_adresse);
				$("#updcontact_adresse").attr("disabled","disabled");

				$("#updcontact_site").val(data.data.Ressource.contact_site);
				$("#updcontact_site").attr("disabled","disabled");

				$("#updcontact_phone").val(data.data.Ressource.contact_phone);
				$("#updcontact_phone").attr("disabled","disabled");

				$("#updcontact_email").val(data.data.Ressource.contact_email);
				$("#updcontact_email").attr("disabled","disabled");

				//desactivation des boutons
				$("#Updtannuler").attr("disabled","disabled");
				$("#updSubmit").attr("disabled","disabled");

				//desactivation des boutons
				$("#updannuler").attr("disabled","disabled");
				$("#updSubmit").attr("disabled","disabled");

				$('.modal').modal('show') ;
			}
		},
		error: function (jqxr, status,erreur) {
			$("#retour").html(jqxr.responseText+"<br />"+status);
		}
	});

}) ;

	//lance le telechargement du fichier
	/**
		* Affiche la fenetre modale avec les donnees
		*de l'Ressource preremplit
		**/
		$(".downloadRessource").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Ressource selon l'id
			$.ajax({
				url: "index.php?p=Ressources/telecharger",
				type: "POST",
				data: data,
				dataType: 'json',
				success: function (data) {
					if(data.erreur == 1)
					{
						//il ya une erreur
						console.log("ok");
						$("#retour").html(data.msg);
					}else
					{
						//lancer la boite modal et preremplir les champs

						console.log("ok");
						//il ya pas d'erreur
						$("#retour").html(data.msg);
						
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});

		});

})

</script> 

