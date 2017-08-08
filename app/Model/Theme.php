<?php
/**
 * Summary of namespace App\Model
 * Model Theme
 */
namespace App\Model ;

class Theme extends \Core\Database\Database
{
    public function __construct()
    {
        parent::__construct("ecat_theme");
    }
	
	/*Retourne la liste des utilisateurs */
   public function getAllTheme()
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
	public function addTheme($Theme)
	{
		try
		{
			return $this->add($Theme);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	// retourne les infos de l'utilisateur d'id id en param
	public function getTheme($id)
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
	
	public function updateTheme($data,$id)
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
	
	public function deleteTheme($id)
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
	
	// retourne les sous domaines en fonction d'un domaine pour le remplissage de la liste deroulante
	public function getThemeByDomaine($id)
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
	
	//recuperer les themes regrouper par domaine pour le parametrage
	public function recupererThemeParDomaine()
	{
		$sql = "select t.id as idTheme,t.cplmt_theme,t.abreviation, d.id as idDomaine, d.designation	
				FROM ecat_theme t
				INNER JOIN ecat_domaine d 
				ON t.domaine_concern = d.id 
				order by t.domaine_concern ASC
				";
		$requete = $this->getPDO()->prepare($sql);
		try
		{
			$requete->execute();
			$data = $requete->fetchAll(\PDO::FETCH_ASSOC) ;
			return $data ;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() ;
		}
	}

}
?>