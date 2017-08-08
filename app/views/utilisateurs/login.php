
<div class="login-box">
    <div class="login-logo">
	<img  src="<?=SERVER?>/dist/img/logo_ecat.png" alt="logo ecat" />
        <a href="#">
            <b><?=APP_NAME?></b>
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Connexion</p>
	<div style="text-align:center" id="retour"></div>
        <form id="form" >
            <div class="form-group has-feedback">
                <input type="text" id="identifiant" name="login" class="form-control" required="true" placeholder="identifiant" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="pass" name="mdp" class="form-control" placeholder="mot de passe" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>  
			<div class="row">
                <div class="col-md-4">
				 <button name="connexion" id="btn_con" type="submit"  class="btn btn-long btn-primary btn-block btn-flat">Connexion</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

       <!-- <a href="#">Mot de passe oublié</a> -->
        <a id="assoc" >Création association</a><br/>
        <a id="assis" >Création Assistant</a>

    </div>
    <!-- /.login-box-body -->
</div>
<script type="text/javascript" src="<?=SERVER?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<?php include_once("modal/createAssoc.php"); ?>
	<?php include_once("modal/createTech.php"); ?>

<script type="text/javascript">
	$(function(){
		function effacer_formulaire () {
			$(':input')
			 .not(':button, :submit, :reset, :hidden')
			 .val('')
			 .prop('checked', false)
			 .prop('selected', false);
			};
		//on donne le focus au champ matricule
		$("#identifiant").focus();

		$("#form").submit(function(e){ // On sélectionne le formulaire par son identifiant
			e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire
			if($("#profil").val() == '-1')
			{
				alert("Veuillez choisir votre profil");
				return false;
			}
			var donnees = $(this).serialize(); // On créer une variable contenantt le formulaire sérialiséc
			//transmission des donnees
			$("#retour").html("<img src='<?=SERVER?>/dist/img/wait.gif' class='img-circle' alt='Veuillez patienter'>");
			$.ajax({
				url: "index.php?p=Utilisateur/connexion",
				type: "POST",
				data: donnees,
				dataType: 'json', //le retour attendu
				success: function (data) {
					console.log(data);
					if(data.erreur == 1)
					{
						//il ya une erreur
						
						$("#retour").html(data.msg);
					}else
					{
						//il ya pas d'erreur
						$("#retour").html(data.msg);
						window.location.href = data.lien ;
						//effacer_formulaire();
					}
				},
				error: function (jqxr, status,erreur) {
					$("#retour").html(jqxr.responseText+"<br />"+status);
				}
			});
				
});

//afficher le forms de 
		/**
		* Affiche la fenetre modale de creation 
		*de l'Association 
		**/
		$("#assoc").click(function(){
			$('#association').modal('show') ;
		});
		/**
		* Affiche la fenetre modale de creation 
		*de l'Association 
		**/
		$("#assis").click(function(){
			$('#assistant').modal('show') ;
		});  
	})
</script>
