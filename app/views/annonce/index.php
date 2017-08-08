  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-annonce"></i>  annonce</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-pay-plus"></i> Nouvelle annonce</a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-pay-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des annonce</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="annonce_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Titre</th>
						<th>Lieu</th>
						<th>Date début</th>
						<th>Date fin</th>
						<th>annonce</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($Annonce)) :?>
									<?php foreach($Annonce as $pay ):?>
					<tr>
						<td><?=$pay['titre']?></td>
						<td><?=$pay['lieu']?></td>
						<td><?=$pay['date_debut']?></td>
						<td><?=$pay['date_fin']?></td>
						<td><?=$pay['contenu']?></td>
					
						<td>
						<button class="seeAnnonce" title="Voir details du annonce" value="<?=$pay['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updAnnonce" title="Modifier le annonce" value="<?=$pay['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$pay['id']?>" class="delAnnonce" title="Supprimer le annonce" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
				
						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Titre</th>
						<th>Lieu</th>
						<th>Date début</th>
						<th>Date fin</th>
						<th>annonce</th>
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
										 <legend>Ajout d'un annonce</legend>
										 <div class="form-group">
											<label class="col-md-3 control-label">Categorie <span class="required">*</span></label>
											<div class="col-md-6">
											  <select required="true" id="categorie" name='categorie' class="form-control">
												<option value='-1'>Selectionnez une categorie</option>
												<option value='1'>Seminaire</option>
												<option value='2'>Conference</option>
												<option value='3'>Atelier</option>
												<option value='4'>Autres céremonie</option>
										
											  </select>
											</div>
										  </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Titre <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="libelle" type="text" required="true" name="titre" placeholder="Titre de l'annonce" class="form-control required ">
											 </div>
										 </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Date début <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="date_debut" type="text" required="true" name="date_debut" placeholder="date de debut" class="form-control required ">
											 </div>
										 </div>
										 <div class="form-group">
											 <label class="col-md-3 control-label">Date Fin <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="date_fin" type="text" required="true" name="date_fin" placeholder="date de fin" class="form-control required ">
											 </div>
										 </div> 
										 <div class="form-group">
											 <label class="col-md-3 control-label">Lieu <span class="required">*</span></label>
											 <div class="col-md-6">
											 <input id="lieu" type="text" required="true" name="lieu" placeholder="lieu" class="form-control required ">
											 </div>
										 </div> 
										 <div class="form-group">
											 <label class="col-md-3 control-label">Contenu <span class="required">*</span></label>
											 <div class="col-md-6">
											<textarea id="editor1" class="form-control" name="contenu" rows="10"  >
															
											</textarea>
											 </div>
										 </div>
									
										
									 <div class="box-footer">
											<button id="updtAnnuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
											<button type="submit" id="updSubmit" name="addpay" class="btn btn-primary pull-right">Enregistrer</button>
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
	<?php include_once("modal/updateAnnonce.php"); ?>
		<!-- FIN BOITE MODEL-->
<!-- /.row -->

<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=SERVER?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!--<script src="<?=SERVER?>/dist/js/script/annonce.js"></script> -->
<script type='text/javascript'>
  $(function () {
	  //le datatable
		$("#annonce_list").DataTable({
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
	$( "#date_debut" ).datepicker({dateFormat:"yy-mm-dd"});
	$( "#date_fin" ).datepicker({dateFormat:"yy-mm-dd"});
	$( "#upddate_debut" ).datepicker({dateFormat:"yy-mm-dd"});
	$( "#upddate_fin" ).datepicker({dateFormat:"yy-mm-dd"});
	 //vide le forms
	 $("#Updtannuler").click(effacer_formulaire);
	 function effacer_formulaire ()
	 {
		$(':input')
		 .not(':button, :submit, :reset, :hidden')
		 .val('')
		 .prop('checked', false)
		 .prop('selected', false);
	}
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
  // CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
 //   $("editor1").wysihtml5();
	// CKEDITOR.replace('updeditor1');
    //bootstrap WYSIHTML5 - text editor
    //$("updeditor1").wysihtml5();
	
  $("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire

			var contenu_editor = CKEDITOR.instances.editor1.getData() ;
			if(contenu_editor == '')
			{
				alert("Veuillez saisir l'annonce svp !!");
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
				url: "index.php?p=Annonce/ajouter",
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
		
		/*VISUALISATION DETAILS ANNONCE*/
		$(".seeAnnonce").click(function()
		{
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Annonce selon l'id
			$.ajax({
				url: "index.php?p=Annonce/modifier",
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
						$("#updcategorie").attr("disabled","disabled");
						$("#updcategorie").val(data.data.Annonce.categorie);
						$("#updtitre").val(data.data.Annonce.titre);
						$("#updtitre").attr("disabled","disabled");
						$("#upddate_debut").val(data.data.Annonce.date_debut);
						$("#upddate_debut").attr("disabled","disabled");
						$("#upddate_fin").val(data.data.Annonce.date_fin);
						$("#upddate_fin").attr("disabled","disabled");
						$("#updlieu").val(data.data.Annonce.lieu);
						$("#updlieu").attr("disabled","disabled");
						// CKEDITOR.instances['updeditor1'].setData(data.data.Annonce.contenu);
						$("#updeditor1").val(data.data.Annonce.contenu);
						$("#updeditor1").attr("disabled","disabled");
						
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

		});
		
		/*MODIFICATION annonce*/
		$(".updAnnonce").click(function()
		{
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Annonce selon l'id
			$.ajax({
				url: "index.php?p=Annonce/modifier",
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
						$("#updcategorie").removeAttr("disabled");
						$("#updcategorie").val(data.data.Annonce.categorie);
						$("#updtitre").val(data.data.Annonce.titre);
						$("#updtitre").removeAttr("disabled");
						$("#upddate_debut").val(data.data.Annonce.date_debut);
						$("#upddate_debut").removeAttr("disabled");
						$("#upddate_fin").val(data.data.Annonce.date_fin);
						$("#upddate_fin").removeAttr("disabled");
						$("#updlieu").val(data.data.Annonce.lieu);
						$("#updlieu").removeAttr("disabled");
						//retirer les balises <p></p> du texte
					/*	var content = data.data.Annonce.contenu.replace('&lt;p&gt;','');
						content = content.replace('&lt;/p&gt;','');
						console.log("content" +content);
						CKEDITOR.instances['updeditor1'].setData(content); */
						$("#updeditor1").val(data.data.Annonce.contenu);
						$("#updeditor1").removeAttr("disabled");
						
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
		//enregistrement des mise a jours de l'Pays
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
				url: "index.php?p=Annonce/saveUpdate",
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
		
		/*Suppression d'une annonce*/
		$(".delAnnonce").click(function(){
		var result = confirm('Supprimer cette annonce ?');
		if(result)
		{
				var id = $(this).attr("value");
				var donnees = {};
				donnees.id = id ;
				console.log(donnees);
				//supprimer l'Pays
				console.log("on supprime dans la BD");
				$.ajax({
					url: "index.php?p=Annonce/supprimer",
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
