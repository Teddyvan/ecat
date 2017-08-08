<?php
namespace Core\Table;

//utilisation de la connexion a la base de donnee
use Core\Database\Database;
/**
 * Table short summary.
 *
 * Table description.
 *
 * @version 1.0
 * @author Bessin Ivan
 */
class DAOMysql extends Database
{
	protected $table;
	protected $db ;

	public function __construct($table)
	{
        parent::__construct($table) ;
        //$this->db = $this->getPDO();
        //if(is_null($this->table))
        //{
        //    //$parts = explode('\\',get_class($this));
        //    //$class_name = end($parts) ;
        //    $this->table = $table ;
        //}
	}



}