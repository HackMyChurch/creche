# creche
Creche augmentée RFID.
Chaque santon possède un tag RFID et 3 lieux sont définis pour la lecture de ces tags.
- Devant la Sainte Famille
- Devant le village
- Devant l'Ange

Chacun de ces lieux permet de lancer un fichier audio.

## matériel
- 3 lecteurs RFID du type Touchatag
- Des santons
- Des tags RFID
- 1 ordinateur sous Linux
- 1 paire d'enceinte au volume réglable.

## intégration

## Install
Installer Linux Ubuntu avec Apache2 et php. Pour plus de précision, reportez vous au forum Ubuntu http://doc.ubuntu-fr.org/lamp

### code
cloner le répository "creche" `git clone https://github.com/HackMyChurch/creche.git`

### Apache2

### php

### Librairie de lecture des touchatags

### Ajout/Modification de contenu

## TODO
- Ecrire un démon qui surveille les lecteur RFID
- Intégrer une base de données pour stocker les tag, les sénarii et les liens vers les contenus
- Faire un back-office web d'ajout de contenus
- implémenter des scénarii complexes multi-lecteurs, multi-personnages.

## Contribuez
- Forkez le projet
- créez votre branch et developpez
- envoyez votre pull-request
