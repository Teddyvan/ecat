<?php
/**
 * Summary of namespace App\Model
 * Model Ressource
 */
namespace App\Model ;

class Ressource extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_ressource_assoc");
    }

		
	/*Retourne la liste des ressources publié de l'association */
   public function getAllRessourceAssocById($id)
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
	/*Retourne la liste des ressources publié de l'utilisateur */
	public function getAllRessourceRamById($id)
    {
		$sql = "SELECT *
				from ecat_ressource_ram 
				where user = :user ";
		$requete = $this->getPDO()->prepare($sql);
		$requete->bindValue(":user",$id);
		try
		{
			$requete->execute();
			return $requete->fetchAll(\PDO::FETCH_ASSOC) ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
    }
	
	/*Retourne la liste des ressources publié de l'assistant technique */
	public function getAllRessourceTechById($id)
    {
		$sql = "SELECT *
				from ecat_ressource_tech 
				where assistant = :assistant ";
		$requete = $this->getPDO()->prepare($sql);
		$requete ->bindValue(":assistant",$id);
		try
		{
			$requete->execute();
			return $requete->fetchAll(\PDO::FETCH_ASSOC) ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
    }
	
	//ajout un nouvelle ressource assoc
	public function addRessourceAssoc($Ressource)
	{
		try
		{
			return $this->add($Ressource);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//ajout un nouvelle ressource assitant
	public function addRessourceTech($Ressource)
	{	
		$sql = "INSERT INTO ecat_ressource_tech 
				SET type = :type ,date = :date,	assistant =:assistant,description_activite =:description_activite,	theme=:theme,fichier1 = :fichier1 ,	fichier2 = :fichier2,fichier3=:fichier3,etat = :etat";
		$requete = $this->getPDO()->prepare($sql);
		$requete ->bindValue(":type",$Ressource['type']);
		$requete ->bindValue(":date",$Ressource['date']);
		$requete ->bindValue(":assistant",$Ressource['assistant']);
		$requete ->bindValue(":description_activite",$Ressource['description_activite']);
		$requete ->bindValue(":theme",$Ressource['theme']);
		$requete ->bindValue(":fichier1",$Ressource['fichier1']);
		$requete ->bindValue(":fichier2",$Ressource['fichier2']);
		$requete ->bindValue(":fichier3",$Ressource['fichier3']);
		$requete ->bindValue(":etat",$Ressource['etat']);
		try
		{
			return $requete->execute();
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}
	
	//ajout un nouvelle ressource ram
	public function addRessourceRam($Ressource)
	{	
		$sql = "INSERT INTO ecat_ressource_ram 
				SET type = :type ,date = :date,	user =:user,description_activite =:description_activite,	theme=:theme,fichier1 = :fichier1 ,	fichier2 = :fichier2,fichier3=:fichier3,etat = :etat";
		$requete = $this->getPDO()->prepare($sql);
		$requete ->bindValue(":type",$Ressource['type']);
		$requete ->bindValue(":date",$Ressource['date']);
		$requete ->bindValue(":user",$Ressource['user']);
		$requete ->bindValue(":description_activite",$Ressource['description_activite']);
		$requete ->bindValue(":theme",$Ressource['theme']);
		$requete ->bindValue(":fichier1",$Ressource['fichier1']);
		$requete ->bindValue(":fichier2",$Ressource['fichier2']);
		$requete ->bindValue(":fichier3",$Ressource['fichier3']);
		$requete ->bindValue(":etat",$Ressource['etat']);
		try
		{
			return $requete->execute();
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}

	
	//retourne les infos de l'utilisateur d'id id en param
	public function getRessource($id)
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
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAllRessourceFileAssocById($id)
	{ 
		try
		{
			return $this->findOneByField(array('name'=>'id','value'=>$id),'fichier1,fichier2,fichier3');
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAllRessourceFileRamById($id)
	{ 
		$sql = "SELECT fichier1,fichier2,fichier3
				from ecat_ressource_ram 
				where id = :id ";
		$requete = $this->getPDO()->prepare($sql);
		$requete ->bindValue(":id",$id);
		try
		{
			$requete->execute();
			return $requete->fetch(\PDO::FETCH_ASSOC) ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}
	
	
	//retourne les infos de l'utilisateur d'id id en param
	public function getAllRessourceFileTechById($id)
	{ 
		$sql = "SELECT fichier1,fichier2,fichier3
				from ecat_ressource_tech 
				where id = :id ";
		$requete = $this->getPDO()->prepare($sql);
		$requete ->bindValue(":id",$id);
		try
		{
			$requete->execute();
			return $requete->fetch(\PDO::FETCH_ASSOC) ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}
	
	public function updateRessourceAssoc($data,$id)
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
	
	public function updateRessourceTech($data,$id)
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
	
	public function updateRessourceRam($data,$id)
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
	
	public function deleteRessourceAssoc($id)
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
	
	public function deleteRessourceTech($id)
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
	
	public function deleteRessourceRam($id)
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