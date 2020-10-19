<?php declare(strict_types=1);

require_once 'EditCswFile.php';
require_once 'IdSearch.php';

$editFile = new EditCswFile('personList.csv');
$idSearchResult = 'Ievadiet personas kodu meklēšanas laukā!';

if (key_exists('searchID', $_POST) && !empty($_POST['searchID'])) {
    $idSearchResult = IdSearch::searchPersonByID($editFile->readCsvAllAsArrays(), $_POST['searchID']);
} elseif ((key_exists('searchID', $_POST) && empty($_POST['searchID']))) {
    echo $idSearchResult = 'Ievadiet personas kodu meklēšanas laukā!';
} elseif (!key_exists('searchID', $_POST) && !empty($_POST) &&
    !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["id"]) && !empty($_POST["address"])) {
    $editFile->addNewPersonToCsv($_POST);
} else {
    $idSearchResult = 'Nav aizpildīti visi lauki';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, tminimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2><?php echo $idSearchResult; ?></h2>
<p>
<form action="/" method="post">

    <div>
        <label>Meklēt pēc personas koda <input style="margin-left: 20px" name="searchID" value="" type="text"></label>
        <button style="margin-left: 5px" type="submit" name="" value="">Apstiprināt</button>

    </div>
</form>
</p>
<form action="/" method="post">
    <div>
        <div><label>Vārds: <input style="margin-left: 144px" name="name" value="" type="text"></label></div>
        <div><label>Uzvārds: <input style="margin-left: 129px" name="surname" value="" type="text"></label></div>
        <div><label>Personas kods: <input style="margin-left: 91px" name="id" value="" type="text"></label></div>
        <div><label>Adrese: <input style="margin-left: 137px" name="address" value="" type="text"></label></div>
        <button style="margin-left: 298px" type="submit" name="" value="">Apstiprināt</button>
    </div>
</form>
</body>
</html>
