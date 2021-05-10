<?php
$host = 'localhost';
$bdd = 'tp_blog';
$user = 'root';
$password = '';

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}

if (isset($id)) // Récupère les infos de l'id recu en GET dans la page modifier
{
    $req = $bdd->prepare('SELECT id_article, GROUP_CONCAT(tag.nom_tag) as nom_tag, DATE_FORMAT(date_publication_article, "%d/%m/%Y") as date_publication, 
    DATE_FORMAT(date_creation_article, "%d/%m/%Y") as date_creation, titre_article, contenu_article, statut_article, nom_categorie FROM article
    INNER JOIN categorie ON categorie_id_categorie = id_categorie INNER JOIN article_has_tag as S on S.article_id_article = article.id_article 
    INNER JOIN tag on id_tag = S.tag_id_tag WHERE id_article = :id');
    $req->bindParam(':id', $id);
    $req->execute();
    $data = $req->fetch();
}
else // Récupère l'ensemble des articles pour le tableau de la page index
{
    $req = $bdd->prepare('SELECT id_article, GROUP_CONCAT(tag.nom_tag) as nom_tag, DATE_FORMAT(date_publication_article, "%d/%m/%Y") as date_publication, 
    DATE_FORMAT(date_creation_article, "%d/%m/%Y") as date_creation, titre_article, contenu_article, statut_article, nom_categorie FROM article
    INNER JOIN categorie ON categorie_id_categorie = id_categorie INNER JOIN article_has_tag as S on S.article_id_article = article.id_article 
    INNER JOIN tag on id_tag = S.tag_id_tag GROUP BY id_article');
    $req->execute();
    $data = $req->fetchAll();
}
