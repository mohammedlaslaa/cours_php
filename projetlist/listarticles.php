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
                <th scope="col">Id List</th>
                <th scope="col">Nom de la liste de course</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM ((list INNER JOIN list_art ON list.id_list = list_art.id_list) INNER JOIN article ON list_art.id_art = article.id_art)";
            //SELECT * FROM `list_art` where id_list = $_GET['id']
            $result = $dbh->query($sql);
            $nb = $result->fetchAll();
            foreach ($nb as $key => $value) {
                if ($value['id_list'] == $_GET['id']) {
                    echo "<tr>";
                    echo "<th>" . $value['id_list'] . "</th>";
                    echo "<th>" . $value['name'] . "</th>";
                    echo "<th>" . $value['quantity'] . "</th>";
                    echo "<th>" . $value['price'] . "</th>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>