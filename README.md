#` projet fin d'année école Webstart dev 1`
**`ville de Biarritz`**

**Ce projet a été réalisée en PHP procédural sous une architecture MVC**

L'organisation des interfaces de visiteurs et administrateurs A été faite en sous-dossiers Front-end et Back-and

Le dossier assets contient les sous-dossiers IMG PDF et JS

Les sous dossiers controller partials et views contiennent chacun un sous dossier frontend et backend, 
Dont le sous dossier frontend du dossier controller contient également un sous-dossier Ajax Pour les requêtes asynchrones

Le dossier model contient toutes les Requêtes MySQL

Le dossier SQL contient la base de données

Le dossier SASS contient un fichier racine pour le style nommé style.scss et contient un sous-dossier PARTIALS,
Qui contient lui même trois fichiers et trois sous-dossiers,
Le fichier BASE contient tous les règles CSS général mixins etc.
Le fichier RESET sert à remettre à zéro les styles par défaut du navigateur
Le fichier THEME contient les règles CSS personnalisé au projet
Le dossier GENERAL contient tous les styles CSS qui se répéteront dans plusieurs pages du site afin de rester DRY
Le dossier PAGES contient le style CSS propre à chaque page
Et le dossier il y contient les règles CSS ui indépendante (Animation etc.)

Le fichier index à la racine projet est de routeur

Le dossier _TENTATIVE-OBJET contient une partie du projet En PHP orienté objet que je n'ai pas pu terminer suite a 
des contraintes de temps