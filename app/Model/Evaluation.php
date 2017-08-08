<?php
/**
 * Summary of namespace App\Model
 * Model Evaluation
 */
namespace App\Model ;

class Evaluation extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_association_evaluation");
    }

	/*Retourne la liste des utilisateurs */
   public function getAllEvaluation()
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
	
	/*REtourne toutes les evaluation pour une association */
	public function getAllEvalByAssoc($idAssoc)
    {
		try
		{
			return $this->findAllByField(array('name'=>'association','value'=>$idAssoc),'id,date');
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	//ajout un nouvel utilisateur
	public function addEvaluation($Evaluation)
	{
		try
		{
			return $this->add($Evaluation);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getEvaluation($id)
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
	
	public function updateEvaluation($data,$id)
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
	
	public function deleteEvaluation($id)
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
	
	//
	public function saveTraceEvaluation($data=array())
	{
		$sql = "Insert into ecat_trace_evaluation set date=UTC_DATE(),association=:idAssoc ";
		$requete = $this->getPDO()->prepare($sql);
		try
		{
			$requete->bindValue(":idAssoc",$data['idAssoc']) ;
			return $requete->execute();
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}
	
	/**
	retourne les notes 
	*/
	
	public function getRecaptEvaluation($idAssoc)
	{
		$sql = "SELECT  e.note as note_moyenne ,d.designation as domaine ,t.abreviation ,e.date as date_evaluation
					FROM ecat_association_evaluation e 
						INNER JOIN ecat_domaine d  	
							on e.domaine = d.id
						INNER JOIN ecat_theme t
							on t.id = e.theme
					where e.association = :idAssoc";
		$requete = $this->getPDO()->prepare($sql);
		try
		{
			$requete->bindValue(":idAssoc",$idAssoc) ;
			$requete->execute();
			return $requete->fetchAll(\PDO::FETCH_ASSOC) ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}
	

}
?>