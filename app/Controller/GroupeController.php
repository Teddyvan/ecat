<?php
namespace App\Controller ;
use \App\Model\Groupe;
use \App\Model\Validators;
/**
 * GroupeController short summary.
 *
 * GroupeController description.
 *
 * @version 1.0
 * @author Bessin  Ivan
 */
class GroupeController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Groupe");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Groupe =  $this->post();
			$validator = new Validators($Groupe);
			$validator->check('libelle', 'required',"libelle");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1) ;
			}
			else
			{ 
				
				$etat = $this->Groupe->addGroupe($Groupe);
				if($etat)
				{
					$success = $this->setAlertSuccess("Groupe ajoutée avec succees");
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
	
	public function getListGroupe()
	{
		$result = $this->Groupe->getGroupe(1);
		$json['data'] = ($result);
		$d = json_encode($json);
		echo $json ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Groupe =  $this->post();
						
			$result['Groupe'] = $this->Groupe->getGroupe($Groupe['id']);			
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
	
	public function details()
	{
		if($this->existSession("ecatCon"))
        {
			$Groupe =  $this->post();
						
			$result['Groupe'] = $this->Groupe->getGroupe($Groupe['id']);
			
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
			$Groupe =  $this->post();
			$etat = $this->Groupe->deleteGroupe($Groupe['id']);
			if($etat)
			{
				$success = $this->setAlertSuccess("Suppression effectué avec succes :");
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
			//recuperer la liste des groupes
			$groupes =  $this->Groupe->getAllGroupe();
            $this->render("groupe.index",compact("groupes"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

		
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Groupe =  $this->post();
		
			$validator = new Validators($Groupe);
			$validator->check('libelle', 'required',"libelle");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Groupe) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Groupe['id'];
				unset($Groupe['id']);
				$etat = $this->Groupe->updateGroupe($Groupe,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Groupe modifier avec succees");
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
			$this->redirect("Groupe/login");
	}
	/**
	Deconnexion de l'application
	*/
	public function deconnexion()
	{
		$this->destroy();
		$this->redirect("Groupe/login");
	}

}
