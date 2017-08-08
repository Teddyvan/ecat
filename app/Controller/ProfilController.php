<?php
namespace App\Controller ;
use \App\Model\Profil;
use \App\Model\Validators;
/**
 * ProfilController short summary.
 *
 * ProfilController description.
 *
 * @version 1.0
 * @author Profil
 */
class ProfilController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Association");
		$this->loadModel("Utilisateur");
		$this->loadModel("Pays");
		$this->loadModel("Technique");
	}

	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Profil =  $this->post();
						
			$result['Profil'] = $this->Profil->getProfil($Profil['id']);
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
			$this->redirect("Profil/login");
	}
	
		public function supprimer()
	{
		if($this->existSession("ecatCon"))
        {
			$Profil =  $this->post();
						
			$etat = $this->Profil->deleteProfil($Profil['id']);
			if($etat)
			{
				$success = $this->setAlertSuccess("Profil supprimée avec succes");
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
			$this->redirect("Profil/login");
	}
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {         
			$pays = $this->Pays->getAllPays();
			$infosConnexion = $this->getSession("ecatCon") ;
			//afficher le profil de la personne connecté
			$result = array();
			if($infosConnexion['type'] == RAN)
				{
					$type = RAN ;
					$result = $this->Utilisateur->getUser($infosConnexion['user_id']);					
				}
				if($infosConnexion['type'] == ASSOC)
				{
					$type = ASSOC ;
					$result = $this->Association->getAssociation($infosConnexion['assoc_id']);
					$unPays = $this->Pays->getPays($result['pays_association']) ;
					$result['pays_association'] = $unPays['id'];
					$result['pays_name'] = $unPays['country'];
					
				}
				if($infosConnexion['type'] == ASSISTANT)
				{
					$type = ASSISTANT ;
					$result = $this->Technique->getTechnique($infosConnexion['assistant_id']);
				}
				// $this->echoTest($result);
			
            $this->render("profile.index",compact('type',"result",'pays'));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Profil =  $this->post();
		
			$validator = new Validators($Profil);
			$validator->check('country', 'required',"Profil");
			$validator->check('abreviation', 'required',"Abreviation");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Profil) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Profil['id'];
				unset($Profil['id']);
				$etat = $this->Profil->updateProfil($Profil,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Profil modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Profil) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Profil) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Profil/login");
	}
	
}
