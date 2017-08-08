<?php
namespace Core ;
/**
 * Autoloader short summary.
 *
 * Autoloader charge automatiquement les classes que nous avons developpé .
 *
 * @version 1.0
 * @author Bessin Ivan
 */
class Autoloader
{
	/**
	 * Summary of register
	 * Charge dynamiquement les classes necessaires
	 */
	static function register()
	{
		spl_autoload_register(array(__CLASS__,'autoload'));
	}

	/**
	 * Summary of autoload
	 * @param mixed $class nom de la class a charger
	 */
	public static function autoload($class)
	{
        
		//si la classe est dans notre namespace alors on autoload sinon on fait rien
		if(strpos($class,__NAMESPACE__.'\\') === 0)
		{
			$class = str_replace(__NAMESPACE__.'\\','',$class);
			$class = str_replace('\\','/',$class);
			//chargement dynamique du dossier dans lequel se trouve l'autoload
			require __DIR__."/" .$class. ".php";
		}
		
	}
}