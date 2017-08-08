<?php
/**
 * Summary of namespace App\Model
 * Model Annonce
 */
namespace App\Model ;

class Annonce extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_annonce");
    }

	
	
	/*Retourne la liste des utilisateurs */
   public function getAllAnnonce()
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
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAllAnnonceById($id)
	{
		try
		{
			return $this->findAllByField(array('name'=>'created_by','value'=>$id));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//ajout un nouvel utilisateur
	public function addAnnonce($Annonce)
	{
		try
		{
			return $this->add($Annonce);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAnnonce($id)
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
	
	public function updateAnnonce($data,$id)
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
	
	public function deleteAnnonce($id)
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