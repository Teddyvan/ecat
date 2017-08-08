<?php
namespace App\Controller ;
use \App\Model\Domaine;
use \App\Model\Validators;
/**
 * DomaineController short summary.
 *
 * DomaineController description.
 *
 * @version 1.0
 * @author Domaine
 */
class DomaineController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Domaine");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Domaine =  $this->post();
			$validator = new Validators($Domaine);
			$validator->check('code', 'required',"Code");
			$validator->check('designation', 'required',"Designation");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Domaine) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Domaine['created_by']  = 	$infosConnexion['user_id'];		
				$Domaine['modified_by'] = 	$infosConnexion['user_id'];	
				
				$etat = $this->Domaine->addDomaine($Domaine);
				if($etat)
				{
					$success = $this->setAlertSuccess("Domaine ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Domaine) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Domaine) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}
	
	public function getListDomaine()
	{
		$result = $this->Domaine->getDomaine(1);
		$json['data'] = ($result);
		$d = json_encode($json);
		echo $json ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Domaine =  $this->post();
						
			$result["Domaine"] = $this->Domaine->getDomaine($Domaine['id']);
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
			$Domaine =  $this->post();
						
			$result["Domaine"] = $this->Domaine->deleteDomaine($Domaine['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("Domaine supprime avec succes");
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
	
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			//recuperer la liste des Domaines
			$domaines = $this->Domaine->getAllDomaine();
            $this->render("domaine.index",compact("domaines"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}
	
	//retourne les domaines pour le tableau de bord
	public function getAll()
	{
		 if($this->existSession("ecatCon"))
        {            
			//recuperer la liste des Domaines
			$domaines = $this->Domaine->getAll();
			$array = array("erreur"=>0,"data"=>$domaines) ;
			// $this->echoTest($domaines);
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");		
	}
	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Domaine =  $this->post();
		
			$validator = new Validators($Domaine);
			$validator->check('code', 'required',"Code");
			$validator->check('designation', 'required',"Designation");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Domaine) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Domaine['id'];
				unset($Domaine['id']);
				$etat = $this->Domaine->updateDomaine($Domaine,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Domaine modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Domaine) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Domaine) ;
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
