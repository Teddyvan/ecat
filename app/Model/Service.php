<?php
/**
 * Summary of namespace App\Model
 * Model Service
 */
namespace App\Model ;

class Service extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_assistance_technique_offre");
    }

		
	/*Retourne la liste des offres soumises par un assistant */
   public function getAllService($id)
    {
		try
		{
			return $this->findAllByField(array('name'=>'assistant','value'=>$id));
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
    } 
	//recupere les besoins par ordre decroissant pour le tableau de bord
	public function getToutService()
    {
		try
		{
			$sql = "select p.country as pays_name,d.designation as domaine,o.offer_designation as offre,o.date_ouverture as ouverture ,o.date_fermeture as fermeture 
					from ecat_assistance_technique_offre o
						INNER JOIN ecat_assistance_technique a 
							on a.id = o.assistant
						INNER JOIN ecat_domaine d
							on d.id = o.domaine
						INNER JOIN ecat_pays p
							on p.id = o.country_concerne
					ORDER BY o.id desc limit 5" ;
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
	public function addService($Service)
	{
		try
		{
			return $this->add($Service);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getService($id)
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
	
	public function updateService($data,$id)
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
	
	public function deleteService($id)
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