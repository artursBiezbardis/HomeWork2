<?php declare(strict_types=1);
require_once 'InvestmentCalculator.php';
$calculate = new InvestmentCalculator();

$sum = (int)$_GET['sum'];
$term = (int)$_GET['term'];
$percent = (int)$_GET['percent'];
if ($sum === 0 || $term === 0 || $percent === 0) {
    $output = 'Enter investment sum, term and percent.';
} elseif (empty($_GET)) {
    $output = 'Enter investment sum, term and percent.';
} else {
    $output = number_format($calculate->calculateTotal($sum, $term, $percent), 2) . '$';
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investīciju kaukulators</title>
</head>
<body>
<div><?php echo $output; ?></div>
<form action="/" method="get" datatype="int">
    <div><label>
            <pre>Investment sum     <input name="sum" value="" type="number"></pre>
        </label></div>
    <div><label>
            <pre>Investment term    <input name="term" value="" type="number"></pre>
        </label></div>
    <div><label>
            <pre>Investment percent <input name="percent" value="" type="number"></pre>
        </label></div>
    <div>
        <button type="submit" name="calculate">calculate</button>
    </div>
</form>
</body>
</html>