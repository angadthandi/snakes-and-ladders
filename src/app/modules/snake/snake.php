<?php

class Snake {

    private int $start;
    private int $end;

    public function __construct(int $start, int $end) {
        $this->start = $start;
        $this->end = $end;
    }

}