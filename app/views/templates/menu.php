
<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$_SESSION['ecatCon']['img_profile']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Ivan Bessin</p>
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
            <li><a href="<?=SERVERS?>Utilisateur/index" title="Ajouter/modifier des utilisateurs"><i class="fa fa-users"></i>Utilisateurs</a></li>
		  </ul>
		  <ul class="treeview-menu">
            <li><a href="<?=SERVERS?>TypeAlerte/index" title="Ajouter/modifier un nouveau type"><i class="fa fa-plus-square"></i>Type d'alerte</a></li> 
			<li><a href="<?=SERVERS?>Pays/index" title="Ajouter/modifier la liste des pays"><i class="fa fa-users"></i> Pays membres</a></li>
			<li><a href="<?=SERVERS?>Association/index" title="Ajouter/modifier la liste des association"><i class="fa fa-file-text-o"></i>Listes des associations</a>
			  <li><a href="<?=SERVERS?>Technique/index" title="Ajouter/modifier/supprimer la liste des assistants technique"><i class="fa fa-file-text-o"></i>Assistants techniques</a>
			</li>   
			</li> 
		 <li><a href="<?=SERVERS?>Domaine/index" title="Ajouter/modifier/supprimer la liste des domaines"><i class="fa fa-file-text-o"></i>Domaines</a>
			</li>  
			<li><a href="<?=SERVERS?>Sousdomaine/index" title="Ajouter/modifier la liste des sous domaines"><i class=" fa fa-file-text-o"></i>Sous domaine</a>
			</li>
		 
			<li><a href="<?=SERVERS?>Theme/index" title="Ajouter/modifier la liste des themes"><i class=" fa fa-file-text-o"></i>Thèmes d'evaluation</a>
			</li>
			<li><a href="<?=SERVERS?>Theme/parametre" title="Parametrer les thèmes"><i class=" fa fa-file-text-o"></i>Parametrage des themes</a>
			</li>
				<li><a href="<?=SERVERS?>Ressources/index" title="Soumettre un document"><i class="fa fa-file-text-o"></i>Soumettre un document</a>
			</li> </li>

		  </ul>
        </li>
		<?php endif; ?>
		<?php if( $_SESSION['ecatCon']['type'] == ASSOC  ) :?>
		     <li <?php if( $_SESSION['ecatCon']['type'] == ASSOC) 
					echo 'class="treeview active"' ;
				else				
					echo 'class="treeview"' ;?> >
          
          <ul class="treeview-menu">

			<li><a href="<?=SERVERS?>Profil/index" title="Ajouter/modifier la liste des activitées association"><i class="fa fa-file-text-o"></i>Gestion profil</a>
			</li> 	
			<li><a href="<?=SERVERS?>Besoin/index" title="Ajouter/modifier la liste des activitées association"><i class="fa fa-file-text-o"></i>Liste des besoins </a>
			</li> 
			<li><a href="<?=SERVERS?>Activite/index" title="Ajouter/modifier la liste des auto-evaluation"><i class="fa fa-file-text-o"></i>Liste des activités </a>
			</li> 
			<li><a href="<?=SERVERS?>Theme/autoEvaluer" title="Ajouter/modifier la liste des auto-evaluation"><i class="fa fa-file-text-o"></i>Auto-evaluation</a>
			</li> 
			<li><a href="<?=SERVERS?>Annonce/index" title="Ajouter/modifier la liste des annonces"><i class="fa fa-file-text-o"></i>Creer une annonce</a>
			</li>  
			<li><a href="<?=SERVERS?>Ressources/index" title="Soumettre un document"><i class="fa fa-file-text-o"></i>Soumettre un document</a>
			</li>  
			<li><a href="<?=SERVERS?>Alerte/index" title="Ajouter/modifier la liste des alertes"><i class="fa fa-file-text-o"></i>
		Lancer une alerte</a>
			</li>  
		  </ul>
        </li>
		 <?php endif;?>
		 <?php if($_SESSION['ecatCon']['type'] == ASSISTANT  ) :?>
		 <li <?php if( $_SESSION['ecatCon']['type'] == ASSISTANT) 
					echo 'class="treeview active"' ;
				else				
					echo 'class="treeview"' ;?>>
          
          <ul class="treeview-menu">
			<li><a href="<?=SERVERS?>Profil/index" title="Gestion du profil"><i class="fa fa-file-text-o"></i>Gestion profil</a>
			</li> 	
			<li><a href="<?=SERVERS?>Service/index" title="Ajouter/modifier/supprimer la liste des offres de service"><i class="fa fa-file-text-o"></i>Offre de service</a>
			</li> 
			<li><a href="<?=SERVERS?>Ressources/index" title="Ajouter/modifier/supprimer la des documents"><i class="fa fa-file-text-o"></i>Soumettre un document</a>
			</li> 
			<li><a href="<?=SERVERS?>Annonce/index" title="Ajouter/modifier la liste des annonces"><i class="fa fa-file-text-o"></i>Creer une annonce</a>
			</li>  			
		
		  </ul>
        </li>
	  <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
