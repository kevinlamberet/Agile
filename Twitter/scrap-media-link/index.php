<?php

$url = 'http://www.lefigaro.fr/elections/legislatives/2017/05/19/38001-20170519LIVWWW00020-en-direct-emmanuel-macron-edouard-philippe-mali-gouvernement-nicolas-hulot-notre-dame-des-landes.php';

/*
* Inclusion de Goutte
*/
require_once(__DIR__.'/vendor/autoload.php');
use Goutte\Client;
$client = new Client();

$crawler = $client->request('GET', $url);
$output = $crawler->filterXPath('//*/h1/..')->extract(array('_text', 'class', 'href'));

var_dump($output);

?>
