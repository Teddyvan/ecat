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
		$this->loadModel("Pays");
		$this->loadModel("Evaluation");
		
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
				//date derniere evaluation
				$dateMax = $this->Evaluation->getMaxDate($infosConnexion["assoc_id"]);
				//pour le recap a droite du donut
				$recapMoyenneParDomaine = $this->Evaluation->getrecapMoyenneByDomaine($infosConnexion["assoc_id"],$dateMax);
				// $this->echoTest($recapMoyenneParDomaine) ;
				$recap = array () ;
				foreach($recapMoyenneParDomaine as $r)
				{
					$r['couleur'] = '' ;
					if($r['note'] >= 0 && $r['note'] < 25)
					{
						$r['couleur'] = 'red';
					}
						
					if($r['note'] >= 25 && $r['note'] < 50 ){
						$r['couleur'] = 'orange';

					}
					if($r['note'] >= 50 && $r['note'] < 75 )
						$r['couleur'] = '#00ff6f';
					if($r['note'] >= 75)
						$r['couleur'] = 'green';
						
						// var_dump($r);
						
					$recap[] = $r ;
				}
				// $this->echoTest($offres);
			}
			if($infosConnexion['type'] == ASSISTANT)
			{
				$type = ASSISTANT ;
				//recuperer les besoins
				$besoins = $this->Besoin->getToutBesoin();
			}
			
			//recuperer les annonce
			$annonces = $this->Annonce->getAllAnnonce();
			$domaines = $this->Domaine->getAllDomaine();
			$pays = $this->Pays->getAllPays();
			// $this->echoTest($recap);
            $this->render("bord.index",compact("type","besoins","offres",'annonces','domaines','pays','recap'));
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
