<?php
require('./config/db.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la liste de course</th>
                <th scope="col">Prix total</th>
                <th scope="col">Articles</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // $sql = "SELECT * FROM `users` inner join `list` on users.id_user = list.id_user where list.id_user = :iduser";
            // $sth = $dbh->prepare($sql);
            // $sth->bindParam(':iduser', $_GET['id'], PDO::PARAM_INT);
            // $sth->execute();
            // $nb = $sth->fetchAll();

            $sql = "SELECT * FROM `users` inner join `list` on users.id_user = list.id_user where list.id_user = :iduser";
            $id = [':iduser' => $_GET['id']];
            $dbh->query($sql, $id);
            $sth = $dbh->getResult();
            foreach ($sth as $value) {
                    echo "<tr>";
                    echo "<th>" . $value['id_list'] . "</th>";
                    echo "<th>" . utf8_encode($value['name']) . "</th>";
                    echo "<th>" . $value['total_price'] . "</th>";
                    echo "<th><a href=listarticles?id=" . $value["id_list"] . ">Voir les articles</a></th>";
                    echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>