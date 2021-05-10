<?php 
require "../backend/connexion.php";
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
            <a href="index.php"><h1>Créer un article</h1></a>
        </div>
        <div class="tableau">
            <form action="../backend/creation.php" method="post">
                <div class="container">
                    <div>
                        <div class="column">
                            <label for="titre">Titre</label>
                            <input name="titre"></input>
                            <label for="contenu">Contenu</label>
                            <textarea name="contenu"></textarea>
                        </div>
                    </div>
                    <div class="checkbox">    
                        <div class="checkbox">
                            <label for="categorie">Catégorie</label>
                            <select name="categorie">
                                <option value="1">Sport</option>
                                <option value="2">Cuisine</option>
                            </select>
                        </div class="checkbox">
                            Santé<input type="checkbox" name="tag[]" value="1">
                            Alimentation<input type="checkbox" name="tag[]" value="2">
                            Technologie<input type="checkbox" name="tag[]" value="3">
                        </div>     

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
