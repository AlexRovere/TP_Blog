<?php
$host = 'localhost';
$bdd = 'tp_blog';
$user = 'root';
$password = '';
$titre = htmlspecialchars(implode([$_POST['titre']]));
$contenu = htmlspecialchars(implode([$_POST['contenu']]));
$categorie = htmlspecialchars(implode([$_POST['categorie']]));
$statut = htmlspecialchars(implode([$_POST['statut']]));
$dateCreation = date("Y-m-d");
$newTag = $_POST['newTag'];
$oldTag = $tagArray = explode("," , $_POST['oldTag']);
$id = $_POST['id'];
// var_dump($newTag);
// var_dump($oldTag);

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
    $req = $bdd->prepare('UPDATE article SET titre_article = :titre, contenu_article = :contenu, categorie_id_categorie = :categorie, statut_article = :statut, date_publication_article = :datePublication WHERE id_article = :id)');
    $req->bindParam(':datePublication', $datePublication);
}    

else // Sinon c'est que la page est en brouillon
{
    $req = $bdd->prepare('UPDATE article SET titre_article = :titre, contenu_article = :contenu, categorie_id_categorie = :categorie, statut_article = :statut WHERE id_article = :id');
}

if (isset($titre, $contenu, $categorie, $statut))
{
    $req->bindParam(':titre', $titre);
    $req->bindParam(':contenu', $contenu);
    $req->bindParam(':categorie', $categorie);
    $req->bindParam(':statut', $statut);
    $req->bindParam(':id', $id);
    $req->execute();

    // SI le tag n'a pas changé on ne fait rien
    // Sinon on ajoute celui qui n'existe pas
    // On supprime ceux qui n'existent plus

    // foreach ($newTag as $tag_id) { // On boucle pour ajouter plusieurs lignes dans la table intérmediaire si plusieurs tags sont recu
    //     $req = $bdd->prepare('UPDATE article_has_tag SET article_id_article = :id, tag_id_tag = :tag_id'); 
    //     $req->bindParam(':id', $id);
    //     $req->bindParam(':tag_id', $tag_id);
    //     $req->execute();
    //     }
}


header('Location: ../frontend/index.php');
