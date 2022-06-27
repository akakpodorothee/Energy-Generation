<?php
require_once('connect.php');
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location:index.php');
} else {
    // code pour Sélectionner l'article qui est cliqué
    $id = $_GET['id'];
    $req = "SELECT * FROM articles WHERE id=$id";
    $resultat = mysqli_query($conn, $req);
    $ligne = mysqli_fetch_assoc($resultat);
    extract($_GET);
    $id = strip_tags($id);

    if (!empty($_POST)) {

        extract($_POST);
        // code pour sécuriser l'entrer
        $auteur = strip_tags($auteur);
        $comment = strip_tags($comment);

        // code pour afficher les erreurs
        $errors = array();
        if (empty($auteur)) {
            array_push($errors, "Vous devez entrez votre Pseudo");
        }
        if (empty($comment)) {
            array_push($errors, "Vous devez entrez votre commentaire");
        }
        if (count($errors) == 0) {
            $req = "INSERT INTO commentaires (articleId,autor,comment,date) VALUES ('$id','$auteur','$comment',NOW())";
            $resultat = mysqli_query($conn, $req);
            if ($resultat) {
                $succes = 'Votre commentaire a été publié';

                echo $succes;
            }
            unset($auteur);
            unset($comment);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?= $ligne['titre']; ?></title>
</head>

<body>
    <div class="container">
        <a class="btn btn-secondary" href="index.php">Retour aux articles</a>
        <!-- Partie dynamique qui génère les infos du post -->
        <div class="row">
            <div class="col-12 col-md-6"><img class="w-100 " src="<?= $ligne['photo']; ?>" alt="Image du post"></div>
            <div class="col-12 my-3 col-md-6">
                <div class=" d-flex">
                    <div id="profil" class="profil mx-3">
                        <img src="<?= $ligne['photoAd']; ?> " alt="">
                    </div>
                    <div class="info">
                        <b><?= $ligne['admin']; ?> </b>
                        <p><?= $ligne['date']; ?> </p>
                    </div>
                </div>
                <div class="post my-md-4">
                    <h2><?= $ligne['titre']; ?></h2>
                    <div class="likebar">
                        <?php
                        // code pour afficher le nombre de commentaire
                        $req = "SELECT * FROM commentaires WHERE articleId=$id";
                        $result = mysqli_query($conn, $req);
                        $nbr = mysqli_num_rows($result);

                        ?>
                        <h4><?= $nbr . " commentaires" ?></h4>
                    </div>
                </div>
            </div>

        </div>
        <div class="container
        mt-3">
            <p><?= $ligne['content']; ?> </p>
            <h3></h3>
        </div>
    </div>
</body>

</html>