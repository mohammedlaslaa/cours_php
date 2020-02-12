<?php
// require('./config/connect.php');

function isActivate($dbh, $params, $val)
{
    $dbh->update('users', ['activate' => $val], ["users.id_user" => $params]);
    header('Location: index.php');
}
