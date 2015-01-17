<?php
//
// Liste des lecteurs rfid
// A chaque lecteurs correspond 
// un booleen initialisé lors du lancement

$lecteurs = array(
		"/sys/devices/pci0000:00/0000:00:04.0/usb2/2-3" => 
			array( "name" => "lecteur1", 
			"called" => false),
		"/sys/devices/pci0000:00/0000:00:04.0/usb2/2-4" => 
			array( "name" => "lecteur2", 
			"called" => false),
		"/sys/devices/pci0000:00/0000:00:04.0/usb2/2-5" => 
			array( "name" => "lecteur3", 
			"called" => false)
		);

$lecteur1 = false;
$lecteur2 = false;
$lecteur3 = false;


