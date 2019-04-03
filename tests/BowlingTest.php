<?php
namespace App;

use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    public function test_1_gutter_score_0(){
        $game=new Bowling();
        $game->roll(0);
        $this->assertSame(0,$game->score());
    }
    public function test_1_gutter_and_2_score_2(){
        $game=new Bowling();
        $game->roll(0);
        $game->roll(2);
        $this->assertSame(2,$game->score());
    }
    public function test_spare_gives_next_roll_score_as_a_bonus(){
        $game=new Bowling();
        $game->roll(4);
        $game->roll(6);
        $game->roll(6);
        $this->assertSame(22,$game->score());
    }
    public function test_we_know_if_we_are_on_the_last_roll_of_a_frame(){
        $game=new Bowling();

        $this->assertFalse($game->nextRollIsLastOfFrame());
        $game->roll(4);
        $this->assertTrue($game->nextRollIsLastOfFrame());
        $game->roll(6);
        $this->assertFalse($game->nextRollIsLastOfFrame());
        $game->roll(4);
        $this->assertTrue($game->nextRollIsLastOfFrame(),"Next roll should be the last of frame and it is not");
        $game->roll(2);
        $this->assertFalse($game->nextRollIsLastOfFrame());
    }
    public function test_spare_bonus_exists_only_for_the_next_roll(){
        $game=new Bowling();
        $game->roll(4);
        $game->roll(6);
        $game->roll(4);
        $game->roll(2);
        $this->assertSame(20,$game->score());
    }
    public function test_strike_is_the_last_roll_of_a_frame(){
        $game=new Bowling();
        $game->roll(10);
        $this->assertFalse($game->nextRollIsLastOfFrame());
    }
    public function test_strike_gives_bonus_for_2_rolls(){
        $game=new Bowling();
        $game->roll(10);
        $game->roll(3);
        $game->roll(1);
        $this->assertSame(18,$game->score());
    }
    public function test_2_strikes_score_30(){
        $game=new Bowling();
        $game->roll(10);
        $game->roll(10);
        $this->assertSame(30,$game->score());
    }
    public function test_2_strikes_in_a_row_extends_bonus(){
        $game=new Bowling();
        $game->roll(10);
        $game->roll(10);
        $game->roll(5);
        $game->roll(3);
        $this->assertSame(51,$game->score());
    }
    public function test_no_strike_benefit_after_last_frame(){
        $game=new Bowling();
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $this->assertSame(300,$game->score());
    }
    public function test_random_game_just_for_pleasure(){
        $game=new Bowling();
        $game->roll(1);
        $game->roll(6);
        $game->roll(5);
        $game->roll(1);
        $game->roll(5);
        $game->roll(3);
        $game->roll(10);
        $game->roll(10);
        $game->roll(8);
        $game->roll(2);
        $game->roll(4);
        $game->roll(5);
        $game->roll(1);
        $game->roll(9);
        $game->roll(8);
        $game->roll(1);
        $game->roll(10);
        $game->roll(8);
        $game->roll(1);
        $this->assertSame(138,$game->score());
    }
}
