<?php 
$id = $_GET['id'];
require "../backend/connexion.php";
$tagArray = explode("," , $data['nom_tag']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Blog</title>
</head>
<body>
<div class="wrapper">
        <div class="align">
            <a href="index.php"><h1>Modifier un article</h1></a>
        </div>
        <div class="tableau">
            <form action="../backend/modifier.php" method="post">
                <div class="container">
                    <div>
                        <div class="column">
                            <label for="titre">Titre</label>
                            <input name="titre" value="<?=$data['titre_article'];?>"></input>
                            <label for="contenu">Contenu</label>
                            <textarea name="contenu"><?=$data['contenu_article'];?></textarea>
                        </div>
                    </div>
                    <div class="checkbox">    
                        <div class="checkbox">
                            <label for="categorie">Catégorie</label>
                            <select name="categorie">
                                <option value="1" <?php if( $data['nom_categorie'] = 'sport'){ ?> selected <?php } ?>>Sport</option>
                                <option value="2" <?php if( $data['nom_categorie'] = 'cuisine'){ ?> selected <?php } ?>>Cuisine</option>
                            </select>
                        </div class="checkbox">
                            Santé<input type="checkbox" name="newTag[]" value="1" <?php if(in_array('sante', $tagArray)){ ?> checked="checked" <?php } ?>>
                            Alimentation<input type="checkbox" name="newTag[]" value="2" <?php if(in_array('alimentation', $tagArray)){ ?> checked="checked" <?php } ?>>
                            Technologie<input type="checkbox" name="newTag[]" value="3" <?php if(in_array('technologie', $tagArray)){ ?> checked="checked" <?php } ?>>
                        </div>     
                            <input name="id" value="<?=$id?>" style="display:none">
                            <input name="oldTag" value="<?=$data['nom_tag']?>" style="display:none">
                        <div class="checkbox">
                            <button type="submit" name="statut" value="Publié">Publier</button>
                            <button type="submit" name="statut" value="Brouillon">Sauvegarder</button>
                        </div>  
                </div>                      
            </form>
    </div>
</div>
    
</body>
</html>
