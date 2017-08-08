<?php
namespace App\Controller ;
use \App\Model\Utilisateur;
use \App\Model\Groupe;
use \App\Model\Validators;
/**
 * UtilisateurController short summary.
 *
 * UtilisateurController description.
 *
 * @version 1.0
 * @author Utilisateur
 */
class UtilisateurController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Utilisateur");
		$this->loadModel("Association");
		$this->loadModel("Technique");
		$this->loadModel("Groupe");
	}

	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$user =  $this->post();
			$validator = new Validators($user);
			$validator->check('login', 'required',"identifiant");
			$validator->check('password', 'required',"mot de passe");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$user) ;
			}
			else
			{ 
				
				$etat = $this->Utilisateur->addUser($user);
				if($etat)
				{
					$success = $this->setAlertSuccess("Utilisateur ajoutée avec succees");
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
	
	public function getListUser()
	{
		$result = $this->Utilisateur->getUser(1);
		$json['data'] = ($result);
		$d = json_encode($json);
		echo $json ;
	}
	
	public function modifier()
	{
		if($this->existSession("ecatCon"))
        {
			$user =  $this->post();
						
			$result['user'] = $this->Utilisateur->getUser($user['id']);
			$result['groupes'] =  $this->Groupe->getAllGroupe();
			
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
			$user =  $this->post();
						
			$result['user'] = $this->Utilisateur->getUser($user['id']);
			
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
			$user =  $this->post();
			$etat = $this->Utilisateur->deleteUser($user['id']);
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
			//recuperer la liste des utilisateurs
			$utilisateurs = $this->Utilisateur->getAllUser();
			//recuperer la liste des groupes
			$groupes =  $this->Groupe->getAllGroupe();
            $this->render("utilisateurs.index",compact("utilisateurs","groupes"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}

	/*Connexion via javascript*/
	public function connexion()
	{
			//recupere et nettoie les données
			$user = $this->post();
			//controle les donnees
			$validator = new Validators($user);
			$validator->check('login', 'required',"Identifiant");
			$validator->check('mdp',   'required','mot de passe');
			$validator->check('profil',   'required','Profile');
			$erreur = array();
			$erreur = $validator->errors();
			sleep(1);
			if(empty($erreur))
			{
				//il n'ya pas d'erreur
				/*PLUSIEUR POSSIBILITE
				 1 => RAN
				 2 => ASSOCIATION
				 3 => ASSISTANT TECHNIQUE
				*/
				if($user['profil'] == RAN)
				{
					$result = $this->Utilisateur->connexion($user);
					if($result){
						$infoCon = array("img_profile"=>$this->getPhotoProfile($result['login']),
									"nom"=>$result['nom'] .' '.$result['prenom'],
									"user_id"=>$result['id'],
									"groupe"=>$result['idGroupe'],
									"type"=>RAN,
									"login"=>$result['login']
									) ;
					}
				}
				if($user['profil'] == ASSOC)
				{
					$result = $this->Association->connexion($user);
					if($result){
						$infoCon = array(
									"img_profile"=>$this->getPhotoProfile($result['login']),
									"nom"=>$result['abreviation'],
									"assoc_id"=>$result['id'],
									"type"=>ASSOC,
									"login"=>$result['login']
									) ;
					}
				}
				if($user['profil'] == ASSISTANT)
				{
					$result = $this->Technique->connexion($user);
					if($result){
						$infoCon = array(
									"img_profile"=>$this->getPhotoProfile($result['login']),
									"nom"=>$result['abreviation_at'],
									"assistant_id"=>$result['id'],
									"type"=>ASSISTANT,
									"login"=>$result['login']
									) ;
					}
				}
					
				// $this->echoTest($result);		
				if(!empty($result))
				{
					
					$this->setSession("ecatCon",$infoCon);
					$success = $this->setAlertSuccess("Authentification ok");
					$arr = array("msg"=>$success,"erreur"=>0,"lien"=>"index.php?p=Bord/index") ;
				}
				else
				{
					$erreur = $this->setAlertWarning("Identifiant / mot de passe incorrect");
					$arr = array("msg"=>$erreur,"erreur"=>1);
				}
			}
			else
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$arr = array("msg"=>$erreur,"erreur"=>1);
			}
			
			$j = json_encode($arr);
			echo $j ;
	}
	
	/**
	*Recupere la photo de profile de l'utilisateur
	**/
	private function getPhotoProfile($login)
	{
		$cheminVersFichier = APP_UPLOAD_PATH_IMG.$login ;
		if(file_exists($cheminVersFichier.'.jpg'))
			return SERVER.'/user/'.$login.'.jpg';
		else if(file_exists($cheminVersFichier.'.jpeg'))
			return SERVER.'/user/'.$login.'.jpeg';
		else if(file_exists($cheminVersFichier.'.png'))
			return SERVER.'/user/'.$login.'.png';
		else
			return SERVER.'/user/avatar5.png';
	}

	/**
	*Affiche le formulaire de connexion
	*/
	public function login()
	{ 
        //si l'utilisateur est deja connecté on le redirige vers la page d'acceuil
        //on verifie l'existe de la variable session['budgPro']
        if($this->existSession("ecatCon"))
        {
            //la variable existe il est connecté
            $this->redirect("Utilisateur/index");
        }
        else
        {
            //la variable n'existe pas il n'est pas connecté
            $this->template = 'connexion' ;
            $this->render("utilisateurs.login");
        }
	}
	
	public function saveUpdate()
	{
		if($this->existSession("ecatCon"))
        {
			$user =  $this->post();
		
			$validator = new Validators($user);
			$validator->check('login', 'required',"identifiant");
			$erreur = $validator->errors();
			
			if(!empty($erreur))
			{
				//il ya erreur
				$erreur = $this->setAlertDanger(implode('<br>', $erreur));
				$array = array("msg"=>$erreur,"erreur"=>1,"data"=>$user) ;
			}
			else
			{ 
				
				//on retire l'id du tableau
				$id = $user['id'];
				unset($user['id']);
				$etat = $this->Utilisateur->updateUser($user,$id);
				if($etat)
				{
					$success = $this->setAlertSuccess("Utilisateur modifier avec succees");
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
