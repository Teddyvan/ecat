<?php
/**
 * Summary of namespace App\Model
 * Model Technique
 */
namespace App\Model ;

class Technique extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_assistance_technique");
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
   public function getAllTechnique()
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
	public function addTechnique($Technique)
	{
		try
		{
			return $this->add($Technique);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getTechnique($id)
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
	
	public function updateTechnique($data,$id)
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
	
	public function deleteThechnique($id)
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