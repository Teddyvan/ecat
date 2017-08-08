<?php
/**
 * Summary of namespace App\Model
 * Model Besoin
 */
namespace App\Model ;

class Besoin extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_association_besoin");
    }


	
	/*Retourne la liste des utilisateurs */
   public function getAllBesoin()
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
	 
	 //recupere les besoins par ordre decroissant pour le tableau de bord
	 public function getToutBesoin()
    {
		try
		{
			$sql = "select b.id as id, d.designation as domaine,b.insuffisance_releve as insuff,b.designation as besoin_designation
					from ecat_association a 
						INNER JOIN  ecat_association_besoin b 
							on a.id = b.association_concerne
						INNER JOIN ecat_domaine d
							on d.id = b.domain_concerne
					ORDER BY b.id desc limit 3" ;
			$requete = $this->getPDO()->prepare($sql);
			$requete->execute();
			return $requete->fetchAll(\PDO::FETCH_ASSOC);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    }
	
	//ajout un nouvel utilisateur
	public function addBesoin($Besoin)
	{
		try
		{
			return $this->add($Besoin);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getBesoin($id)
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
	
	public function updateBesoin($data,$id)
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
	
		public function deleteBesoin($id)
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