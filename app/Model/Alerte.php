<?php
/**
 * Summary of namespace App\Model
 * Model Alerte
 */
namespace App\Model ;

class Alerte extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_alerte");
    }

	
	
	/*Retourne la liste des alertes */
   public function getAllAlerte()
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
	
	/*Retourne la liste des alertes a valider */
   public function getAllAlerteAValider()
    {
		try
		{
			return $this->findAllByField(array('name'=>'etat','value'=>0));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAllAlerteById($id)
	{
		try
		{
			return $this->findAllByField(array('name'=>'association','value'=>$id));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//ajout un nouvel utilisateur
	public function addAlerte($Alerte)
	{
		try
		{
			return $this->add($Alerte);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAlerte($id)
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
	
	public function updateAlerte($data,$id)
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
	
	public function deleteAlerte($id)
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