<?php

if (!empty($_POST[])) {
    return;
}

if (!empty($_GET["url"])) {
    return;
}

if (!empty($_GET["date"])) {
    return;
}

if (!empty($_GET[])) {
    return;
}

$errorArray = ["error" : "Bad params"];
//header()
echo json_encode($errorArray);
return;

 ?>
