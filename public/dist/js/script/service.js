	$(function(){
		//le datatable
		$("#offre_list").DataTable({
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
$( "#date_ouverture" ).datepicker({dateFormat:"yy-mm-dd"});
$( "#date_fermeture" ).datepicker({dateFormat:"yy-mm-dd"});
$( "#upddate_fermeture" ).datepicker({dateFormat:"yy-mm-dd"});
$( "#update_ouverture" ).datepicker({dateFormat:"yy-mm-dd"});

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


		//ajout d'un Service
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
			$("#retour").html("<img src='wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Service/ajouter",
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
		*de l'Service preremplit
		**/
		$(".updService").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='./wait.gif' class='img-circle' alt='Veuillez patienter'>");
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

						console.log(data.data.Service);
						//il ya pas d'erreur

						//on lance la boite modale
						$("#updtid").val(id);
						$("#updfrequence").val(data.data.Service.frequence);
						$("#updfrequence").removeAttr("disabled");

						$("#upddate_fermeture").val(data.data.Service.date_fermeture);
						$("#upddate_fermeture").removeAttr("disabled");

						$("#update_ouverture").val(data.data.Service.date_ouverture);
						$("#update_ouverture").removeAttr("disabled");

						$("#updcountry_concerne").val(data.data.Service.country_concerne);
						$("#updcountry_concerne").removeAttr("disabled");

						$("#updoffer_designation").val(data.data.Service.offer_designation);
						$("#updoffer_designation").removeAttr("disabled");

						$("#updtprobleme_identify").val(data.data.Service.probleme_identify);
						$("#updtprobleme_identify").removeAttr("disabled");

						$("#upddomaine").val(data.data.Service.domaine);
						$("#upddomaine").removeAttr("disabled");
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

		//enregistrement des mise a jours de l'Service
		$("#formUpdate").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			//transmission des donnees
			$("#retour").html("<img src='wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Service/saveUpdate",
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
	//suppression d'un Service
	$(".delService").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		$("#retour").html("<img src='wait.gif' class='img-circle' alt='Veuillez patienter'>");
		$.ajax({
			url: "index.php?p=Service/supprimer",
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

//pour la modification d'un Service
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
	})
