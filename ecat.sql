-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: ecat
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ecat_alerte`
--

DROP TABLE IF EXISTS `ecat_alerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_alerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `intitule` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `association` int(11) NOT NULL,
  `anonyme` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_alerte`
--

LOCK TABLES `ecat_alerte` WRITE;
/*!40000 ALTER TABLE `ecat_alerte` DISABLE KEYS */;
INSERT INTO `ecat_alerte` VALUES (2,2,'alerte anti corruption','c&#039;est la corruption',1,2,0);
/*!40000 ALTER TABLE `ecat_alerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_annonce`
--

DROP TABLE IF EXISTS `ecat_annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(70) NOT NULL,
  `contenu` text NOT NULL,
  `etat` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lieu` varchar(300) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_annonce`
--

LOCK TABLES `ecat_annonce` WRITE;
/*!40000 ALTER TABLE `ecat_annonce` DISABLE KEYS */;
INSERT INTO `ecat_annonce` VALUES (3,1,'2017-07-27','fez','c&#039;est ici il faut saisir\r\n',1,'2017-07-14','2017-07-25','zada','2');
/*!40000 ALTER TABLE `ecat_annonce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_assistance_technique`
--

DROP TABLE IF EXISTS `ecat_assistance_technique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_assistance_technique` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `asset_id` int(10) unsigned DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `checked_out` int(11) DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `abreviation_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_site_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_assistance_technique`
--

LOCK TABLES `ecat_assistance_technique` WRITE;
/*!40000 ALTER TABLE `ecat_assistance_technique` DISABLE KEYS */;
INSERT INTO `ecat_assistance_technique` VALUES (1,'assistant_1','123',0,NULL,NULL,NULL,NULL,1,1,'ass11','acd','iv@YA.fr','75880128','acd');
/*!40000 ALTER TABLE `ecat_assistance_technique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_assistance_technique_offre`
--

DROP TABLE IF EXISTS `ecat_assistance_technique_offre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_assistance_technique_offre` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dateHeureCreation` datetime NOT NULL,
  `assistant` int(11) NOT NULL,
  `domaine` int(11) NOT NULL,
  `probleme_identify` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_designation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_concerne` int(11) NOT NULL,
  `date_ouverture` date NOT NULL,
  `date_fermeture` date NOT NULL,
  `frequence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_assistance_technique_offre`
--

LOCK TABLES `ecat_assistance_technique_offre` WRITE;
/*!40000 ALTER TABLE `ecat_assistance_technique_offre` DISABLE KEYS */;
INSERT INTO `ecat_assistance_technique_offre` VALUES (4,'2017-08-04 00:27:21',1,4,'Nouvelle offre','Je test',2,'2017-08-02','2017-08-17','2','/var/www/osis.bf/public/ressource/technique/offre/1_2017-08-04_00:27:21.docx');
/*!40000 ALTER TABLE `ecat_assistance_technique_offre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_association`
--

DROP TABLE IF EXISTS `ecat_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_association` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `abreviation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_creation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_association` int(11) NOT NULL,
  `contact_adresse` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_association`
--

LOCK TABLES `ecat_association` WRITE;
/*!40000 ALTER TABLE `ecat_association` DISABLE KEYS */;
INSERT INTO `ecat_association` VALUES (1,'assoc_1','1234',1,1,4,'ivs','2015',2,'01-BP-5504 ','ivan.','71325496','ivan@v.fr'),(2,'assoc2','1234',1,1,1,'dsgvfds','2020',2,'OIOI','OIH','ONHOI','OHN@JK.com');
/*!40000 ALTER TABLE `ecat_association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_association_activite`
--

DROP TABLE IF EXISTS `ecat_association_activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_association_activite` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `association` int(11) NOT NULL,
  `categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre_activite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaine_concerne` int(11) NOT NULL,
  `description_activite` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_association_activite`
--

LOCK TABLES `ecat_association_activite` WRITE;
/*!40000 ALTER TABLE `ecat_association_activite` DISABLE KEYS */;
INSERT INTO `ecat_association_activite` VALUES (1,1,1,1,'1','activitÃ© test',5,'bon rien de speciale'),(2,1,1,1,'2','activitÃ© test',6,'fizebfize');
/*!40000 ALTER TABLE `ecat_association_activite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_association_besoin`
--

DROP TABLE IF EXISTS `ecat_association_besoin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_association_besoin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `association_concerne` int(11) NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_concerne` int(11) NOT NULL COMMENT 'Choix du domaine',
  `sous_domaine` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insuffisance_releve` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appui_technique` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_association_besoin`
--

LOCK TABLES `ecat_association_besoin` WRITE;
/*!40000 ALTER TABLE `ecat_association_besoin` DISABLE KEYS */;
INSERT INTO `ecat_association_besoin` VALUES (1,1,1,1,'besoin test',1,'1','juste une remarque','jkq',NULL),(2,1,1,1,'tesr2',4,'6','TERT','FEZ','/var/www/osis.bf/public/ressource/association/besoin/1_2017-07-29_02:48:56.doc'),(3,1,1,1,'TEST ENREG FICH',4,'5','TE','FER','/var/www/osis.bf/public/ressource/association/besoin/1_2017-08-02_11:04:11.docx');
/*!40000 ALTER TABLE `ecat_association_besoin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_association_evaluation`
--

DROP TABLE IF EXISTS `ecat_association_evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_association_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `association` int(11) NOT NULL,
  `domaine` int(11) NOT NULL,
  `theme` int(11) NOT NULL,
  `note` float DEFAULT '0',
  `date` date NOT NULL,
  `description` varchar(300) DEFAULT 'RAS',
  `fichier1` varchar(300) DEFAULT NULL,
  `fichier2` varchar(300) DEFAULT NULL,
  `fichier3` varchar(300) DEFAULT NULL,
  `fichier4` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_association_evaluation`
--

LOCK TABLES `ecat_association_evaluation` WRITE;
/*!40000 ALTER TABLE `ecat_association_evaluation` DISABLE KEYS */;
INSERT INTO `ecat_association_evaluation` VALUES (1,1,4,3,100,'2017-07-29','','','','',''),(2,1,4,4,100,'2017-07-29','','','','',''),(3,1,4,5,100,'2017-07-29','','','','',''),(4,1,4,6,100,'2017-07-29','','','','',''),(5,1,5,7,0,'2017-07-29','','','','',''),(6,1,5,8,50,'2017-07-29','','','','',''),(7,1,5,9,0,'2017-07-29','','','','',''),(8,1,5,10,50,'2017-07-29','','','','',''),(9,1,6,11,0,'2017-07-29','','','','',''),(10,1,6,12,0,'2017-07-29','','','','',''),(11,1,6,13,0,'2017-07-29','','','','',''),(12,1,6,14,0,'2017-07-29','','','','',''),(13,1,7,15,100,'2017-07-29','','','','',''),(14,1,7,16,50,'2017-07-29','','','','',''),(15,1,7,17,100,'2017-07-29','','','','',''),(16,1,7,18,100,'2017-07-29','','','','',''),(17,1,8,19,100,'2017-07-29','','','','',''),(18,1,8,20,0,'2017-07-29','','','','',''),(19,1,8,21,100,'2017-07-29','','','','',''),(20,1,8,22,0,'2017-07-29','','','','',''),(21,1,8,23,0,'2017-07-29','','','','',''),(22,1,8,24,0,'2017-07-29','','','','',''),(23,1,9,25,0,'2017-07-29','','','','',''),(24,1,9,26,0,'2017-07-29','','','','',''),(25,1,9,27,0,'2017-07-29','','','','',''),(26,1,9,28,0,'2017-07-29','','','','',''),(27,1,9,29,0,'2017-07-29','','','','',''),(28,1,10,30,0,'2017-07-29','','','','',''),(29,1,10,31,0,'2017-07-29','','','','',''),(30,1,10,32,0,'2017-07-29','','','','',''),(31,1,10,33,0,'2017-07-29','','','','',''),(32,1,10,34,0,'2017-07-29','','','','',''),(33,1,10,35,0,'2017-07-29','','','','',''),(34,1,11,36,0,'2017-07-29','','','','',''),(35,1,11,37,0,'2017-07-29','','','','',''),(36,1,11,38,0,'2017-07-29','','','','',''),(37,1,12,39,0,'2017-07-29','','','','',''),(38,1,12,40,0,'2017-07-29','','','','',''),(39,1,12,41,0,'2017-07-29','','','','',''),(40,1,12,42,0,'2017-07-29','','','','',''),(41,1,13,43,0,'2017-07-29','','','','',''),(42,1,13,44,0,'2017-07-29','','','','',''),(43,1,13,45,0,'2017-07-29','','','','',''),(44,1,14,46,0,'2017-07-29','','','','',''),(45,1,14,47,0,'2017-07-29','','','','',''),(46,1,14,48,0,'2017-07-29','','','','',''),(47,1,14,49,0,'2017-07-29','','','','',''),(48,1,4,3,50,'2017-08-04','','','','',''),(49,1,4,4,50,'2017-08-04','','','','',''),(50,1,4,5,0,'2017-08-04','','','','',''),(51,1,4,6,100,'2017-08-04','','','','',''),(52,1,5,7,0,'2017-08-04','','','','',''),(53,1,5,8,100,'2017-08-04','','','','',''),(54,1,5,9,50,'2017-08-04','','','','',''),(55,1,5,10,100,'2017-08-04','','','','',''),(56,1,6,11,100,'2017-08-04','','','','',''),(57,1,6,12,50,'2017-08-04','','','','',''),(58,1,6,13,0,'2017-08-04','','','','',''),(59,1,6,14,50,'2017-08-04','','','','',''),(60,1,7,15,0,'2017-08-04','','','','',''),(61,1,7,16,0,'2017-08-04','','','','',''),(62,1,7,17,0,'2017-08-04','','','','',''),(63,1,7,18,0,'2017-08-04','','','','',''),(64,1,8,19,0,'2017-08-04','','','','',''),(65,1,8,20,0,'2017-08-04','','','','',''),(66,1,8,21,100,'2017-08-04','','','','',''),(67,1,8,22,0,'2017-08-04','','','','',''),(68,1,8,23,50,'2017-08-04','','','','',''),(69,1,8,24,100,'2017-08-04','','','','',''),(70,1,9,25,0,'2017-08-04','','','','',''),(71,1,9,26,0,'2017-08-04','','','','',''),(72,1,9,27,0,'2017-08-04','','','','',''),(73,1,9,28,100,'2017-08-04','','','','',''),(74,1,9,29,50,'2017-08-04','','','','',''),(75,1,10,30,0,'2017-08-04','','','','',''),(76,1,10,31,0,'2017-08-04','','','','',''),(77,1,10,32,0,'2017-08-04','','','','',''),(78,1,10,33,0,'2017-08-04','','','','',''),(79,1,10,34,0,'2017-08-04','','','','',''),(80,1,10,35,0,'2017-08-04','','','','',''),(81,1,11,36,50,'2017-08-04','','','','',''),(82,1,11,37,50,'2017-08-04','','','','',''),(83,1,11,38,0,'2017-08-04','','','','',''),(84,1,12,39,0,'2017-08-04','','','','',''),(85,1,12,40,0,'2017-08-04','','','','',''),(86,1,12,41,0,'2017-08-04','','','','',''),(87,1,12,42,0,'2017-08-04','','','','',''),(88,1,13,43,0,'2017-08-04','','','','',''),(89,1,13,44,0,'2017-08-04','','','','',''),(90,1,13,45,0,'2017-08-04','','','','',''),(91,1,14,46,0,'2017-08-04','','','','',''),(92,1,14,47,0,'2017-08-04','','','','',''),(93,1,14,48,0,'2017-08-04','','','','',''),(94,1,14,49,0,'2017-08-04','','','','','');
/*!40000 ALTER TABLE `ecat_association_evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_domaine`
--

DROP TABLE IF EXISTS `ecat_domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_domaine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_domaine`
--

LOCK TABLES `ecat_domaine` WRITE;
/*!40000 ALTER TABLE `ecat_domaine` DISABLE KEYS */;
INSERT INTO `ecat_domaine` VALUES (4,1,1,'GOUV','GOUVERNANCE'),(5,1,1,'GF','GESTION FINANCIERE'),(6,1,1,'GAS','GESTION DES ACHATS ET DES STOCKS'),(7,1,1,'SE','SUIVI EVALUATION'),(8,1,1,'RH','RESSOURCES HUMAINES'),(9,1,1,'prog','PROGRAMMES'),(10,1,1,'for','FORMATION'),(11,1,1,'PPR','POLITIQUE PLAIDOYER ET RESEAUTAGE'),(12,1,1,'MR','MOBILISATION DES RESSOURCES'),(13,1,1,'COM','COMMUNICATION'),(14,1,1,'VCO','VALEURS ET CULTURE DE L&#039;ORGANISATION');
/*!40000 ALTER TABLE `ecat_domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_param_thme`
--

DROP TABLE IF EXISTS `ecat_param_thme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_param_thme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDomaine` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  `note` varchar(50) NOT NULL,
  `description` varchar(3) DEFAULT NULL,
  `nbre_fichier` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_param_thme`
--

LOCK TABLES `ecat_param_thme` WRITE;
/*!40000 ALTER TABLE `ecat_param_thme` DISABLE KEYS */;
INSERT INTO `ecat_param_thme` VALUES (1,4,3,'0;0,5;1','Oui',0,1,'2017-07-29'),(2,4,4,'0;0,5;1','Non',0,1,'2017-07-29'),(3,4,5,'0;0,5;1','Oui',0,1,'2017-07-29'),(4,4,6,'0;0,5;1','Non',0,1,'2017-07-29'),(5,5,7,'0;0,5;1','Oui',0,1,'2017-07-29'),(6,5,8,'0;0,5;1','Oui',0,1,'2017-07-29'),(7,5,9,'0;0,5;1','Oui',0,1,'2017-07-29'),(8,5,10,'0;0,5;1','Oui',0,1,'2017-07-29'),(9,6,11,'0;0,5;1','Oui',0,1,'2017-07-29'),(10,6,12,'0;0,5;1','Oui',0,1,'2017-07-29'),(11,6,13,'0;0,5;1','Non',0,1,'2017-07-29'),(12,6,14,'0;0,5;1','Oui',0,1,'2017-07-29'),(13,7,15,'0;0,5;1','Oui',0,1,'2017-07-29'),(14,7,16,'0;0,5;1','Oui',0,1,'2017-07-29'),(15,7,17,'0;0,5;1','Oui',0,1,'2017-07-29'),(16,7,18,'0;0,5;1','Oui',0,1,'2017-07-29'),(17,8,19,'0;0,5;1','Non',0,1,'2017-07-29'),(18,8,20,'0;0,5;1','Oui',0,1,'2017-07-29'),(19,8,21,'0;0,5;1','Non',0,1,'2017-07-29'),(20,8,22,'0;0,5;1','Oui',0,1,'2017-07-29'),(21,8,23,'0;0,5;1','Oui',0,1,'2017-07-29'),(22,8,24,'0;0,5;1','Oui',0,1,'2017-07-29'),(23,9,25,'0;0,5;1','Oui',0,1,'2017-07-29'),(24,9,26,'0;0,5;1','Oui',0,1,'2017-07-29'),(25,9,27,'0;0,5;1','Oui',0,1,'2017-07-29'),(26,9,28,'0;0,5;1','Oui',0,1,'2017-07-29'),(27,9,29,'0;0,5;1','Oui',0,1,'2017-07-29'),(28,10,30,'0;0,5;1','Oui',0,1,'2017-07-29'),(29,10,31,'0;0,5;1','Oui',0,1,'2017-07-29'),(30,10,32,'0;0,5;1','Oui',0,1,'2017-07-29'),(31,10,33,'0;0,5;1','Non',0,1,'2017-07-29'),(32,10,34,'0;0,5;1','Oui',0,1,'2017-07-29'),(33,10,35,'0;0,5;1','Oui',0,1,'2017-07-29'),(34,11,36,'0;0,5;1','Oui',0,1,'2017-07-29'),(35,11,37,'0;0,5;1','Oui',0,1,'2017-07-29'),(36,11,38,'0;0,5;1','Non',0,1,'2017-07-29'),(37,12,39,'0;0,5;1','Non',0,1,'2017-07-29'),(38,12,40,'0;0,5;1','Oui',0,1,'2017-07-29'),(39,12,41,'0;0,5;1','Non',0,1,'2017-07-29'),(40,12,42,'0;0,5;1','Oui',0,1,'2017-07-29'),(41,13,43,'0;0,5;1','Non',0,1,'2017-07-29'),(42,13,44,'0;0,5;1','Oui',0,1,'2017-07-29'),(43,13,45,'0;0,5;1','Oui',0,1,'2017-07-29'),(44,14,46,'0;0,5;1','Oui',0,1,'2017-07-29'),(45,14,47,'0;0,5;1','Oui',0,1,'2017-07-29'),(46,14,48,'0;0,5;1','Oui',0,1,'2017-07-29'),(47,14,49,'0;0,5;1','Oui',0,1,'2017-07-29');
/*!40000 ALTER TABLE `ecat_param_thme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_pays`
--

DROP TABLE IF EXISTS `ecat_pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_pays` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_pays`
--

LOCK TABLES `ecat_pays` WRITE;
/*!40000 ALTER TABLE `ecat_pays` DISABLE KEYS */;
INSERT INTO `ecat_pays` VALUES (2,1,1,'Burkina faso','BF'),(3,1,1,'BENIN','bnn');
/*!40000 ALTER TABLE `ecat_pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_ressource_assoc`
--

DROP TABLE IF EXISTS `ecat_ressource_assoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_ressource_assoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `association` int(11) NOT NULL,
  `description_activite` varchar(500) NOT NULL,
  `theme` int(11) NOT NULL,
  `fichier1` varchar(300) NOT NULL,
  `fichier2` varchar(300) NOT NULL,
  `fichier3` varchar(300) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `association` (`association`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_ressource_assoc`
--

LOCK TABLES `ecat_ressource_assoc` WRITE;
/*!40000 ALTER TABLE `ecat_ressource_assoc` DISABLE KEYS */;
INSERT INTO `ecat_ressource_assoc` VALUES (1,'4','2017-07-28',1,'test',4,'/var/www/osis.bf/public/ressource/association/document/1_2017-07-28_16:23:150.pdf','/var/www/osis.bf/public/ressource/association/document/1_2017-07-28_16:23:151.xlsx','/var/www/osis.bf/public/ressource/association/document/1_2017-07-28_16:23:152.doc',1);
/*!40000 ALTER TABLE `ecat_ressource_assoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_ressource_ram`
--

DROP TABLE IF EXISTS `ecat_ressource_ram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_ressource_ram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `user` int(11) NOT NULL,
  `description_activite` varchar(500) NOT NULL,
  `theme` int(11) NOT NULL,
  `fichier1` varchar(300) NOT NULL,
  `fichier2` varchar(300) NOT NULL,
  `fichier3` varchar(300) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_ressource_ram`
--

LOCK TABLES `ecat_ressource_ram` WRITE;
/*!40000 ALTER TABLE `ecat_ressource_ram` DISABLE KEYS */;
INSERT INTO `ecat_ressource_ram` VALUES (1,'3','2017-07-29',1,'desc admin test',4,'/var/www/osis.bf/public/ressource/rame/document/1_2017-07-29_01:28:090.xlsx','/var/www/osis.bf/public/ressource/rame/document/1_2017-07-29_01:28:091.pdf','',1),(2,'2','2017-07-29',1,'test2',4,'/var/www/osis.bf/public/ressource/rame/document/1_2017-07-29_02:43:030.xlsx','/var/www/osis.bf/public/ressource/rame/document/1_2017-07-29_02:43:031.pdf','/var/www/osis.bf/public/ressource/rame/document/1_2017-07-29_02:43:032.doc',1);
/*!40000 ALTER TABLE `ecat_ressource_ram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_ressource_tech`
--

DROP TABLE IF EXISTS `ecat_ressource_tech`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_ressource_tech` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `assistant` int(11) NOT NULL,
  `description_activite` varchar(500) NOT NULL,
  `theme` int(11) NOT NULL,
  `fichier1` varchar(300) NOT NULL,
  `fichier2` varchar(300) NOT NULL,
  `fichier3` varchar(300) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assistant` (`assistant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_ressource_tech`
--

LOCK TABLES `ecat_ressource_tech` WRITE;
/*!40000 ALTER TABLE `ecat_ressource_tech` DISABLE KEYS */;
INSERT INTO `ecat_ressource_tech` VALUES (1,'2','2017-07-29',1,'ressource rapport test by Ivan',4,'/var/www/osis.bf/public/ressource/technique/document/1_2017-07-29_00:30:420.pdf','/var/www/osis.bf/public/ressource/technique/document/1_2017-07-29_00:30:421.docx','',1);
/*!40000 ALTER TABLE `ecat_ressource_tech` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_sous_domaine`
--

DROP TABLE IF EXISTS `ecat_sous_domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_sous_domaine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `domaine_concern` int(11) NOT NULL,
  `sous_domaine_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_sous_domaine`
--

LOCK TABLES `ecat_sous_domaine` WRITE;
/*!40000 ALTER TABLE `ecat_sous_domaine` DISABLE KEYS */;
INSERT INTO `ecat_sous_domaine` VALUES (4,1,1,7,'tezst'),(5,1,1,4,'sou_gouvernance'),(6,1,1,4,'autre sous_gouverance');
/*!40000 ALTER TABLE `ecat_sous_domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_subdomains`
--

DROP TABLE IF EXISTS `ecat_subdomains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_subdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_concern` int(11) NOT NULL,
  `sous_domaine_designation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_subdomains`
--

LOCK TABLES `ecat_subdomains` WRITE;
/*!40000 ALTER TABLE `ecat_subdomains` DISABLE KEYS */;
INSERT INTO `ecat_subdomains` VALUES (104,41,'L\'organisation a un organe indépendant de décision'),(105,41,'L\'organe de décision fonctionne de manière transparente en conformité avec les documents statutaires?'),(106,41,'L\'organe de décision dirige la stratégie et la politique cadre de l\'organisation?'),(107,41,'Les rôles et responsabilités au sein de l\'organe de décision sont clairement définis et la délégation de l\'autorité est claire et effective?'),(108,42,'L\'organisation dispose t-elle d\'un manuel de procédure administrative et financière?'),(109,42,'L\'organisation applique de manière rigoureuse les procédures de gestions administratives et financières'),(110,42,'L\'organisation est en conformité avec les dispositions fiscales nationales'),(111,42,'L\'organisation fait un audit global de ses comptes chaque année'),(112,43,'L\'acquisition des biens et services de l\'organisation se fait conformément aux dispositions du manuel de procédure'),(113,43,'L\'organisation dispose d\'un dispositif de stockage adéquat des intrants (fournitures de bureau, produits médicaux et ou pharmaceutiques)'),(114,43,'L\'organisation a la capacité suffisante pour une distribution efficiente des intrants'),(115,43,'L\'organisation applique les bonnes pratiques de gestion des biens (intrants et immobilisation) à tous les niveaux'),(116,44,'L\'organisation dispose d\'un plan de suivi évaluation'),(117,44,'L\'organisation applique les directives du plan de suivi évaluation'),(118,44,'L\'organisation utilise les résultats des données programmatiques pour la planification et la prise de décision'),(119,44,'L\'organisation a une personne responsable du suivi évaluation en son sein'),(120,45,'L\'organisation dispose d\'une politique de gestion des ressources humaines'),(121,45,'L\'organisation dispose de procédures transparentes  de sélection et de recrutement de son personnel (salarié et bénévole)'),(122,45,'L’organisation dispose d\'un système de compensation et davantage pour motiver et maintenir son personnel'),(123,45,'L’organisation dispose d\'un système fiable d\'évaluation des performances de son personnel'),(124,45,'L\'organisation dispose de normes et de conditions de travail propices à la performance de son personnel'),(125,45,'L\'organisation dispose de mesures de sécurités appropriées pour protéger les personnes et les biens'),(126,46,'Les interventions de l\'organisation sont définies à partir d\'évidences (preuves scientifiques épidémiologie,bonnes pratiques etc)'),(127,46,'La planification des interventions tient compte des résultats du dispositif de suivi évaluation'),(128,46,'La conception et la mise en œuvre des programmes et projets de l\'organisation se fait de manière participative'),(129,46,'L\'organisation dispose d\'un plan de travail en équilibre avec le budget'),(130,46,'L\'organisation apporte un appui technique à ses partenaires d\'exécutions conformément à leurs besoins'),(131,47,'L\'organisation dispose d\'un plan de formation de son personnel (salariés et bénévoles) basé sur une évaluation des besoins'),(132,47,'L\'organisation applique de façon optimale le plan de formation de son personnel (Salarié et Bénévoles)'),(133,47,'L\'organisation a une expertise interne dans l\'organisation des sessions de formations de son personnel (Salarié et bénévoles)'),(134,47,'L\'organisation dispose de normes de gestions financières des formations inclues dans le manuel de procédure'),(135,47,'L\'organisation applique les normes de gestions financières des sessions de formations'),(136,47,'L\'organisation dispose d\'un système d\'évaluation des résultats des formations'),(137,48,'L\'organisation dispose d\'un réseau de partenaires stratégiques dans ses domaines d\'interventions'),(138,48,'L\'organisation dispose d\'une stratégie de plaidoyer basée sur les problèmes vécus par ses bénéficiaires et les difficultés rencontrées dans la mise en œuvre de ses activités'),(139,48,'L\'organisation dispose d\'un processus de positionnement politique par rapport aux problèmes vécus par ses bénéficiaires et les difficultés qu\'elle rencontre dans la mise en œuvre de ses activités'),(140,49,'L\'organisation dispose d\'un répertoire de bailleurs de fond existants et potentiels'),(141,49,'L\'organisation dispose d\'un plan de mobilisation des ressources bien défini'),(142,49,'L\'organisation dispose de plusieurs sources et types de financement'),(143,49,'L\'organisation dispose d\'un budget prévisionnel indiquant les acquis et les restes à mobiliser'),(144,50,'L\'organisation dispose d\'un plan de communication'),(145,50,'L\'organisation dispose d\'un système de capitalisation et de partage des expériences'),(146,50,'L\'organisation s\'approprie l\'utilise des techniques de l\'information et de la communication'),(147,51,'L\'organisation a une politique de lutte contre la stigmatisation et la discrimination en son sein et dans son environnement'),(148,51,'L\'organisation condamne explicitement les pratiques criminelles telles que le terrorisme, les trafiques de drogues, d\'armes et blanchissements d\'argent'),(149,51,'La bonne gouvernance et le respect des biens publics ainsi que privés est une préoccupation de l\'organisation'),(150,51,'Les textes statutaires et les programmes de l\'organisation prônent le respect des droits humains');
/*!40000 ALTER TABLE `ecat_subdomains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_theme`
--

DROP TABLE IF EXISTS `ecat_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_concern` int(11) NOT NULL,
  `abreviation` varchar(300) NOT NULL,
  `cplmt_theme` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_theme`
--

LOCK TABLES `ecat_theme` WRITE;
/*!40000 ALTER TABLE `ecat_theme` DISABLE KEYS */;
INSERT INTO `ecat_theme` VALUES (3,4,'L&#039;organisation  a un organe  independant de decision','L&#039;organisation a-t-elle un organe de dÃ©cision au dessus de l&#039;organe d&#039;exÃ©cution?'),(4,4,'L&#039;organe de dÃ©cision fonctionne de maniÃ¨re transparente en conformitÃ© avec les documents statutaires?','L&#039;organe de dÃ©cision fonctionne de maniÃ¨re transparente en conformitÃ© avec les documents statutaires?'),(5,4,'L&#039;organe de dÃ©cision dirige la stratÃ©gie et la politique cadre de l&#039;organisation?','Le plan stratÃ©gique et les plans d&#039;action sont adoptÃ©s par l&#039;organe de dÃ©cision? L&#039;Ã©quipe d&#039;exÃ©cution soumet des rapports Ã  l&#039;organe de dÃ©cision pour orientation?'),(6,4,'Les rÃ´les et responsabilitÃ©s au sein de l&#039;organe de dÃ©cision sont clairement dÃ©finis et la dÃ©lÃ©gation de l&#039;autoritÃ© est claire et effective?','Les documents statutaires disent explicitement les rÃ´les et responsabilitÃ©s de l&#039;organe de dÃ©cision et prÃ©cisent celles qui sont dÃ©lÃ©guÃ©es Ã  l&#039;Ã©quipe d&#039;exÃ©cution? Les rÃ´les et responsabilitÃ©s de chaque membre de l&#039;organe de dÃ©cision sont bien dÃ©finies et sont diffÃ©rents des membres de l&#039;Ã©quipe d&#039;exÃ©cution?'),(7,5,'L&#039;organisation dispose t-elle d&#039;un manuel de procÃ©dure administrative et financiÃ¨re?',''),(8,5,'L&#039;organisation applique de maniÃ¨re rigoureuse les procÃ©dures de gestions administratives et financiÃ¨res','Toutes les dispositions du manuel sont-elles respectÃ©es sans exception?'),(9,5,'L&#039;organisation est en conformitÃ© avec les dispositions fiscales nationales','L&#039;organisation honore-t-elle toutes les impositions d&#039;impÃ´ts liÃ©es Ã  ses diffÃ©rents statuts?'),(10,5,'L&#039;organisation fait un audit global de ses comptes chaque annÃ©e','Un audit global es-il rÃ©alisÃ© sur l&#039;ensemble des comptes de l&#039;organisation?'),(11,6,'L&#039;acquisition des biens et services de l&#039;organisation se fait conformÃ©ment aux dispostions du manuel de procÃ©dure',''),(12,6,'L&#039;organisation dispose d&#039;un dispostif de stockage adequat des intrants (fournitures de bureau, produits mÃ©dicaux et ou pharmaceutiques)','Le stockage des intrants repond-t-il Ã  des normes de bonnes pratiques?'),(13,6,'L&#039;organisation a la capacitÃ© suffisante pour une distribution efficiente des intrants','L&#039;organisation a-t-elle les capacitÃ©s nÃ©cessaires pour livrer les quantitÃ©s nÃ©cessaires aux Ã©chÃ©ances fixÃ©es?'),(14,6,'L&#039;organisation applique les bonnes pratiques de gestion des biens (intrants et immobilisation) Ã  tous les niveaux,',''),(15,7,'L&#039;organisation dispose d&#039;un plan de suivi Ã©valuation','Le plan de suivi-Ã©valuation doit Ãªtre matÃ©rialisÃ© dans un document'),(16,7,'L&#039;organisation applique les directives du plan de suivi Ã©valuation',''),(17,7,'L&#039;organisation utilise les rÃ©sultats des donnÃ©es programmatiques pour la planification et la prise de dÃ©cision','Les projets et plans d&#039;action de l&#039;organisation sont -ils Ã©laborÃ©s Ã  partir entre autres des rÃ©sultats du suivi-Ã©valuation de l&#039;organisation?'),(18,7,'L&#039;organisation a une personne responsable du suivi Ã©valuation en son sein','L&#039;organisation dispose-t-elle d&#039;un responsable de suivi-Ã©valuation ou d&#039;une personne dont les attributions intÃ¨grent les tÃ¢ches de suivi-Ã©valuation?'),(19,8,'L&#039;organisation dispose d&#039;une politique de gestion des ressources humaines','La politique doit Ãªtre matÃ©rialisÃ©e dans un document'),(20,8,'L&#039;organisation dispose de procÃ©dures transparentes  de sÃ©lection et de recrutement de son personnel (salariÃ© et bÃ©nevole)','Ces procÃ©dures doivent Ãªtre matÃ©rialisÃ©es dans un document'),(21,8,'L&#039;organsiation dispose d&#039;un systÃ¨me de compensation et davantage pour motiver et maintenir son personnel','Un document fixe-t-il les diffÃ©rents types de compensation et davantage ainsi que les barÃªmes?'),(22,8,'L&#039;organsisation dispose d&#039;un systÃ¨me fiable d&#039;Ã©valuation des performances de son personnel','Ce systÃ¨me doit Ãªtre dÃ©crit dans un document'),(23,8,'L&#039;organisation dispose de normes et de conditions de travail propices Ã  la performance de son personnel','Reste Ã  l&#039;apprÃ©ciation du personnel qui doit motiver son apprÃ©ciation Ã  l&#039;organe de dÃ©cision'),(24,8,'L&#039;organisation dispose de mesures de sÃ©curitÃ©s appropriÃ©es pour protÃ©ger les personnes et les biens',''),(25,9,'Les interventions de l&#039;organisation sont dÃ©finies Ã  partir d&#039;Ã©vidences (preuves scientifiques Ã©pidÃ©miologie,bonnes pratiques etc)',''),(26,9,'La planification des interventions tient compte des rÃ©sultats du dispositif de suivi Ã©valuation',''),(27,9,'La conception et la mise en Å“uvre des prorgammes et projets de l&#039;organisation se fait de maniÃ¨re participative',''),(28,9,'L&#039;organisation dispose d&#039;un plan de travail en Ã©quilibre avec le budget','L&#039;organisation dispose-t-elle d&#039;un plan annuelle d&#039;activitÃ© assorti d&#039;un budget?'),(29,9,'L&#039;organisation apporte un appui technique Ã  ses partenaires d&#039;exÃ©cutions conformement Ã  leurs besoins','Un document dÃ©crit-il la maniÃ¨re dont l&#039;organisation apporte un appui technique Ã  ses partenaires de mise en Å“uvre?'),(30,10,'L&#039;organisation dispose d&#039;un plan de formation de son personnel (salariÃ©s et bÃ©nÃ©voles) basÃ© sur une Ã©valuation des besoins','Le plan de formation doit Ãªtre formalisÃ© dans un document'),(31,10,'L&#039;organisation applique de faÃ§on optimale le plan de formation de son personnel (SalariÃ© et BÃ©nÃ©voles)','A dÃ©faut de la rÃ©alisation de toutes les activitÃ©s de formation, il est estimÃ© que celles menÃ©es permettent au personnel d&#039;Ãªtre performant'),(32,10,'L&#039;organisation a une expertise interne dans l&#039;organisation des sessions de formations de son personnel (SalariÃ© et bÃ©nÃ©voles)','Expertise dans l&#039;Ã©valuation des besoins de formation, la planification d&#039;une session de formation et l&#039;Ã©valuation d&#039;une formation'),(33,10,'L&#039;organisation dispose de normes de gestions financiÃ¨res des formations inclues dans le manuel de procÃ©dure','L&#039;organisation dispose-t-elle d&#039;une grille pour les perdiem et les honoraires pour les formations basÃ©e sur des rÃ©fÃ©rences nationales?'),(34,10,'L&#039;organisation applique les normes de gestions financiÃ¨res des sessions de formations','La grille des perdiem et honoraires est-elle respectÃ©e pour toutes les formations?'),(35,10,'L&#039;organisation dispose d&#039;un systÃ¨me d&#039;Ã©valuation des rÃ©sultas des formations','Le systÃ¨me d&#039;Ã©valuation des rÃ©sultats des formations est dÃ©crit dans un document'),(36,11,'L&#039;organisation dispose d&#039;un rÃ©seau de partenaires stratÃ©giques dans ses domaines d&#039;interventions','Une cartographie de ces partenaires existe-t-elle?'),(37,11,'L&#039;organisation dispose d&#039;une stratÃ©gie de plaidoyer basÃ©e sur les problemes vÃ©cus par ses bÃ©nÃ©fiaciares et les difficultÃ©es rencontrÃ©es dans la mise en Å“uvre de ses activitÃ©s','Un document dÃ©crit-il explicitement cette stratÃ©gie de plaidoyer?'),(38,11,'L&#039;organisation dispose d&#039;un processus de positionnement politique par rapport aux problemes vÃ©cus par ses bÃ©nÃ©ficiares et les difficultÃ©s qu&#039;elle rencontre dans la mise en Å“uvre de ses activitÃ©s','Un document dÃ©crit-il ce processus de prise de position politique?'),(39,12,'L&#039;organisation dispose d&#039;un repertoire de bailleurs de fond existants et potentiels',''),(40,12,'L&#039;organisation dispose d&#039;un plan de mobilisation des ressources bien dÃ©fini',''),(41,12,'L&#039;organisation dispose de plusieurs sources et types de financement','Les souces concernent les bailleurs, les types concernent par exemple: les cotisations des membres, les financement par appel Ã  projet, les donations, les AGR, â€¦.'),(42,12,'L&#039;organisation dispose d&#039;un budget prÃ©visonnel indiquant les acquis et les restes Ã  mobiliser',''),(43,13,'L&#039;organisation dispose d&#039;un plan de communication',''),(44,13,'L&#039;organisation dispose d&#039;un systÃ¨me de capitalisation et de partage des expÃ©riences','Un document dÃ©crit-il ce systÃ¨me?'),(45,13,'L&#039;organisation s&#039;approprie/utilise des techniques de l&#039;information et de la communication','Les techniques de l&#039;information et de la communication (internet, rÃ©seaux sociaux, â€¦) sont-elles exploitÃ©es dans la communication interne et externe de l&#039;organisation?'),(46,14,'L&#039;organisation a une politique de lutte contre la stigmatisation et la discrimination en son sein et dans son environnement','Les documents statutaires de l&#039;organisation condamnent-ils explicitement la stigmatisation et la discrimination en sein et dans son environnement? Ils dÃ©crivent les mesures mesures appliquÃ©es pour prÃ©venir et sanctionner les cas de stigmatisation et de discrimination en son sein?'),(47,14,'L&#039;organisation condamne explicitement les pratiques criminelles telles que le terrorisme, les trafiques de drogues, d&#039;armes et blanchissements d&#039;argent','Ces condamnations figurent-elles explicitement dans les documents statutaires de l&#039;organisation?'),(48,14,'La bonne gouvernance et le respect des biens publics ainsi que privÃ©s est une prÃ©occupation de l&#039;organisation','Des dispositions des documents statutaires ou administratifs expriment-ils l&#039;importance accordÃ©e par l&#039;organisation Ã  la bonne gouvernance et au respect des biens publics?'),(49,14,'Les textes statutaires et les programmes de l&#039;organisation prÃ´nent le respect des droits humains','');
/*!40000 ALTER TABLE `ecat_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_trace_evaluation`
--

DROP TABLE IF EXISTS `ecat_trace_evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_trace_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` varchar(300) DEFAULT '',
  `association` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_trace_evaluation`
--

LOCK TABLES `ecat_trace_evaluation` WRITE;
/*!40000 ALTER TABLE `ecat_trace_evaluation` DISABLE KEYS */;
INSERT INTO `ecat_trace_evaluation` VALUES (1,'2017-07-27','',1),(2,'2017-07-29','',1),(3,'2017-07-29','',1),(4,'2017-07-29','',1),(5,'2017-08-04','',1);
/*!40000 ALTER TABLE `ecat_trace_evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecat_type_alerte`
--

DROP TABLE IF EXISTS `ecat_type_alerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecat_type_alerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecat_type_alerte`
--

LOCK TABLES `ecat_type_alerte` WRITE;
/*!40000 ALTER TABLE `ecat_type_alerte` DISABLE KEYS */;
INSERT INTO `ecat_type_alerte` VALUES (2,'Corruption'),(3,'Fraude'),(4,'Transparence');
/*!40000 ALTER TABLE `ecat_type_alerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(40) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupe`
--

LOCK TABLES `groupe` WRITE;
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;
INSERT INTO `groupe` VALUES (1,'admin',1),(2,'offices',1);
/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Bessin','Ivan','ivan','123',1,1),(4,'Ouedraogo','ALain','aouedraogo','123',1,1);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-08  9:47:20
