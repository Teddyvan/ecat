<?php
/**
 * Summary of namespace App\Model
 * Model Association
 */
namespace App\Model ;

class Association extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_association");
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
   public function getAllAssociation()
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
	public function addAssociation($Association)
	{
		try
		{
			return $this->add($Association);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAssociation($id)
	{
		try
		{
			return $this->findOneByField(array('name'=>'id','value'=>$id));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function updateAssociation($data,$id)
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
	
	public function deleteAssociation($id)
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