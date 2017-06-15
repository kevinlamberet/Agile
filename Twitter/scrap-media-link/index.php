<?php
/*
* Inclusion de Goutte
*/
include_once("moteur.class.php");

$json_source =  file_get_contents("http://fabiendhermy.fr/twitter/");
$json_data = json_decode($json_source, 1);

foreach ($json_data as $key => $value) {
  foreach ($json_data[$key] as $cle => $value) {
    $url = $value['url'];

    $moteur = new Moteur($url);
    // on parse le site si l'URL est valide
    if ($moteur->IsValid()) {
      $all = $moteur->saveAllDataParsed();
    }
  }
}



?>
