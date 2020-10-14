<?php declare(strict_types=1);

require_once 'EditCswFile.php';
require_once 'PhoneNrSearch.php';

$editFile = new EditCswFile('phoneNumbers.csv');
$phoneSearchResult = 'Ievadiet telefona numuru meklēšanas laukā!';

if (key_exists('searchPhoneNr', $_POST) && !empty($_POST['searchPhoneNr'])) {
    $phoneSearchResult = PhoneNrSearch::searchPersonByPhone($editFile->readCsvAllAsArrays(), $_POST['searchPhoneNr']);
} elseif ((key_exists('searchPhoneNr', $_POST) && empty($_POST['searchPhoneNr']))) {
    $phoneSearchResult = 'Ievadiet telefona numuru meklēšanas laukā!';
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
<h2><?php echo $phoneSearchResult; ?></h2>
<form action="/" method="post">

    <div>
        <label>Meklēt pēc telefona numura <input style="margin-left: 20px" name="searchPhoneNr" value="" type="number"></label>
        <button style="margin-left: 5px" type="submit" name="" value="">Apstiprināt</button>

    </div>
</form>
</body>
</html>
