<?php
require('./config/db.php');
require('./config/function.php');

if (isset($_GET['warning'])) {
    echo "<p class='text-center text-white bg-danger'>Attention impossible de supprimer l'utilisateur en vue de ses dépendances, il a donc été désactiver</p>";
}

$sql = "SELECT * from users";
$dbh->query($sql);
$nb = $dbh->getResult();
$count = $dbh->getRowCount();

if(isset($_GET['desactivateuser'])){
    isActivate($dbh, $_GET['desactivateuser'], 0);
}

if(isset($_GET['activateuser'])){
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
        <?php $resultcount = ($count>1) ? "Il y a $count utilisateurs" : "Il y a $count utilisateur"; ?>
        <p><?= $resultcount ?></p>
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
        <tbody>
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
    <button type="button" class="btn btn-primary"><a href="adduser.php" class="text-white text-decoration-none">Créer un utilisateur</a></button>
</body>

</html>