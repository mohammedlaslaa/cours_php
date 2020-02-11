<?php
require('./config/connect.php');
$sql = "SELECT * FROM `users` WHERE users.id_user = :id";
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $_GET['id']);

try {
    $dbh->beginTransaction();
    $sth->execute();
    $dbh->commit();
} catch (Exception $e) {
    echo $e->getMessage();
}

$user = $sth->fetchObject();

if (isset($_GET['id'])) {

    $sql = "DELETE FROM `users` WHERE users.id_user = :id";
    $sth = $dbh->prepare($sql);
    $id = htmlspecialchars($_GET['id']);
    $sth->bindParam(':id', $id);

    // Try catch and throw exception
    // try {
    //     $dbh->beginTransaction();
    //     if($sth->execute()){
    //         $dbh->commit();
    //     }else{
    //         throw new Exception('Une chose ne s\'est pas bien passé lors de la suppression');
    //     }
    // } catch (PDOException $e) {
    //     $dbh->rollBack();
    //     var_dump($e->getMessage());
    // }

    if ($sth->execute()) {
        header('Location: index.php');
    } else {
        $sql = "UPDATE `users` SET `activate`=:val where users.id_user = :id";
        $sth = $dbh->prepare($sql);
        $val = 0;
        $sth->bindParam(':val', $val, PDO::PARAM_INT);
        $sth->bindParam(':id', $_GET['id']);
        if ($sth->execute()) header('Location: index.php?warning');
    }
}
