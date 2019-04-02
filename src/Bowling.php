<?php


namespace App;


class Bowling
{

    private $total_score = 0;
    private $strike = false;

    public function pins_fallen(int $nb_pins)
    {
        if ($this->strike) {
            $nb_pins *= 2;
        }
        $this->total_score += $nb_pins;


        if ($nb_pins === 10) {
            $this->strike = true;
        }
    }

    public function total()
    {
        return $this->total_score;
    }
}