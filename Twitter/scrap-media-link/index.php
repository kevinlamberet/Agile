<?php
/*
* Inclusion de Goutte
*/

include_once("moteur.class.php");

// url de test figaro
$url = 'http://www.lefigaro.fr/actualite-france/2017/06/08/01016-20170608ARTFIG00073-rythmes-scolaires-un-rapport-senatorial-recommande-de-maintenir-la-reforme-actuelle.php';
// url de test le monde
$url = 'http://www.lemonde.fr/planete/article/2017/06/08/60-millions-de-consommateurs-publie-une-liste-de-cosmetiques-sains-et-surs_5140511_3244.html';
// url de test nouvelobs
$url = 'http://tempsreel.nouvelobs.com/politique/20170608.OBS0422/les-petites-combines-du-fn-les-boulets-de-macron-les-divisions-de-la-gauche.html';
// url de test liberation
$url = 'http://www.liberation.fr/elections-presidentielle-legislatives-2017/2017/06/08/en-meeting-collomb-s-emballe-a-villeurbanne_1575277';

$moteur = new Moteur($url);
// récupération du h1
$h1 = $moteur->getH1();
// récupération de la description
$desc = $moteur->getDescription();
// récupération du contenu
$content = $moteur->getContent();
// retourne les données en JSON
$all = $moteur->getAll();

?>
