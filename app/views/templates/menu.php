<?php
$page = $_GET['p'] ;
$page = explode("/",$page);
$pageEncour = strtolower($page[0]);
$actionEncour = strtolower($page[1]);
?>
<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$_SESSION['ecatCon']['img_profile']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['ecatCon']['nom']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
        </div>
      </div>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
	 <?php if($_SESSION['ecatCon']['type'] == RAN ) :?>
        <li <?php if( $_SESSION['ecatCon']['type'] == RAN)
					echo 'class="treeview active"' ;
				else
					echo 'class="treeview"' ;?>>

		  <ul class="treeview-menu">
        <li><a href="<?=SERVERS?>Bord/index" title="Tableau de bors"><i class="fa fa-home"></i>Acceuil</a></li>
		  <li <?php if($pageEncour == 'utilisateur') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Utilisateur/index" title="Ajouter/modifier des utilisateurs"><i class="fa fa-users"></i>Utilisateurs</a></li>
		  <li <?php if($pageEncour == 'typealerte') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>TypeAlerte/index" title="Ajouter/modifier un nouveau type"><i class="fa fa-plus-square"></i>Type d'alerte</a></li>
			<li <?php if($pageEncour == 'pays') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Pays/index" title="Ajouter/modifier la liste des pays"><i class="fa fa-users"></i> Pays membres</a></li>
			<li <?php if($pageEncour == 'association') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Association/index" title="Ajouter/modifier la liste des association"><i class="fa fa-file-text-o"></i>Listes des associations</a>
			  <li <?php if($pageEncour == 'technique') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Technique/index" title="Ajouter/modifier/supprimer la liste des assistants technique"><i class="fa fa-file-text-o"></i>Assistants techniques</a>
			</li>
			</li>
		 <li <?php if($pageEncour == 'domaine') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Domaine/index" title="Ajouter/modifier/supprimer la liste des domaines"><i class="fa fa-file-text-o"></i>Domaines</a>
			</li>
			<li <?php if($pageEncour == 'sousdomaine') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Sousdomaine/index" title="Ajouter/modifier la liste des sous domaines"><i class=" fa fa-file-text-o"></i>Sous domaine</a>
			</li>

			<li <?php if($pageEncour == 'theme') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Theme/index" title="Ajouter/modifier la liste des themes"><i class=" fa fa-file-text-o"></i>Thèmes d'evaluation</a>
			</li>
			<li <?php if($actionEncour == 'parametre') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Theme/parametre" title="Parametrer les thèmes"><i class=" fa fa-file-text-o"></i>Parametrage des themes</a>
			</li>
			<li <?php if($pageEncour == 'ressources') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Ressources/index" title="Soumettre un document"><i class="fa fa-file-text-o"></i>Soumettre un document</a>
			</li>
			<li <?php if($pageEncour == 'alerte') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Alerte/valider" title="Valider des alertes "><i class="fa fa-file-text-o"></i>Alertes à valider</a>
			</li>
		<!-- <li <?php if($pageEncour == '') echo "style='background : #c14141;'" ;?>><a href="#" title="La Galerie photot"><i class="fa fa-file-text-o"></i>
		Galerie photo</a>
			</li> -->
		  </ul>
        </li>
		<?php endif; ?>
		<?php if($_SESSION['ecatCon']['type'] == ASSOC  ) :?>
		     <li <?php if( $_SESSION['ecatCon']['type'] == ASSOC)
					echo 'class="treeview active"' ;
				else
					echo 'class="treeview"' ;?> >

          <ul class="treeview-menu">
      <li><a href="<?=SERVERS?>Bord/index" title="Tableau de bors"><i class="fa fa-home"></i>Acceuil</a></li>
			<li <?php if($pageEncour == 'profil') echo "style='background : #c14141;'" ;?> ><a href="<?=SERVERS?>Profil/index" title="Ajouter/modifier la liste des activitées association"><i class="fa fa-file-text-o"></i>Gestion profil</a>
			</li>
			<li <?php if($pageEncour == 'besoin') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Besoin/index" title="Ajouter/modifier la liste des activitées association"><i class="fa fa-file-text-o"></i>Liste des besoins </a>
			</li>
			<li <?php if($pageEncour == 'activite') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Activite/index" title="Ajouter/modifier la liste des auto-evaluation"><i class="fa fa-file-text-o"></i>Liste des activités </a>
			</li>
			<li <?php if($pageEncour == 'theme') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Theme/autoEvaluer" title="Ajouter/modifier la liste des auto-evaluation"><i class="fa fa-file-text-o"></i>Auto-evaluation</a>
			</li>
			<li <?php if($pageEncour == 'annonce') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Annonce/index" title="Ajouter/modifier la liste des annonces"><i class="fa fa-file-text-o"></i>Creer une annonce</a>
			</li>
			<li <?php if($pageEncour == 'ressources') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Ressources/index" title="Soumettre un document"><i class="fa fa-file-text-o"></i>Soumettre un document</a>
			</li>
		<li <?php if($pageEncour == 'alerte') echo "style='background : #c14141;'" ;?> ><a href="<?=SERVERS?>Alerte/index" title="Ajouter/modifier la liste des alertes"><i class="fa fa-file-text-o"></i>
		Lancer une alerte</a>

		  </ul>
        </li>
		 <?php endif;?>
		 <?php if($_SESSION['ecatCon']['type'] == ASSISTANT  ) :?>
		 <li <?php if( $_SESSION['ecatCon']['type'] == ASSISTANT)
					echo 'class="treeview active"' ;
				else
					echo 'class="treeview"' ;?>>

          <ul class="treeview-menu">
      <li><a href="<?=SERVERS?>Bord/index" title="Tableau de bors"><i class="fa fa-home"></i>Acceuil</a></li>
			<li <?php if($pageEncour == 'profil') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Profil/index" title="Gestion du profil"><i class="fa fa-file-text-o"></i>Gestion profil</a>
			</li>
			<li <?php if($pageEncour == 'service') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Service/index" title="Ajouter/modifier/supprimer la liste des offres de service"><i class="fa fa-file-text-o"></i>Offre de service</a>
			</li>
			<li <?php if($pageEncour == 'ressources') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Ressources/index" title="Ajouter/modifier/supprimer la des documents"><i class="fa fa-file-text-o"></i>Soumettre un document</a>
			</li>
			<li <?php if($pageEncour == 'annonce') echo "style='background : #c14141;'" ;?>><a href="<?=SERVERS?>Annonce/index" title="Ajouter/modifier la liste des annonces"><i class="fa fa-file-text-o"></i>Creer une annonce</a>
			</li>

		  </ul>
        </li>
	  <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
