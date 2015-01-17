<?php
// Définition des scénarii
// scnario : Une expression qui peut être évaluée en php 
// @TODO: voir comment écrire les expressions avec les santons et les lecteurs
// content : Le contnu à jouer dans le cas où l'expression contenue dans scenario est valide.
// wait : true/false précise si le cript doit attendre éventuellement une autre interaction pour valider le scénario
//		  cas de plusieurs objets posés sur plusieurs lecteurs
// wait_content : contenu à diffuser lorsque le script attend pour compléter le scénario : une aide à l'utilisateur par exemple.
// wait_timeout : temps d'attente
//
// Le mot clé 'killall' dans le champ content, permet de tuer toutes les instances de mplayer.
 
/*
$scenar = array(
	// Cas d'un scénario avec plusieurs media
	array(
		"titre" 		=> "Histoire du pistachier",
		"scenario"		=> '$pistachier && ( $lecteur1 || $lecteur2 )', // Le santon pistachier posé sur le lecteur 1 ou le lecteur 2
		"content"  		=> array( "histoire-pistachier", "remerciement-pistachier" ),

	),
	// Cas d'un sénario avec condition horaire
	array(
		"titre" 		=> "Attente minuit du 24 décembre",
		"scenario"		=> '$jesus && $lecteur1',
		"content"  		=> "il-est-ne-le-divin-enfant",
		"wait"	   		=> true,
		"wait_content" 	=> "hint-attente-minuit",
		"wait_timeout" 	=> ""
	),
	// Cas d'un scénario complexe avec attente d'action et aide.
	array( 
		"titre" 		=> "Dialogue pistachier & poissonnière",
		"scenario" 		=> '( $poissonniere && lecteur1 ) && ( $pistachier && $lecteur2 )',
		"content"  		=> "histoire-poissonniere",
		"wait"	   		=> true,		// Attente de la validation de la condition
		"wait_content" 	=> "hint-poissonniere", // Contenu d'attente ou d'aide diffusé après le timeout
		"wait_timeout" 	=> "10"		// Timeout au dela duquel le contenu d'attente est diffusé
	)
);
*/

$scenar = array (
//
// Histoire ou petite phrase sur chaque santon
//
array( 
        "titre" => "histoire du berger",
		"scenario"		=> '$berger && $lecteur1',
		"content"  		=> "histoire-berger.mp3",
),

array( 
        "titre" => "présentation de Yam",
		"scenario"		=> '$yam && $lecteur1',
		"content"  		=> "yam-pres.mp3",
),

array( 
        "titre" => "histoire violette",
		"scenario"		=> '$violette && $lecteur1',
		"content"  		=> "violette-histoire.mp3",
),

array( 
        "titre" => "présentation marin",
		"scenario"		=> '$marin && $lecteur1',
		"content"  		=> "marin-pres.mp3",
),

array( 
        "titre" => "présentation Geneviève",
		"scenario"		=> '$gene && $lecteur1',
		"content"  		=> "gene-pres.mp3",
),

array( 
        "titre" => "présentation Jeune confirmée",
		"scenario"		=> '$confirmee && $lecteur1',
		"content"  		=> "confirmee-pres.mp3",
),

array( 
        "titre" => "présentation infirmier",
		"scenario"		=> '$infirmier && $lecteur1',
		"content"  		=> "infirmier-pres.mp3",
),

array( 
        "titre" => "présentation ambre / brebis",
		"scenario"		=> '$brebis1 && $lecteur1',
		"content"  		=> "ambre-pres.mp3",
),

array( 
        "titre" => "présentation Isaure / brebis",
		"scenario"		=> '$brebis2 && $lecteur1',
		"content"  		=> "brebis2-pres.mp3",
),

array( 
        "titre" => "présentation Fleur / brebis",
		"scenario"		=> '$brebis3 && $lecteur1',
		"content"  		=> "brebis3-pres.mp3",
),

array( 
        "titre" => "présentation Berger2 / Fleur",
		"scenario"		=> '$berger2 && $lecteur1',
		"content"  		=> "berger2-pres.mp3",
),

array( 
        "titre" => "présentation Jesus",
		"scenario"		=> '$jesus && $lecteur1',
		"content"  		=> "jesus-pres.mp3",
),

array( 
        "titre" => "présentation Marie",
		"scenario"		=> '$marie && $lecteur1',
		"content"  		=> "marie-pres.mp3",
),

array( 
        "titre" => "présentation Joseph",
		"scenario"		=> '$joseph && $lecteur1',
		"content"  		=> "joseph-pres.mp3",
),

array( 
        "titre" => "présentation Annecaro",
		"scenario"		=> '$annecaro && $lecteur1',
		"content"  		=> "annecaro-pres.mp3",
),

array( 
        "titre" => "Présentation Etty Hilesum",
		"scenario"		=> '$ettyhilesum && $lecteur1',
		"content"  		=> "ettyhilesum-pres.mp3",
),



//
// Appel face à l'ange
//

array( 
        "titre" => "appel du berger",
		"scenario"		=> '$berger && $lecteur2',
		"content"  		=> "gloria.mp3",
),

array( 
        "titre" => "Appel de Yam",
		"scenario"		=> '$yam && $lecteur2',
		"content"  		=> "yam-ange.mp3",
),

array( 
        "titre" => "appel violette",
		"scenario"		=> '$violette && $lecteur2',
		"content"  		=> "violette-ange.mp3",
),

array( 
        "titre" => "appel ane (i'm a believer)",
		"scenario"		=> '$ane && ($lecteur1 || $lecteur2)',
		"content"  		=> "ane-histoire.mp3",
),

array( 
        "titre" => "appel marin",
		"scenario"		=> '$marin && $lecteur2',
		"content"  		=> "marin-ange.mp3",
),

array( 
        "titre" => "appel Geneviève",
		"scenario"		=> '$gene && $lecteur2',
		"content"  		=> "gene-ange.mp3",
),

array( 
        "titre" => "appel Confirmée",
		"scenario"		=> '$confirmee && $lecteur2',
		"content"  		=> "confirmee-ange.mp3",
),

array( 
        "titre" => "appel infirmier",
		"scenario"		=> '$infirmier && $lecteur2',
		"content"  		=> "infirmier-ange.mp3",
),

array( 
        "titre" => "Ambre ange",
		"scenario"		=> '$brebis1 && $lecteur2',
		"content"  		=> "ambre-ange.mp3",
),

array( 
        "titre" => "Isaure ange",
		"scenario"		=> '$brebis2 && $lecteur2',
		"content"  		=> "brebis2-ange.mp3",
),

array( 
        "titre" => "Fleur ange",
		"scenario"		=> '$brebis3 && $lecteur2',
		"content"  		=> "brebis3-ange.mp3",
),

array( 
        "titre" => "Berger2 ange",
		"scenario"		=> '$berger2 && $lecteur2',
		"content"  		=> "berger2-ange.mp3",
),

array( 
        "titre" => "Jesus ange",
		"scenario"		=> '$jesus && $lecteur2',
		"content"  		=> "jesus-ange.mp3",
),

array( 
        "titre" => "Marie ange",
		"scenario"		=> '$marie && $lecteur2',
		"content"  		=> "marie-ange.mp3",
),

array( 
        "titre" => "Joseph ange",
		"scenario"		=> '$joseph && $lecteur2',
		"content"  		=> "joseph-ange.mp3",
),

array( 
        "titre" => "Annecaro ange",
		"scenario"		=> '$annecaro && $lecteur2',
		"content"  		=> "annecaro-ange.mp3",
),

array( 
        "titre" => "Etty Hilesum ange",
		"scenario"		=> '$ettyhilesum && $lecteur2',
		"content"  		=> "ettyhilesum-ange.mp3",
),



//
// Prières ou remerciements
//
array( 
        "titre" => "dialogue berger, Marie",
		"scenario"		=> '$berger && $lecteur3',
		"content"  		=> "dialogue-berger-marie.mp3",
),

array( 
        "titre" => "prière de Yam",
		"scenario"		=> '$yam && $lecteur3',
		"content"  		=> "yam-jesus.mp3",
),

array( 
        "titre" => "priere violette",
		"scenario"		=> '$violette && $lecteur3',
		"content"  		=> "violette-priere.mp3",
),

array( 
        "titre" => "priere ane (i'm a believer)",
		"scenario"		=> '$ane && $lecteur3',
		"content"  		=> "ane-priere.mp3",
),

array( 
        "titre" => "priere marin",
		"scenario"		=> '$marin && $lecteur3',
		"content"  		=> "marin-priere.mp3",
),

array( 
        "titre" => "priere Geneviève",
		"scenario"		=> '$gene && $lecteur3',
		"content"  		=> "gene-priere.mp3",
),

array( 
        "titre" => "priere Confirmée",
		"scenario"		=> '$confirmee && $lecteur3',
		"content"  		=> "confirmee-priere.mp3",
),

array( 
        "titre" => "priere infirmier",
		"scenario"		=> '$infirmier && $lecteur3',
		"content"  		=> "infirmier-priere.mp3",
),

array( 
        "titre" => "priere Ambre",
		"scenario"		=> '$brebis1 && $lecteur3',
		"content"  		=> "ambre-priere.mp3",
),

array( 
        "titre" => "priere Isaure",
		"scenario"		=> '$brebis2 && $lecteur3',
		"content"  		=> "brebis2-priere.mp3",
),

array( 
        "titre" => "priere Fleur",
		"scenario"		=> '$brebis3 && $lecteur3',
		"content"  		=> "brebis3-priere.mp3",
),

array( 
        "titre" => "priere Berger2",
		"scenario"		=> '$berger2 && $lecteur3',
		"content"  		=> "berger2-priere.mp3",
),

array( 
        "titre" => "Prière Jesus",
		"scenario"		=> '$jesus && $lecteur3',
		"content"  		=> "jesus-priere.mp3",
),

array( 
        "titre" => "Prière Marie",
		"scenario"		=> '$marie && $lecteur3',
		"content"  		=> "marie-priere.mp3",
),

array( 
        "titre" => "prière Joseph",
		"scenario"		=> '$joseph && $lecteur3',
		"content"  		=> "joseph-priere.mp3",
),

array( 
        "titre" => "prière Annecaro",
		"scenario"		=> '$annecaro && $lecteur3',
		"content"  		=> "annecaro-priere.mp3",
),

array( 
        "titre" => "prière Etty Hilesum",
		"scenario"		=> '$ettyhilesum && $lecteur3',
		"content"  		=> "ettyhilesum-priere.mp3",
),


// Jouer une musique de fond aléatoire
array( 
        "titre" => "Jouer de la musique de fond",
		"scenario"		=> '$ange_music',
		"content"  		=> "jukebox",
),

// Couper toutes les diffusions en cours
array( 
        "titre" => "Couper tous les contenus",
		"scenario"		=> '$ange_silence',
		"content"  		=> "killall",
)
);
