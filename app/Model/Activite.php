<?php
/**
 * Summary of namespace App\Model
 * Model Activite
 */
namespace App\Model ;

class Activite extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_association_activite");
    }

	/*Retourne la liste des utilisateurs */
   public function getAllActivite()
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
	
	/*REtourne toutes les activite pour une association */
	public function getAllActiviteByAssoc($idAssoc)
    {
		try
		{
			return $this->findAllByField(array('name'=>'association','value'=>$idAssoc));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	//ajout un nouvel utilisateur
	public function addActivite($Activite)
	{
		try
		{
			return $this->add($Activite);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getActivite($id)
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
	
	public function updateActivite($data,$id)
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
	
	public function deleteActivite($id)
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