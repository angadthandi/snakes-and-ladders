<?php

require_once __DIR__ . "/../player/player.php";

class Game {

    //associative array of snake & ladder - start to end
    private array $mapSnakesAndLadders;
    private array $players; // Player[]
    private ?Player $winner;
    private int $currPlayerTurn = 0;

    public function __construct(array $players, array $snakes, array $ladders) {
        $this->players = $players;

        $this->mapSnakesAndLadders = [];
        foreach($snakes as $snake) {
            $mapSnakesAndLadders[ $snake->getStart() ] = $snake->getEnd();
        }

        foreach($ladders as $ladder) {
            $mapSnakesAndLadders[ $ladder->getStart() ] = $ladder->getEnd();
        }

        $this->winner = null;
    }

    public function getWinner(): ?Player {
        return $this->winner;
    }
    
    public function roll(Player $player, int $diceVal): bool {
        if (
            !empty($this->winner) ||
            $diceVal < 0 || $diceVal > 6 ||
            $this->players[ $this->currPlayerTurn ]->getID() != $player->getID()
            ) {
            return false;
        }

        $newPlayerPosition = $player->getCurrPosition() + $diceVal;

        if ($newPlayerPosition<=100) {
            if ( array_key_exists($newPlayerPosition, $this->mapSnakesAndLadders) ) {
                $newPlayerPosition = $this->mapSnakesAndLadders[ $newPlayerPosition ];
            }

            $player->setCurrPosition($newPlayerPosition);
        }

        if ($newPlayerPosition==100) {
            $this->winner = $player;
            return true;
        }

        $this->_nextTurn();
        return true;
    }

    private function _nextTurn() {
        $this->currPlayerTurn =
            ($this->currPlayerTurn + 1) % count($this->players);
    }

}