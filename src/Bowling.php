<?php
namespace App;

class Bowling
{
    private $total=0;
    private $pendingBonuses=0;
    private $previousRollScore=false;
    private $roll1DoneInFrame=false;
    private $roll2DoneInFrame=false;
    private $framesCounter=0;

    public function roll(int $pinsFallen)
    {
        // Update score
        $this->scoreRoll($pinsFallen);
        $this->applyPendingBonuses($pinsFallen);

        // Prepare next roll
        $this->detectRollCountInFrame();
        $this->detectSpare($pinsFallen);
        $this->detectStrike($pinsFallen);
        $this->closeFrameIfNeeded();
        $this->previousRollScore=$pinsFallen;
    }

    public function score()
    {
        return $this->total;
    }

    private function scoreRoll(int $pinsFallen): void
    {
        $this->incrementTotal($pinsFallen);
    }

    private function applyBonus(int $bonus): void
    {
        $this->incrementTotal($bonus);
        $this->pendingBonuses--;
    }

    public function nextRollIsLastOfFrame()
    {
        return $this->roll1DoneInFrame;
    }

    /**
     * @param int $pinsFallen
     */
    private function detectSpare(int $pinsFallen): void
    {
        if ((($pinsFallen + $this->previousRollScore === 10) && $this->roll2DoneInFrame)) {
            $this->pendingBonuses ++;
        }
    }

    private function detectStrike(int $pinsFallen)
    {
        if ((($pinsFallen === 10) && !$this->roll2DoneInFrame)) {
            $this->setRoll2Done();
            if($this->framesCounter<10){
                $this->pendingBonuses += 2;
            }
        }
    }

    private function applyPendingBonuses(int $pinsFallen): void
    {
        if ($this->pendingBonuses>0) {
            if($this->weMade2StrikesInARow()){
                $this->applyBonus($pinsFallen);
            }
            $this->applyBonus($pinsFallen);
        }
    }

    private function detectRollCountInFrame(): void
    {
        if ($this->roll1DoneInFrame) {
            $this->setRoll2Done();
        }
        $this->setRoll1Done();
    }

    private function closeFrameIfNeeded(): void
    {
        if ($this->roll2DoneInFrame) {
            $this->roll1DoneInFrame = false;
            $this->roll2DoneInFrame = false;
        }
    }

    private function incrementTotal(int $pinsFallen): int
    {
        $this->total += $pinsFallen;
        return $this->total;
    }

    private function setRoll2Done(): void
    {
        $this->roll2DoneInFrame = true;
        $this->framesCounter++;
    }

    private function weMade2StrikesInARow(): bool
    {
        return $this->pendingBonuses > 2;
    }

    private function setRoll1Done(): void
    {
        $this->roll1DoneInFrame = true;
    }
}