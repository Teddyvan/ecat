<?php

//affichage erreur
error_reporting(E_ALL);
ini_set('display_errors','On');
/*NOM DE L'application*/

$pathRepertoire =  dirname(__DIR__);
$pathRepertoire = explode(DIRECTORY_SEPARATOR,$pathRepertoire);
$nombreNoeud = count($pathRepertoire);
$dossierProjet = $pathRepertoire[$nombreNoeud -1] ;

define("APP_NAME","eCAT");
define("URL_BASE","http://127.0.0.1/api/");
define("URL_RACINE","index.php?p=");
define("DOSSIER_PROJET",$dossierProjet);
define("DOCUMENT_ROOT",$_SERVER['DOCUMENT_ROOT'].'/'.$dossierProjet.'/');
define("HTTP_HOST",$_SERVER['HTTP_HOST']);
define("RACINE",DOCUMENT_ROOT);
define("APP_MODE",'prod');
//type d'utilisateur
define("RAN",1);
define("ASSOC",2);
define("ASSISTANT",3);
define("TAILLE_MAX",40000);
//utiliser pour acceder au fichier like les images
define('SERVER',"http://".HTTP_HOST."/".$dossierProjet.'/public');
//utiliser pour les liens de menu et du forms
define('SERVERS',"http://".HTTP_HOST."/".$dossierProjet."/index.php?p=");
//DATABASE
// define('DB_HOST','perfodevcl400.mysql.db');
// define('DB_NAME','perfodevcl400');
// define('DB_USER','perfodevcl400');
// define('DB_PASSWORD','Perfodev2017');
define('DB_HOST','localhost');
define('DB_NAME','ecat2');
define('DB_USER','root');
define('DB_PASSWORD','');
//RESSOURCES
define("APP_RESSOURCES_PATH",RACINE."/public/");
define("APP_DOWNLOAD_PATH",APP_RESSOURCES_PATH."download/");
define("APP_UPLOAD_PATH_IMG",APP_RESSOURCES_PATH."user/");
define("APP_UPLOAD_PATH_BESOIN",APP_RESSOURCES_PATH."ressource/association/besoin/");
define("APP_UPLOAD_PATH_DOCUMENT_ASSOC",APP_RESSOURCES_PATH."ressource/association/document/");
define("APP_UPLOAD_PATH_DOCUMENT_ASSISTANT",APP_RESSOURCES_PATH."ressource/technique/document/");
define("APP_UPLOAD_PATH_OFFRE_ASSISTANT",APP_RESSOURCES_PATH."ressource/technique/offre/");
define("APP_UPLOAD_PATH_DOCUMENT_RAME",APP_RESSOURCES_PATH."ressource/rame/document/");
//MENU-LABEL
?>
