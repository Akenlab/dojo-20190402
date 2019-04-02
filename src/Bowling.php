<?php


namespace App;


class Bowling
{

    private $total_score = 0;

    public function pin(int $int)
    {
        $this->total_score += $int;
    }

    public function total()
    {
        return $this->total_score;
    }
}