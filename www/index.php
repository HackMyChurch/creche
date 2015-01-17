<?php
//
// Creche augmentée.
//
// A tous les lecteurs et tagRFID/santons, on fait correspondre un booléen
// Ca permet d'évaluer les expressions des scénarii

include_once('includes/objets.inc.php');
include_once('includes/lecteurs.inc.php');
include_once('includes/scenarii.inc.php');
include_once('includes/functions.inc.php');

//
// Constantes
//
// racine absolue de l'application
$root = "/home/user/app/www/creche";
// For Mac Uers ! 
//$root = "/Users/erasme/Desktop/creche-augmentee/creche";

// Repertoire des ressources audios.
$datadir = $root."/data/audios";
// temp dir
$tempdir = $root."/tmp";
// fichier de log
$logfile = "./log/log.txt";
// mode debug
$mode_debug = false;

// Timeout en seconde appliqué après le déroulement du scénario
$TIMEOUT_AFTER_SCENAR = 1; 

//
// Variables de GET
//
$id = $_GET["id"];
$lecteur = $_GET["lecteur"];

//
// Variables globales de travil (hou ! c'est mal !)
//
// nom de l'objet qui a été posé sur le lecteur
$selected_obj = "";
// nom du lecteur sollicité
$selected_reader = "";
// Indice des scénarii choisis
$index_scenarii = array();
// booleen qui indique si le sénario en cours d'analyse est validé
$scenario_validated =false;


/*
Algo de la boucle principale
0. Création des setters et getters en fonction des structures de scénarii et d'objets
1. Réception lecture RFID
	1.1 Logging RFID
	1.2 init des variables d'environnement
2. Analyse et matching avec les scénarii
	2.1 parcours des scénars en retenant ceux quipeuvent correspondre 
        (tout @TODO 'ou partie') par rapport au personnage et au lecteur
	2.2 Si plusieurs correspondent
		2.1.1 ceux correspondent completement (expression booleenne évaluée à true)
		2.1.2 ceux qui correspondent en partie avec wait = true (@TODO
	2.3 Boucle de déroulement des scénarii retenus avec un timeout général entre chaque
        2.3.1 Lecture du contenu
*/
generate_setters();
init();
logStates();
select_scenarii();
play_scenarii();
teardown();


