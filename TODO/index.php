<?php declare(strict_types=1);

require_once 'EditCswFile.php';
require_once 'IdGenerator.php';


$editFile = new EditCswFile('EditCswFile.php');

if (!empty($_POST) && !empty($_POST['TODO'])) {
    $_POST['id'] = IdGenerator::generateUniqId($editFile->readCsvAllAsArrays());
    $editFile->saveLineCsv($_POST);
} elseif (key_exists('delete', $_POST)) {
    $editFile->deleteToDo($editFile->readCsvAllAsArrays(), $_POST['delete']);
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
<form action="/" method="post">
    <div>
        <label>Add new TODO: <input style="margin-left: 20px" name="TODO" value="" type="text"></label>
        <button style="margin-left: 5px" type="submit" name="" value="">Add TODO</button>
    </div>
    <?php foreach ($editFile->readCsvAllAsArrays() as $array): ?>
        <div><label><?php echo $array[0] ?>
                <button style="margin-left: 190px" type="submit" name="delete" value="<?php echo $array[1]; ?>">delete
                </button>
            </label></div>
    <?php endforeach; ?>
</form>
</body>
</html>
