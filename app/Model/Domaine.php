<?php
/**
 * Summary of namespace App\Model
 * Model Domaine
 */
namespace App\Model ;

class Domaine extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_domaine");
    }
	
	/*Retourne la liste des utilisateurs */
   public function getAllDomaine()
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
	
	//tuiliser pour le tableau de bord
	  public function getAll()
    {
		try
		{
			return $this->findAll("id,designation as domaine");
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	//ajout un nouvel utilisateur
	public function addDomaine($Domaine)
	{
		try
		{
			return $this->add($Domaine);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getDomaine($id)
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
	
	public function updateDomaine($data,$id)
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
	
	public function deleteDomaine($id)
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