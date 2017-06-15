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
  private $is_valid;

  private $crawler;

  // les selecteurs sont uniquement en XPATH
  private $selectors =
  array (
    "lefigaro.fr" => array("h1" => "//*/h1", "description" => "//*[@itemprop='about']", "content" => "//*[@itemprop='articleBody']"),
    "lemonde.fr" => array("h1" => "//*/h1", "description" => "//*[@itemprop='description']", "content" => "//*[@itemprop='articleBody']"),
    "lemde.fr" => array("h1" => "//*/h1", "description" => "//*[@itemprop='description']", "content" => "//*[@itemprop='articleBody']"),
    "tempsreel.nouvelobs.com" => array("h1" => "//*/h1", "description" => "//*[@itemprop='description']", "content" => "//*[@itemprop='articleBody']"),
    "ebx.sh" => array("h1" => "//*/h1", "description" => "//*[@itemprop='description']", "content" => "//*[@itemprop='articleBody']"),
    "bibliobs.nouvelobs.com" => array("h1" => "//*/h1", "description" => "//*[@itemprop='description']", "content" => "//*[@itemprop='articleBody']"),
    "liberation.fr" => array("h1" => "//*/h1", "description" => "//*[contains(@class, 'article-standfirst')]", "content" => "//*[contains(@class, 'article-body')]"),
    "next.liberation.fr" => array("h1" => "//*/h1", "description" => "//*[contains(@class, 'article-standfirst')]", "content" => "//*[contains(@class, 'article-body')]"),
    "l.leparisien.fr" => array("h1" => "//*/h1", "description" => "//*[contains(@class, 'article-full__header')]/..", "content" => "//*[contains(@class, 'article-full__body')]/div[2]")
  );


  public function __construct($url)
  {
    if (!$this->checkIssetSite($url)) {
      $this->is_valid = false;
    } else {
      $this->is_valid = true;
    }
    $this->url = $url;
  }

  // retourne si l'URL est valide
  public function IsValid() {
    return $this->is_valid === true;
  }

  // return false si on ne gère pas le domaine de $url
  // sinon initialisation de l'objet $crawler
  public function checkIssetSite($url) {

    $tmp = parse_url($url);
    $domaine = $tmp['host'];
    $domaine = str_replace("www.", "", $domaine);

    if (!in_array($domaine, array_keys($this->selectors))) {
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
    return $this->crawler->filterXPath($selector)->extract(array('_text', 'class', 'href')[0])[0];
  }

  // retourne toutes les données en JSON
  public function getAll() {
    $h1 = $this->getH1();
    $desc = $this->getDescription();
    $content = $this->getContent();
    return json_encode(array("h1" => $h1, "description" => $desc, "content" => $content));
  }

  // sauvegarde en base les infos
  public function saveAllDataParsed() {

  }

}
?>
