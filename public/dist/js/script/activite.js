	$(function(){
		//le datatable
	//$('#example1').DataTable();

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


		//ajout d'un Activite
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
				url: "index.php?p=Activite/ajouter",
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
		*de l'Activite preremplit
		**/
		$(".updActivite").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Activite selon l'id
			$.ajax({
				url: "index.php?p=Activite/modifier",
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

						console.log(data.data.Activite.id);
						//il ya pas d'erreur
					//	$("#retour").html(data.msg);
						//on lance la boite modale
						$("#updtid").val(id);
						$("#updcategorie").val(data.data.Activite.categorie);
						$("#updcategorie").removeAttr("disabled");

						$("#updtitre_activite").val(data.data.Activite.titre_activite);
						$("#updtitre_activite").removeAttr("disabled");

						$('#upddomaine_concerne').val(data.data.Activite.domaine_concerne);
						$("#upddomaine_concerne").removeAttr("disabled");

						$("#upddescription_activite").val(data.data.Activite.description_activite);
						$("#upddescription_activite").removeAttr("disabled");

						//desactivation des boutons
						$("#updtAnnuler").removeAttr("disabled");
						$("#updSubmit").removeAttr("disabled");
						$('.modal').modal('show') ;
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});

		});

		//enregistrement des mise a jours de l'Activite
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
				url: "index.php?p=Activite/saveUpdate",
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
	//suppression d'un Activite
	$(".delActivite").click(function(){

		var resultat = confirm("Voulez vous vraiment supprimer cette Activite ?");
		if(resultat)
		{
			var id = $(this).attr("value");
			var donnees = {};
			donnees.id = id ;
			console.log(donnees);
			//supprimer l'Activite
			console.log("on supprime dans la BD");
			$.ajax({
				url: "index.php?p=Activite/supprimer",
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

	/**
	* Affiche les details  modale avec les donnees
	*de l'Activite preremplit
	*/
$(".seeActivite").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'Activite selon l'id
	$.ajax({
		url: "index.php?p=Activite/modifier",
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
				$("#updcategorie").val(data.data.Activite.categorie);
				$("#updcategorie").attr("disabled","disabled");

				$("#updtitre_activite").val(data.data.Activite.titre_activite);
				$("#updtitre_activite").attr("disabled","disabled");

				$('#upddomaine_concerne').val(data.data.Activite.domaine_concerne);
				$("#upddomaine_concerne").attr("disabled","disabled");

				$("#upddescription_activite").val(data.data.Activite.description_activite);
				$("#upddescription_activite").attr("disabled","disabled");

				//desactivation des boutons
				$("#updtAnnuler").attr("disabled","disabled");
				$("#updSubmit").attr("disabled","disabled");

				$('.modal').modal('show') ;
			}
		},
		error: function (jqxr, status,erreur) {
			$("#retour").html(jqxr.responseText+"<br />"+status);
		}
	});

});

	})
