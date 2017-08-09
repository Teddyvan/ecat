

<div class="row">
        <div class="col-md-9">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reservé pour l'affichage des notes <span class="date"></span> </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Derniere évaluation soumise </strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <div id="chart">

                    </div>
                     <!-- <canvas id="chart" style="height:250px"></canvas> -->
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <table id="offre_list" class="table table-hover table-bordered table-striped">
  					<thead>
              <?php  foreach($recap as $r): ?>
  					<tr>
  						<td><?=$r['domaine_name']?></td>			<td><?=$r['note_domaine']?>/<?=$r['nb_theme']?></td>	
            <?php if($r['note'] >= 0 && $r['note'] < 25  ):?>
              <td style="background-color:red">
              <?=$r['note']?>
              </td>
            <?php endif;?>
            <?php if($r['note'] >= 25 && $r['note'] < 50  ):?>
              <td style="background-color:orange">
              <?=$r['note']?>
              </td>
            <?php endif;?>
            <?php if($r['note'] >= 50 && $r['note'] < 75  ):?>
              <td style="background-color:#00ff6f">
              <?=$r['note']?>
              </td>
            <?php endif;?>
            <?php if($r['note'] >=75 ):?>
              <td style="background-color:green">
              <?=$r['note']?>
              </td>
            <?php endif;?>
              </tr>
            <?php endforeach;?>
  					</thead>
  					<tbody>
  
  
  					</tbody>
  		
  				</table>
                </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

            <!-- /.box-footer -->
          </div>
          <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Les moyennes par domaines</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                      <div id="bar-example"></div>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer -->
              </div>
          <!-- /.box -->
		  <?php if($type == RAN || $type == ASSISTANT ) :?>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Besoins des associations</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="besoin_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Besoin</th>
						<th>Domaine</th>
						<th>Insuffisance </th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($besoins)) :?>
									<?php foreach($besoins as $besoin ):?>
					<tr>
						<td><?=$besoin['besoin_designation']?></td>
						<td><?=$besoin['domaine']?></td>
						<td><?=$besoin['insuff']?></td>

						<td>
						<button class="seeBesoin" title="Voir details du besoin" value="<?=$besoin['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;
							<!-- <button type="button" value="<?=$besoin['id']?>" class="donwloadAnnonce" title="Telecharger" ><i class="fa fa-cloud-download"></i> </button>&nbsp;&nbsp; -->


						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>

					</tbody>
					<tfoot>
					<tr>
						<th>Besoin</th>
						<th>Domaine</th>
						<th>Insuffisance </th>
						<th>Actions</th>
					</tr>
					</tfoot>
				</table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir tout</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
			<?php endif;?>
		  <?php if($type == RAN || $type == ASSOC ) :?>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Offre de service d'assistance</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="offre_list" class="table table-hover table-bordered table-striped">
					<thead>
					<tr>
						<th>Pays</th>
						<th>Domaine</th>
						<th>Intitulé de l'offre</th>
						<th>Ouverture</th>
						<th>Fermeture</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
								<?php if(!empty($offres)) :?>
									<?php foreach($offres as $service ):?>
					<tr>
						<td><?=$service['pays_name']?></td>
						<td><?=$service['domaine']?></td>
						<td><?=$service['offre']?></td>
						<td><?=$service['ouverture']?></td>
						<td><?=$service['fermeture']?></td>

						<td>
						<button class="seeService" title="Voir details du Service" value="<?=$service['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;
							<!-- <button type="button" value="<?=$service['id']?>" class="donwloadAnnonce" title="Telecharger" ><i class="fa fa-cloud-download"></i> </button>&nbsp;&nbsp; -->



						</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>

					</tbody>
					<tfoot>
					<tr>
						<th>Pays</th>
						<th>Domaine</th>
						<th>Intitulé de l'offre</th>
						<th>Date Ouverture</th>
						<th>Date Fermeture</th>
						<th>Actions</th>
					</tr>
					</tfoot>
				</table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir tout</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
		  <?php endif;?>

		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Evenements</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
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
								<?php if(!empty($annonces)) :?>
									<?php foreach($annonces as $pay ):?>
					<tr>
						<td><?=$pay['titre']?></td>
						<td><?=$pay['lieu']?></td>
						<td><?=$pay['date_debut']?></td>
						<td><?=$pay['date_fin']?></td>
						<td><?=$pay['contenu']?></td>

						<td>
						<button class="seeAnnonce" title="Voir details du annonce" value="<?=$pay['id']?>"> <i class="fa fa-eye"></i> </button>&nbsp;&nbsp;


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
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir tout</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
        </div>
        <!-- /.col -->
		<div class="col-md-3">

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
					 <!-- <li class="item">

                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li> -->
                          <canvas id="areaChart" style="height:250px"></canvas>
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
<?php include_once("modal/updateAnnonce.php");?>
<?php include_once("modal/updateBesoin.php");?>
<?php include_once("modal/updateService.php");?>
<!-- <script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<!-- <script src="<?=SERVER?>/plugins/chartjs/Chart.min.js"></script> -->
<!-- <script src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script>
  $(function () {

//recupere la moyenne globale
 $("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
//barchart

//donuts
$.ajax({
  url: "index.php?p=Theme/getDerniereEvaluation",
  type: "GET",
  dataType: 'json',
  success: function (data) {
    if(data.erreur == 1)
    {
      //il ya une erreur
      $("#chart").html(data.msg);
    }else
    {
      //il ya pas d'erreur
      console.log(data);
      //la date de dernier mise a jour
      $(".date").html(data.date);
      //le donus
      var donut_chart = Morris.Donut({
					element: 'chart',
					data: data.data	,
        	colors : data.color});
      //le diagramme en baton
      Morris.Bar({
        element: 'bar-example',
        data: data.domaine,
        gridTextSize :8,
        xkey: 'y',//chaine contenant le nom  contenu ds le label sur le x
        ykeys: 'a',//chaine contenant le nom  contenu ds le label sur le y
        labels: ['Moyenne'],
        resize : true
      });

    }
  },
  error: function (jqxr, status,erreur) {
    $("#retour").html("");
    console.log(jqxr.responseText+"<br />"+status);
  }

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
						$("#updtannuler").attr("disabled","disabled");
						$("#updSubmit").attr("disabled","disabled");

						$('#annonce').modal('show') ;
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});

		});

		/**
	* Affiche les details  modale avec les donnees
	*de l'Besoin preremplit
	*/
$(".seeBesoin").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'Besoin selon l'id
	$.ajax({
		url: "index.php?p=Besoin/modifier",
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
				$("#upddesignation").val(data.data.Besoin.designation);
				$("#upddesignation").attr("disabled","disabled");

				$("#updassociation_concerne").val(data.data.Besoin.association_concerne);
				$("#updassociation_concerne").attr("disabled","disabled");

				$("#upddomain_concerne").val(data.data.Besoin.domain_concerne);
				$("#upddomain_concerne").attr("disabled","disabled");

				$('#updsous_domaine').append('<option value="'+ data.data.Besoin.sous_domaine.id +'">'+ data.data.Besoin.sous_domaine.sous_domaine_designation +'</option>');
				$("#updsous_domaine").attr("disabled","disabled");

				$("#updinsuffisance_releve").val(data.data.Besoin.insuffisance_releve);
				$("#updinsuffisance_releve").attr("disabled","disabled");

				$("#updappui_technique").val(data.data.Besoin.appui_technique);
				$("#updappui_technique").attr("disabled","disabled");
				//desactivation des boutons
				$("#updtannuler").attr("disabled","disabled");
				$("#updSubmit").attr("disabled","disabled");

				$('#besoin').modal('show') ;
			}
		},
		error: function (jqxr, status,erreur) {
			$("#retour").html(jqxr.responseText+"<br />"+status);
		}
	});

});

/**
	* Affiche les details  modale avec les donnees
	*de l'Service preremplit
	*/
$(".seeService").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	$("#retour").html("<img src='wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'Service selon l'id
	$.ajax({
		url: "index.php?p=Service/modifier",
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
				$("#updfrequence").val(data.data.Service.frequence);
				$("#updfrequence").attr("disabled","disabled");

				$("#upddate_fermeture").val(data.data.Service.date_fermeture);
				$("#upddate_fermeture").attr("disabled","disabled");

				$("#update_ouverture").val(data.data.Service.date_ouverture);
				$("#update_ouverture").attr("disabled","disabled");

				$("#updcountry_concerne").val(data.data.Service.country_concerne);
				$("#updcountry_concerne").attr("disabled","disabled");

				$("#updoffer_designation").val(data.data.Service.offer_designation);
				$("#updoffer_designation").attr("disabled","disabled");

				$("#updtprobleme_identify").val(data.data.Service.probleme_identify);
				$("#updtprobleme_identify").attr("disabled","disabled");

				$("#upddomaine").val(data.data.Service.domaine);
				$("#upddomaine").attr("disabled","disabled");
				//desactivation des boutons
				$("#updtannuler").attr("disabled","disabled");
				$("#updSubmit").attr("disabled","disabled");

				$('#service').modal('show') ;
			}
		},
		error: function (jqxr, status,erreur) {
			$("#retour").html(jqxr.responseText+"<br />"+status);
		}
	});

});


  });
</script>
