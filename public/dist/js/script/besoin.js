	$(function(){
		//le datatable
		$("#besoin_list").DataTable({
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
		$("#Updtannuler").click(effacer_formulaire);
		function effacer_formulaire () {
			$(':input')
			 .not(':button, :submit, :reset, :hidden')
			 .val('')
			 .prop('checked', false)
			 .prop('selected', false);
			 $('.modal').modal('hide') ;
			}


		//ajout d'un Besoin
		$("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			console.log(donnees);
			//transmission des donnees
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Besoin/ajouter",
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

		/**
		* Affiche la fenetre modale avec les donnees
		*de l'Besoin preremplit
		**/
		$(".updBesoin").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
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

						console.log(data.data.Besoin.id);
						//il ya pas d'erreur
					//	$("#retour").html(data.msg);
						//on lance la boite modale
						$("#updtid").val(id);
						$("#upddesignation").val(data.data.Besoin.designation);
						$("#upddesignation").removeAttr("disabled");

						$("#upddomain_concerne").val(data.data.Besoin.domain_concerne);
						$("#upddomain_concerne").removeAttr("disabled");

						$('#updsous_domaine').append('<option value="'+ data.data.Besoin.sous_domaine.id +'">'+ data.data.Besoin.sous_domaine.sous_domaine_designation +'</option>');
						$("#updsous_domaine").removeAttr("disabled");

						$("#updinsuffisance_releve").val(data.data.Besoin.insuffisance_releve);
						$("#updinsuffisance_releve").removeAttr("disabled");

						$("#updappui_technique").val(data.data.Besoin.appui_technique);
						$("#updappui_technique").removeAttr("disabled");
						//desactivation des boutons
						$("#Updtannuler").removeAttr("disabled");
						$("#updSubmit").removeAttr("disabled");
						$('.modal').modal('show') ;
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});

		});

		//enregistrement des mise a jours de l'Besoin
		$("#formUpdate").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			//transmission des donnees
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Besoin/saveUpdate",
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
	//suppression d'un Besoin
	$(".delBesoin").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		console.log(donnees);
		//supprimer l'Besoin
		console.log("on supprime dans la BD");
		$.ajax({
			url: "index.php?p=Besoin/supprimer",
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
	*de l'Besoin preremplit
	*/
$(".seeBesoin").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
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

//remplir dynamique els sous domaine au choix du domaine
$("#domain_concerne").change(function(event,valueOption){
	var idDomaine = $("#domain_concerne").val();
		console.log("value "+idDomaine);
	if(idDomaine != -1)
	{
		 $('#sous_domaine').empty();
		//recupere les sous-domaines
		$.ajax({
						 url: 'index.php?p=Sousdomaine/getSoudomaineByDomaine',
						 type: 'GET',
						 data: 'id='+ idDomaine, // on envoie $_GET['id_com']
						 dataType: 'json',
						 success: function(json) {
							 /*On parcours le resultat et on l'affiche dans la seconde liste deroulante*/
							 $.each(json.sousDomaine, function (index,value) {
								 console.log(value);
								 console.log(value.id);
								 $('#sous_domaine').append('<option value="'+ value.id +'">'+ value.sous_domaine_designation +'</option>');
			 				});
						 }
				 });
	}
	else {
		 $('#sous_domaine').empty();
	}

}) ;

//pour la modification d'un besoin
$("#upddomain_concerne").change(function(event,valueOption){
	var idDomaine = $("#upddomain_concerne").val();
		console.log("value "+idDomaine);
	if(idDomaine != -1)
	{
		 $('#updsous_domaine').empty();
		//recupere les sous-domaines
		$.ajax({
						 url: 'index.php?p=Sousdomaine/getSoudomaineByDomaine',
						 type: 'GET',
						 data: 'id='+ idDomaine, // on envoie $_GET['id_com']
						 dataType: 'json',
						 success: function(json) {
							 /*On parcours le resultat et on l'affiche dans la seconde liste deroulante*/
							 $.each(json.sousDomaine, function (index,value) {
								 console.log(value);
								 console.log(value.id);
								 $('#updsous_domaine').append('<option value="'+ value.id +'">'+ value.sous_domaine_designation +'</option>');
			 				});
						 }
				 });
	}
	else {
		 $('#updsous_domaine').empty();
	}

}) ;

//lance le telechargement du fichier
	/**
		* Affiche la fenetre modale avec les donnees
		*de l'Ressource preremplit
		**/
		$(".downloadBesoin").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
		//	$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Ressource selon l'id
			$.ajax({
				url: "index.php?p=Besoin/telecharger",
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
