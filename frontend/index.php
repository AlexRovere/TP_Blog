<?php
if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
}
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
    <div class="wrapper">
        <div class="align">
            <a href='index.php'>
                <h1>Liste d'articles</h1>
            </a>
        </div>
        <div class="align">
            <a href="creationArticle.php" class="ajouter">Créer</a>
        </div>
        <div class="align">
            <select>
                <option selected value="">categorie</option>
                <?php foreach ($listeCategorie as $row) {
                ?>

                    <option value="<?= $row['nom_categorie'] ?>"><?= $row['nom_categorie'] ?></option>


                <?php
                }
                ?>
            </select>
            <select>
                <option selected value="">tag</option>
                <?php foreach ($listeTag as $row) {
                ?>

                    <option value="<?= $row['nom_tag'] ?>"><?= $row['nom_tag'] ?></option>


                <?php
                }
                ?>
            </select>

        </div>
        <div class="tableau">
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date de création</th>
                        <th>Statut</th>
                        <th>Catégorie</th>
                        <th>Tags</th>
                        <th>Détail</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) {
                    ?>
                        <tr>
                            <td><?= $row['titre_article'] ?></td>
                            <td><?= $row['date_creation'] ?></td>
                            <td><?= $row['statut_article'] ?></td>
                            <td><?= $row['nom_categorie'] ?></td>
                            <td><?= $row['nom_tag'] ?></td>
                            <td><a href="detailArticle.php?id=<?= $row['id_article'] ?>" class="detail">Détail</a></td>
                            <td><a href="modifierArticle.php?id=<?= $row['id_article'] ?>" class="modifier">Modifier</a></td>
                            <td><a href="../backend/supprimer.php?id=<?= $row['id_article'] ?>" class="supprimer">Supprimer</a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                <tfoot>

                    <tr>
                        <th>Titre</th>
                        <th>Date de création</th>
                        <th>Statut</th>
                        <th>Catégorie</th>
                        <th>Tags</th>
                        <th>Détail</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>

                </tfoot>

            </table>
        </div>
    </div>

</body>

</html>
