<?php

$dsn = 'mysql:dbname=bdd_app_course;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



// $adduser = "INSERT INTO `users`(`name`, `firstname`, `address`, `zipcode`, `city`, `email`, `password`) VALUES ('Président', 'Nom', 'Perlimpimpim', 75000, 'Paris', 'elyse@m.fr', 'parigo')";
// $dbh->query($adduser);
// $sql = "SELECT * from list inner join list_art on list.id_list = list_art.id_list ";
// $result = $dbh->query($sql);
// $nb = $result->fetchAll();