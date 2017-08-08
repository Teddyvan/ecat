<?php
/**
 * Summary of namespace App\Model
 * Model Groupe
 */
namespace App\Model ;

class Groupe extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("groupe");
    }

	
	/*Retourne la liste des utilisateurs */
   public function getAllGroupe()
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
	public function addGroupe($Groupe)
	{
		try
		{
			return $this->add($Groupe);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getGroupe($id)
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
	
	public function updateGroupe($data,$id)
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
	
	public function deleteGroupe($id)
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