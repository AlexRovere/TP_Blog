<?php
$host = 'localhost';
$bdd = 'tp_blog';
$user = 'root';
$password = '';
$titre = htmlspecialchars(implode([$_POST['titre']]));
$contenu = htmlspecialchars(implode([$_POST['contenu']]));
$dateCreation = date("Y-m-d");
$categorie = htmlspecialchars(implode([$_POST['categorie']]));
$statut = htmlspecialchars(implode([$_POST['statut']]));
$tag = $_POST['tag'];

try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('erreur de connexion' . $e->getMessage());
}


if ($statut == 2) // Si le statut est "publié" on entre la date actuelle pour la date de publication
{  
    $datePublication = $dateCreation;
    $req = $bdd->prepare('INSERT INTO article (titre_article, contenu_article, date_creation_article, categorie_id_categorie, statut_article, date_publication_article) VALUES (:titre, :contenu, :dateCreation, :categorie, :statut, :datePublication)');
    $req->bindParam(':datePublication', $datePublication);
}    

else  // Sinon c'est que la page est en brouillon
{
    $req = $bdd->prepare('INSERT INTO article (titre_article, contenu_article, date_creation_article, categorie_id_categorie, statut_article) VALUES (:titre, :contenu, :dateCreation, :categorie, :statut)');
}

if (isset($titre, $contenu, $dateCreation, $categorie, $statut)) 
{
    $req->bindParam(':titre', $titre);
    $req->bindParam(':contenu', $contenu);
    $req->bindParam(':dateCreation', $dateCreation);
    $req->bindParam(':categorie', $categorie);
    $req->bindParam(':statut', $statut);
    $req->execute();

    $id = $bdd->lastInsertId(); // On récupère le dernier ID de la bdd (celui qu'on vient de rentrer pour notre nouvel article) afin de mettre à jour les tags associés
    $req = $bdd->prepare('INSERT INTO article_has_tag (article_id_article, tag_id_tag) VALUES (:id, :tag_id)'); 
    $req->bindParam(':id', $id);

    foreach ($tag as $tag_id) { // On boucle pour ajouter plusieurs lignes dans la table intérmediaire si plusieurs tags sont recu
        $req->bindParam(':tag_id', $tag_id);
        $req->execute();
        }
}


header('Location: ../frontend/index.php');
