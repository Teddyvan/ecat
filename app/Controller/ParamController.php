<?php
namespace App\Controller ;
use \App\Model\Param;
use \App\Model\Validators;
/**
 * ParamController short summary.
 *
 * ParamController description.
 *
 * @version 1.0
 * @author Param
 */
class ParamController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Param");
	}

	/*Sauvegarde le parametrzge des themes */
	public function ajouter()
	{
		if($this->existSession("ecatCon"))
        {
			$Param =  ($_POST);//$this->post();
			//vider les anciens parametrages
			$this->Param->viderTableParam() ;
			//parcourir les elements
			$controle = 0 ;
			$nbreLigne = count($Param['idTheme']) ;
			for($i=0; $i< $nbreLigne; $i++)
			 {
				$donneeProd = array('idDomaine'=> htmlspecialchars($Param['idDomaine'][$i]),
									'idTheme'=>  htmlspecialchars($Param['idTheme'][$i]),
									'note'=> $Param['note'][$i],
									'description'=>  htmlspecialchars($Param['description'][$i]),
									'nbre_fichier'=>htmlspecialchars($Param['nbre_fichier'][$i]),
									'date'=>@gmdate("Y-m-d"),
									'etat'=>1,
									
									);
				$etat = $this->Param->addParam($donneeProd);
				if($etat)
					$controle++ ;
			}
			// $this->echoTest($Param);
			if($controle == $nbreLigne)
			{
				$success = $this->setAlertSuccess("Parametrage valider avec success");
				$array = array("msg"=>$success,"erreur"=>0) ;
			}
			else
			{
				$success = $this->setAlertWarning("Une erreur est survenu durant l'enregistrement veuillez ressayer svp");
				$array = array("msg"=>$success,"erreur"=>0) ;
			}				
			
			$j = json_encode($array);
			echo $j ;
			die();
        }
        else
			$this->redirect("Utilisateur/login");
	}
	
	
}
