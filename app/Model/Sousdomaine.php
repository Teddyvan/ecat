<?php
/**
 * Summary of namespace App\Model
 * Model Sousdomaine
 */
namespace App\Model ;

class Sousdomaine extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_sous_domaine");
    }
	
	/*Retourne la liste des utilisateurs */
   public function getAllSousdomaine()
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
	
	// ajout un nouvel utilisateur
	public function addSousdomaine($Sousdomaine)
	{
		try
		{
			return $this->add($Sousdomaine);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	// retourne les infos de l'utilisateur d'id id en param
	public function getSousdomaine($id)
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
	
	public function updateSousdomaine($data,$id)
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
	
	public function deleteSousdomaine($id)
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
	
	// retourne les sous domaines en fonction d'un domaine
	public function getSousdomaineByDomaine($id)
	{
		try
		{
		return $this->findAllByFields(array('filtres'=>'domaine_concern = ?','values'=>array($id)), 'id,sous_domaine_designation') ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

}
?>