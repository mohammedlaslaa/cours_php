<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cours </title>
</head>

<body>
    <h1>PHP First</h1>

    <!-- <form method="post" action="// $_SERVER['PHP_SELF']; ">
        Name: <input type="text" name="fname">
        <input type="submit">
    </form>-->

    <?php

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $name = $_REQUEST['fname'];
    //     if (empty($name)) {
    //         echo "Name is empty <br>";
    //     } else {
    //         echo "My name is :" . $name . "<br>";
    //     }
    // }

    ?>

    <?php

    // Mon code PHP

    echo 'Hey ceci est mon premier <br> cours de code php <br>';

    print "ceci produit le même résultat qu'echo"

    /** Ceci est un commentaire qui peut être généré en documentation par certaines api */
    ?>
    <br>
    <br>
    <?php

    echo 'Je m\'appelle Mohammed <br>';

    echo 'J\'ai ' . 32 . ' ans <br>';

    $ceciEstUneVariable = 'Je suis une chaine de caractére <br>';

    echo $ceciEstUneVariable;

    echo "Bonjour $ceciEstUneVariable";

    $ceciEstUnChiffre = 9.2;

    echo gettype($ceciEstUneVariable) . "<br>";

    echo gettype($ceciEstUnChiffre);

    echo var_dump($ceciEstUnChiffre);

    $prenom = 'Mohammed <br>';

    echo "je m'appelle " . $prenom;

    echo $date = time();

    echo "<br>";

    $hello = "Bonjour ";

    ?>

    <?php

    $hello .= $prenom;

    ?>

    <?php

    echo $hello;

    $x = 30;

    $y = 25;

    echo "Ceci est le résultat de l'opération $x  + $y : " . ($x + $y);
    echo "<br>";
    echo "Ceci est le résultat de l'opération $x  - $y : " . ($x - $y);

    $newResult = $x + $y;

    echo "<br>";

    echo $newResult -= 5;

    echo "<br>";

    echo $newResult++;

    echo "<br>";

    echo $newResult;

    echo "<br>";

    echo --$newResult;

    echo "<br> x " . $x;

    echo "<br> y " . $y;

    var_dump(1 == 1);

    $test = $x < $y;

    var_dump($test);

    echo var_dump(1 === "1");

    define("coucou2", 8);

    echo (coucou2 * 6) . "<br>";

    echo __LINE__;

    echo "<br>";

    echo __FILE__;

    echo "<br>";

    $isConnected = false;

    $isGranted = true;

    if ($isConnected && $isGranted) {
        echo "Vous êtes connecté et autorisé";
    } elseif ($isConnected) {
        echo "Vous êtes connecté";
    } else {
        echo "Vous n'êtes pas autorisé";
    };

    echo "<br>";

    // ou
    // if($isConnected){
    //     if($isGranted){
    //         echo "Vous êtes connecté et autorisé"; 
    //     }else{
    //         echo "Vous êtes connecté"; 
    //     }
    // }else{
    //     echo "Vous n'êtes pas autorisé";
    // }

    $a = 5;

    $b = 5;

    if ($b > $a) {
        echo "b est supérieur à a";
    } else {
        echo "a est supérieur à b";
    };

    echo "<br>";

    if ($b >= 5 && $b <= 20) {
        echo "b est compris entre 5 et 20";
    };

    echo "<br>";

    $OK = true;

    // if($OK && $b >= 5 && $b <= 20){
    //     echo "Condition vérifiée";
    // };

    //ou 

    // if($OK){
    //     if($b >= 5 && $b <= 20){
    //         echo "Condition vérifiée";
    //     } 
    // };


    if ($OK || ($b >= 5 && $b <= 20)) {
        echo "Condition vérifiée";
    };

    echo "<br>";

    $testme = -2;

    $a = ($testme > 0) ? "Valeur positive" : "Valeur négative";

    echo $a;

    if ($testme > 0) :
    ?>

        <p>Premier paragraphe</p>;

    <?php else : ?>

        <p>Deuxième paragraphe</p>;

    <?php endif;


    echo "<br>";

    $modePayment = 'banque';

    switch ($modePayment) {
        case 'banque':
            echo 'Vous devez payer 5€';
            break;
        case 'paypal':
            echo 'Vous devez payer 10€';
            break;
        case 'cheque':
            echo 'Vous devez payer 15€';
            break;
        default:
            echo 'Vous devez payer 50€';
    }

    $testboucle = 0;

    // while($testboucle <= 500){

    //     if($testboucle == 25){
    //         echo '<br> Au revoir !';
    //     }else{
    //        echo '<br> Bonjour' . $testboucle; 
    //     };
    //     $testboucle++;
    // }

    // while ($testboucle <= 500) {
    //     if ($testboucle % 2 == 0) {
    //         echo '<br> Au revoir !';
    //         // exit;
    //     } else {
    //         echo '<br> Bonjour' . $testboucle;
    //     };
    //     $testboucle++;
    // }

    echo "<br>";

    // $mySimpleArray = array('valeur1', 'valeur2', 'valeur3');

    // echo $mySimpleArray[0];

    // echo "<br>";

    //or

    $myFirstArray = array('first' => 'valeur1', "second" => 'valeur2', "third" => 'valeur3');

    // echo $myFirstArray["second"];

    // echo "<br>";

    // or

    // $fruit = ['first' => 'banana', "second" => 'orange', "third" => 'pinapples'];

    // echo $fruit["third"];

    // echo "<br>";

    // or

    $mySimpleArray = array('valeur1', 'valeur2', 'valeur3');
    $fruit1 = array('orange', 'apple', 'grape', 'pinapples', 'clementine');

    // echo $fruit1[2];

    echo "<br>";

    for ($x = 0; $x < count($fruit1); $x++) {
        if ($x == 2) {
            echo '<span style= "color:red">' . $fruit1[$x] . '</span>' . "<br>";
        } else {
            echo $fruit1[$x] . "<br>";
        }
    };

    echo "<br>";

    for ($x = 0; $x < count($fruit1); $x++) {
        echo $fruit1[$x] . " ";
        if ($x == 1) {
            break;
        }
    }

    echo "<br>";

    $fruit1[] = 'banana';

    array_push($fruit1, "strawberry", "raspberry");

    print_r($fruit1);

    echo "<br>";

    echo "il y a " . count($fruit1) . " dans le tableau";

    $contain = "";

    for ($x = 0; $x < count($fruit1); $x++) {
        $contain .= "<li>" . $fruit1[$x] . "</li>";
    };

    $ul = "<ul>" . $contain . "</ul>";

    echo $ul . "<br>";

    foreach ($fruit1 as $fruit) {
        // if($fruit == "pinapples"){
        echo $fruit . "<br>";
        // }
    }

    echo "<br>";

    foreach ($myFirstArray as $fruit => $val) {
        if ($fruit == "first") {
            echo $val;
        }
    }

    echo "<br>";
    echo "<br>";

    $personnage = array("Nom" => "Laslaa", "Prenom" => "Mohammed", "Age" => "32", "Ville" => "Noyelles-Godault");

    echo "<br>";

    print_r($personnage);

    echo "<br>";

    foreach ($personnage as $key => $val) {
        if ($key == "Prenom") {
            echo "<strong>" . $key . "</strong>" . " : " . '<span style="color:red">' . $val . "</span><br>";
        } else {
            echo "<strong>" . $key . "</strong>" . " : " . $val . "<br>";
        }
    }

    echo $key;

    echo "<br>";

    $personnage["genre"] = "Masculin";

    print_r($personnage);

    echo "<br>";

    $multiDimensionnal = [];

    $multiDimensionnal["Mohammed"] = ["Maths" => 14, "Histoire" => 14];
    $multiDimensionnal["Olivier"] = array("Maths" => 14, "Histoire" => 14);
    $multiDimensionnal["Théo"] = array("Maths" => 14, "Histoire" => 14);

    print_r($multiDimensionnal);

    echo "<br>";

    foreach ($multiDimensionnal as $key => $val) {
        echo $key . " : <br>";
        foreach ($val as $matiere => $note) {
            echo  $matiere . " : " . $note . " " . "<br>";
        }
    };

    ?>

    <form action="index.php" method="POST">
        <div>
            <label for="fname">Prénom</label>
            <input type="text" id="fname" name="firstname" placeholder="Votre prénom ..." required>
        </div>
        <div><label for="lname">Nom</label>
            <input type="text" id="lname" name="lastname" placeholder="Votre nom.." required>
        </div>

        <div>
            <label for="country">Pays</label>
            <select id="country" name="country" required>
                <option value="france">France</option>
                <option value="spain">Espagne</option>
                <option value="italia">Italie</option>
            </select>
        </div>

        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" placeholder="Votre adresse mail..">
        </div>

        <div>
            <label for="subject">Sujet</label>
            <textarea id="subject" name="subject" placeholder="......" style="height:200px" required></textarea>
        </div>

        <input type="submit" value="Submit">
    </form>

    <?php


    if (isset($_POST['subject'])) {
        foreach ($_POST as $x => $y) {
            if ($x == 'email' && $y == "titi@gmail.com") {
                echo $x . " : " . "<span style='color:red'>" . $y . "</span>" . "<br>";
            } else {
                echo $x . " : " . $y . "<br>";
            }
        };
    };

    $coucou = "-";

    $tableau = ["monsieur", "laslaa"];

    echo implode($coucou, $tableau)

    ?>

    <a href="index.php?name=toto&prenom=heyyy">CLIQUE ICI !!</a>

    <?php

    $x = isset($_GET["name"]) ? $_GET["name"] : "";

    if ($x == "toto") {
        require_once('inc/element1.php');
    } elseif ($x == "tata") {
        require_once('./inc/element2.php');
    }

    ?>
</body>

</html>