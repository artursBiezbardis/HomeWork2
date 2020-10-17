<?php
require_once 'EditJsonFile.php';
require_once 'LikesDislikes.php';
$jsonEdit = new EditJsonFile('pictures.json');
$likes = new LikesDislikes();

if (!empty($_POST)) {
    $pictures = $jsonEdit->readArrayFromJson();
    $updatedLikes = $likes->setLike($pictures, $_POST);
    $jsonEdit->saveArrayInJson($updatedLikes);
} else {
    $pictures = $jsonEdit->readArrayFromJson();
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
<body style="background-color:beige">
<h4><?php echo 'This file has ' . count($pictures) . ' pictures.' ?></h4>
<form action="/" method="post">
    <div style="display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;">
        <?php foreach ($pictures

        as $key => $picture): ?>
        <div
        "><img src="<?php echo $picture["picAddress"] ?>" alt=""></div>
    <div>

        <button type="submit" name="<?php echo $key ?>" value="1">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png" width="50"
                 height="50">
        </button>
        <button type="submit" name="<?php echo $key ?>" value="-1">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png" width="50"
                 height="50" style="transform:rotate(180deg)">
        </button>

    </div>
    <?php endforeach; ?>
    </div>
</form>
</body>
</html>
