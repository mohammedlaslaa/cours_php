<?php
require('./config/db.php');
require('./config/function.php');

$sql = "SELECT * FROM `users` WHERE users.id_user = :id";
$dbh->query($sql);
$id = htmlspecialchars($_GET['id']);
var_dump($dbh);
// try {
//     $dbh->beginTransaction();
//     $dbh->commit();
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

if (isset($_GET['id'])) {
    $sth = $dbh->delete('users', ['users.id_user' => $id]);
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
    if ($dbh->getError()) {
        isActivate($dbh, $_GET['desactivateuser'], 0);
        // header('Location: index.php?warning');
    } else {
        // header('Location: index.php');
    }
}
