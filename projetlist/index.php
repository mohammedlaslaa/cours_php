<?php

require('./config/db.php');
require('./config/function.php');
require __DIR__ . '/vendor/autoload.php';


    // use Spipu\Html2Pdf\Html2Pdf;
    // use Dompdf\Dompdf;

    if (isset($_GET['warning'])) {
        echo "<p class='text-center text-white bg-danger'>Attention impossible de supprimer l'utilisateur en vue de ses dépendances, il a donc été désactiver</p>";
    }

    if (isset($_GET['warningpdf'])) {
        echo "<p class='text-center text-white bg-danger'>Attention impossible de génerer le pdf</p>";
    }
    $sql = "users";
    $dbh->select($sql);
    $nb = $dbh->getResult();
    $count = $dbh->getRowCount();

    if (isset($_GET['desactivateuser'])) {
        isActivate($dbh, $_GET['desactivateuser'], 0);
    }

    if (isset($_GET['activateuser'])) {
        isActivate($dbh, $_GET['activateuser'], 1);
    }

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <table class="table">
            <?php $resultcount = ($count > 1) ? "Il y a $count utilisateurs" : "Il y a $count utilisateur"; ?>
            <p><?=
                    $resultcount;

                ?></p>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Listes</th>
                    <th scope="col">Etat du compte</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Suppression</th>
                </tr>
            </thead>
            <tbody class="tbapp">
                <?php
                foreach ($nb as $key => $value) {
                    $valueActivate = ($value["activate"] == 0) ? "<th> Inactif <a href=?activateuser=" . $value['id_user'] . ">Activer</a></th>" : "<th> Actif <a href=?desactivateuser=" . $value['id_user'] . ">Désactiver</a></th>";
                    echo "<tr>";
                    echo "<th>" . $value["id_user"] . "</th>";
                    echo "<th>" . utf8_encode($value["name"]) . "</th>";
                    echo "<th>" . utf8_encode($value["firstname"]) . "</th>";
                    echo "<th>" . $value["email"] . "</th>";
                    echo "<th><a href=listescourses?id=" . $value["id_user"] . ">Voir les listes</a></th>";
                    echo $valueActivate;
                    echo "<th><a href=updateuser?id=" . $value["id_user"] . ">Modifier un utilisateur</a></th>";
                    echo "<th><a href=deleteuser?id=" . $value["id_user"] . ">Supprimer</a></th>";
                    echo "</tr>";
                }
                ?>
            </tbody>

        </table>
        <button type="button" class="adduser btn btn-primary"><a class="text-white text-decoration-none">Créer un utilisateur</a></button>
        <button type="button" class="downuser btn btn-primary"><a href="renderpdf.php" class="text-white text-decoration-none">Télécharger les utilisateurs !</a></button>

        <div class="w-50 mx-auto">
            <form class="formsend">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" id="address" name="adress">
                </div>
                <div class="form-group">
                    <label for="zipcode">Code postal</label>
                    <input type="number" class="form-control" id="zipcode" name="zipcode">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group">
                    <label for="mail">Email:</label>
                    <input type="email" class="form-control" id="mail" name="mail">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                    <input type="hidden" class="form-control" name="id" value=<?= $lastId ?? -1 ?>>
                </div>
                <button type="submit" class="btn btn-default btn-secondary" id="register">Enregister</button>
                <button class="return btn btn-default btn-secondary" id="register">Annuler</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="index.js"></script>

    </body>

    </html>
