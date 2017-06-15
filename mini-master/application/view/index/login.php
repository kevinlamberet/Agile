<?php

  if (!empty($_POST["login"]) && !empty($_POST["password"])) {
      return;
  }

  if (!empty($_GET["login"]) && !empty($_GET["password"])) {
      return;
  }

  $errorArray = ["error" : "Bad params"];
  //header()
  echo json_encode($errorArray);
  return;
 ?>
