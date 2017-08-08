<?php
namespace App\Controller ;
/**
 * UtilisateurController short summary.
 *
 * UtilisateurController description.
 *
 * @version 1.0
 * @author Bessin Ivan
 */
class MailController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Mail");
	}
	public function index()
	{
		$this->render("mailbox.index");
	}

	public function rediger()
	{
		$this->render("mailbox.compose");
	}
}
