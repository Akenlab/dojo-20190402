<?php

namespace App;

use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    public function test_2_gutters_score_0()
    {
        $game=new Bowling();
        $game->fire(0);
        $game->fire(0);
        $this->assertSame(0,$game->total());
    }

    public function test_1_gutter_and_2_pins_score_2()
    {
        $game=new Bowling();
        $game->fire(0);
        $game->fire(2);
        $this->assertSame(2,$game->total());
    }

    public function test_strike_and_1_and_2_score_16()
    {
        $game=new Bowling();
        $game->fire(10);
        $game->fire(1);
        $game->fire(2);
        $this->assertSame(16,$game->total());
    }

    public function test_strike_and_1_and_2_and_5_score_21()
    {
        $game=new Bowling();
        $game->fire(10);
        $game->fire(1);
        $game->fire(2);
        $game->fire(5);
        $this->assertSame(21,$game->total());
    }

    public function test_spare_and_1_and_8_score_20()
    {
        $game=new Bowling();
        $game->fire(4);
        $game->fire(6);
        $game->fire(1);
        $game->fire(8);
        $this->assertSame(20,$game->total());
    }

    public function test_no_spare_between_2_turn()
    {
        $game=new Bowling();
        $game->fire(4);
        $game->fire(5);
        $game->fire(5);
        $game->fire(3);
        $this->assertSame(17,$game->total());
    }

    public function test_3_strikes() {
        $game=new Bowling();
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $this->assertSame(60,$game->total());
    }

    public function test_8_strikes() {
        $game=new Bowling();
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $this->assertSame(210,$game->total());
    }

    public function test_12_strikes() {
        $game=new Bowling();
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $game->fire(10);
        $this->assertSame(210,$game->total());
    }
}
