<?php
require('./config/connect.php');
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
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col">List</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * from users";
            $result = $dbh->query($sql);
            $nb = $result->fetchAll();
            foreach ($nb as $key => $value) {
                echo "<tr>";
                echo "<th>" . $value["id_user"] . "</th>";
                echo "<th>" . $value["name"] . "</th>";
                echo "<th>" . $value["firstname"] . "</th>";
                echo "<th>" . $value["email"] . "</th>";
                echo "<th><a href=listescourses?id=" . $nb[$key]["id_user"] . ">Voir les listes</a></th>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>