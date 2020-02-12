<?php
require('./config/db.php');

// $sql = 'SELECT * FROM `users` where id_user=:id';
// $id = [':id' => $_GET['id']];

// Db::query($sql, $id);

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
                <th scope="col">Id List</th>
                <th scope="col">Nom de la liste de course</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            // first method

            // $sql = "SELECT * FROM `list_art` inner join article on list_art.id_art = article.id_art where list_art.id_list = {$_GET['id']}";
            // $result = $dbh->query($sql);

            // second method

            // Securisation sqli must have to prepare
            // $sth = $dbh->prepare("SELECT * FROM `list_art` inner join article on list_art.id_art = article.id_art where list_art.id_list = :idlist");
            // $sth->bindParam(':idlist', $_GET['id'], PDO::PARAM_INT);
            // $sth->execute(array(":idlist" => $_GET['id']));
            // $nb = $sth->fetchAll();

            // third method using the singleton

            $sql = "SELECT * FROM `list_art` inner join article on list_art.id_art = article.id_art where list_art.id_list = :idlist";
            $id = [':idlist' => $_GET['id']];
            $dbh->query($sql, $id);
            $sth = $dbh->getResult();
    
            foreach ($sth as $value) {
                if ($value['id_list'] == $_GET['id']) {
                    echo "<tr>";
                    echo "<th>" . $value['id_list'] . "</th>";
                    echo "<th>" . utf8_encode($value['name']) . "</th>";
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