<?php


namespace App;


class Bowling
{

    private $total_score = 0;
    private $strike = false;
    private $nbFireSinceStrike = 0;

    public function pins_fallen(int $nb_pins)
    {
        if ($this->strike) {
            $nb_pins *= 2;
            $this->nbFireSinceStrike ++;
            if ($this->nbFireSinceStrike == 2) {
                $this->nbFireSinceStrike = 0;
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