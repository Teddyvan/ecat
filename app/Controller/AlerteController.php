<?php
namespace App\Controller ;
use \App\Model\Alerte;
use \App\Model\Validators;
/**
 * AlerteController short summary.
 *
 * AlerteController description.
 *
 * @version 1.0
 * @author Ivan Bessin
 */
class AlerteController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Alerte");
		$this->loadModel("Association");
		$this->loadModel("TypeAlerte");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Alerte =  $this->post();
			$validator = new Validators($Alerte);
			$validator->check('type', 'required',"type");
			$validator->check('intitule', 'required',"intitule");
			$validator->check('description', 'required',"description");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Alerte) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Alerte['association'] = $infosConnexion['assoc_id'];
				// $this->echoTest($Alerte);
				
				$etat = $this->Alerte->addAlerte($Alerte);
				if($etat)
				{
					$success = $this->setAlertSuccess("Alerte ajoutée avec succees");
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
			$Alerte =  $this->post();
						
			$result['Alerte'] = $this->Alerte->getAlerte($Alerte['id']);
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
			$this->redirect("Alerte/login");
	}
	
		public function supprimer()
	{
		if($this->existSession("ecatCon"))
        {
			$Alerte =  $this->post();
						
			$etat = $this->Alerte->deleteAlerte($Alerte['id']);
			if($etat)
			{
				$success = $this->setAlertSuccess("Alerte supprimée avec succes");
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
			// $infosConnexion['assistant_id'];
			$alertes = array();
			//recuperer la liste des Alertes pour l'utilisateur connectei
			$alerte = $this->Alerte->getAllAlerteById($infosConnexion['assoc_id']);
			foreach($alerte as $a)
			{
				$t = $this->TypeAlerte->getTypeAlerte($a['type']);
				$a['type_name'] = $t['libelle'] ;
				$alertes[] = $a ;
			}

			$types = $this->TypeAlerte->getAllTypeAlerte();
			// $this->echoTest($alertes);
            $this->render("alerte.index",compact("alertes","types"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}
	
	/*
	*Alerte a valider 
	*/
	public function valider($array = null)
	{
		if($this->existSession("ecatCon"))
        {            
			$infosConnexion = $this->getSession("ecatCon") ;
			// $infosConnexion['assistant_id'];
			$alertes = array();
			//recuperer la liste des Alertes a valider
			$alerte = $this->Alerte->getAllAlerteAValider();
			foreach($alerte as $a)
			{
				$t = $this->TypeAlerte->getTypeAlerte($a['type']);
				$assoc = $this->Association->getAssociation($a['association']);
				$a['type_name'] = $t['libelle'] ;
				$a['assoc_name'] = $assoc['login'] ;
				$alertes[] = $a ;
			}

			$types = $this->TypeAlerte->getAllTypeAlerte();
            $this->render("alerte.valider",compact("alertes","types"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Alerte =  $this->post();
		
			$validator = new Validators($Alerte);
			$validator->check('type', 'required',"type");
			$validator->check('intitule', 'required',"intitule");
			$validator->check('description', 'required',"description");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Alerte) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Alerte['id'];
				unset($Alerte['id']);
				$etat = $this->Alerte->updateAlerte($Alerte,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Alerte modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Alerte) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Alerte) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Alerte/login");
	}
	
	/*
	*Valide une alerte
	*/
	public function validation()
	{
		if($this->existSession("ecatCon"))
        {
			$Alerte =  $this->post();
		
			$validator = new Validators($Alerte);
			$this->echoTest($Alerte);
			$validator->check('id', 'required',"id");
			$validator->check('etat', 'required',"etat");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Alerte) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Alerte['id'];
				unset($Alerte['id']);
				$etat = $this->Alerte->updateAlerte($Alerte,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Alerte validé avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Alerte) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant la validation veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Alerte) ;
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
