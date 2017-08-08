<?php
namespace App\Controller ;
use \App\Model\SousSousdomaine;
use \App\Model\Validators;
/**
 * SousSousdomaineController short summary.
 *
 * SousSousdomaineController description.
 *
 * @version 1.0
 * @author Sousdomaine
 */
class SousdomaineController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Sousdomaine");
		$this->loadModel("Domaine");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Sousdomaine =  $this->post();
			$validator = new Validators($Sousdomaine);
			$validator->check('domaine_concern', 'required',"Domaine");
			$validator->check('sous_domaine_designation', 'required',"Intitule sous domaine");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Sousdomaine) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Sousdomaine['created_by']  = 	$infosConnexion['user_id'];		
				$Sousdomaine['modified_by'] = 	$infosConnexion['user_id'];	
				
				$etat = $this->Sousdomaine->addSousdomaine($Sousdomaine);
				if($etat)
				{
					$success = $this->setAlertSuccess("Sousdomaine ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Sousdomaine) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Sousdomaine) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Sousdomaine/login");
	}
	
	public function getListSousdomaine()
	{
		$result = $this->Sousdomaine->getSousdomaine(1);
		$json['data'] = ($result);
		$d = json_encode($json);
		echo $json ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Sousdomaine =  $this->post();
						
			$result['Sousdomaine'] = $this->Sousdomaine->getSousdomaine($Sousdomaine['id']);
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
			$Sousdomaine =  $this->post();
						
			$result = $this->Sousdomaine->deleteSousdomaine($Sousdomaine['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("Sous domaine supprimée avec success :");
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
			$this->redirect("Sousdomaine/login");
	}
	
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			//recuperer la liste des Sousdomaines
			$Sousdomaines = $this->Sousdomaine->getAllSousdomaine();
			$sousdomaine = array();
			//pour chaque sous domaine recuperer le domaine
			foreach($Sousdomaines as $d )
			{
				$domaine = $this->Domaine->getDomaine($d['domaine_concern']);
				$d ['domaine'] = $domaine['designation'] ;
				$sousdomaine[]  = $d ;
			}
			// $this->echoTest($sousdomaine);
			//recuperer la liste des domaines
			$domaines = $this->Domaine->getAllDomaine();
            $this->render("sousdomaine.index",compact("sousdomaine",'domaines'));
        }
        else
			$this->redirect("Sousdomaine/login");		
	}
	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Sousdomaine =  $this->post();
		
			$validator = new Validators($Sousdomaine);
			$validator->check('domaine_concern', 'required',"Domaine");
			$validator->check('sous_domaine_designation', 'required',"Intitule sous domaine");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Sousdomaine) ;
			}
			else
			{ 
				//on retire l'id du tableau
				$id = $Sousdomaine['id'];
				unset($Sousdomaine['id']);
				$etat = $this->Sousdomaine->updateSousdomaine($Sousdomaine,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Sousdomaine modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Sousdomaine) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Sousdomaine) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Sousdomaine/login");
	}
	
	/*Retourne les sous domaine en fonction du domaine*/
	public function getSoudomaineByDomaine()
	{
		if($this->existSession("ecatCon"))
        {
			$data =  $this->get();
			$result['sousDomaine'] = $this->Sousdomaine->getSousdomaineByDomaine($data['id']);
			$j = json_encode($result);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}
	
}
