<?php
namespace Core\Auth ;
use Core\Database\Database ;
/**
 * DatabaseAuth short summary.
 *
 * DatabaseAuth description.
 *
 * @version 1.0
 * @author Utilisateur
 */
class DBAuth
{
	private $db ;
	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	/**
	 * Summary of login
	 * @param mixed $username 
	 * @param mixed $password 
	 * @return boolean
	 */
	public function login($username,$password)
	{
		//verifeir dans labase de donnee
	}

	/**
	 * Summary of logged
	 * Verifie que l'utilisateur est connecte
	 */
	public function logged()
	{
		return $_SESSION['Auth'] ;
	}
}