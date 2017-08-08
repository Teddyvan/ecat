<?php
namespace Core\Database;
use \PDO ;
/**
 * CLass fournissant l'acces a la base de données.
 *@author Ivan Bessin
 */
class Database
{
	private $db_host;
	private $db_name;
	private $db_user ;
	private $db_pass;
	private $db ;
    protected $table;
	protected $id;
	protected $_pkey;


	public function __construct($domaine, $primary_key = 'id',$db_name=DB_NAME,$db_user=DB_USER,$db_pass=DB_PASSWORD,$db_host= DB_HOST)
	{
		$this->db_host = $db_host ;
		$this->db_name = $db_name ;
		$this->db_user = $db_user ;
		$this->db_pass = $db_pass ;
        $this->_domaine = $domaine;
		$this->_pkey = $primary_key;
	}

	/**
	 *
	 * Retourne une instance de la base donnée
	 * @return PDO
	 */
	protected function getPDO()
	{
		if($this->db === null )
		{
            try{
			$pdo = new PDO("mysql:dbname=".$this->db_name.";host=".$this->db_host,$this->db_user,$this->db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->db = $pdo ;
            }catch(\Exception $e)
            {
                var_dump($e->getMessage());
            }
			
		}
		return $this->db ;
	}

	//methode CRUD insert ,update

	/**
     * Renvoie un entier correspondant au type du paramètre à passer à PDO::bindParam ou PDO::bindValue
     *
     * @return int PDO PARAM TYPE
     */
    private function getPDOParamType($value)
    {
        if(is_int($value)) return \PDO::PARAM_INT;
        if(is_bool($value)) return \PDO::PARAM_BOOL;
        if(is_null($value)) return \PDO::PARAM_NULL;
        return \PDO::PARAM_STR;
    }

    private function PDOBindParam(&$requete,$values,$types)
    {
        $nb = count($values);
        for($i = 0; $i < $nb; $i++){
            $requete->bindParam(($i+1), $values[$i], $types[$i]);
        }
    }
    /**
     * Retrouve un tableau associatif contenant entre autres les colonnes, les valeurs, ...
     * d'une instance de la table du modèle dérivé
     * Son objectif est de permettre de construire facilement des requêtes préparées PDO
     *
     * @param array $arrayObject instance d'élément de la table du modèle dérivé
     * @return array Un tableau associatif
     */
    private function getPDOPrepareObject($arrayObject = array())
    {
        $Tobject = array('columns'=>array(), 'markers'=>array(), 'types'=>array(), 'values'=>array());
        foreach($arrayObject as $instanceName => $instanceValue)
        {
            $Tobject['columns'][] = $instanceName;
            $Tobject['markers'][] = '?';
            $Tobject['types'][] = $this->getPDOParamType($instanceValue);
            $Tobject['values'][] = $instanceValue;

        }
        $Tobject['markers'] = implode(',',$Tobject['markers']);
        return $Tobject;
    }

    /**
     * Retrouve un message d'exception provenant de PDOException. Ce message est reformaté pour masquer
     * les noms des objets de la base de données
     *
     * @param PDOException $e une instance d'exception PDO
     * @return string Le message d'exception reformaté selon le cas.
     */
    private function getPDOExceptionMsg(\PDOException $e)
    {
        if(APP_MODE=='prod'){
            $exceptionMsg = "Petit problème: La base de données est temporairement indisponible; cela pourrait être lié à votre connexion...";
        }
        else{
            $exceptionMsg = $e->getMessage();
        }
        return $exceptionMsg;
    }

	/**
     * Ajoute un élément dans la table du modèle dérivé
     *
     * @param array $object Tableau contenant un élément à insérer dans la table du modèle dérivé
     * @return le nombre de ligne ajouter ou un message d'erreur selon le cas
     */
    public function add($object = array())
    {
        try {
            $Tobject = $this->getPDOPrepareObject($object);
            $Tobject['columns'] = implode(',',$Tobject['columns']);
            $requete = $this->getPDO()->prepare("INSERT INTO ".$this->_domaine."
																		(".$Tobject['columns'].")
																		VALUES (".$Tobject['markers'].")");
            $this->PDOBindParam($requete,$Tobject['values'],$Tobject['types']);
            $etat = $requete->execute();
            return $this->getPDO()->lastInsertId();
        }
        catch(\PDOException $e)
        {
            throw new \Exception($e);
            //throw new Exception($this->getPDOExceptionMsg($e));
        }
    }

    /**
     * Met à jour un élément dans la table du modèle dérivé
     *
     * @param array $object Tableau contenant un élément à insérer dans la table du modèle dérivé
     * @param int $id Identifiant d'un élément de la table du modèle dérivé
     * @return le nombre de lignes mises à jour ou un message d'erreur selon le cas
     */
    public function update($object = array(),$id)
    {
        try {
            $Tobject = $this->getPDOPrepareObject($object);
            $Tobject['columns'] = implode(' = ?, ',$Tobject['columns']) . ' = ?';
            $Tobject['values'][] = $id;
            $Tobject['types'][] = $this->getPDOParamType($id);
            $requete = $this->getPDO()->prepare( "UPDATE ".$this->_domaine." SET ".$Tobject['columns']." WHERE ".$this->_pkey." = ?");
            $this->PDOBindParam($requete,$Tobject['values'],$Tobject['types']);
            $etat = $requete->execute();
            return $etat;
        }
        catch(\PDOException $e)
        {
            throw new \Exception($this->getPDOExceptionMsg($e));
        }
    }

    public function updateByFields($object = array(), $fields = array('filtres'=>'','values'=>array()))
    {
        try {
            $Tobject = $this->getPDOPrepareObject($object);
            $Tobject['columns'] = implode(' = ?, ',$Tobject['columns']) . ' = ?';
            foreach($fields['values'] as $value){
                $Tobject['values'][] = $value;
                $Tobject['types'][] = $this->getPDOParamType($value);
            }
            $requete = $this->getPDO()->prepare( 'UPDATE '.$this->_domaine.' SET '.$Tobject['columns'].' WHERE '.$fields['filtres']);
            $this->PDOBindParam($requete,$Tobject['values'],$Tobject['types']);
            $etat = $requete->execute();
            // $requete->debugDumpParams();
            return $etat;
        }
        catch(\PDOException $e)
        {
            throw new \Exception($this->getPDOExceptionMsg($e));
        }
    }
    /**
     * Supprime un élément dans la table du modèle dérivé par son id
     *
     * @param int $id la valeur de l'id d'une ligne de la table du modèle dérivé
     * @return le nombre de lignes suprimées ou un message d'erreur selon le cas
     */
    public function delete($id)
    {
        try {
            $requete = $this->getPDO()->prepare("DELETE FROM ".$this->_domaine." WHERE ".$this->_pkey." = :id");
            $requete->bindValue(':id', $id);
            $etat = $requete->execute();
            return $etat;
        }
        catch(\PDOException $e)
        {
            throw new \Exception($this->getPDOExceptionMsg($e));
        }
    }


    /**
     * Supprime un/plusieurs élément(s) dans la table du modèle dérivé par la valeur d'une colonne quelconque
     *
     * @param array $field le nom d'une colonne de la table du modèle dérivé et sa valeur
     * @return le nombre de lignes suprimées ou un message d'erreur selon le cas
     */
    public function deleteByField($field = array('name'=>'','value'=>''))
    {
        try {
            $requete = $this->getPDO()->prepare("DELETE FROM ".$this->_domaine." WHERE ".$field['name']." =  :value");
            $requete->bindValue(':value', $field['value']);
            $etat = $requete->execute();
            return $etat;
        }
        catch(\PDOException $e)
        {
            throw new \Exception($this->getPDOExceptionMsg($e));
        }
    }

    public function deleteByFields($fields = array('filtres'=>'','values'=>array()))
    {
        try {
            $Tobject['values'] = array();
            $Tobject['types'] = array();
            foreach($fields['values'] as $value){
                $Tobject['values'][] = $value;
                $Tobject['types'][] = $this->getPDOParamType($value);
            }
            $requete = $this->getPDO()->prepare("DELETE FROM ".$this->_domaine." WHERE ".$fields['filtres']);
            $this->PDOBindParam($requete,$Tobject['values'],$Tobject['types']);
            $etat = $requete->execute();
            return $etat;
        }
        catch(\PDOException $e)
        {
            throw new \Exception($this->getPDOExceptionMsg($e));
        }
    }

    /**
     * Retrouve un/zéro élément de la table du modèle dérivé par son id
     *
     * @param int $id Identifiant d'un élément de la table du modèle dérivé
     * @return array Un tableau associatif / FALSE selon le cas
     */
    public function findOne($id, $selectedFields = '*')
    {
        $requete = $this->getPDO()->prepare("SELECT ".$selectedFields." FROM ".$this->_domaine." WHERE ".$this->_pkey." = :id");
        $requete->bindValue(':id', $id);
        $requete->execute();
        $donnees = $requete->fetch(\PDO::FETCH_ASSOC);
        return $donnees;
    }

    /**
     * Retrouve un/zéro élément de la table du modèle dérivé par la valeur d'une colonne quelconque à index UNIQUE
     *
     * @param array $field le nom d'une colonne de la table du modèle dérivé et sa valeur
     *
     * @return array Un tableau associatif / FALSE selon le cas
     */
    public function findOneByField($field = array('name'=>'','value'=>''), $selectedFields = '*')
    {
        $requete = $this->getPDO()->prepare("SELECT ".$selectedFields." FROM ".$this->_domaine." WHERE ".$field['name']." =  :value LIMIT 1");
        $requete->bindValue(':value', $field['value']);
        $requete->execute();
        $donnees = $requete->fetch(\PDO::FETCH_ASSOC);
        return $donnees;
    }

    public function findOneByFields($fields = array('filtres'=>'','values'=>array()), $selectedFields = '*')
    {
        $Tobject['values'] = array();
        $Tobject['types'] = array();
        foreach($fields['values'] as $value){
            $Tobject['values'][] = $value;
            $Tobject['types'][] = $this->getPDOParamType($value);
        }
        $requete = $this->getPDO()->prepare('SELECT '.$selectedFields.' FROM '.$this->_domaine.' WHERE '.$fields['filtres']);
        $this->PDOBindParam($requete,$Tobject['values'],$Tobject['types']);
        $requete->execute();
        $donnees = $requete->fetch(\PDO::FETCH_ASSOC);
        return $donnees;
    }

    /**
     * Retrouve zéro/un/des éléments de la table du modèle dérivé
     *
     * @return array Un tableau associatif / FALSE selon le cas
     */
    public function findAll($selectedFields = '*')
    {
        $requete = $this->getPDO()->prepare("SELECT ".$selectedFields." FROM ".$this->_domaine);
        $requete->execute();
        $donnees = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $donnees;
    }

    /**
     * Retrouve un/plusieurs élément de la table du modèle dérivé par la valeur d'une colonne quelconque
     *
     * @param array $field le nom d'une colonne de la table du modèle dérivé et sa valeur
     *
     * @return array Un tableau associatif / FALSE selon le cas
     */
    public function findAllByField($field = array('name'=>'','value'=>''), $selectedFields = '*')
    {
        $requete = $this->getPDO()->prepare("SELECT ".$selectedFields." FROM ".$this->_domaine." WHERE ".$field['name']." =  :value");
        $requete->bindValue(':value', $field['value']);
        $requete->execute();
        $donnees = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $donnees;
    }

    public function findAllByFields($fields = array('filtres'=>'','values'=>array()), $selectedFields = '*')
    {
        $Tobject['values'] = array();
        $Tobject['types'] = array();
        foreach($fields['values'] as $value){
            $Tobject['values'][] = $value;
            $Tobject['types'][] = $this->getPDOParamType($value);
        }
        $requete = $this->getPDO()->prepare('SELECT '.$selectedFields.' FROM '.$this->_domaine.' WHERE '.$fields['filtres']);
        $this->PDOBindParam($requete,$Tobject['values'],$Tobject['types']);
        $requete->execute();
        $donnees = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $donnees;
    }
}
?>