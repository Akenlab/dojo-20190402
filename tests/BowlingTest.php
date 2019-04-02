<?php

namespace App;

use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    public function test_2_gutters_score_0()
    {
        $game=new Bowling();
        $game->pins_fallen(0);
        $game->pins_fallen(0);
        $this->assertSame(0,$game->total());
    }

    public function test_1_gutter_and_2_pins_score_2()
    {
        $game=new Bowling();
        $game->pins_fallen(0);
        $game->pins_fallen(2);
        $this->assertSame(2,$game->total());
    }

    public function test_strike_and_1_and_2_score_16()
    {
        $game=new Bowling();
        $game->pins_fallen(10);
        $game->pins_fallen(1);
        $game->pins_fallen(2);
        $this->assertSame(16,$game->total());
    }

    public function test_strike_and_1_and_2_and_5_score_21()
    {
        $game=new Bowling();
        $game->pins_fallen(10);
        $game->pins_fallen(1);
        $game->pins_fallen(2);
        $game->pins_fallen(5);
        $this->assertSame(21,$game->total());
    }

    public function test_spare_and_1_and_8_score_18()
    {
        $game=new Bowling();
        $game->pins_fallen(4);
        $game->pins_fallen(6);
        $game->pins_fallen(0);
        $game->pins_fallen(8);
        $this->assertSame(18,$game->total());
    }
}
