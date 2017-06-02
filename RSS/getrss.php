<?php
include 'pdo.php';
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="google") {
  $xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
} elseif($q=="begeek") {
  $xml=("http://www.begeek.fr/feed");
} elseif($q=="korben") {
  $xml=("https://korben.info/feed");
} elseif($q=="lemonde") {
  $xml=("http://www.lemonde.fr/rss/une.xml");
} elseif($q=="lefigaro") {
  $xml=("http://evene.lefigaro.fr/rss/a_la_une.xml");
} elseif($q=="01net") {
  $xml=("http://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/");
} elseif($q=="frandroid") {
  $xml=("http://www.frandroid.com/feed");
} elseif($q=="thenextweb") {
  $xml=("https://thenextweb.com/feed/");
} elseif($q=="nbc") {
  $xml=("http://rss.msnbc.msn.com/id/3032091/device/rss/rss.xml");
} elseif($q=="bbc") {
  $xml=("http://feeds.bbci.co.uk/news/rss.xml?edition=int");
} elseif($q=="allocine") {
  $xml=("http://rss.allocine.fr/ac/actualites/");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br>");
echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=2; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;

  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;

  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  // Insert in the database all the article shown
  $pdo->import("INSERT INTO article (title, link, description) VALUES ('$item_title','$item_link','$item_desc')");
  echo ("<p><a href='" . $item_link
  . "'>" . $item_title . "</a>");
  echo ("<br>");
  echo ($item_desc . "</p>");
}
?>
