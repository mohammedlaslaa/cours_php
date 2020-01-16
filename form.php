<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="form.php" method="POST">
        <div>
            <label for="fname">Prénom</label>
            <input type="text" id="fname" name="firstname" placeholder="Votre prénom ..." value="<?php if (isset($_POST['firstname'])) {
                                                                                                        echo $_POST['firstname'];
                                                                                                    } ?>" required>
        </div>
        <br>
        <div><label for="lname">Nom</label>
            <input type="text" id="lname" name="lastname" placeholder="Votre nom.." value="<?php if (isset($_POST['lastname'])) {
                                                                                                echo $_POST['lastname'];
                                                                                            } ?>" required>
        </div>
        <br>
        <!-- <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" placeholder="Votre adresse mail..">
        </div> -->
        <br>
        <div><label for="number">Numéro</label>
            <input type="number" id="number" name="number" placeholder="Numéro de rue..." value="<?php if (isset($_POST['number'])) {
                                                                                                        echo $_POST['number'];
                                                                                                    } ?>" required>
        </div>
        <br>
        <div><label for="street">Rue</label>
            <input type="street" id="street" name="street" placeholder="Rue" value="<?php if (isset($_POST['street'])) {
                                                                                        echo $_POST['street'];
                                                                                    } ?>" required>
        </div>
        <br>
        <div><label for="city">Ville</label>
            <input type="text" id="city" name="city" placeholder="Ville" value="<?php if (isset($_POST['city'])) {
                                                                                    echo htmlspecialchars($_POST['city']);
                                                                                } ?>" required>
        </div>
        <br>
        <div><label for="zip">Code Postal</label>
            <input type="number" id="zip" name="zip" placeholder="Code Postal" value="<?php if (isset($_POST['zip'])) {
                                                                                            echo $_POST['zip'];
                                                                                        } ?>" required>
        </div>
        <br>
        <div>
            <label for="country">Pays</label>
            <select id="country" name="country" required>
                <option value="france">France</option>
                <option value="spain">Espagne</option>
                <option value="italia">Italie</option>
            </select>
        </div>
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <?php

    // if (isset($_POST['street'])) {
    //     foreach ($_POST as $x => $y) {
    //         if ($x == "firstname" || $x == "lastname") {
    //             echo $x . " : " . htmlspecialchars(strtoupper($y)) . "<br><br>";
    //         } elseif ($x == "country" || $x == "city") {
    //             echo $x . " : " . htmlspecialchars(ucwords($y)) . "<br><br>";
    //         } elseif ($x == "zip" && strlen($y) > 5) {
    //             echo $x .  " Code postal erroné ! <br>";
    //         } else {
    //             echo $x . " : " . htmlspecialchars($y) . "<br><br>";
    //         }
    //     };
    //     echo implode('*', $_POST);
    // };

    $listUl = ["li1", "li2", "li3"];

    /**
     * Undocumented function
     *
     * @param array $arg
     * @return void
     */

    function listul(array $arg): void // S'assurer que l'argument est bien un un array
    {
        if (is_array($arg)) {
            echo "<ul>";
            foreach ($arg as $x) {
                echo "<li>" . $x . "</li>";
            }
            echo '</ul>';
        } else {
            echo "Please pass an array in function";
        }
    };

    listul($listUl);

    listul(["coucou", "list1", "list2"]);

    var_dump(listul(["coucou", "list1", "list2"]));

    $fruit = ["orange", "pasteque", "fraise", 'titi', 'toto'];

    function getFormattedString(string $arg): string
    {
        return '<span style="color:green">' . str_replace('t', 's', $arg) . '</span>';
    }

    echo getFormattedString('ttttttttoto');

    echo "<br>";

    foreach ($fruit as $val) {
        echo getFormattedString($val) . "<br>";
    }

    echo print_r($fruit);

    sort($fruit);

    echo "<br>";

    foreach ($fruit as $val) {
        echo $val . "<br>";
    }

    echo print_r($fruit);


    

    ?>

</body>

</html>