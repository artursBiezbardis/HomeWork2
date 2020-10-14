<?php declare(strict_types=1);

require_once 'DigitsToStars.php';
require_once 'EnterPinCsv.php';
require_once 'ResultOnDisplay.php';
require_once 'PinSearch.php';

$process = new DigitsToStars('enterPin.csv');
$editCSV = new EnterPinCsv('enterPin.csv');
$resultOnDisplay = new ResultOnDisplay();
$searchPin = new PinSearch('savedSessionReferences.csv');

$oldNumberList = $editCSV->getNumbers();

if (empty($_GET)) {
    $starGen= 'Enter pin !';
} else {
    $newNumber = $_GET['0'];
    if (strlen($oldNumberList) < 3) {
        $editCSV->saveNumber($newNumber, $oldNumberList);
        $starGen = $process->convertNumsToStars();
    } else {
        $editCSV->saveNumber($newNumber, $oldNumberList);
        $result = $resultOnDisplay->getResult($searchPin->searchPinInList
        ($searchPin->readCsvAllAsArrays(),
            $editCSV->getNumbers())[0], $editCSV->getNumbers());

        $starGen = $process->convertNumsToStars() . ' ' . $result;
        if ($result === 'UNLOCKED') {
            session_start();
            $_SESSION['name'] = $searchPin->searchPinInList
            ($searchPin->readCsvAllAsArrays(),
                $editCSV->getNumbers())[1];
            var_dump($_SESSION);
            session_start();
        }
        var_dump($_SESSION);
        $editCSV->emptyCsv();

    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Safe</title>
</head>
<body>
<div class="container">
    <form action="/" method="get">
        <div>
            <output><?php echo $starGen; ?></output>
        </div>

        <div>
            <button type="submit" name="0" value="1">1</button>
            <button type="submit" name="0" value="2">2</button>
            <button type="submit" name="0" value="3">3</button>
        </div>
        <div>
            <button type="submit" name="0" value="4">4</button>
            <button type="submit" name="0" value="5">5</button>
            <button type="submit" name="0" value="6">6</button>
        </div>
        <div>
            <button type="submit" name="0" value="7">7</button>
            <button type="submit" name="0" value="8">8</button>
            <button type="submit" name="0" value="9">9</button>
        </div>


    </form>
</div>

</body>
</html>
