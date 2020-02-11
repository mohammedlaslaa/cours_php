<?php
require('./config/connect.php');

$sql = "SELECT * FROM `users` WHERE users.id_user = :id";
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $_GET['id']);
$sth->execute();
$user = $sth->fetchObject();

if (isset($_POST['lastname'])) {

  $sql = "UPDATE `users` SET `name`=:lastname,`firstname`=:firstname,`address`=:adress,`zipcode`=:zipcode,`city`=:city,`email`=:mail,`password`=:pwd where users.id_user = :id";

  $sth = $dbh->prepare($sql);
  
  $lastname = htmlspecialchars($_POST['lastname']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $address = htmlspecialchars($_POST['adress']);
  $zipcode = htmlspecialchars($_POST['zipcode']);
  $city = htmlspecialchars($_POST['city']);
  $mail = htmlspecialchars($_POST['mail']);
  $pwd = utf8_encode(htmlspecialchars($_POST['pwd']));
  $getid = $_GET['id'];

  $sth->bindParam(':lastname', $lastname, PDO::PARAM_STR, 12);
  $sth->bindParam(':firstname', $firstname, PDO::PARAM_STR, 12);
  $sth->bindParam(':adress', $address, PDO::PARAM_STR, 12);
  $sth->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
  $sth->bindParam(':city', $city, PDO::PARAM_STR, 12);
  $sth->bindParam(':mail', $mail, PDO::PARAM_STR, 12);
  $sth->bindParam(':pwd', $pwd, PDO::PARAM_STR, 12);
  $sth->bindParam(':id', $getid);

  if ($sth->execute()) header('Location: index.php');
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
        <label for="lastname">Nom</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user->name; ?>">
      </div>
      <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user->firstname; ?>">
      </div>
      <div class="form-group">
        <label for="address">Adresse</label>
        <input type="text" class="form-control" id="address" name="adress" value="<?php echo $user->address; ?>">
      </div>
      <div class="form-group">
        <label for="zipcode">Code postal</label>
        <input type="number" class="form-control" id="zipcode" name="zipcode" value="<?php echo $user->zipcode; ?>">
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" value="<?php echo $user->city; ?>">
      </div>
      <div class="form-group">
        <label for="mail">Email:</label>
        <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $user->email; ?>">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $user->password; ?>">
      </div>
      <button type="submit" class="btn btn-default btn-secondary">Enregister</button>
    </form>
  </div>


</body>

</html>