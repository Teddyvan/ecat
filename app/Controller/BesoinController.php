<?php
namespace App\Controller ;
use \App\Model\Besoin;
use \App\Model\Validators;
/**
 * BesoinController short summary.
 *
 * BesoinController description.
 *
 * @version 1.0
 * @author Besoin
 */
class BesoinController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Besoin");
		$this->loadModel("Association");
		$this->loadModel("Domaine");
		$this->loadModel("Sousdomaine");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Besoin =  $this->post();
			$validator = new Validators($Besoin);
			$validator->check('designation', 'required',"designation");
			$validator->check('domain_concerne', 'required',"domaine concerne");
			$validator->check('sous_domaine', 'required',"sous_domaine");
			$validator->check('insuffisance_releve', 'required',"insuffisance releve");
			$validator->check('appui_technique', 'required',"Objet appui_technique");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Besoin) ;
			}
			else
			{ 
				$infosConnexion = $this->getSession("ecatCon") ;
				$Besoin['created_by']  = 	$infosConnexion['assoc_id'];		
				$Besoin['modified_by'] = 	$infosConnexion['assoc_id'];		
				$fichier = $this->saveFile($_FILES) ;
				$Besoin['fichier'] = $fichier['fichier'];
				$Besoin['association_concerne'] = $infosConnexion['assoc_id'];
				$etat = $this->Besoin->addBesoin($Besoin);
				if($etat)
				{
					$success = $this->setAlertSuccess("Besoin ajoutée avec succees");
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
		$chemin = APP_UPLOAD_PATH_BESOIN.$infosConnexion['assoc_id'];
		
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
						// $j = $i + 1 ;
						$result["fichier"] = $fichier ;
						// $this->echoTest($fichiers['fichier']['name'][$i]);
						// $this->echoTest($extension_upload);
					}
				}
			}
				return $result ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Besoin =  $this->post();
						
			$result['Besoin'] = $this->Besoin->getBesoin($Besoin['id']);
			$result['Besoin']['sous_domaine'] = $this->Sousdomaine->getSousdomaine($result['Besoin']['sous_domaine']);
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
			$Besoin =  $this->post();
						
			$result = $this->Besoin->getBesoin($Besoin['id']);
			if($result)
			{
				$etat = $this->Besoin->deleteBesoin($Besoin['id']);
				if($etat)
				{
					//supprimer le fichier
					unlink($result['fichier']) ;
					$success = $this->setAlertSuccess("Besoin supprimée avec success");
					$array = array("msg"=>$success,"erreur"=>0) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu lors de la suppression.Veuillez ressayer svp !");
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
			//recuperer la liste des Associations
			$associations = $this->Association->getAllAssociation();
			//la liste des besoins
			$besoin = $this->Besoin->getAllBesoin();
			$besoins = array() ;
			//recuperer le domaine et le sous domaine
			foreach($besoin as $b)
			{
				$soudomaine_data =  $this->Sousdomaine->getSousdomaine($b['sous_domaine']) ;
				$domaine_data =  $this->Domaine->getDomaine($b['domain_concerne']) ;
				$b['domaine'] = $domaine_data['designation'] ;
				$b['sous_domaine'] = $soudomaine_data['sous_domaine_designation'] ;
				$besoins[] = $b ;
			}
			//recuperer la liste des domaines
			$domaines = $this->Domaine->getAllDomaine();
			
            $this->render("besoin.index",compact("besoins","domaines","associations"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

		
	/*REcupere les sous domaine d'un domaine */
	public function getSousDomaineByIdDomaine()
	{
		$domaine =  $this->post();
		//recuperer la liste des  sous-domaine
		$soudom = $this->Sousdomaine->getSousdomaineByDomaine($domaine['id']);
		//recupere
	}
	
	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Besoin =  $this->post();
		
			$validator = new Validators($Besoin);
			$validator->check('login', 'required',"identifiant");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Besoin) ;
			}
			else
			{ 
				if(!empty($_FILES))
				{
					$taille_max  = 20000;
					//recuperation des extension autorise
					$extensions_valides = array( 'jpg','png' , 'jpeg' );
					//recuperation de l'extension du fichier
					$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
					//repertoire ou sera stocké la photo
					$chemin = APP_UPLOAD_PATH_IMG.$Besoin['login'] .'.'.$extension_upload;
					$Besoin['photo'] = $chemin ;
					
					if ($_FILES["photo"]["error"] == 0)
					{
						if(filesize($_FILES['photo']['tmp_name']) <= $taille_max)
						{
							if(in_array($extension_upload,$extensions_valides))
							{
								//repertoire ou sera stocké la photo

								if (move_uploaded_file($_FILES['photo']['tmp_name'], $chemin))
								{
									
								}
								else
								{
									$success = $this->setAlertDanger("Erreur lors de l'enregistrement du fichier ");
									$array = array("msg"=>$success,"erreur"=>0) ;
									$j = json_encode($array);
									echo $j ;
									die();
								}
							}
							else
							{
								//extendion non valide
								$success = $this->setAlertDanger("extension non valide .Les fichiers autorisé sont *.jpg,*.jpeg,*.png ");
								$array = array("msg"=>$success,"erreur"=>0,"data"=>$Besoin) ;
								$j = json_encode($array);
								echo $j ;
								die();
							}
						}
						else
						{
							$success = $this->setAlertDanger("Le fichier est trop volumineux");
							$array = array("msg"=>$success,"erreur"=>0) ;
							$j = json_encode($array);
							echo $j ;
							die();
						}
						
					}
					else
					{
						//une erreur est survenue
						$msg = "une erreur est survenue code erreur :".$_FILES["photo"]["error"] ;
						$success = $this->setAlertDanger($msg);
						$array = array("msg"=>$success,"erreur"=>0,"data"=>$Besoin) ;
						$j = json_encode($array);
						echo $j ;
						die();
					}
					
				}
				//on retire l'id du tableau
				$id = $Besoin['id'];
				unset($Besoin['id']);
				$etat = $this->Besoin->updateBesoin($Besoin,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Besoin modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Besoin) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Besoin) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Besoin/login");
	}
	/**
	Deconnexion de l'application
	*/
	public function deconnexion()
	{
		$this->destroy();
		$this->redirect("Besoin/login");
	}

}
