	$(function(){
		//le datatable
		$("#type_list").DataTable({
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

		//ajout d'un TypeAlerte
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
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=TypeAlerte/ajouter",
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
		*de l'TypeAlerte preremplit
		**/
		$(".updTypeAlerte").click(function(){
			//recuperation de l'id
			var id = $(this).attr("value");
			var data = {};
			data.id = id ;
		//	$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			//recuperer les donnees de l'TypeAlerte selon l'id
			$.ajax({
				url: "index.php?p=TypeAlerte/modifier",
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

						console.log(data.data.TypeAlerte.id);
						//il ya pas d'erreur
					//	$("#retour").html(data.msg);
						//on lance la boite modale
						$("#updtid").val(id);
						$("#updtlibelle").val(data.data.TypeAlerte.libelle);
						$("#updtlibelle").removeAttr("disabled");

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

		//enregistrement des mise a jours de l'TypeAlerte
		$("#formUpdate").submit(function(e){ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			//verification primaire
			if($("#updtprofile").val() == '-1')
			{
					alert("Veuillez preciser le profile du 'TypeAlerte");
				return false;
			}

			var $form = $(this);
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var donnees = (formdata !== null) ? formdata : $form.serialize();
			//var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialisé

			console.log("les donnees : "+donnees);
			//transmission des donnees
			//$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				contentType: false, //obligatoire pour de l'upload
				processData:false, //obligatoire pour de l'upload
				url: "index.php?p=TypeAlerte/saveUpdate",
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
	//suppression d'un TypeAlerte
	$(".delTypeAlerte").click(function(){

		var id = $(this).attr("value");
		var donnees = {};
		donnees.id = id ;
		console.log(donnees);
		//supprimer l'TypeAlerte
		console.log("on supprime dans la BD");
		$.ajax({
			url: "index.php?p=TypeAlerte/supprimer",
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
	*de l'TypeAlerte preremplit
	*/
$(".seeTypeAlerte").click(function(){

	//recuperation de l'id
	var id = $(this).attr("value");
	var data = {};
	data.id = id ;
	$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
	//recuperer les donnees de l'TypeAlerte selon l'id
	$.ajax({
		url: "index.php?p=TypeAlerte/modifier",
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
				$("#updtlibelle").attr("disabled","disabled");
				$("#updtlibelle").val(data.data.TypeAlerte.libelle);

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
