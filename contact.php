<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

    
    echo print_r($_POST);

    foreach ($_POST as $cle => $val) { 
        unset($_POST[$cle]); 
      } 
   
    ?>
</body>
</html>