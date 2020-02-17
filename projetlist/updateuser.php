<?php
require('./config/db.php');
$sql = "users";
$id = ['users.id_user' => $_GET['id']];
$dbh->select($sql, $id);
$user = $dbh->getResult();

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
    <form class="formupdate" method="POST">
      <div class="form-group">
        <label for="lastname">Nom</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user[0]["name"]; ?>">
      </div>
      <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user[0]["firstname"]; ?>">
      </div>
      <div class="form-group">
        <label for="address">Adresse</label>
        <input type="text" class="form-control" id="address" name="adress" value="<?php echo $user[0]["address"]; ?>">
      </div>
      <div class="form-group">
        <label for="zipcode">Code postal</label>
        <input type="number" class="form-control" id="zipcode" name="zipcode" value="<?php echo $user[0]["zipcode"]; ?>">
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" value="<?php echo $user[0]["city"]; ?>">
      </div>
      <div class="form-group">
        <label for="mail">Email:</label>
        <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $user[0]["email"]; ?>">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $user[0]["password"]; ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      </div>
      <button type="submit" class="btn btn-default btn-secondary">Enregister</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="index.js"></script>

</body>

</html>