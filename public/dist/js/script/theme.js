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
		//ajout d'un Theme
		$("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire

			if($("#domaine_concern").val() == '-1')
			{
				alert("Veuillez preciser le domaine svp !!");
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
				url: "index.php?p=Theme/ajouter",
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
		*de l'Theme preremplit
		**/
		$(".updTheme").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'Theme selon l'id
			$.ajax({
				url: "index.php?p=Theme/modifier",
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
						$("#upddomaine_concern").val(data.data.Theme.domaine_concern);
						$("#upddomaine_concern").removeAttr("disabled");

						$("#updabreviation").val(data.data.Theme.abreviation);
						$("#updabreviation").removeAttr("disabled");

						$("#updcplmt_theme").val(data.data.Theme.cplmt_theme);
						$("#updcplmt_theme").removeAttr("disabled");

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

		//enregistrement des mise a jours de l'Theme
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
				url: "index.php?p=Theme/saveUpdate",
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
	//suppression d'un Theme
	$(".delTheme").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		console.log(donnees);
		//supprimer l'Theme
		console.log("on supprime dans la BD");
		$.ajax({
			url: "index.php?p=Theme/supprimer",
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
	*de l'Theme preremplit
	*/
$(".seeTheme").click(function(){

	//recuperation de l'id
	var reponse = confirm("Voulez vous voir les detail ?") ;
	if(reponse == true)
	{
		var id = $(this).attr("value");
		var data = {};
		data.id = id ;
		//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
		//recuperer les donnees de l'Theme selon l'id
		$.ajax({
			url: "index.php?p=Theme/modifier",
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
					$("#upddomaine_concern").val(data.data.Theme.domaine_concern);
					$("#upddomaine_concern").attr("disabled","disabled");

					$("#updabreviation").val(data.data.Theme.abreviation);
					$("#updabreviation").attr("disabled","disabled");

					$("#updcplmt_theme").val(data.data.Theme.cplmt_theme);
					$("#updcplmt_theme").attr("disabled","disabled");

					//desactivation des boutons
					$("#UpdtAnnuler").attr("disabled","disabled");
					$("#updSubmit").attr("disabled","disabled");
					$('.modal').modal('show') ;
				}
		},
		error: function (jqxr, status,erreur) {
			$("#retour").html(jqxr.responseText+"<br />"+status);
		}
	});
	}

}) ;

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
		//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
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
