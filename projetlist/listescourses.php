<?php
require('./config/connect.php');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            $sql = "SELECT * FROM `users` inner join `list` on users.id_user = list.id_user";
            $result = $dbh->query($sql);
            $nb = $result->fetchAll();
            foreach ($nb as $key => $value) {
                if ($value['id_user'] == $_GET['id']) {
                    echo "<tr>";
                    echo "<th>" . $value['id_user'] . "</th>";
                    echo "<th>" . $value['name'] . "</th>";
                    echo "<th>" . $value['total_price'] . "</th>";
                    echo "<th><a href=listarticles?id=" . $nb[$key]["id_list"] . ">Voir les articles</a></th>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>