<?php
namespace App\Controller ;
use \App\Model\Utilisateur;
use \App\Model\Bord;
use \App\Model\Validators;
/**
 * BordController short summary.
 *
 * BordController description.
 *
 * @version 1.0
 * @author Utilisateur
 */
class BordController extends AppController
{

	public function __construct()
	{
		parent::__construct();
		$this->loadModel("Bord");
		$this->loadModel("Domaine");
		$this->loadModel("Service");
		$this->loadModel("Besoin");
		$this->loadModel("Ressource");
		$this->loadModel("Annonce");
		
	}
	
	public function index($array = null)
	{
		 if($this->existSession("ecatCon"))
        {            
			$infosConnexion = $this->getSession("ecatCon") ;
			$besoins = array();
			$offres = array();
			$type = "" ;
			if($infosConnexion['type'] == RAN)
			{
				$type = RAN ;
				//recuperer les besoins
				$besoins = $this->Besoin->getToutBesoin();
				//recuperer les offres
				$offres = $this->Service->getToutService();
			}
			if($infosConnexion['type'] == ASSOC)
			{
				$type = ASSOC ;
				//recuperer les offres
				$offres = $this->Service->getToutService();
			}
			if($infosConnexion['type'] == ASSISTANT)
			{
				$type = ASSISTANT ;
				//recuperer les besoins
				$besoins = $this->Besoin->getToutBesoin();
			}
			
			//recuperer les documents soumis par l'admin
			
            $this->render("bord.index",compact("type","besoins","offres"));
        }
        else
			$this->redirect("Utilisateur/login");		
	}
	
	public function alimenterGraphe()
	{
		$infosConnexion = $this->getSession("ecatCon") ;
		$infosConnexion['assoc_id'] ;
		//recuperer les notes
		//recuperer la derniere evaluation
		
		//recuperer les domaines
		$domaine = $this->getDomaine()->getAllDomaine() ;
		$array = array("domaine"=>$domaine,"notes") ;

		$j = json_encode($array);
		echo $j ;
		die();
	}


}
