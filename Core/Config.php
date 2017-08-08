<?php
namespace Core ;
/**
 * Config short summary.
 *
 * Config description.
 *
 * @version 1.0
 * @author Bessin Ivan
 */
class Config
{
	private $settings = array() ;
	private static $_instance ;

	public static function getInstance($file)
	{
		if(is_null(self::$_instance))
		{
			self::$_instance = new Config($file);
		}
		return self::$_instance;
	}

	public function __construct($file)
	{
		$this->settings = require($file);
	}

	public function __get($key)
	{
		if(!isset($this->settings[$key]))
			return null ;

		return $this->settings[$key] ;
	}
}