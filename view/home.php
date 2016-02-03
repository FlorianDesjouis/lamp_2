<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>BlackJack</title>
</head>
<body>

    <h3>Vos cartes</h3>
    <ul>
        <?php
        $hand = $state->player->getHand();
        foreach($hand as $card):
            ?>
            <li><?php echo $card;?></li>
            <?php
        endforeach;
        ?>
    </ul>

    <form method="POST" action="play.php">
        <input type="submit"
               name="player_action"
               value="hit" >
        <input type="submit"
               name="player_action"
               value="stand" >
    </form>
</body>
</html>