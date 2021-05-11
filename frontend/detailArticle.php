<?php 
$id = $_GET['id'];
require "../backend/connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Blog</title>
</head>
<body>
<div class="wrapperDetailArticle">
        <div class="align">
            <a href="index.php"><h1><?=$data['titre_article']?></h1></a>
        </div>
        <div class="container">
            <div> 
                <a href='index.php?categorie=<?=$data['nom_categorie']?>'><p>Catégorie : <?=$data['nom_categorie']?></p></a>
                <p>Tags : <?php if (isset($data['nom_tag'])) {echo $data['nom_tag'];} else {echo 'aucun tag associé';}?></p>
            </div>
            <div> 
                <p>Article crée le : <?=$data['date_creation']?></p>
            </div>
        </div>
        <hr>
        <div>
            <p><?=$data['contenu_article']?></p>
        </div>
</div>
    
</body>
</html>
