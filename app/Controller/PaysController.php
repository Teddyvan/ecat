<?php
namespace App\Controller ;
use \App\Model\Pays;
use \App\Model\Validators;
/**
 * PaysController short summary.
 *
 * PaysController description.
 *
 * @version 1.0
 * @author Pays
 */
class PaysController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Pays");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Pays =  $this->post();
			$validator = new Validators($Pays);
			$validator->check('country', 'required',"pays");
			$validator->check('abreviation', 'required',"Abreviation");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Pays) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Pays['created_by'] = $infosConnexion['user_id'];
				$Pays['modified_by'] = $infosConnexion['user_id'];
				$etat = $this->Pays->addPays($Pays);
				if($etat)
				{
					$success = $this->setAlertSuccess("Pays ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Pays) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Pays) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}
	
	// public function getListPays()
	// {
		// $result = $this->Pays->getPays(1);
		// $json['data'] = ($result);
		// $d = json_encode($json);
		// echo $json ;
	// }
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Pays =  $this->post();
						
			$result['Pays'] = $this->Pays->getPays($Pays['id']);
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
			$this->redirect("Pays/login");
	}
	
		public function supprimer()
	{
		if($this->existSession("ecatCon"))
        {
			$Pays =  $this->post();
						
			$etat = $this->Pays->deletePays($Pays['id']);
			if($etat)
			{
				$success = $this->setAlertSuccess("Pays supprimée avec succes");
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
			$this->redirect("Pays/login");
	}
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			//recuperer la liste des Pays
			$pays = $this->Pays->getAllPays();
			
            $this->render("pays.index",compact("pays"));
        }
        else
			$this->redirect("Pays/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Pays =  $this->post();
		
			$validator = new Validators($Pays);
			$validator->check('country', 'required',"Pays");
			$validator->check('abreviation', 'required',"Abreviation");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Pays) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Pays['id'];
				unset($Pays['id']);
				$etat = $this->Pays->updatePays($Pays,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Pays modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Pays) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Pays) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Pays/login");
	}
	
}
