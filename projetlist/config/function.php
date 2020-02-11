<?php
// require('./config/connect.php');

function isActivate($dbh, $params, $val)
{
    $sql = "UPDATE `users` SET `activate`=:val where users.id_user = :params";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(':val', $val, PDO::PARAM_INT);
    $sth->bindParam(':params', $params);
    if ($sth->execute()) header('Location: index.php');
}
