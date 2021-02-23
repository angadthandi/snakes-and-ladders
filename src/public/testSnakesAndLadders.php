<?php

require_once __DIR__ . "/../app/modules/snake/snake.php";
require_once __DIR__ . "/../app/modules/ladder/ladder.php";
require_once __DIR__ . "/../app/modules/game/game.php";
require_once __DIR__ . "/../app/modules/player/player.php";

$s1 = new Snake(17, 7);
$s2 = new Snake(54, 34);
$s3 = new Snake(62, 19);
$s4 = new Snake(64, 60);
$s5 = new Snake(87, 36);
$s6 = new Snake(92, 73);
$s7 = new Snake(95, 75);
$s8 = new Snake(98, 79);

$l1 = new Ladder(1, 38);
$l2 = new Ladder(4, 14);
$l3 = new Ladder(9, 31);
$l4 = new Ladder(21, 42);
$l5 = new Ladder(28, 84);
$l6 = new Ladder(51, 67);
$l7 = new Ladder(72, 91);
$l8 = new Ladder(80, 99);

$p1 = new Player("Player 1");
$p2 = new Player("Player 2");
$p3 = new Player("Player 3");

$snakesArr = [$s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8];
$laddersArr = [$l1, $l2, $l3, $l4, $l5, $l6, $l7, $l8];
$playersArr = [$p1, $p2, $p3];

$game = new Game($playersArr, $snakesArr, $laddersArr);

$c = 0;
while($game->getWinner() == null) {
    $diceVal = (rand() % 6) + 1;
    $game->roll($p1, $diceVal);
    $diceVal = (rand() % 6) + 1;
    $game->roll($p2, $diceVal);
    $diceVal = (rand() % 6) + 1;
    $game->roll($p3, $diceVal);

    // for sanity...
    if ($c==50) break;

    $c++;
}

if (!empty($game->getWinner())) {
    error_log("winner: " . $game->getWinner()->getName());
}

foreach($playersArr as $player) {
    error_log( $player->getName() . " : " . $player->getCurrPosition() );
}
