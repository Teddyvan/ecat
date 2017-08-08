<?php
/**
 * Summary of namespace App\Model
 * Model Utilisateur
 */
namespace App\Model ;

class Utilisateur extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("utilisateur");
    }

	//connexion
    public function connexion($data)
    {
		try
		{
			return $this->findOneByFields(array('filtres'=>'login= ? and password = ?','values'=>array($data['login'],$data['mdp'])));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	/*Retourne la liste des utilisateurs */
   public function getAllUser()
    {
		try
		{
			return $this->findAll();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	//ajout un nouvel utilisateur
	public function addUser($user)
	{
		try
		{
			return $this->add($user);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getUser($id)
	{
		try
		{
			return $this->findOneByField(array('name'=>'id','value'=>$id),'id,nom,prenom,login,idGroupe,etat');
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function updateUser($data,$id)
	{
		try
		{
			return $this->update($data,$id);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function deleteUser($id)
	{
		try
		{
			return $this->delete($id);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

}
?>