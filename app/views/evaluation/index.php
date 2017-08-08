<div class="row">
	<!-- /.col -->
	<div class="col-md-12">
	<div id="retour"></div>
	</div>
	</div>
<div class="row">
	<!-- /.col -->
	<div class="col-md-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i> Appel a projet </a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Evaluation-plus"></i> Nouveau Evaluation </a></li>
			<!--	<li><a href="#profile" data-toggle="tab"><i class="fa fa-Evaluation-plus"></i> Mon profile</a></li> -->
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Liste des Evaluation association</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="evaluation_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Total</th>
						<th>Date</th>
						<th>Domaine</th>
						<th>Theme</th>
						<th>Libelle</th>
						<th>note</th>
						
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($evaluations)) :?>
									<?php foreach($evaluations as $Evaluation ):?>
					<tr>
					<td></td>
						<td><?=$Evaluation['date']?></td>
						<td><?=$Evaluation['designation']?></td>
						<td><?=$Evaluation['note_moyenne']?></td>
						<!--<td>
						<button class="seeEvaluation" title="Voir details du Evaluation" value="<?=$Evaluation['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<button class="updEvaluation" title="Modifier le gorupe" value="<?=$Evaluation['id']?>"> <i class="fa fa-pencil"></i> </button>&nbsp;&nbsp;
							<button type="button" value="<?=$Evaluation['id']?>" class="delEvaluation" title="Supprimer le Evaluation" ><i class="fa fa-trash"></i> </button>&nbsp;&nbsp;
							
				
						</td> -->
					</tr>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Total</th>
						<th>Domaine</th>
						<th>Theme</th>
						<th>Libelle</th>
						<th>note</th>
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
				<table id="Theme" class="table table-hover table-bordered table-striped">
				<form id="evaluation" enctype="multipart/form-data">
					<thead>
					<tr>
						<th>Domaine</th>
						<th>Theme</th>
						<th></th>
						<th>Note</th>
						<th>Description</th>
						<th>fichier</th>
					</tr>
					</thead>
					<tbody>
					
								<?php if(!empty($r_tmp)) :?>
									<?php foreach($r_tmp as $themes ):?>
					<tr>
					
					<td style='width:95px'>
						<?php echo $themes['domaine']['designation']; unset($themes['domaine']['designation']);?>
					</td>
					
					</tr>
									<?php foreach($themes as $t ):?>
					
					<tr>
					<td></td>
					<td style='width:320px'>
						<?=$t['abreviation'];?>	
					</td>
					<td>
						<i class="fa fa-commenting-o" title='<?=$t['cplmt_theme']?>'>
					</td>
					<input type='hidden' name='idTheme[]' value='<?=$t['idTheme']?>' />
					<input type='hidden' name='idDomaine[]' value='<?=$t["idDomaine"]?>' />
					<td>
					
						<select name="note[]" class=".note">
							<?php foreach($t['note'] as $cle=>$valeur) :?>
							<option value='<?=$valeur?>'> <?=$valeur?></option>
							<?php endforeach;?>
						</select>
					</td>
					<td style='width:300px'>
					<?php if(strtolower($t['description']) == 'oui'):?>
					<textarea  id="description_activite" name="description[]"  rows="3" placeholder="Description de l'activite"></textarea>
					<?php endif;?>
					</td>
					<td style='width:170px'>
						<?php for($i = 1 ; $i <= $t['nbre_fichier']; $i++) : ?>
							<input class='.fichier' type="file" name="fichier<?=$i?>[]" class="form-control required "><br/>
						<?php endfor; ?>
					</td>
					</tr>
					<?php endforeach;?>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Domaine</th>
						<th>Theme</th>
						<th></th>
						<th>Note</th>
						<th>Description</th>
						<th>fichier</th>
					</tr>
					</tfoot>
						 <div class="box-footer">
							<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
							<button type="submit" id="updSubmit" name="addTheme" class="btn btn-primary pull-right">Enregistrer</button> 
						 </div>
					</form>
				</table>
				</div>
				
				<!-- /.tab-pane -->
			</div>

			
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
</div>

		<!-- BOITE MODEL-->

		<!-- FIN BOITE MODEL-->
<!-- /.row -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript" >
$(function()
{
	
	//datatables
	$("#evaluation_list").DataTable({
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
	/*GESTION evaluation des themes*/
$("#evaluation").submit(function(e){
	e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
	//verification primaire

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
			url: "index.php?p=Evaluation/ajouter",
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
					// effacer_formulaire();
					window.location.reload();
				}
			},
			error: function (jqxr, status,erreur) {
				$("#retour").html(jqxr.responseText+"<br />"+status);
			}
		});
});
})
</script>
