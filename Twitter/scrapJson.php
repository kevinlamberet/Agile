<?php

$json_source = file_get_contents("sites.json");

$json_data = json_decode($json_source);

var_dump($json_data);
?>