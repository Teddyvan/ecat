<?php

/**
 * App short summary.
 *
 * App description.
 *
 * @version 1.0
 * @author Bessin Ivan
 */
class App
{
	public $title = "site" ;
	private $db_instance ;
	private static $_instance ;

	public static function getInstance()
	{
		if(is_null(self::$_instance))
		{
			self::$_instance = new App() ;
		}
		return self::$_instance ;
	}


	public static function getTable($name)
	{
		$class_name = "\App\Model\\" . ucfirst($name) ;
		//return new $class_name($this->getDb());
        return new $class_name();
	}

	public function getDb()
	{

		if(is_null($this->db_instance))
		{
			$this->db_instance = new Database(DB_NAME,DB_USER,sDB_PASS,DB_HOST);
		}
		return $this->db_instance  ;
	}

	public static function load()
	{
		session_start();
		require ROOT.'/app/Autoloader.php';
		App\Autoloader::register();
		require ROOT.'/Core/Autoloader.php';
		Core\Autoloader::register();
	}
}