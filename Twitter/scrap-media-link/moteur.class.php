<?php
require_once(__DIR__.'/vendor/autoload.php');
use Goutte\Client;

class Moteur
{
  private $url;
  private $domain;
  private $h1;
  private $description;
  private $content;
  private $isException = true;

  private $crawler;
  
  // les selecteurs sont uniquement en XPATH
  private $selectors =
  array (
    "lefigaro.fr" => array("h1" => "//*/h1", "description" => "//*[@id='20170519LIVWWW00020']/div/p", "content" => "//*[@id='live-messages']")
  );


  public function __construct($url)
  {
    if (!$this->checkIssetSite($url)) {
      return false;
    }
    $this->url = $url;
  }

  // return false si on ne gère pas le domaine de $url
  // sinon initialisation de l'objet $crawler
  public function checkIssetSite($url) {

    $tmp = parse_url($url);
    $domaine = $tmp['host'];
    $domaine = str_replace("www.", "", $domaine);

    if (!in_array($domaine, array_keys($this->selectors))) {
      if ($isException) {
        throw new Exception("Domaine non référencé");
      }
      return false;
    }

    $client = new Client();
    $this->crawler = $client->request('GET', $url);
    $this->domain = $domaine;
    return true;
  }

  // retourne le h1
  public function getH1() {
    $selector = $this->selectors[$this->domain]["h1"];
    return $this->crawler->filterXPath($selector)->extract(array('_text', 'class', 'href')[0])[0];
  }

  // retourne la description
  public function getDescription() {
    $selector = $this->selectors[$this->domain]["description"];
    return $this->crawler->filterXPath($selector)->extract(array('_text', 'class', 'href')[0])[0];
  }

  // retourne la description
  public function getContent() {
    $selector = $this->selectors[$this->domain]["content"];
    return $this->crawler->filterXPath("//*[@id='live-messages']")->extract(array('_text', 'class', 'href')[0])[0];
  }

  // retourne toutes les données en JSON
  public function getAll() {
    $h1 = $this->getH1();
    $desc = $this->getDescription();
    $content = $this->getContent();
    return json_encode(array($h1, $desc, $content));
  }

}
?>
