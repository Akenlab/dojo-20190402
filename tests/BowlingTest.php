<?php

namespace App;

use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    public function test_2_gutters_score_0()
    {
        $game=new Bowling();
        $game->pin_fallen(0);
        $game->pin_fallen(0);
        $this->assertSame(0,$game->total());
    }

    public function test_1_gutter_and_2_pins_score_2()
    {
        $game=new Bowling();
        $game->pin_fallen(0);
        $game->pin_fallen(2);
        $this->assertSame(2,$game->total());
    }

}
