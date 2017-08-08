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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-Theme"></i>  Parametrage</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Themes a parametrer</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<form id="parametre">
		<!--	<table>
			
			<thead>
			<tr>
				<th>
					note
				</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					<input type="text" name='note' title="" placeholder='ex : 0;25;50;75;100'/>
				</td>
			</tr>
			</tbody>
		</table> -->
				<table id="Theme" class="table table-hover table-bordered table-striped">
				
					<thead>
					<tr>
						<th>Domaine</th>
						<th>Theme</th>
						<th>Note</th>
						<th>Description</th>
						<th>Nbre fichier</th>
					</tr>
					</thead>
					<tbody>
					
								<?php if(!empty($r_tmp)) :?>
									<?php foreach($r_tmp as $themes ):?>
					<tr>
					<td>
						<?php echo $themes['domaine']['designation']; unset($themes['domaine']['designation']);?>
					</td>
					</tr>
									<?php foreach($themes as $t ):?>
					
					<tr><td></td>
					<td><?=$t['abreviation'];?>	</td>
					<input type='hidden' name='idTheme[]' value='<?=$t['idTheme']?>' />
					<input type='hidden' name='idDomaine[]' value='<?=$t["idDomaine"]?>' />
					<td><input name="note[]" class=".note" /></td>
					<td><select name="description[]" class=".desc"><option>Oui</option><option>Non</option></select></td>
					<td><select name="nbre_fichier[]" class=".fichier">
						<option>0</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option></select></td>
					</tr>
					<?php endforeach;?>
					<?php endforeach;?>
					<?php endif;?>
	
					</tbody>
					<tfoot>
					<tr>
						<th>Domaine</th>
						<th>Theme</th>
						<th>Note</th>
						<th>Description</th>
						<th>Nombre de fichier</th>
					</tr>
					 <div class="box-footer">
							<button id="Updtannuler" type="reset" class="btn btn-warning pull-right">Annuler</button>
							<button type="submit" id="updSubmit" name="addTheme" class="btn btn-primary pull-right">Enregistrer</button> 
						 </div>
					</tfoot>
						
					
				</table>
				</form>
			</div>
			<!-- /.box-body -->
		</div>
					<!-- /.post -->
		</div>
				<!-- /.tab-pane -->

			
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>

<!-- /.row -->
<script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SERVER?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<!--<script type="text/javascript" src="<?=SERVER?>/dist/js/script/theme.js"></script> -->
<script type="text/javascript" >
$(function()
{
	function effacer_formulaire () 
	{
			$(':input')
			 .not(':button, :submit, :reset, :hidden')
			 .val('')
			 .prop('checked', false)
			 .prop('selected', false);
	}
	/*GESTION PARAMETRAGE des themes*/
$("#parametre").submit(function(e){
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
			url: "index.php?p=Param/ajouter",
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
					//window.location.reload();
				}
			},
			error: function (jqxr, status,erreur) {
				$("#retour").html(jqxr.responseText+"<br />"+status);
			}
		});
});
})
</script>

