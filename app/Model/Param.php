<?php
/**
 * Summary of namespace App\Model
 * Model Param
 */
namespace App\Model ;

class Param extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_param_thme");
    }

	
	
	/*Retourne la liste des utilisateurs */
   public function getAllParam()
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
	public function addParam($Param)
	{
		try
		{
			return $this->add($Param);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getParam($id)
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
	
	public function updateParam($data,$id)
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
	
	public function deleteParam($id)
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
	
	//recuperer les themes regrouper par domaine pour le parametrage
	public function viderTableParam()
	{
		$sql = "truncate table ecat_param_thme";
		$requete = $this->getPDO()->prepare($sql);
		$requete->execute();
		return $requete->execute(); ;
	}

}
?>