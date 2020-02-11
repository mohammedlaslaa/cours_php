<?php
require('./config/connect.php');

if (isset($_POST['mail'])) {
    $sql = "SELECT * FROM `users` WHERE users.email = :mail AND users.password = :pwd";
    $sth = $dbh->prepare($sql);
    $mail = htmlspecialchars($_POST['mail']);
    $pwd = utf8_encode(htmlspecialchars($_POST['pwd']));
    $sth->bindParam(':mail', $mail, PDO::PARAM_STR, 12);
    $sth->bindParam(':pwd', $pwd, PDO::PARAM_STR, 12);
    if ($sth->execute()) {
        $result = $sth->fetch();
        if(!$result){
            echo "<p class='text-danger'>Login erroné</p>";
        }
    }   
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container">
    <div class="w-50 mx-auto">
        <form method="post">
            <div class="form-group">
                <label for="mail">Email:</label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <button type="submit" class="btn btn-default btn-secondary">Connexion</button>
        </form>
    </div>
</body>

</html>