<?php


namespace App;


class Bowling
{

    private $total_score = 0;
    private $strike = false;
    private $nbSinceStrike = 0;

    public function pins_fallen(int $nb_pins)
    {
        if ($this->strike) {
            $nb_pins *= 2;
            $this->nbSinceStrike ++;
            if ($this->nbSinceStrike == 2) {
                $this->nbSinceStrike = 0;
                $this->strike = false;
            }
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