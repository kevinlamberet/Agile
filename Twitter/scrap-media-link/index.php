<?php
/*
* Inclusion de Goutte
*/

include_once("moteur.class.php");

$url = 'http://www.lefigaro.fr/elections/legislatives/2017/05/19/38001-20170519LIVWWW00020-en-direct-emmanuel-macron-edouard-philippe-mali-gouvernement-nicolas-hulot-notre-dame-des-landes.php';

$moteur = new Moteur($url);
// récupration du h1
$h1 = $moteur->getH1();
// récupération de la description
$desc = $moteur->getDescription();
// récupération du contenu
$content = $moteur->getContent();
// retourne les données en JSON
$all = $moteur->getAll();
?>
