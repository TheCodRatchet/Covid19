<?php

require_once "vendor/autoload.php";

use App\DataFromFile;

$information = new DataFromFile("app/raditaji.csv");
$records = $information->getRecords();
$header = $records->getHeader();
?>

<form method="get">
    <input name="valsts" placeholder="Ievadi valsti"/>
    <button type="submit">filtrs</button>
</form>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Covid-19 statistics</title>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col"><?php echo $header[0]; ?></th>
        <th scope="col"><?php echo $header[1]; ?></th>
        <th scope="col"><?php echo $header[2]; ?></th>
        <th scope="col"><?php echo $header[3]; ?></th>
        <th scope="col"><?php echo $header[4]; ?></th>
        <th scope="col"><?php echo $header[5]; ?></th>
        <th scope="col"><?php echo $header[6]; ?></th>
        <th scope="col"><?php echo $header[7]; ?></th>
        <th scope="col"><?php echo $header[8]; ?></th>
        <th scope="col"><?php echo $header[9]; ?></th>
        <th scope="col"><?php echo $header[10]; ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $record): ?>
        <?php if (strtolower($_GET['valsts']) == strtolower($record['Valsts'])): ?>
            <tr>
                <th scope="row"><?php echo $record['Datums']; ?></th>
                <th scope="row"><?php echo $record['Valsts']; ?></th>
                <th scope="row"><?php echo $record['14DienuKumulativaIncidence']; ?></th>
                <th scope="row"><?php echo $record['Izcelosana']; ?></th>
                <th scope="row"><?php echo $record['Pasizolacija']; ?></th>
                <th scope="row"><?php echo $record['PersIrVakcParslSert_PasizolacijaLatvija']; ?></th>
                <th scope="row"><?php echo $record['PersIrVakcParslSert_TestsPirmsIebrauksanasLV']; ?></th>
                <th scope="row"><?php echo $record['PersIrVakcParslSert_TestsPecIebrauksanasLV']; ?></th>
                <th scope="row"><?php echo $record['CitasPersonas_PasizolacijaLatvija']; ?></th>
                <th scope="row"><?php echo $record['CitasPersonas_TestsPirmsIebrauksanasLV']; ?></th>
                <th scope="row"><?php echo $record['CitasPersonas_TestsPecIebrauksanasLV']; ?></th>
            </tr>
        <?php elseif ($_GET['valsts'] == ""): ?>
            <tr>
                <th scope="row"><?php echo $record['Datums']; ?></th>
                <th scope="row"><?php echo $record['Valsts']; ?></th>
                <th scope="row"><?php echo $record['14DienuKumulativaIncidence']; ?></th>
                <th scope="row"><?php echo $record['Izcelosana']; ?></th>
                <th scope="row"><?php echo $record['Pasizolacija']; ?></th>
                <th scope="row"><?php echo $record['PersIrVakcParslSert_PasizolacijaLatvija']; ?></th>
                <th scope="row"><?php echo $record['PersIrVakcParslSert_TestsPirmsIebrauksanasLV']; ?></th>
                <th scope="row"><?php echo $record['PersIrVakcParslSert_TestsPecIebrauksanasLV']; ?></th>
                <th scope="row"><?php echo $record['CitasPersonas_PasizolacijaLatvija']; ?></th>
                <th scope="row"><?php echo $record['CitasPersonas_TestsPirmsIebrauksanasLV']; ?></th>
                <th scope="row"><?php echo $record['CitasPersonas_TestsPecIebrauksanasLV']; ?></th>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
