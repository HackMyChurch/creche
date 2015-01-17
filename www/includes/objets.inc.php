<?php
// Structures de données
// Association des tags rfid avec un objet
// 
// a chaque objet correspond un booleen 
// initialisé lorsqu'il y a une lecture
$objs = array (
	"04c4e4193e2580" => array( "name" => "noname10", 		"called" => false),

	// Tout ceux qui sont fait en dessous.
	"04ba8b193e2580" => array( "name" => "jesus", 		"called" => false),
	"049e1b91212580" => array( "name" => "marie", 		"called" => false),
	"04613691212580" => array( "name" => "joseph", 		"called" => false),
	"04b00f193e2584" => array( "name" => "berger", 		"called" => false),
	"04d0e9193e2580" => array( "name" => "ane", 		"called" => false),
	// ange du silence qui coupe toutes les diffusions en cours.
	"04b6c7193e2580" => array( "name" => "ange_silence","called" => false),
	// ange qui joue de musique de fond
	"04f37a91212580" => array( "name" => "ange_music",	"called" => false),

	// Adopte un santon
	"04af9b193e2580" => array( "name" => "yam", 		"called" => false),
	"04b151193e2580" => array( "name" => "violette", 	"called" => false),
	"04b110193e2584" => array( "name" => "marin", 		"called" => false),
	"04ae23193e2580" => array( "name" => "gene",		"called" => false),
	"04b170193e2580" => array( "name" => "confirmee", 	"called" => false),
	"04bc97193e2580" => array( "name" => "infirmier",  	"called" => false),
	"04b3bb51962280" => array( "name" => "brebis1", 	"called" => false),
	"04607791212580" => array( "name" => "brebis2", 	"called" => false),
	"04c4b491212580" => array( "name" => "brebis3", 	"called" => false),
	"04c8b699e42580" => array( "name" => "berger2", 	"called" => false),
	"04eacb51962280" => array( "name" => "annecaro", 	"called" => false),
	"048c3c91212580" => array( "name" => "ettyhilesum", "called" => false),

);

$jesus  		= false;
$marie  		= false;
$joseph 		= false;
$berger 		= false;
$ange_silence	= false;
$ange_music		= false;
$ane 			= false;
$yam 			= false;
$violette 		= false;
$marin 			= false;
$gene			= false;
$confirmee 		= false;
$infirmier 		= false;
$brebis1		= false; // Ambre
$brebis2		= false; // Isaure
$brebis3		= false; // Fleur
$berger2 		= false;
$annecaro 		= false; // Anne Caroline
$ettyhilesum	= false; // Nathoche


