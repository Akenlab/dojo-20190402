<?php


namespace App;


class Bowling
{

    private $total_score = 0;
    private $strike = false;
    private $spare = false;
    private $nbFireSinceStrike = 0;
    private $nbTurn = 0;
    private $turnInProgress = false;

    private $last_pin = 0;

    public function fire(int $nb_pins)
    {

        $this->total_score += $this->computeScore($nb_pins);

        $this->checkForStrikeOrSpare($nb_pins);

        $this->last_pin = $nb_pins;

        if ($this->strike || $this->turnInProgress){
            $this->nextTurn();
        } else {
            $this->turnInProgress = true;
        }
    }

    public function nextTurn(){
        $this->nbTurn++;
        $this->turnInProgress = false;
    }

    public function total()
    {
        return $this->total_score;
    }

    public function isSpare($first_pin, $second_pin)
    {
        return ($first_pin + $second_pin === 10)
            && $this->turnInProgress;
    }

    public function isStrike($first_pin)
    {
        return $first_pin === 10;
    }

    /**
     * @param int $nb_pins
     */
    public function checkForStrikeOrSpare(int $nb_pins): void
    {
        if ($this->isStrike($nb_pins)) {
            $this->strike = true;
        } else if ($this->isSpare($this->last_pin, $nb_pins)) {
            $this->spare = true;
        }
    }

    /**
     * @param int $nb_pins
     * @return int
     */
    public function computeScore(int $nb_pins): int
    {
        if ($this->strike) {
            $nb_pins *= 2;
            $this->nbFireSinceStrike++;
            if ($this->nbFireSinceStrike == 2) {
                $this->nbFireSinceStrike = 0;
                $this->strike = false;
            }
        } elseif ($this->spare) {
            $nb_pins *= 2;
            $this->spare = false;
        }
        return $nb_pins;
    }
}