<?php

session_start();

if (empty($_POST['login']) || empty($_POST['password']) ) //Oublie d'un champ
{
  header('location: connexion.php');
}
else
{
    try
    {
        //$db = new PDO('mysql:host=fabiendhcgepsi.mysql.db;dbname=fabiendhcepsi','fabiendhcgepsi', 'Toto1234');
        $bd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

        $query = $bd->prepare("SELECT username
        FROM user WHERE username = :user
        AND password = :pass");
        $query->execute(array(
            "user" => $_POST['login'],
            "pass" => $_POST['password'],
        ));

        $query->execute();
        $data=$query->fetch();

        if(empty($data['username'])) // test si il nous renvoie le user
        {
            header ('location: connexion.php');
        }
        else {
            // Garde en session le USER de l'utilisateur
            $_SESSION['username'] = $data['username']);
            header ('location: index.html');
        }
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $query->CloseCursor();
}


 ?>
