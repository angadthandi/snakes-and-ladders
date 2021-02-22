<?php

class Game {

    private int $id;
    private string $name;

    private static int $idIncrementor = 0;

    public function __construct(string $name) {
        static::$idIncrementor++;

        $this->id = static::$idIncrementor;
        $this->name = $name;
    }

}