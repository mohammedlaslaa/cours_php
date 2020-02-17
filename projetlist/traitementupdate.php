<?php
require('./config/db.php');

if (isset($_POST['lastname'])) {
    
    $sql = "UPDATE `users` SET `name`=:lastname,`firstname`=:firstname,`address`=:address,`zipcode`=:zipcode,`city`=:city,`email`=:mail,`password`=:pwd where users.id_user = :id";

    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $address = htmlspecialchars($_POST['adress']);
    $zipcode = htmlspecialchars($_POST['zipcode']);
    $city = htmlspecialchars($_POST['city']);
    $mail = htmlspecialchars($_POST['mail']);
    $pwd = utf8_encode(htmlspecialchars($_POST['pwd']));
    $getid = $_POST['id'];
    $dbh->update('users', ['name' => $lastname, 'firstname' => $firstname, 'address' => $address, 'zipcode' => $zipcode, 'city' => $city, 'email' => $mail, 'password' => $pwd], ["users.id_user" => $getid]);
}
