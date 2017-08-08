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

			if($("#designation").val() == '-1')
			{
				alert("Veuillez preciser le champ désignation");
				return false;
			}
			if($("#Ressource_Ressource").val() == '-1')
			{
				alert("Veuillez preciser le Ressource");
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
				url: "index.php?p=Ressource/ajouter",
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
		*de l'Ressource preremplit
		**/
		$(".updRessource").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Ressource selon l'id
			$.ajax({
				url: "index.php?p=Ressource/modifier",
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

						console.log(data.data.Ressource.id);
						//il ya pas d'erreur
					//	$("#retour").html(data.msg);
						//on lance la boite modale
						$("#updtid").val(id);
						$("#updidentifiant").val(data.data.Ressource.login);
						$("#updidentifiant").removeAttr("disabled");

						$("#upddesignation").val(data.data.Ressource.designation);
						$("#upddesignation").removeAttr("disabled");

						$("#updabreviation").val(data.data.Ressource.abreviation);
						$("#updabreviation").removeAttr("disabled");

						$("#updannee").val(data.data.Ressource.annee_creation);
						$("#updannee").removeAttr("disabled");

						$("#updpays_Ressource").val(data.data.Ressource.pays_Ressource);
						$("#updpays_Ressource").removeAttr("disabled");

						$("#updcontact_adresse").val(data.data.Ressource.contact_adresse);
						$("#updcontact_adresse").removeAttr("disabled");

						$("#updcontact_site").val(data.data.Ressource.contact_site);
						$("#updcontact_site").removeAttr("disabled");

						$("#updcontact_phone").val(data.data.Ressource.contact_phone);
						$("#updcontact_phone").removeAttr("disabled");

						$("#updcontact_email").val(data.data.Ressource.contact_email);
						$("#updcontact_email").removeAttr("disabled");

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
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Ressource/saveUpdate",
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
		$.ajax({
			url: "index.php?p=Ressource/supprimer",
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
		url: "index.php?p=Ressource/modifier",
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

})
