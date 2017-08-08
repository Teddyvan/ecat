	$(function(){
		//le datatable
		$('#users').DataTable({ 
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

		//ajout d'un utilisateur
		$("#form").submit(function(e)
		{ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			if($("#profile").val() == '-1')
			{
				alert("Veuillez preciser le profile de l'utilisateur");
				return false;
			}
			if($("#etat").val() == '-1')
			{
				alert("Veuillez preciser l'etat du compte utilisateur");
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
				url: "index.php?p=Utilisateur/ajouter",
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
		*de l'utilisateur preremplit
		**/
		$(".updUser").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'utilisateur selon l'id
			$.ajax({
				url: "index.php?p=Utilisateur/modifier",
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

						console.log(data.data.user.id);
						//il ya pas d'erreur
					//	$("#retour").html(data.msg);
						//on lance la boite modale
						$("#updtid").val(id);
						$("#updtnom").removeAttr("disabled");
						$("#updtnom").val(data.data.user.nom);
						$("#updtprenom").val(data.data.user.prenom);
						$("#updtprenom").removeAttr("disabled");
						$("#updtidgroupe").val(data.data.user.idGroupe);
						$("#updtidgroupe").removeAttr("disabled");
						$("#updtetat").val(data.data.user.etat);
						$("#updtetat").removeAttr("disabled");
						$("#updtlogin").val(data.data.user.login);
						$("#updtlogin").removeAttr("disabled");
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

		//enregistrement des mise a jours de l'utilisateur
		$("#formUpdate").submit(function(e){ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			if($("#updtprofile").val() == '-1')
			{
					alert("Veuillez preciser le profile de l'utilisateur");
				return false;
			}
			if($("#updtetat").val() == '-1')
			{
				alert("Veuillez preciser l'etat du compte utilisateur");
				return false;
			}

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			console.log("les donnees : "+donnees);
			//transmission des donnees
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=Utilisateur/saveUpdate",
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
	//suppression d'un utilisateur
	$(".delUser").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		console.log(donnees);
		//supprimer l'utilisateur
		console.log("on supprime dans la BD");
		$.ajax({
			url: "index.php?p=Utilisateur/supprimer",
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
		//bootbox.alert("suppression effectuer avec success");
		//window.location.reload();
	});

	/**
	* Affiche les details  modale avec les donnees
	*de l'utilisateur preremplit
	*/
$(".seeUser").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'utilisateur selon l'id
	$.ajax({
		url: "index.php?p=Utilisateur/modifier",
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
				$("#updtnom").attr("disabled","disabled");
				$("#updtnom").val(data.data.user.nom);
				$("#updtprenom").val(data.data.user.prenom);
				$("#updtprenom").attr("disabled","disabled");
				$("#updtidgroupe").val(data.data.user.idGroupe);
				$("#updtidgroupe").attr("disabled","disabled");
				$("#updtetat").val(data.data.user.etat);
				$("#updtetat").attr("disabled","disabled");
				$("#updtlogin").val(data.data.user.login);
				$("#updtlogin").attr("disabled","disabled");
				//desactivation des boutons
				$("#Updtannuler").attr("disabled","disabled");
				$("#updSubmit").attr("disabled","disabled");

				$('.modal').modal('show') ;
			}
		},
		error: function (jqxr, status,erreur) {
			$("#retour").html(jqxr.responseText+"<br />"+status);
		}
	});

});


	//DATATABLES
	//$("#users").datatable();
	})
