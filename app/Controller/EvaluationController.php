<?php
namespace App\Controller ;
use \App\Model\Evaluation;
use \App\Model\Validators;
/**
 * EvaluationController short summary.
 *
 * EvaluationController description.
 *
 * @version 1.0
 * @author Ivan Bessin
 */
class EvaluationController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Evaluation");
		$this->loadModel("Association");
		$this->loadModel("Domaine");
		$this->loadModel("Sousdomaine");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Evaluation = $_POST;
			$fichiers = $_FILES ;
			//enregistrer les datas 
			
				$infosConnexion = $this->getSession("ecatCon") ;
			
				$controle = 0 ;
				$nbreLigne = count($Evaluation['idTheme']) ;
			
			/*	//verifier que l'association a son repertoire
				$directory_name = APP_RESSOURCES_PATH_ASSOC.$user['login']  ;
				
				if( !is_dir($directory_name))
				{
					//si le repertoire n'existe pas on le cree
					mkdir($directory_name, 0777, true) ;
				}
				
				$taille_max = 15000;
				//enregistrer le fichier
				$etatphoto = false ;
				//recuperation des extension autorise
				$extensions_valides = array( 'jpg','png' , 'jpeg' );
				//$this->echoTest($fichiers);
				//pour la ligne si ya des fichiers on les enregistre
					//recuperation de l'extension du fichier
					$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
					//repertoire ou sera stocké la photo
					$chemin = APP_RESSOURCES_PATH_ASSOC.$user['login'] .'.'.$extension_upload;
					$user['photo'] = $chemin ;
					
					if ($_FILES["fichier1"]["error"] == 0)
					{
						if(filesize($_FILES['photo']['tmp_name']) <= $taille_max)
						{
							if(in_array($extension_upload,$extensions_valides))
							{
								//repertoire ou sera stocké la photo

								if (move_uploaded_file($_FILES['photo']['tmp_name'], $chemin))
								{
									
								}
							}
						}
					}*/
				$note = 0;
				for($i=0; $i< $nbreLigne; $i++)
				{
					
					
					 if($Evaluation['note'][$i] == '0,5')
						 $note = 50 ; 
					 elseif($Evaluation['note'][$i] == '1')
						 $note = 100 ;
					 else
						 $note = 0 ;
					 
					// if( !empty($Evaluation['description'][$i]))
						// $description = $Evaluation['description'][$i] ;
					
					// $fichiers
	$donneeProd = array('domaine'=> htmlspecialchars($Evaluation['idDomaine'][$i]),
						'theme'=>  htmlspecialchars($Evaluation['idTheme'][$i]),
						'association'=>  $infosConnexion['assoc_id'],
						'note'=> $note ,
						'date'=> @gmdate("Y-m-d"),
						'description'=>(isset($Evaluation['description'][$i])) ?  htmlspecialchars($Evaluation['description'][$i]) : '' ,
						'fichier1'=>(!empty($Evaluation['fichier1'][$i])) ?  htmlspecialchars($Evaluation['fichier1'][$i]) : '',
						'fichier2'=>(!empty($Evaluation['fichier2'][$i])) ? htmlspecialchars($Evaluation['fichier2'][$i]) : '',
						'fichier3'=>(!empty($Evaluation['fichier3'][$i])) ?htmlspecialchars($Evaluation['fichier3'][$i]) : '',
						'fichier4'=>(!empty($Evaluation['fichier4'][$i])) ?htmlspecialchars($Evaluation['fichier4'][$i]) : '',
						);
					
					$etat = $this->Evaluation->addEvaluation($donneeProd);
					if($etat)
						$controle++ ;
				}
				if($controle == $nbreLigne)
				{
					//garder la trace de l'auto evaluation
				$this->Evaluation->saveTraceEvaluation(array('idAssoc'=>$infosConnexion['assoc_id'],'description'=>''));
					$success = $this->setAlertSuccess("Evaluation ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0) ;
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
			$Evaluation =  $this->post();
						
			$result['Evaluation'] = $this->Evaluation->getEvaluation($Evaluation['id']);
			$result['Evaluation']['sous_domaine'] = $this->Sousdomaine->getSousdomaine($result['Evaluation']['sous_domaine']);
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
			$Evaluation =  $this->post();
						
			$result = $this->Evaluation->deleteEvaluation($Evaluation['id']);
			if($result)
			{
				$success = $this->setAlertSuccess("Evaluation supprimée avec success");
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
			// $Besoin['created_by']  = 	$infosConnexion['assoc_id'];		
			// $Besoin['modified_by'] = 	$infosConnexion['assoc_id'];		
			// $Besoin['association_concerne'] = $infosConnexion['assoc_id'];
			
			//recuperer la liste des Associations
			
			//la liste des Evaluations
			$Evaluation = $this->Evaluation->getAllEvaluation();
			$Evaluations = array() ;
			//recuperer le domaine et le sous domaine
			foreach($Evaluation as $b)
			{
				$soudomaine_data =  $this->Sousdomaine->getSousdomaine($b['sous_domaine']) ;
				$domaine_data =  $this->Domaine->getDomaine($b['domain_concerne']) ;
				$b['domaine'] = $domaine_data['designation'] ;
				$b['sous_domaine'] = $soudomaine_data['sous_domaine_designation'] ;
				$Evaluations[] = $b ;
			}
			//recuperer la liste des domaines
			$domaines = $this->Domaine->getAllDomaine();
			
            $this->render("evaluation.index",compact("Evaluations","domaines","associations"));
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
			$Evaluation =  $this->post();
		
			$validator = new Validators($Evaluation);
			$validator->check('login', 'required',"identifiant");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Evaluation) ;
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
					$chemin = APP_UPLOAD_PATH_IMG.$Evaluation['login'] .'.'.$extension_upload;
					$Evaluation['photo'] = $chemin ;
					
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
								$array = array("msg"=>$success,"erreur"=>0,"data"=>$Evaluation) ;
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
						$array = array("msg"=>$success,"erreur"=>0,"data"=>$Evaluation) ;
						$j = json_encode($array);
						echo $j ;
						die();
					}
					
				}
				//on retire l'id du tableau
				$id = $Evaluation['id'];
				unset($Evaluation['id']);
				$etat = $this->Evaluation->updateEvaluation($Evaluation,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Evaluation modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Evaluation) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Evaluation) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Evaluation/login");
	}
	/**
	Deconnexion de l'application
	*/
	public function deconnexion()
	{
		$this->destroy();
		$this->redirect("Evaluation/login");
	}

}
