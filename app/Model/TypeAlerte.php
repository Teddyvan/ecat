<?php
/**
 * Summary of namespace App\Model
 * Model TypeAlerte
 */
namespace App\Model ;

class TypeAlerte extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct('ecat_type_alerte');
    }

	
	/*Retourne la liste des utilisateurs */
   public function getAllTypeAlerte()
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
	public function addTypeAlerte($TypeAlerte)
	{
		try
		{
			return $this->add($TypeAlerte);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getTypeAlerte($id)
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
	
	public function updateTypeAlerte($data,$id)
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
	
	public function deleteTypeAlerte($id)
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