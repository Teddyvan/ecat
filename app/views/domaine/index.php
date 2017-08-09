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
				<li class="active"><a href="#activity" data-toggle="tab"> <i class="fa fa-assocations"></i>  Domaine</a></li>
				 <li><a href="#settings" data-toggle="tab"><i class="fa fa-Pays-plus"></i> Nouveau Domaine</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="activity">
				 <div class="box">
			<div class="box-header">
				<h3 class="box-title">Moyenne globale</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<p class="text-center">
                    <strong>Derniere évaluation soumise </strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <div id="chart">

                    </div>
                     <!-- <canvas id="chart" style="height:250px"></canvas> -->
                  </div>
			</div>
			<!-- /.box-body -->
		</div>
					<!-- /.post -->
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="settings">
				 <div class="box-body">
						 <div id="bar-example"></div>
				</div>
				
				<!-- /.tab-pane -->
			</div>

			<!-- /.tab-content -->
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
                         <h3 class="box-title">Domaine documentaire</h3>

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
					data: data.data				});
      //le diagramme en baton
      Morris.Bar({
        element: 'bar-example',
        data: data.domaine,
        gridTextSize :10,
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