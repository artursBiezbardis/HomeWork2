<?php declare (strict_types=1);

require_once 'NumberGenerator.php';
require_once 'StorageInterface.php';
require_once 'NumberStore.php';
require_once 'NullStore.php';
require_once 'NumberProcessor.php';


$numGenerator = new NumberGenerator();
$number = $numGenerator->generateNum();
$numStore = new NumberStore($number);
//$numStore= new NullStore();
$numStore->save();
$numProcessor = new NumberProcessor($numStore,$number);

echo 'Number: ' . $number . PHP_EOL;
echo 'AVG:    ' . $numProcessor->averageNumFromFile() . PHP_EOL;