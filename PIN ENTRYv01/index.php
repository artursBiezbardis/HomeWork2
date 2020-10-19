<?php declare(strict_types=1);

//require_once 'DigitsToStars.php';
//require_once 'EnterPinCsv.php';
//require_once 'ResultOnDisplay.php';
require_once 'UserCheck.php';

//$process = new DigitsToStars('enterPin.csv');
//$editCSV = new EnterPinCsv('enterPin.csv');
//$resultOnDisplay = new ResultOnDisplay();
$userCheck = new UserCheck('users.csv');
session_start();

//session_destroy();

if (!empty($_POST['pin'])) {
    $doesUserExist = $userCheck->checkUserByPin($userCheck->createArrayOfUsers(), $_POST['pin']);
    if (!empty($doesUserExist[0])) {
        $_SESSION['name'] = $doesUserExist[2];
        $_SESSION['id'] = $doesUserExist[0];
        $userName = 'User ' . $_SESSION['name'];


    } elseif (!empty($_SESSION)) {
        $userName = 'User ' . $_SESSION['name'];
    } else {
        $userName = 'Unidentified user';

    }
} elseif (!empty($_SESSION)) {
    $userName = 'User ' . $_SESSION['name'];
} else {
    $userName = 'Unidentified user';
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pin entry</title>
</head>
<body>
<div class="container">
    <form action="/" method="post">
        <div>
            <output><?php echo $userName; ?></output>
        </div>
        <label>Pin entry: <input type="text" name="pin" pattern="[0-9]{4}" maxlength="4" size="4"></label>
        <input type="submit">
    </form>
</div>

</body>
</html>
