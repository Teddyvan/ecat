<?php
namespace App\Controller ;
use \App\Model\Ressource;
use \App\Model\Validators;
/**
 * RessourceController short summary.
 *
 * RessourceController description.
 *
 * @version 1.0
 * @author Ressource
 */
class RessourcesController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Ressource");
		$this->loadModel("Domaine");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Ressource =  $this->post();
			$validator = new Validators($Ressource);
			$validator->check('type', 'required',"Type");
			$validator->check('description_activite', 'required',"Description");
			$validator->check('theme', 'required',"Theme de rattachement");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Ressource) ;
			}
			else
			{ 
				$fichier = $this->saveFile($_FILES) ;

				$Ressource['fichier1'] = (!empty($fichier['fichier1'])) ? $fichier['fichier1'] : '' ;
				$Ressource['fichier2'] = (!empty($fichier['fichier2'])) ? $fichier['fichier2'] : '' ;	
				$Ressource['fichier3'] = (!empty($fichier['fichier3'])) ? $fichier['fichier3'] : '' ;
				$Ressource['date'] = @gmdate('Y-m-d') ;
				$Ressource['etat'] = 1 ;
				$infosConnexion = $this->getSession("ecatCon") ;
				$etat = 0 ;
				if($infosConnexion['type'] == RAN)
				{
					$Ressource['user'] =  $infosConnexion['user_id'];
					$etat = $this->Ressource->addRessourceRam($Ressource);
				}
				else if($infosConnexion['type'] == ASSOC)
				{
					$Ressource['association'] =  $infosConnexion['assoc_id'];
					$etat = $this->Ressource->addRessourceAssoc($Ressource);
				}
				else
				{
					$Ressource['assistant'] = $infosConnexion['assistant_id'];
					$etat = $this->Ressource->addRessourceTech($Ressource);
				}
				
				//enregistrement operation
				
				if($etat > 0)
				{
					$success = $this->setAlertSuccess("Ressource ajoutée avec succees");
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
	*/
	private function saveFile($fichiers )
	{
		$infosConnexion = $this->getSession("ecatCon") ;
		$result = array();
		//afficher le profil de la personne connecté
		if($infosConnexion['type'] == RAN)
			$chemin = APP_UPLOAD_PATH_DOCUMENT_RAME .$infosConnexion['user_id'];
		if($infosConnexion['type'] == ASSOC)
			$chemin = APP_UPLOAD_PATH_DOCUMENT_ASSOC . $infosConnexion['assoc_id'];
		if($infosConnexion['type'] == ASSISTANT)
			$chemin = APP_UPLOAD_PATH_DOCUMENT_ASSISTANT.$infosConnexion['assistant_id'];
		
		$taille_max = 40000;
		//enregistrer la photo
		$etatphoto = false ;
		//recuperation des extension autorise
		$extensions_valides = array( 'pdf','xlsx','doc','docx','ppt','pptx','jpeg' );

		//le nombre de fichier
		$nbre_fichier = count($fichiers['fichier']['name']);
		for($i=0; $i< $nbre_fichier; $i++)
		{
			if(!empty($fichiers['fichier']['name'][$i]))
			{
				//extension du fichier
				$extension_upload = strtolower(  substr(  strrchr($fichiers['fichier']['name'][$i], '.')  ,1)  );
				//
				if(in_array($extension_upload,$extensions_valides))
				{
					//deplacer les fichiers
					$fichier = $chemin .'_'.@gmdate('Y-m-d').'_'.@gmdate("H:i:s")."{$i}.".$extension_upload ;
					if (@move_uploaded_file($fichiers['fichier']['tmp_name'][$i], $fichier))
					{
						$j = $i + 1 ;
						$result["fichier{$j}"] = $fichier ;
						// $this->echoTest($fichiers['fichier']['name'][$i]);
						// $this->echoTest($extension_upload);
					}
				}
			}
		}
		return $result ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Ressource =  $this->post();
						
			$result['Ressource'] = $this->Ressource->getRessource($Ressource['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("recuperation okay :");
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
			$this->redirect("Ressource/login");
	}
	
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			$infosConnexion = $this->getSession("ecatCon") ;
			$ressources = array();
			$ressource = array();
			//recuperer la liste des Ressources
			if($infosConnexion['type'] == RAN)
			{
				$ressource = $this->Ressource->getAllRessourceRamById($infosConnexion['user_id']);
				
			}
			else if($infosConnexion['type'] == ASSOC)
			{
			
				$ressource = $this->Ressource->getAllRessourceAssocById($infosConnexion['assoc_id']);
			
			}
			else
			{
				$ressource = $this->Ressource->getAllRessourceTechById($infosConnexion['assistant_id']);
				
			}
			
			foreach($ressource as $r)
			{
				$theme = $this->Domaine->getDomaine($r['theme']) ;
				$r['theme_name'] = $theme['designation'];
				$ressources[] = $r ;
			}
			// $this->echoTest($ressources) ;
			//recuperer la liste des domaines
			$domaines = $this->Domaine->getAllDomaine();
            $this->render("ressource.index",compact("ressources","domaines"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Ressource =  $this->post();
		
			$validator = new Validators($Ressource);
			$validator->check('type', 'required',"Type");
			$validator->check('description_activite', 'required',"Description");
			$validator->check('theme', 'required',"Theme de rattachement");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Ressource) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$ressources = array();
				$ressource = array();
				//recuperer la liste des Ressources
				if($infosConnexion['type'] == RAN)
				{
					$ressource = $this->Ressource->getAllRessourceRamById($infosConnexion['user_id']);
					
				}
				else if($infosConnexion['type'] == ASSOC)
				{
				
					$ressource = $this->Ressource->getAllRessourceAssocById($infosConnexion['assoc_id']);
				
				}
				else
				{
					$ressource = $this->Ressource->getAllRessourceTechById($infosConnexion['assistant_id']);
					
				}
				//on retire l'id du tableau
				$id = $Ressource['id'];
				unset($Ressource['id']);
				$etat = $this->Ressource->updateRessource($Ressource,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Ressource modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Ressource) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Ressource) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Ressource/login");
	}

	/** Telecharge les fichiers
	*/
	public function telecharger()
	{ 
		$infosConnexion = $this->getSession("ecatCon") ;
		$ressource = array();
		$LaRessource =  $this->post();
		//recuperer la liste des Ressources
		if($infosConnexion['type'] == RAN)
		{
			$ressource = $this->Ressource->getAllRessourceFileRamById($LaRessource['id']);
			
		}
		else if($infosConnexion['type'] == ASSOC)
		{
		
			$ressource = $this->Ressource->getAllRessourceFileAssocById($LaRessource['id']);
		
		}
		else
		{
			$ressource = $this->Ressource->getAllRessourceFileTechById($LaRessource['id']);
		}
		// $this->echoTest($ressource);
	
	
		for($i = 1 ; $i <= 3 ;$i++ )
		{
			if($ressource["fichier{$i}"] != '')
			{
				if(is_file($ressource["fichier{$i}"]))
				{
					// echo $i ;
					// $this->echoTest($ressource["fichier{$i}"]);
					$nom = "ressource_{$i}_".@gmdate("Y-m-d_H:i:s") ;
					$poids = filesize($ressource["fichier{$i}"]);

				$this->forcerTelechargement($nom,$ressource["fichier{$i}"],$poids);
				}
			}
		}
	}
	
		private function  forcerTelechargement($nom, $situation, $poids)
		{
		header('Content-Type: application/octet-stream');
		header('Content-Length: '. $poids);
		header('Content-disposition: attachment; filename='. $nom);
		header('Pragma: no-cache');
		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		readfile($situation);
		exit();
		}

}
