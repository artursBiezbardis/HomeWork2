<?php declare(strict_types=1);

require_once 'CheckEndReturnFromArray.php';
require_once 'EditCsv.php';
require_once 'ReadArrayFromCsv.php';

session_start();

$userCheck = new CheckEndReturnFromArray();
$editChat = new EditCsv('chat.csv');
$newMonoChat = [];
$userName = 'Unknown user!';

if (!empty($_POST) && empty($_SESSION)) {
    $userId = $userCheck->checkValueOfArray(ReadArrayFromCsv::getArrayFromCsv
    ('users.csv', ";"), $_POST['pin']);

    if (!empty($userId)) {
        $_SESSION['id'] = $userId;
        $userName = $userCheck->getName(ReadArrayFromCsv::getArrayFromCsv
        ('users.csv', ";"), $_SESSION['id']);

        $updatedChat = ReadArrayFromCsv::getArrayFromCsv('chat.csv', ";");
    }

} elseif (array_key_exists('exit', $_POST)) {
    session_destroy();
    session_start();


} elseif (array_key_exists('chat', $_POST) && $_POST['chat'] !== '') {
    $newMonoChat[0] = $_SESSION['id'];
    $newMonoChat[1] = $_POST['chat'];
    $editChat->saveChat($newMonoChat);
    $updatedChat = ReadArrayFromCsv::getArrayFromCsv('chat.csv', ";");
    $userName = $userCheck->getName(ReadArrayFromCsv::getArrayFromCsv
    ('users.csv', ";"), $_SESSION['id']);
} elseif (array_key_exists('chat', $_POST) && $_POST['chat'] === '') {

    $updatedChat = ReadArrayFromCsv::getArrayFromCsv('chat.csv', ";");
    $userName = $userCheck->getName(ReadArrayFromCsv::getArrayFromCsv
    ('users.csv', ";"), $_SESSION['id']);
} else {
    $userName = 'Unknown user!';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .chat {
            background-color: lightblue;
            width: 500px;
            height: 300px;
            overflow: scroll;
            scroll-padding-bottom: 100%;
        }
    </style>
    <title>Pin entry</title>
</head>
<body>
<div class="container">
    <form action="/" method="post">
        <div>
            <output><?php echo $userName; ?></output>
        </div>
        <?php if (empty($_SESSION) || array_key_exists('exit', $_POST)): ?>
            <label>Pin entry: <input type="text" name="pin" value="" pattern="[0-9]{4}" maxlength="4" size="4"></label>
            <input type="submit">
        <?php elseif (!empty($_SESSION['id'])): ?>
            <input type="submit" name="exit" value="exit">

        <?php endif; ?>
    </form>
</div>
<div>
    <?php if (!empty($_SESSION['id'])): ?>
        <div class="chat">
            <?php foreach ($updatedChat as $chatLine): ?>
                <p><?php echo $chatLine[0] . ';' . trim($chatLine[1], '"') ?></p>
            <?php endforeach; ?>
        </div>

        <form action="/" method="post">
            <label>Chat: <input type="text" name="chat" size="50"></label>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
