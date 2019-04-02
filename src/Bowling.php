<?php


namespace App;


class Bowling
{

    private $total_score = 0;
    private $strike = false;
    private $spare = false;
    private $nbFireSinceStrike = 0;

    /**
     * @var int
     */
    private $last_pin = 0;

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
        if ($this->spare) {
            $nb_pins *= 2;
            $this->spare = false;
        }
        $this->total_score += $nb_pins;

        if ($nb_pins === 10) {
            $this->strike = true;
        } else if ($this->last_pin+$nb_pins === 10) {
            $this->spare = true;
        }

        if ($this->spare || $this->strike) {
            $this->last_pin = $nb_pins/2;
        } else {
            $this->last_pin = $nb_pins;
        }
    }

    public function total()
    {
        return $this->total_score;
    }
}