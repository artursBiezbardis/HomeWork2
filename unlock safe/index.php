<?php declare(strict_types=1);

require_once 'ProcessNumbers.php';
require_once 'EditCsvFile.php';
require_once 'Result.php';

$process = new ProcessNumbers('savedNumbers.csv');
$editCSV = new EditCsvFile('savedNumbers.csv');
$result = new Result('1111');

$oldNumberList = $editCSV->getNumbers();

if ($_GET == null) {
    $newNumber = '';
} else {
    $newNumber = $_GET['0'];
    if (strlen($oldNumberList) < 3) {
        $editCSV->saveNumber($newNumber, $oldNumberList);
        $starGen = $process->convertNumsToX();
    } else {
        $editCSV->saveNumber($newNumber, $oldNumberList);
        $starGen = $process->convertNumsToX() . ' ' . $result->getResult($editCSV->getNumbers());
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
