<?php
//
// Fonctions
//
// Parcourir les structures et générer un fichier de setters
function generate_setters() {
  global $objs, $lecteurs, $tempdir;
  // Ne générer que si le fichier n'existe pas.
  if (!file_exists($tempdir."/setters.inc.php")) {
	$setters = "<?php\n// Setters pour les objets et les lecteurs \n";
	$setters .= "// Fichier généré dynamiquement \n";
    $setters .= "// à partir des structures de données de l'application \n";
	// objets
	foreach($objs as $o) {
	  $setters .= "function set_".$o['name']."(\$b){\n  global \$".$o['name'].";\n  \$".$o['name']." = \$b;\n}\n";
	  $setters .= "function is_".$o['name']."(){\n  global \$".$o['name'].";\n  return \$".$o['name'].";\n}\n";
	}
	// lecteurs
	foreach($lecteurs as $l) {
	  $setters .= "function set_".$l['name']."(\$b){\n  global \$".$l['name'].";\n  \$".$l['name']." = \$b;\n}\n";
	  $setters .= "function is_".$l['name']."(){\n  global \$".$l['name'].";\n  return \$".$l['name'].";\n}\n";
	}
	// génération du fichier de setters
	$f = fopen($tempdir."/setters.inc.php", "w+");
	fputs($f, $setters);
    fclose($f);
  }
}

// Initialisation de l'environnement au début du scénario.
function init() {
  global $lecteurs, $lecteur, $objs, $id, $tempdir;
  include($tempdir."/setters.inc.php");

  // Enregistrer tous les mouvements de tags.
  write_log(date("YmdHis").";$lecteur;$id");

  // Enregistrer le dernier dans un fichier à part.
  $latest = fopen("./latest.txt", "w+");
  fputs($latest, date("YmdHis").";$lecteur;$id\n");
  fclose($latest);

  // santons
  $objs[$id]['called'] = true;
  foreach($objs as $o) {
    call_user_func("set_".$o['name'], $o['called']);
  }
  // Quel lecteur a été utilisé
  $lecteurs[$lecteur]['called'] = true;
  foreach($lecteurs as $l) {
    call_user_func("set_".$l['name'], $l['called']);
  }
}

// Remise à zéro de l'environnement à la fin du scénario
function teardown() {
  global $lecteurs, $objs;
  foreach($objs as $o) {
    call_user_func("set_".$o['name'], false);
  }
  foreach($lecteurs as $l) {
    call_user_func("set_".$l['name'], false);
  }
  write_log("--------------------------------------------------------------------------------");
}

function write_log($s) {
  global $logfile;
  $log = fopen($logfile, "a+");
  fputs($log, "$s\n");
  fclose($log);
}

// Log des états des objets avec analyse des scénarii
function logStates() {
  global $lecteurs, $objs, $selected_obj, $selected_reader;
  $what="";
  foreach($objs as $o) {
    if($o['called']) {
	  $what = $o['name'];
      $selected_obj = $o['name'];
    }
  }
  foreach($lecteurs as $l) {
    if($l['called']) {
	  $what .= ", ".$l['name'];
      $selected_reader = $l['name'];
    }
  }
  write_log($what);

}

function debug($s) {
  global $mode_debug, $logfile;
  if ($mode_debug) {
    $debug = fopen($logfile, "a+");
    fputs($debug, $s."\n");
    fclose($debug);
  }
}

// Générer la fonction de validation d'un scénario
function generate_validation_function() {
	global $tempdir, $lecteurs, $objs, $scenar;
    $code = "<?php\n function validate_scenar () {\n";
    $code .= "  global \$index_scenarii;\n";
	foreach($objs as $o) {
      $code .= "  \$".$o['name']."=".($o['called']? "true": "false").";\n";
	}
    foreach($lecteurs as $l) {
      $code .= "  \$".$l['name']."=".($l['called']? "true": "false").";\n";
    }
    // boucle sur les scénars
    foreach ($scenar as $k => $sc) {
      $code .= "  if (".$sc['scenario'].") {  \$index_scenarii[]=".$k."; return true; }\n";
    }
    $code .= "  return false; }\n";
    debug($code);
    
    $f = fopen($tempdir."/validate.inc.php", "w+");
	fputs($f, $code);
    fclose($f);
} 

// Sélection des scénarii qui correspondent, dans un tableau
function select_scenarii() {
  global $tempdir, $index_scenarii;
  generate_validation_function();
  include($tempdir."/validate.inc.php");
  call_user_func("validate_scenar","");
}

// Setter de l'étape (stepping)
function set_step($f, $v) {
//  if (file_exists($f)) {
//    unlink($f);
//  }
  file_put_contents($f, $v);
}

// Getter du numéro de l'étape.
function read_step($f){
  return file_get_contents($f);
}

// Exécution des scénarii
//  	Si les contenus sont un array() alors on fait un step sur chaque élément du tableau
//		On enregistre l'état dans un petit fichier txt qu'on supprimera lorsqu'on arrive au dernier
//		état.
function play_scenarii() {
  global $index_scenarii, $scenar, $tempdir;
  $nb = count($index_scenarii);
  if ($nb > 0) {
    $log = "$nb scénari".($nb>1? "i correspondent" : "o correspond").". condition : (".$scenar[$index_scenarii[0]]['scenario'].")\n";
  }
  foreach ($index_scenarii as $k) { 
    $stepfile="";
    $log .= "Déroulement du scenario #$k '".$scenar[$k]['titre']."'\n";
    // Si le contenu est un tableau, alors stepping
    if (is_array($scenar[$k]['content'])) {
      $stepfile="$tempdir/scenar$k.step";      
      $idx_cnt = 0;

      // Lire l'état de stepping, s'il n'existe pas on le crée et on renvoie 0
      if (!file_exists($stepfile)) {
        set_step($stepfile, 0);
      } else {
        $idx_cnt = read_step($stepfile);
	  }
      $log .= "Stepping activé. Etat='$idx_cnt', enregistré dans '$stepfile'.\n";
      $log .= "contenu = ".$scenar[$k]['content'][$idx_cnt]."\n";
      
      // Lancement du contenu
	  $log .= launch_player($scenar[$k]['content'][$idx_cnt]);
      
      // supprmier le ficher de stepping, si on est arrivé au dernier contenu
      if (count($scenar[$k]['content']) == $idx_cnt+1){
        //if (file_exists($stepfile)) {
          set_step($stepfile, 0);
        //}
        $log .= "Fin du stepping. Suppression de '$stepfile'.\n";
      } else {
        // incrémentation de l'état
		$idx_cnt++;
        set_step($stepfile, $idx_cnt);
        $log .= "Prochain état='$idx_cnt'.\n";
      }
    }
    // Un seul contenu 
    else {
      $log .= "contenu = ".$scenar[$k]['content']."\n";
      if ($scenar[$k]['content'] !== "") {
        $log .= launch_player($scenar[$k]['content']);
      } else {
        $log .= "[warning] : Aucun de contenu associé à cet objet.";
      }
    }
    
    write_log($log);
  }  
}

function kill_mplayer() {
  global $TIMEOUT_AFTER_SCENAR;
  $kill = "killall -TERM mplayer; sleep $TIMEOUT_AFTER_SCENAR ;";
  exec($kill);
}

// Lancement de la ressource audio.
function launch_player($cnt) {
  global $datadir, $TIMEOUT_AFTER_SCENAR; //, $contenus;
  $f = "$datadir/$cnt";
  $log = "";
  $kill = "killall -TERM mplayer ; sleep $TIMEOUT_AFTER_SCENAR ; ";
  $play = "mplayer $f"." & "; 

  // Petit hack permettant de killer mplayer à travers les lecteurs
  if ($cnt == "killall") {
    $log .= "No content, just kill mplayer !\n";
    kill_mplayer();
    $log .= "Done.\n";
  } 
  // arret le reste et lit parmi une liste au hasard
  elseif ($cnt == "jukebox") {
    $log .= "No specific content, just play music !\n";
    kill_mplayer();
	exec("cd $datadir/fonds; mplayer \"$(ls | shuf -n1)\" &");
    $log .= "Done.\n";
  } 
  // Autre petit hack permettant d'éteindre la machine
  elseif ($cnt == "shutdown") {
    $log .= "No content, just kill shutting down the server !\n";
    kill_mplayer();
	exec("shutdown -h now");
    $log .= "Done.\n";
  } 
  elseif (file_exists($f)) {
    $log .= "Lauching mplayer : $kill $play\n";
	kill_mplayer();
    exec($play);
    $log .= "Done.\n";
  } 
  else {
    $log .= "[warning] aucun fichier '$f' trouvé.\n";
  }
  return $log;
}

