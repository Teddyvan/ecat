<?php
namespace App\Controller ;
use \App\Model\Service;
use \App\Model\Validators;
/**
 * ServiceController short summary.
 *
 * ServiceController description.
 *
 * @version 1.0
 * @author Bessin Ivan
 */
class ServiceController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		 $this->loadModel("Service");
		 $this->loadModel("Pays");
		 $this->loadModel("Domaine");
	}

	
	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Service =  $this->post();
			$validator = new Validators($Service);
			$validator->check('domaine', 'required',"Domaine");
			$validator->check('probleme_identify', 'required',"Probleme identifie");
			$validator->check('offer_designation', 'required',"Intitule offre ");
			$validator->check('country_concerne', 'required',"Pays concerne");
			$validator->check('date_ouverture', 'required',"Ouverture");
			$validator->check('date_fermeture', 'required',"Cloture");
			$validator->check('frequence', 'required',"Regularite de l'offre");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Service) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$fichier = $this->saveFile($_FILES) ;
				$Service['assistant'] = $infosConnexion['assistant_id'];
				$Service['fichier'] = $fichier['fichier'];
				$Service['dateHeureCreation'] = @gmdate("Y-m-d H:i:s");
				$etat = $this->Service->addService($Service);
				if($etat)
				{
					$success = $this->setAlertSuccess("Offre ajoutée avec succees");
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
	
	/**
	* ENregistre les fichier soumis
	pour l'offre technique 
	*/
	private function saveFile($fichiers )
	{
		$infosConnexion = $this->getSession("ecatCon") ;
		$result = array();
		$chemin = APP_UPLOAD_PATH_OFFRE_ASSISTANT.$infosConnexion['assistant_id'];
		
		$taille_max = TAILLE_MAX;
		//enregistrer la photo
		$etatphoto = false ;
		//recuperation des extension autorise
		$extensions_valides = array( 'pdf','xlsx','doc','docx','ppt','pptx','jpeg' );
		if(!empty($fichiers['fichier']['name']))
			{
					
				//extension du fichier
				$extension_upload = strtolower(  substr(  strrchr($fichiers['fichier']['name'], '.')  ,1)  );
				
				if(in_array($extension_upload,$extensions_valides))
				{
					
					//deplacer les fichiers
					$fichier = $chemin .'_'.@gmdate('Y-m-d').'_'.@gmdate("H:i:s").".".$extension_upload ;
					if (@move_uploaded_file($fichiers['fichier']['tmp_name'], $fichier))
					{
						$result["fichier"] = $fichier ;
					}
				}
			}
				return $result ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Service =  $this->post();
						
			$result['Service'] = $this->Service->getService($Service['id']);
			if($result)
			{
				$array = array("erreur"=>0,"data"=>$result) ;
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
			$Service =  $this->post();
			$infosConnexion = $this->getSession("ecatCon") ;
			$result = array();
			//afficher le profil de la personne connecté
		
			$result = $this->Service->getService($Service['id']);
						
			if($result)
			{
				
				$etat =  $this->Service->deleteService($Service['id']); 			
				if($etat > 0)
				{
					if(!empty($result['fichier']))
					{
						if(file_exist($result['fichier']))
							unlink($result['fichier']);
					}
					
					$success = $this->setAlertSuccess("Offre supprimé avec success");
					$array = array("msg"=>$success,"erreur"=>0) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu pendant la suppression.Veuillez ressayer svp !");
					$array = array("msg"=>$success,"erreur"=>1) ;
				}
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
			//recuperer la liste des Services pour l'assistant connecté
			$services = array();
			
			$Services = $this->Service->getAllService($infosConnexion['assistant_id']);
			foreach($Services as $s)
			{
				$p = $this->Pays->getPays($s['country_concerne']) ;
				$d = $this->Domaine->getDomaine($s['domaine']) ;
				$s['domaine'] = $d['designation'];
				$s['pays_name'] = $p['country'];
				$services[] = $s ;
			}
			//recuperer la listes des pays
			$pays = $this->Pays->getAllPays() ;
			//recuperer la liste des domaines
			$domaines = $this->Domaine->getAllDomaine() ;
            $this->render("service.index",compact("services",'pays','domaines'));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Service =  $this->post();
			
			$validator = new Validators($Service);
			$validator->check('domaine', 'required',"Domaine");
			$validator->check('probleme_identify', 'required',"Probleme identifie");
			$validator->check('offer_designation', 'required',"Intitule offre ");
			$validator->check('country_concerne', 'required',"Pays concerne");
			$validator->check('date_ouverture', 'required',"Ouverture");
			$validator->check('date_fermeture', 'required',"Cloture");
			$validator->check('frequence', 'required',"Regularite de l'offre");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Service) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Service['id'];
				unset($Service['id']);
				$etat = $this->Service->updateService($Service,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Offre modifiée avec succees");
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
	/**
	Deconnexion de l'application
	*/
	public function deconnexion()
	{
		$this->destroy();
		$this->redirect("Utilisateur/login");
	}

}
