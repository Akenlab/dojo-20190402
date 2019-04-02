<?php


namespace App;


class Bowling
{

    private $total_score = 0;

    public function pins_fallen(int $nb_pins)
    {
        $this->total_score += $nb_pins;
    }

    public function total()
    {
        return $this->total_score;
    }
}