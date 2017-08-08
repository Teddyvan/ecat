<?php
namespace App\Controller ;
use \App\Model\TypeAlerte;
use \App\Model\Validators;
/**
 * TypeAlerteController short summary.
 *
 * TypeAlerteController description.
 *
 * @version 1.0
 * @author Bessin  Ivan
 */
class TypeAlerteController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("TypeAlerte");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$TypeAlerte =  $this->post();
			$validator = new Validators($TypeAlerte);
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
				
				$etat = $this->TypeAlerte->addTypeAlerte($TypeAlerte);
				if($etat)
				{
					$success = $this->setAlertSuccess("Type Alerte ajoutée avec succees");
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
			$TypeAlerte =  $this->post();
						
			$result['TypeAlerte'] = $this->TypeAlerte->getTypeAlerte($TypeAlerte['id']);			
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
			$TypeAlerte =  $this->post();
						
			$result['TypeAlerte'] = $this->TypeAlerte->getTypeAlerte($TypeAlerte['id']);
			
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
			$TypeAlerte =  $this->post();
			$etat = $this->TypeAlerte->deleteTypeAlerte($TypeAlerte['id']);
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
			//recuperer la liste des TypeAlertes
			$types =  $this->TypeAlerte->getAllTypeAlerte();
            $this->render("type.index",compact("types"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

		
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$TypeAlerte =  $this->post();
		
			$validator = new Validators($TypeAlerte);
			$validator->check('libelle', 'required',"libelle");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$TypeAlerte) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $TypeAlerte['id'];
				unset($TypeAlerte['id']);
				$etat = $this->TypeAlerte->updateTypeAlerte($TypeAlerte,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("TypeAlerte modifier avec succees");
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
			$this->redirect("TypeAlerte/login");
	}
	/**
	Deconnexion de l'application
	*/
	public function deconnexion()
	{
		$this->destroy();
		$this->redirect("TypeAlerte/login");
	}

}
