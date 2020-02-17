<?php

require('./config/db.php');


if (isset($_POST['lastname'])) {
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $address = htmlspecialchars($_POST['adress']);
    $zipcode = htmlspecialchars($_POST['zipcode']);
    $city = htmlspecialchars($_POST['city']);
    $mail = htmlspecialchars($_POST['mail']);
    $pwd = $_POST['pwd'];

    $lastId = $dbh->insert('users', ['name' => $lastname, 'firstname' => $firstname, 'address' => $address, 'zipcode' => $zipcode, 'city' => $city, 'email' => $mail, 'password' => $pwd]);
    echo json_encode(array(
        "lastid" => $lastId, 'lastname' => $lastname,
        'firstname' => $firstname,
        'mail' => $mail
    ));
    $userObject = new stdClass;
    $userObject->name = $lastname;
    $userObject->firstname = $firstname;
    $userObject->address = $address;
    $userObject->status = "Best";
}
