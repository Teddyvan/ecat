<?php
/**
 * Summary of namespace App\Model
 * Model Trace
 * GERE les traces des differentes evaluation des associations
 */
namespace App\Model ;

class Trace extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_trace_evaluation");
    }

	/*REtourne toutes les evaluation pour une association */
	public function getAllEvalByAssoc($idAssoc)
    {
		try
		{
			return $this->findAllByField(array('name'=>'association','value'=>$idAssoc),'id,date,description');
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	
	/*Retourne la liste des utilisateurs */
   public function getAllTrace()
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
	public function addTrace($Trace)
	{
		try
		{
			return $this->add($Trace);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getTrace($id)
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
	
	public function updateTrace($data,$id)
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
	
	public function deleteTrace($id)
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