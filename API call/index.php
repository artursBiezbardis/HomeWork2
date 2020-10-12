<?php
require_once 'GetFromAPI.php';
require_once 'ProcessingCSV.php';

$apiResponse=[
    new GetFromAPI('https://api.agify.io/?')
];
$processCSV= new ProcessingCSV('person.csv');
$response='Please enter name!';
$checkFile='';

if(!empty($_POST))
{
    if($_POST['name']!==''){
        $checkFile=$processCSV->searchAndGetNameCSV($_POST['name']);
    }else{
        $response='Please enter name!';
    }
    if(!$checkFile=='')
    {
        $response=$checkFile;
    }else{
        $response=$apiResponse[0]->getResponse($_POST);
        if($response!=='')
        {
            $processCSV->saveInFile($response);
        }else{
            $response='Please enter name!';
        }
    }
}else {
    $response='Please enter name!';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <p>
            <?php echo $response; ?>
        </p>
    </div>
    <div>
        <form action="/" method="post">
            <label>Name</label>
            <input type="text" name="name"  value="" >
            <button type="submit" >submit</button>

        </form>
    </div>
</body>
</html>

