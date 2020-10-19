<?php


require_once 'EchoTextProcessor.php';
require_once 'ComputerPlayer.php';
require_once 'GamePlayObjects/PlayObjectsInterface.php';
require_once 'GamePlayObjects/Rock.php';
require_once 'GamePlayObjects/Paper.php';
require_once 'GamePlayObjects/Scissors.php';
require_once 'GamePlayObjects/Nuke.php';
require_once 'GamePlayObjects/Spock.php';
require_once 'GamePlayObjects/Lizard.php';
require_once 'GetWinner.php';

$playObjects = [
    new Rock(['scissors', 'lizard'], ['nuke', 'paper', 'spock'], 'pictures/rock.png'),
    new Paper(['rock', 'spock'], ['nuke', 'scissors', 'lizard'], 'pictures/paper.png'),
    new Scissors(['paper', 'lizard'], ['nuke', 'rock', 'spock'], 'pictures/scissors.png'),
    new Lizard(['paper', 'spock'], ['nuke', 'rock', 'scissors'], 'pictures/lizard.png'),
    new Spock(['scissors', 'rock'], ['nuke', 'paper', 'lizard'], 'pictures/spock.png'),
    new Nuke(['lizard', 'spock', 'scissors', 'paper', 'rock'], [], 'pictures/nuke.png')
];

$computer = new ComputerPlayer($playObjects);
$getWinner = new GetWinner($playObjects);

$_POST['computer'] = (int)$computer->computerChoice();

?>
<html lang="en">
<head>
    <meta name=”viewport” content=”width=device-width, initial-scale=1″ />
    <link rel="stylesheet" href="xstyle.css">
</head>
<body>

<div>
    <h1><?php if (!array_key_exists('me', $_POST)) {
            echo 'Let\'s Play!!!';
        } else {
            echo $getWinner->whoWins($playObjects[$_POST['me']]->getName(),
                $playObjects[$_POST['computer']]->getName());
        } ?>
    </h1>
</div>
<section class="container">
    <div class="one">
        <img src="<?php if (!array_key_exists('me', $_POST)) {
            echo 'pictures/blank.png';
        } else {
            echo $playObjects[(int)$_POST['me']]->getPicturePath();
        } ?>">
    </div>
    <div class="two">
        <img src="<?php if (!array_key_exists('me', $_POST)) {
            echo 'pictures/blank.png';
        } else {
            echo $playObjects[$_POST['computer']]->getPicturePath();
        } ?>">
    </div>
</section>

<div class="container2">
    <?php foreach ($playObjects as $key => $object): ?>
        <form action="" method="post" '>
        <div>
            <button type="submit" name="<?php echo 'me' ?>"
                    value="<?php echo (int)$key; ?>"><img src=" <?php echo $object->getPicturePath(); ?>">
            </button>
        </div>
        </form>
    <?php endforeach; ?>
</div>
</body>


</html>



