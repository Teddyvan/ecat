<?php
namespace App\Controller ;
use \App\Model\Technique;
use \App\Model\Validators;
/**
 * TechniqueController short summary.
 *
 * TechniqueController description.
 *
 * @version 1.0
 * @author Technique
 */
class TechniqueController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Technique");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Technique =  $this->post();
			$validator = new Validators($Technique);
			$validator->check('login', 'required',"identifiant");
			$validator->check('password', 'required',"mot de passe");
			$validator->check('abreviation_at', 'required',"Abreviation at");
			$validator->check('contact_adresse', 'required',"Contact adresse ");
			$validator->check('contact_site_web', 'required',"Contact site web ");
			$validator->check('contact_phone', 'required',"Contact phone ");
			$validator->check('contact_email', 'required',"Contact email ");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Technique) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Technique['created_by']  = 	$infosConnexion['user_id'];		
				$Technique['modified_by'] = 	$infosConnexion['user_id'];	
				$etat = $this->Technique->addTechnique($Technique);
				if($etat)
				{
					$success = $this->setAlertSuccess("Assistant Technique ajoutée avec succees");
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
	
	public function getListTechnique()
	{
		$result = $this->Technique->getTechnique(1);
		$json['data'] = ($result);
		$d = json_encode($json);
		echo $json ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Technique =  $this->post();
						
			$result['Technique'] = $this->Technique->getTechnique($Technique['id']);
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
			$Technique =  $this->post();
						
			$result = $this->Technique->deleteTechnique($Technique['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("Suppression de l'assistant technique effectué avec success");
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
			//recuperer la liste des Techniques
			$Techniques = $this->Technique->getAllTechnique();
            $this->render("technique.index",compact("Techniques"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Technique =  $this->post();
		
			$validator = new Validators($Technique);
			$validator->check('login', 'required',"identifiant");
			$validator->check('abreviation_at', 'required',"Abreviation at");
			$validator->check('contact_adresse', 'required',"Contact adresse ");
			$validator->check('contact_site_web', 'required',"Contact site web ");
			$validator->check('contact_phone', 'required',"Contact phone ");
			$validator->check('contact_email', 'required',"Contact email ");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Technique) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Technique['id'];
				unset($Technique['id']);
				$etat = $this->Technique->updateTechnique($Technique,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Technique modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Technique) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Technique) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Technique/login");
	}


}
