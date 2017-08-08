<?php
namespace App\Controller ;
use \App\Model\Association;
use \App\Model\Validators;
/**
 * AssociationController short summary.
 *
 * AssociationController description.
 *
 * @version 1.0
 * @author Association
 */
class AssociationController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Association");
		$this->loadModel("Utilisateur");
		$this->loadModel("Pays");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Association =  $this->post();
			$validator = new Validators($Association);
			$validator->check('abreviation', 'required',"abreviation");
			$validator->check('annee_creation', 'required',"Annee de creation");
			$validator->check('contact_adresse', 'required',"Contact Adresse");
			$validator->check('contact_site', 'required',"contact site");
			$validator->check('contact_phone', 'required',"contact phone");
			$validator->check('contact_email', 'required',"contact email");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Association) ;
			}
			else
			{ 
				$taille_max = 20000;
				//enregistrer la photo
				$etatphoto = false ;
				//recuperation des extension autorise
				$extensions_valides = array( 'jpg','png' , 'jpeg' );
				//recuperation de l'extension du fichier
				$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
				//repertoire ou sera stocké la photo
				$chemin = APP_UPLOAD_PATH_IMG.$Association['login'] .'.'.$extension_upload;
				$user['photo'] = $chemin ;
				
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
								$success = $this->setAlertDanger("erreur de deplacement ");
								$array = array("msg"=>$success,"erreur"=>0) ;
								$j = json_encode($array);
								echo $j ;
								die();
							}
						}
						else
						{
							//extendion non valide
							$success = $this->setAlertDanger("extension non valide ");
							$array = array("msg"=>$success,"erreur"=>0) ;
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
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$user) ;
					$j = json_encode($array);
					echo $j ;
					die();
				}
				$infosConnexion = $this->getSession("ecatCon") ;
				$Association['created_by']  = 	$infosConnexion['user_id'];		
				$Association['modified_by'] = 	$infosConnexion['user_id'];		
				
				$etat = $this->Association->addAssociation($Association);
				if($etat)
				{
					$success = $this->setAlertSuccess("Association ajoutée avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Association) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Association) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}
	
	public function getListAssociation()
	{
		$result = $this->Association->getAssociation(1);
		$json['data'] = ($result);
		$d = json_encode($json);
		echo $json ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$Association =  $this->post();
						
			$result['Association'] = $this->Association->getAssociation($Association['id']);
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
			$this->redirect("Association/login");
	}
	
	public function supprimer()
	{
		if($this->existSession("ecatCon"))
        {
			$Association =  $this->post();
						
			$etat = $this->Association->deleteAssociation($Association['id']);
			if($etat)
			{
				$success = $this->setAlertSuccess("Association supprime avec success");
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
			$this->redirect("Association/login");
	}
	
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			//recuperer la liste des Associations
			$assoc = $this->Association->getAllAssociation();
			$associations = array();
			foreach($assoc as $a)
			{
				$pays = $this->Pays->getPays($a['pays_association']);
				$a['pays_name'] = $pays['country'];
				$associations[] = $a ;
			}
			
			// $this->echoTest($assoc);
			// $this->echoTest($associations);
			//recuperer la liste des utilisateurs
		   $utilisateurs = $this->Utilisateur->getAllUser();
		   //recuperer la liste des pays
		   $pays = $this->Pays->getAllPays();
		   // $this->echoTest($associations);
            $this->render("association.index",compact("associations","utilisateurs","pays"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$Association =  $this->post();
		
			$validator = new Validators($Association);
			$validator->check('abreviation', 'required',"abreviation");
			$validator->check('annee_creation', 'required',"Annee de creation");
			$validator->check('contact_adresse', 'required',"Contact Adresse");
			$validator->check('contact_site', 'required',"contact site");
			$validator->check('contact_phone', 'required',"contact phone");
			$validator->check('contact_email', 'required',"contact email");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$Association) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $Association['id'];
				unset($Association['id']);
				$etat = $this->Association->updateAssociation($Association,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Association modifier avec succees");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Association) ;
				}
				else
				{
					$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
					$array = array("msg"=>$success,"erreur"=>0,"data"=>$Association) ;
				}				
			}
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Association/login");
	}
	/**
	Deconnexion de l'application
	*/
	public function deconnexion()
	{
		$this->destroy();
		$this->redirect("Association/login");
	}

}
