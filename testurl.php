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

    // foreach ($_GET as $key => $val) {
    //     if ($key == "product_id") {
    //         switch ($val) {
    //             case 5:
    //                 echo "<h1>Meilleur vente</h1>";
    //                 break;
    //             case 10:
    //                 echo "<h1>indisponible</h1>";
    //                 break;
    //             default:
    //                 echo "<h1>Product not found</h1>";
    //         }
    //     }

    //     echo substr($val, -2);
    // }


    $product_id = (isset($_GET['product_id'])) ? (int) $_GET['product_id'] : "";
    $nom = (isset($_GET['nom'])) ? htmlspecialchars( $_GET['nom']) : "";

    echo var_dump($product_id);
    echo var_dump($nom);

    $fruit = ['fraise', 'kiwi', 'pasteque', 'mangue', 'banane', 'orange'];
    $legume = ['tomate', 'citrouille'];
    $epice = ['paprika', 'curry'];

    $element = array_pop($fruit);

    echo print_r($element);

    echo "<br>";

    $merge = array_merge($fruit, $legume);

    echo print_r($merge);

    echo "<br>";

    $merge2 = array_merge($fruit, $legume, $epice);

    echo print_r($merge2);

    echo "<br>";

    $nombre = [25, 28, '14'];

    echo array_sum($nombre);

    echo "<br>";

    echo array_product($nombre);

    echo "<br>";

    $slice = array_slice($fruit, 2);

    echo print_r($slice);

    $doublon = ['cou', 'cou', 5, 5, 'test', 'test', 'test'];

    echo "<br>";

    $doublon = array_unique($doublon);

    echo print_r($doublon);

    echo "<br>";

    echo print_r(array_reverse($slice));

    $tableauTest = ["MeSSage" =>"coucou", "EN" => "LIO", "MAJUScUle" => "Je", "TRANsformer EN MINUSCUle" => "hey"];

    $tableauTest = array_change_key_case($tableauTest);

    echo "<br>";

    print_r($tableauTest);

    function getFormattedString(string $arg): string
    {
        return '<span style="color:green">' . str_replace('t', 's', $arg) . '</span>';
    };

    echo "<br>";

    $result = array_map('getFormattedString', $fruit);

    echo var_dump($result);

    echo $_SERVER["PHP_SELF"];

    ?>

</body>

</html>