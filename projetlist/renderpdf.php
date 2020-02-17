<?php
ob_start();
require('./config/db.php');
require('./config/function.php');
require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

$sql = "users";
$dbh->select($sql);
$nb = $dbh->getResult();
$count = $dbh->getRowCount();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($nb as $key => $value) {
                $valueActivate = ($value["activate"] == 0) ? "<th> Inactif <a href=?activateuser=" . $value['id_user'] . ">Activer</a></th>" : "<th> Actif <a href=?desactivateuser=" . $value['id_user'] . ">Désactiver</a></th>";
                echo "<tr>";
                echo "<th>" . $value["id_user"] . "</th>";
                echo "<th>" . utf8_encode($value["name"]) . "</th>";
                echo "<th>" . utf8_encode($value["firstname"]) . "</th>";
                echo "<th>" . $value["email"] . "</th>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $output = ob_get_clean();

    ?>

</body>

</html>
<?php

$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdf_gen = $dompdf->output();

$filename = 'file' . date("mdyHms") . '.pdf';
if (!file_put_contents($filename, $pdf_gen)) {
    echo 'Not OK!';
    header("Location: index.php?warningpdf");
} else {
    echo 'OK';
    header("Location: index.php");
}
//     $html2pdf = new Html2Pdf("p", "A4", "fr");
//     $html2pdf->writeHTML($html);
//     $html2pdf->output();


?>