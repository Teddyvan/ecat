<?php
namespace App\Controller ;
use \App\Model\SousTheme;
use \App\Model\Validators;
/**
 * SousThemeController short summary.
 *
 * SousThemeController description.
 *
 * @version 1.0
 * @author Bessin Ivan bess_ivan@hotmail.fr
 */
class ThemeController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Theme");
		$this->loadModel("Domaine");
		$this->loadModel("Evaluation");
		$this->loadModel("Trace");
		$this->loadModel("Param");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Theme =  $this->post();
			$validator = new Validators($Theme);
			$validator->check('domaine_concern', 'required',"Domaine");
			$validator->check('abreviation', 'required',"Abreviation");
			$erreur = $validator->errors();

			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Theme) ;
			}
			else
			{
				$infosConnexion = $this->getSession("ecatCon") ;
				// $Theme['created_by']  = 	$infosConnexion['user_id'];
				// $Theme['modified_by'] = 	$infosConnexion['user_id'];

				$etat = $this->Theme->addTheme($Theme);
				if($etat)
				{
					$success = $this->setAlertSuccess("Theme ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Theme) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Theme) ;
				}
			}

			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}


	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Theme =  $this->post();

			$result['Theme'] = $this->Theme->getTheme($Theme['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("recuperation okay :");
				$array = array("msg"=>$success,"erreur"=>0,"data"=>$result) ;
			}
			else
			{
				$success = $this->setAlertWarning("Une erreur est survenu veuillez ressayer svp !");
				$array = array("msg"=>$success,"erreur"=>1) ;
			}
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}

	public function supprimer()
	{
		if($this->existSession("ecatCon"))
        {
			$Theme =  $this->post();

			$result = $this->Theme->deleteTheme($Theme['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("Theme supprimée avec success :");
				$array = array("msg"=>$success,"erreur"=>0) ;
			}
			else
			{
				$success = $this->setAlertWarning("Une erreur est survenu veuillez ressayer svp !");
				$array = array("msg"=>$success,"erreur"=>1) ;
			}
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Theme/login");
	}

	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {
			//recuperer la liste des Themes
			$Themes = $this->Theme->getAllTheme();
			$Theme = array();
			//pour chaque sous domaine recuperer le domaine
			foreach($Themes as $d )
			{
				$domaine = $this->Domaine->getDomaine($d['domaine_concern']);
				$d ['domaine'] = $domaine['designation'] ;
				$Theme[]  = $d ;
			}
			
			//recuperer la liste des domaines
			$domaines = $this->Domaine->getAllDomaine();
            $this->render("theme.index",compact("Theme",'domaines'));
        }
        else
			$this->redirect("Utilisateur/login");
	}

	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Theme =  $this->post();

			$validator = new Validators($Theme);
			$validator->check('domaine_concern', 'required',"Domaine");
			$validator->check('abreviation', 'required',"Abreviation");
			$erreur = $validator->errors();

			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Theme) ;
			}
			else
			{
				//on retire l'id du tableau
				$id = $Theme['id'];
				unset($Theme['id']);
				$etat = $this->Theme->updateTheme($Theme,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Theme modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Theme) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Theme) ;
				}
			}

			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}

	/*Retourne les sous domaine en fonction du domaine*/
	public function getSoudomaineByDomaine()
	{
		if($this->existSession("ecatCon"))
        {
			$data =  $this->get();
			$result['Theme'] = $this->Theme->getThemeByDomaine($data['id']);
			$j = json_encode($result);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}

	/*Recupere les themes puis les regroupe par domaine pour le parametrage des themes*/
	public function parametre()
	{
		if($this->existSession("ecatCon"))
        {
			//recuperer les themes regrouper par domaine
			$themes = $this->Theme->recupererThemeParDomaine();
			//regrouper les themes par Domaines
			$ligne = null ;
			$r_tmp = array();
			$i = 0 ;
			foreach($themes as $theme)
			{
				if($ligne["designation"] != $theme['designation'])
				{
					$i++ ;
					$r_tmp[$i]['domaine'] = $theme ;
				}
				else
				{
					$r_tmp[$i][] = $theme ;
				}
				$ligne = $theme;
			}
			$this->render("theme.parametre",compact("r_tmp",'$themes'));
		}
		else
		{
			$this->redirect("Utilisateur/login");
		}

	}

	/***RECUPERE LA NOTE GLOBALE**/
	public function getDerniereEvaluation()
	{
		$infosConnexion = $this->getSession("ecatCon") ;

		if(isset($infosConnexion["assoc_id"]))
		{
			$moyen_general = $this->Evaluation->getLastEvaluation($infosConnexion["assoc_id"]);
			//recuperation de la date max
			$dateMax = $this->Evaluation->getMaxDate($infosConnexion["assoc_id"]);
			//recuperation des moyenne  par domaine pour la date
			$moyenneParDomaine = $this->Evaluation->getLastMoyenneByDomaine($infosConnexion["assoc_id"],$dateMax);
			
//remplissage des donnees ds le donut
			$data[0]['label'] = 'Moyenne de la derniere evaluation';
			$data[0]['value'] = $moyen_general['value'] ;
			$data[1]['label'] = 'total' ;
			$data[1]['value'] = 100 ;
			
			//en fonction du pourcentage changer la couleur
		$color = array();

		if($moyen_general['value'] >= 0 && $moyen_general['value'] < 25  )
					$color[0]  = "red";
		if($moyen_general['value'] >= 25 && $moyen_general['value'] < 50  )
					$color[0]  = "orange" ;
		 if($moyen_general['value'] >= 50 && $moyen_general['value'] < 75  )
					$color[0]  = "#00ff6f" ;
			if ($moyen_general['value'] >=75 )
					$color[0]  = "green";						
										
			$color[1] = 'gray';

			
			$donnee = array("color"=>$color,"domaine"=>$moyenneParDomaine,"date"=>$moyen_general['date_max'],"data"=>$data);

			$json = json_encode($donnee);
			echo $json ;
		}

	}
	/*****Affiche le forme d'auto evaluatiion
	avec les donnees paramatrer par la rame********/
	public function autoEvaluer()
	{
		if($this->existSession("ecatCon"))
        {
			$infosConnexion = $this->getSession("ecatCon") ;
			//recuperer les themes  et regrouper par domaine
			$themes = $this->Theme->recupererThemeParDomaine();
			//regrouper les themes par Domaines
			$ligne = null ;
			$ligne_1 = null ;
			$r_tmp = array();
			$noteParDomaine = array();
			$i = 0 ;
			$j = 0 ;
			//recuperer les parametres
			$params = $this->Param->getAllParam();
			$themePourAutoEvaluation = array();
			foreach($params as $param)
			{

				foreach($themes as $theme)
				{
					if($theme['idTheme'] == $param['idTheme'] && $theme['idDomaine'] == $param['idDomaine'])
					{
						$theme['description'] = $param['description'] ;
						$theme['nbre_fichier'] = $param['nbre_fichier'] ;
						$tab = explode(";",$param['note'] ) ;
						$theme['note'] = $tab ;
						$themePourAutoEvaluation[] = $theme;
						continue ;
					}
				}
			}

			foreach($themePourAutoEvaluation as $theme)
			{
				if($ligne["designation"] != $theme['designation'])
				{
					$i++ ;
					$r_tmp[$i]['domaine'] = $theme ;
				}
				else
				{
					$r_tmp[$i][] = $theme ;
				}
				$ligne = $theme;
			}

			$evaluations = $this->Evaluation->getRecaptEvaluation($infosConnexion['assoc_id']);
			//recuperer la liste des evaluations
			// $this->echoTest($evaluations);
			$this->render("evaluation.index",compact("evaluations","domaines","r_tmp"));
		}
		else
		{
			$this->redirect("Utilisateur/login");
		}
	}

}
