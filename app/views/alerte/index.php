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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Alerte"></i>  Liste des alertes</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-alerte-plus"></i> Nouvelle Alerte</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des alertes</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="alerte_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Type</th>
						<th>Intitulé</th>
						<th>Description</th>
						<th>état</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($alertes)) :?>
									<?php foreach($alertes as $alerte ):?>
					<tr>
						<td><?=$alerte['type_name']?></td>
						<td><?=$alerte['intitule']?></td>
						<td><?=$alerte['description']?></td>
						<td><?= ($alerte['etat'] == 0) ? "<small class='label label-danger'><i class='fa fa-clock-o'></i> En attente de validation </small>" : "<small class='label label-success'><i class='fa fa-clock-o'></i> Validé </small>" ?></td>
					
						<td>
						<button class="seeAlerte" title="Voir details du Alerte" value="<?=$alerte['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updAlerte" title="Modifier le Alerte" value="<?=$alerte['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$alerte['id']?>" class="delAlerte" title="Supprimer le Alerte" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Type</th>
						<th>Intitulé</th>
						<th>Description</th>
						<th>état</th>
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
						 <form id="form" class="form-horizontal" >
								 <fieldset>
										 <legend>Ajout d'un Alerte</legend>
										 <div class="form-group">
											<label class="col-md-3 control-label">Type  <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="type" name='type' class="form-control">
												<option value='-1'>Selectionnez un type</option>
												<?php foreach($types as $type):?>
												 <option value='<?=$type['id']?>'><?=$type['libelle']?></option>
												<?php endforeach;?>
											 </select>
											</div>
										  </div>
										  	  <div class="form-group">
											 <label class="col-md-3 control-label">Anonyme <span class="required">*</span></label>
											 <div class="col-md-6">
											  <select  id="anonyme" name="anonyme" class="form-control">
												<option value='1'>Non-Anonyme</option>
												<option value='2'>Anonyme</option>
											 </select>
											 </div>
										</div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Intitulé <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="intitule" type="text" required="true" name="intitule" placeholder="Intitule de l'alerte" class="form-control required ">
											 </div>
										</div>
									
										 <div class="form-group">
											 <label class="col-md-3 control-label">Description <span class="required">*</span></label>
											<div class="col-md-6">
											<textarea class="form-control " id="description" name="description" rows="5" placeholder="Description de l'activite"></textarea>
											</div>
										 </div>
										
									 <div class="box-footer">
										<button id="Annuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
										<button type="submit" id="updSubmit" name="addalerte" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateAlerte.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 

<!--<script src="<?=SERVER?>/dist/js/script/Alerte.js"></script> -->
<script type='text/javascript'>
  $(function () {
	  //le datatable
		$("#alerte_list").DataTable({
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
	  //datepicker
	
	 //vide le forms
	 $("#annuler").click(effacer_formulaire);
	 $("#Updtannuler").click(effacer_formulaire);
	 function effacer_formulaire ()
	 {
		$(':input')
		 .not(':button, :submit, :reset, :hidden')
		 .val('')
		 .prop('checked', false)
		 .prop('selected', false);
	}

  $("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire

			if($("#type").val() == '-1')
			{
				alert("Veuillez selectionner le type de l'alerte svp !!");
				return false ;
			}
			
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = {};
			donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			//transmission des donnees
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Alerte/ajouter",
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
		
		/*VISUALISATION DETAILS Alerte*/
		$(".seeAlerte").click(function()
		{
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Alerte selon l'id
			$.ajax({
				url: "index.php?p=Alerte/modifier",
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
						$("#retour").html("");
						//on lance la boite modale
						$("#updtid").val(id);
						$("#updtype").attr("disabled","disabled");
						$("#updtype").val(data.data.Alerte.type);
						$("#updanonyme").val(data.data.Alerte.anonyme);
						$("#updanonyme").attr("disabled","disabled");
						$("#updintitule").val(data.data.Alerte.intitule);
						$("#updintitule").attr("disabled","disabled");
						$("#upddescription").val(data.data.Alerte.description);
						$("#upddescription").attr("disabled","disabled");
						
						
						//desactivation des boutons
						$("#updtannuler").attr("disabled","disabled");
						$("#updSubmit").attr("disabled","disabled");

						$('.modal').modal('show') ;
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});

		});
		
		/*MODIFICATION Alerte*/
		$(".updAlerte").click(function()
		{
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Alerte selon l'id
			$.ajax({
				url: "index.php?p=Alerte/modifier",
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
						$("#retour").html("");
						//on lance la boite modale
						$("#updtype").removeAttr("disabled");
						$("#updtype").val(data.data.Alerte.type);
						$("#updanonyme").val(data.data.Alerte.anonyme);
						$("#updanonyme").removeAttr("disabled");
						$("#updintitule").val(data.data.Alerte.intitule);
						$("#updintitule").removeAttr("disabled");
						$("#upddescription").val(data.data.Alerte.description);
						$("#upddescription").removeAttr("disabled");
						
						//desactivation des boutons
						$("#updannuler").removeAttr("disabled");
						$("#updSubmit").removeAttr("disabled");
						$('.modal').modal('show') ;
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});

		});

		/*SAUvegarde mise a jour*/
		//enregistrement des mise a jours de l'alertes
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
				url: "index.php?p=Alerte/saveUpdate",
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
		
		/*Suppression d'une Alerte*/
		$(".delAlerte").click(function(){
		var result = confirm('Supprimer cette Alerte ?');
		if(result)
		{
				var id = $(this).attr("value");
				var donnees = {};
				donnees.id = id ;
				console.log(donnees);
				//supprimer l'alertes
				console.log("on supprime dans la BD");
				$.ajax({
					url: "index.php?p=Alerte/supprimer",
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
			}
			
		});
		

});
</script>
