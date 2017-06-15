<?php

if (!empty($_GET[])) {
  $value = json_decode($_GET);
    return;
}

$errorArray = ["error" : "Bad params"];
//header()
echo json_encode($errorArray);
return;

 ?>
