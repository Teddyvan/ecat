<?php
namespace Core\Controller ;
/**
 * COntroller short summary.
 *
 * COntroller parent.
 *
 * @version 1.0
 * @author Utilisateur
 */
class Controller
{
	protected $viewPath ;
	protected $template ;
    private $param ;

	/**
	 *
	 * Retourne une vue donn�e
	 * @param mixed $view  le nom de la vue a afficher
	 * @param array $lesvariables les variables a pousser dans la vue
	 */
	public function render($view ,$lesvariables = array())
	{
		ob_start();
		extract($lesvariables);
		require ($this->viewPath . str_replace('.','/',$view) . '.php' );
		$content = ob_get_clean();
		require ($this->viewPath . 'templates/'. $this->template . '.php' );

	}

	/**
		* Permet d'afficher des messages d'alertes bien formaté dans la vue
		*
		* @param string $texte Message
		*/
		protected function setAlertDanger($texte, $param = array())
		{
			$id = isset($param['id']) ? 'id="'.$param['id'].'"' : "";
			$class = isset($param['class']) ? $param['class']." " : "";
			$title = isset($param['title']) ? $param['title'] : "Oups";

			$fermer = isset($param['fermer']) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>' : "";
			$fermerClass = isset($param['fermer']) ? ' alert-dismissable' : "";

			return '<div '.$id.' class="'.$class.'alert alert-danger'.$fermerClass.'">
					'.$fermer.'
					<strong>'.$title.'! </strong>&nbsp;'.$texte.'
					</div>';
		}

		protected function setAlertSuccess($texte, $param = array())
		{
			$id = isset($param['id']) ? 'id="'.$param['id'].'"' : "";
			$class = isset($param['class']) ? $param['class']." " : "";
			$title = isset($param['title']) ? $param['title'] : "Succès";

			$fermer = isset($param['fermer']) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>' : "";
			$fermerClass = isset($param['fermer']) ? ' alert-dismissable' : "";

			return '<div '.$id.' class="'.$class.'alert alert-success'.$fermerClass.'">
					'.$fermer.'
					<strong>'.$title.'! </strong>&nbsp;'.$texte.'
					</div>';
		}

		protected function setAlertWarning($texte, $param = array())
		{
			$id = isset($param['id']) ? 'id="'.$param['id'].'"' : "";
			$class = isset($param['class']) ? $param['class']." " : "";
			$title = isset($param['title']) ? $param['title'] : "Attention";

			$fermer = isset($param['fermer']) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>' : "";
			$fermerClass = isset($param['fermer']) ? ' alert-dismissable' : "";

			return '<div '.$id.' class="'.$class.'alert alert-warning'.$fermerClass.'">
					'.$fermer.'
					<strong>'.$title.'! </strong>&nbsp;'.$texte.'
					</div>';
		}

		protected function setAlertInfo($texte, $param = array())
		{
			$id = isset($param['id']) ? 'id="'.$param['id'].'"' : "";
			$class = isset($param['class']) ? $param['class']." " : "";
			$title = isset($param['title']) ? $param['title'] : "Note";

			$fermer = isset($param['fermer']) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>' : "";
			$fermerClass = isset($param['fermer']) ? ' alert-dismissable' : "";

			return '<div '.$id.' class="'.$class.'alert alert-info'.$fermerClass.'">
					'.$fermer.'
					<strong>'.$title.'! </strong>&nbsp;'.$texte.'
					</div>';
		}
        /**
         * Summary of clean
         * @param mixed $tableau tableau dont les valeurs doivent etre netoye
         * @return string[]
         */
        protected function clean($tableau)
		{
            $result = array();
			if(is_array($tableau))
			{
				foreach($tableau as $k => $v)
				{
					$result[$k] = htmlspecialchars($v, \ENT_QUOTES, 'UTF-8', false);
				}
			}
			elseif(is_string($tableau))
			{
				return htmlspecialchars($tableau, \ENT_QUOTES, 'UTF-8', false);
			}

			return $result;
		}

         /**
          * Ajoute un attribut à la session
          *
          * @param string $nom Nom de l'attribut
          * @param string $valeur Valeur de l'attribut
          */
         protected function setSession($nom, $valeur)
         {
             $_SESSION[$nom] = $valeur;
         }

         /**
          * Renvoie vrai si l'attribut existe dans la session
          *
          * @param string $nom Nom de l'attribut
          * @return bool Vrai si l'attribut existe et sa valeur n'est pas vide
          */
         protected function existSession($nom)
         {
             if(!is_array($nom)) return isset($_SESSION[$nom]);
             foreach($nom as $_nom)
             {
                 if(!isset($_SESSION[$_nom])) return FALSE;
             }
             return TRUE;
         }

         /**
          * Renvoie la valeur de l'attribut demandé
          *
          * @param string $nom Nom de l'attribut
          * @return string Valeur de l'attribut
          */
         protected function getSession($nom)
         {
             if ($this->existSession($nom)) {
                 return $_SESSION[$nom];
             }
             return null;
         }
		  /**
		* Détruit la session actuelle
		*/
		public function destroy()
		{
			session_unset();
			session_destroy();
		}
		
		/**
		* Détruit une variable de la session actuelle
		*/
		public function removeSession($nom)
		{
			unset($_SESSION[$nom]);
		}

         /**
          * Renvoie vrai si le paramètre existe dans la requête
          *
          * @param string $nom Nom du paramètre
          * @return bool Vrai si le paramètre existe
          */
         protected function existParam($nom)
         {
             if(!is_array($nom)) return (isset($this->param[$nom]));
             return $this->existParams($nom);
         }

         protected function existParams($noms = array())
         {
             foreach($noms as $nom) if(!isset($this->param[$nom])) return false;
             return true;
         }

         /**
          * Renvoie vrai si le paramètre existe dans la requête et n'est pas vide
          *
          * @param string $nom Nom du paramètre
          * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide
          */
         protected function notEmpty($nom)
         {
             if(!is_array($nom)) return (isset($this->param[$nom]) && $this->param[$nom] != "");
             return $this->notEmptys($nom);
         }

         protected function notEmptys($noms)
         {
             foreach($noms as $nom) if(!isset($this->param[$nom]) || $this->param[$nom]=="") return false;
             return true;
         }

         /**
          * Renvoie la valeur du paramètre demandé
          *
          * @param string $nom Nom d paramètre
          * @return string Valeur du paramètre
          * @throws Exception Si le paramètre n'existe pas dans la requête
          */
         protected function getParam($nom)
         {
             if ($this->existParam($nom)) {
                 return $this->param[$nom];
             }
             return null;
         }

         protected function getParams($noms)
         {
             $tab = array();
             foreach($noms as $nom)
             {
                 $tab[$nom] = $this->getParam($nom);
             }
             return $tab;
         }
         /**
          * Effectue une redirection vers un contrôleur et une methode spécifiques avec ou non des paramètres
          *
          * @param string $controleur Contrôleur
          * @param type $methode Methode Methode
          * @param type $param Paramètres
          */
         protected function redirect($controleur = "", $methode = null, $param = null)
				 {
					 // Redirection vers l'URL /racine_site/controleur/methode/paramètres
					 $url = URL_RACINE; /*  /racine_site/  */
					 if($controleur != null) $url .=  $controleur;
					 if ($methode != null) 	$url .= "/" . $methode;
					 if ($param != null) 	$url .= "/" . $param;
					header("Location:" . $url);
					exit();
				 }
		/**
		* Renvoie l'objet session associé à la requête
		*
		* @return Session Objet session
		*/
		public function get()
		{
			return $this->clean($_GET);
		}

		/**
		* Renvoie l'objet session associé à la requête
		*
		* @return Session Objet session
		*/
		public function post()
		{
			return $this->clean($_POST);
		}

		public function echoTest ($data)
		{
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}
		
		
}
