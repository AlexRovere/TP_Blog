<?php
$host = 'localhost';
$bdd = 'tp_blog';
$user = 'root';
$password = '';
$id = htmlspecialchars($_GET['id']);

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}

if(isset($id))
{
$req = $bdd->prepare('DELETE FROM article WHERE id_article = :id');
$req->execute(['id' => $id]);
}

    // Les tags sont supprimés automatiquement grace à la constrain cascade DELETE dans phpmyadmin

header('Location: ../frontend/index.php');


