<?php

if (!empty($_POST)) {
  $value = json_decode($_POST);
    return;
}

$errorArray = ["error" : "Bad params"];
//header()
echo json_encode($errorArray);
return;

 ?>
