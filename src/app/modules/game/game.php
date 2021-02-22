<?php

require_once __DIR__ . "/../player/player.php";

class Game {

    //associative array of snake & ladder - start to end
    private array $mapSnakesAndLadders;
    private array $players; // Player[]
    private Player $winner;

    public function __construct(array $players, array $snakes, array $ladders) {

    }

}