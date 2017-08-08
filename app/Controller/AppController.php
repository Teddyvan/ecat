<?php
namespace App\Controller ;
use Core\Controller\Controller ;
use \App ;

/**
 *
 * @version 1.0
 * @author Bessin Ivan
 */

class AppController extends Controller
{
	protected $template = "admin";

	public function __construct()
	{
		$this->viewPath = ROOT. '/app/views/' ;
	}

	/**
	 * Summary of loadModel
	 * @param mixed $model_name  le nom du model a charger
	 */
	protected function loadModel($model_name)
	{

		$this->$model_name = App::getInstance()->getTable($model_name) ;
	}
}