<?php
  // Ajout SDK Twitter PHP
  require_once('twitter-api-php-master/TwitterAPIExchange.php');

  // Création connexion Twitter
  $settings = array(
    'oauth_access_token' => "4634771553-IKUnCR95xTUc7203ehIGCtmEJM2wbF2F8aipZug",
    'oauth_access_token_secret' => "ulR2FQajNbWwkGMNx1sDmSjXppsboz0AXLA5KzkvpcPCe",
    'consumer_key' => "W7n1k2WZ7FhSr0tGi6e61joMg",
    'consumer_secret' => "mMnghXl8Vj2DBrSPIvW8sRnm0qnh9ns9aVIGDppEufBfACIrRO"
  );
  $twitter = new TwitterAPIExchange($settings);

  //$url = 'https://api.twitter.com/1.1/search/tweets.json';
  //$getfield = '?q=google&result_type=popular&count=10&lang=fr';

  // Création requete
  $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
  $requestMethod = 'GET';

  // liste médias
  $medias = ["lemondefr", "20minutes", "Le_Figaro", "le_Parisien", "afpfr", "franceinfo", "lobs", "mediapart", "libe"];
  $fullArray = [];

  // parcours des médias
  foreach ($medias as $media) {
    $getfield = "?screen_name=$media&count=10";
    //echo $url . $getfield;
    $result =  $twitter->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();
    //echo $result;
    $jsonDecode = json_decode($result);
    $arrayResult = [];

    // parcours des différents articles
    foreach ($jsonDecode as $item) {
      if (empty($item->{'entities'}->{'urls'}[0]->{'expanded_url'})) {
        continue;
      }

      // On récupère les infos qui nous intéresse
      $array = [];
      $array["text"] = $item->{'text'};
      $array["date"] = $item->{'created_at'};
      $array["retweets"] = $item->{'retweet_count'};
      $array["favs"] = $item->{'favorite_count'};
      $array["lang"] = $item->{'lang'};
      $array["url"] = $item->{'entities'}->{'urls'}[0]->{'expanded_url'};

      $arrayResult[] = $array;
    }
    $fullArray[] = $arrayResult;
  }

  // On affiche le résultat
  echo json_encode($fullArray);


 ?>
