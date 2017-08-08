<?php
namespace App\Controller ;
use \App\Model\Annonce;
use \App\Model\Validators;
/**
 * AnnonceController short summary.
 *
 * AnnonceController description.
 *
 * @version 1.0
 * @author Ivan Bessin
 */
class AnnonceController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Annonce");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Annonce =  $this->post();
			$validator = new Validators($Annonce);
			$validator->check('categorie', 'required',"Categorie");
			$validator->check('date_fin', 'required',"Date fin");
			$validator->check('date_debut', 'required',"Date debut");
			$validator->check('titre', 'required',"Annonce");
			$validator->check('contenu', 'required',"Contenu");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Annonce) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				if($infosConnexion['type'] == RAN)
				{
					$Annonce['created_by'] = $infosConnexion['user_id'];
				}
				if($infosConnexion['type'] == ASSOC)
				{
					$Annonce['created_by'] = $infosConnexion['assoc_id'];
				}
				if($infosConnexion['type'] == ASSISTANT)
				{
					$Annonce['created_by'] = $infosConnexion['assistant_id'];
				}
				$Annonce['date'] = @gmdate("Y-m-d") ;
				$Annonce['etat'] = 1 ;
				//$this->echoTest($Annonce);
				$etat = $this->Annonce->addAnnonce($Annonce);
				if($etat)
				{
					$success = $this->setAlertSuccess("Annonce ajoutée avec succees");
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
			$Annonce =  $this->post();
						
			$result['Annonce'] = $this->Annonce->getAnnonce($Annonce['id']);
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
			$Annonce =  $this->post();
						
			$etat = $this->Annonce->deleteAnnonce($Annonce['id']);
			if($etat)
			{
				$success = $this->setAlertSuccess("Annonce supprimée avec succes");
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
			$infosConnexion = $this->getSession("ecatCon") ;
			if($infosConnexion['type'] == RAN)
			{
				$Annonce['created_by'] = $infosConnexion['user_id'];
			}
			if($infosConnexion['type'] == ASSOC)
			{
				$Annonce['created_by'] = $infosConnexion['assoc_id'];
			}
			if($infosConnexion['type'] == ASSISTANT)
			{
				$Annonce['created_by'] = $infosConnexion['assistant_id'];
			}
			//recuperer la liste des Annonces pour l'utilisateur connectei
			$Annonce = $this->Annonce->getAllAnnonce();
			// foreach($Annonce as $a)
			// {
				
			// }
            $this->render("annonce.index",compact("Annonce"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Annonce =  $this->post();
		
			$validator = new Validators($Annonce);
			$validator->check('categorie', 'required',"Categorie");
			$validator->check('date_fin', 'required',"Date fin");
			$validator->check('date_debut', 'required',"Date debut");
			$validator->check('titre', 'required',"Annonce");
			$validator->check('contenu', 'required',"Contenu");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Annonce) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Annonce['id'];
				unset($Annonce['id']);
				$etat = $this->Annonce->updateAnnonce($Annonce,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Annonce modifier avec succees");
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
	
}
