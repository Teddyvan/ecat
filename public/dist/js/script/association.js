	$(function(){
		//le datatable
		$('#assocations_list').DataTable({
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false,
					"language": {
							 "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
						 }
				}) ;

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
		//on donne le focus au champ matricule
		$("#matricule").focus();

		//ajout d'un Association
		$("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire

			if($("#designation").val() == '-1')
			{
				alert("Veuillez preciser le champ désignation");
				return false;
			}
			if($("#Association_association").val() == '-1')
			{
				alert("Veuillez preciser le Association");
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
				url: "index.php?p=Association/ajouter",
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
		*de l'Association preremplit
		**/
		$(".updAssociation").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Association selon l'id
			$.ajax({
				url: "index.php?p=Association/modifier",
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

						console.log(data.data.Association.id);
						//il ya pas d'erreur
					//	$("#retour").html(data.msg);
						//on lance la boite modale
						$("#updtid").val(id);
						$("#updidentifiant").val(data.data.Association.login);
						$("#updidentifiant").removeAttr("disabled");

						$("#upddesignation").val(data.data.Association.designation);
						$("#upddesignation").removeAttr("disabled");

						$("#updabreviation").val(data.data.Association.abreviation);
						$("#updabreviation").removeAttr("disabled");

						$("#updannee").val(data.data.Association.annee_creation);
						$("#updannee").removeAttr("disabled");

						$("#updpays_association").val(data.data.Association.pays_association);
						$("#updpays_association").removeAttr("disabled");

						$("#updcontact_adresse").val(data.data.Association.contact_adresse);
						$("#updcontact_adresse").removeAttr("disabled");

						$("#updcontact_site").val(data.data.Association.contact_site);
						$("#updcontact_site").removeAttr("disabled");

						$("#updcontact_phone").val(data.data.Association.contact_phone);
						$("#updcontact_phone").removeAttr("disabled");

						$("#updcontact_email").val(data.data.Association.contact_email);
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

		//enregistrement des mise a jours de l'Association
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
				url: "index.php?p=Association/saveUpdate",
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
	//suppression d'un Association
	$(".delAssociation").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		console.log(donnees);
		//supprimer l'Association
		console.log("on supprime dans la BD");
		$.ajax({
			url: "index.php?p=Association/supprimer",
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
	*de l'Association preremplit
	*/
$(".seeAssociation").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'Association selon l'id
	$.ajax({
		url: "index.php?p=Association/modifier",
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
				$("#updidentifiant").val(data.data.Association.login);
				$("#updidentifiant").attr("disabled","disabled");

				$("#upddesignation").val(data.data.Association.designation);
				$("#upddesignation").attr("disabled","disabled");

				$("#updabreviation").val(data.data.Association.abreviation);
				$("#updabreviation").attr("disabled","disabled");

				$("#updannee").val(data.data.Association.annee_creation);
				$("#updannee").attr("disabled","disabled");

				$("#updpays_association").val(data.data.Association.pays_association);
				$("#updpays_association").attr("disabled","disabled");

				$("#updcontact_adresse").val(data.data.Association.contact_adresse);
				$("#updcontact_adresse").attr("disabled","disabled");

				$("#updcontact_site").val(data.data.Association.contact_site);
				$("#updcontact_site").attr("disabled","disabled");

				$("#updcontact_phone").val(data.data.Association.contact_phone);
				$("#updcontact_phone").attr("disabled","disabled");

				$("#updcontact_email").val(data.data.Association.contact_email);
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
