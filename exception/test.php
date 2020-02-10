<?php

function divide($a, $b)
{
    if ($b == 0) {
        throw new Exception('Error a ne doit pas être égale à 0');
    }

    return $a / $b;
}

try {
    divide(5, 0);
} catch (Exception $e) {
    echo "Message : " . $e->getMessage() . " Ligne : " . $e->getLine() . " Fichier : " . $e->getFile();
    var_dump($e);
}
