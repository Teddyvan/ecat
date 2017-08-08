<?php
namespace App\Controller ;
use \App\Model\Activite;
use \App\Model\Validators;
/**
 * ActiviteController short summary.
 *
 * ActiviteController description.
 *
 * @version 1.0
 * @author Activite
 */
class ActiviteController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Activite");
		$this->loadModel("Domaine");

	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Activite =  $this->post();
			$validator = new Validators($Activite);
			$validator->check('categorie', 'required',"Categorie");
			$validator->check('titre_activite', 'required',"Titre activite");
			$validator->check('domaine_concerne', 'required',"Domaine concerne");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Activite) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Activite['created_by']  = 	$infosConnexion['assoc_id'];		
				$Activite['modified_by'] = 	$infosConnexion['assoc_id'];		
				$Activite['association'] = $infosConnexion['assoc_id'];
				
				$etat = $this->Activite->addActivite($Activite);
				if($etat)
				{
					$success = $this->setAlertSuccess("Activite ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0) ;
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
			$Activite =  $this->post();
						
			$result['Activite'] = $this->Activite->getActivite($Activite['id']);
			$result['Activite']['domaine'] = $this->Domaine->getDomaine($result['Activite']['domaine_concerne']);
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
			$Activite =  $this->post();
						
			$result['Activite'] = $this->Activite->deleteActivite($Activite['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("Activite supprime avec succes");
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
			$this->redirect("Utilisateur/login");
	}
	
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			//on recupere justes les activité de l'association 
			$infosConnexion = $this->getSession("ecatCon") ;
			
			$Activites = array();
			//recuperer la liste des Activites
			$activites = $this->Activite->getAllActiviteByAssoc($infosConnexion['assoc_id']);
			//retrouver le domaine et la categorie des activites
			foreach($activites as $activite)
			{
				$domaine = $this->Domaine->getDomaine($activite['domaine_concerne']);
				$activite['domaine'] = $domaine['designation'] ;
				$Activites[] = $activite ;
			}
			$domaines = $this->Domaine->getAllDomaine();
			// $this->echoTest($domaines);
            $this->render("activite.index",compact("Activites","domaines"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Activite =  $this->post();
		
			$validator = new Validators($Activite);
			$validator->check('categorie', 'required',"Categorie");
			$validator->check('titre_activite', 'required',"Titre activite");
			$validator->check('domaine_concerne', 'required',"Domaine concerne");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Activite) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Activite['id'];
				unset($Activite['id']);
				$etat = $this->Activite->updateActivite($Activite,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Activite modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}
	

}
