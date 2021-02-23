<?php

class Player {

    private int $id;
    private string $name;
    private int $currPosition;

    private static int $idIncrementor = 0;

    public function __construct(string $name) {
        static::$idIncrementor++;

        $this->id = static::$idIncrementor;
        $this->name = $name;
        $this->currPosition = 0;
    }

    public function getID(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCurrPosition(): int {
        return $this->currPosition;
    }

    public function setCurrPosition(int $currPosition): void {
        $this->currPosition = $currPosition;
    }

}