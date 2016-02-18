<?php

/** @file
 * @brief unit testing template Steampunked
 * @cond 
 * @brief Unit tests for the class 
 */

require __DIR__ . "/../../vendor/autoload.php";

class SteampunkedTest extends \PHPUnit_Framework_TestCase
{
	const SEED = 1422668587;
	public function test_construct()
	{
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$this->assertInstanceOf('Steampunked\Steampunked', $Steampunked);
		$this->assertEquals(5, count($Steampunked->GetRandomPipesPlayer1()));
		$this->assertEquals(5, count($Steampunked->GetRandomPipesPlayer2()));
		for($r=0; $r<count($Steampunked->GetRandomPipesPlayer1());  $r++) {
			$this->assertInstanceOf("Steampunked\Tile", $Steampunked->GetRandomPipesPlayer1()[$r]);
		}
	}

	public function test_SetSize(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$Steampunked->SetSize(10);
		$this->assertEquals(10, $Steampunked->GetSize());
		$Steampunked->SetSize(20);
		$this->assertEquals(20, $Steampunked->GetSize());
	}

	public function test_SetName(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$Steampunked->SetSize(6);
		$Steampunked->SetName("player1","player2");

		$this->assertEquals("player1",$Steampunked->GetPlayer1()->GetName());
		$this->assertEquals("player2",$Steampunked->GetPlayer2()->GetName());
		$this->assertEquals($Steampunked->GetTurn(),$Steampunked->GetPlayer1());
	}

	public function test_GetPlayer1(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$Steampunked->SetSize(6);
		$Steampunked->SetName("player1","player2");
		$player = new Steampunked\Player("player1",6,"player1");
		$this->assertEquals($player,$Steampunked->GetPlayer1());
	}

	public function test_GetPlayer2(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$Steampunked->SetSize(6);
		$Steampunked->SetName("player1","player2");
		$player = new Steampunked\Player("player2",6,"player2");
		$this->assertEquals($player,$Steampunked->GetPlayer2());
	}

	public function test_SwitchTurn(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$Steampunked->SetSize(6);
		$Steampunked->SetName("player1","player2");
		$player = new Steampunked\Player("player2",6,"player2");
		$Steampunked->SwitchTurn();
		$this->assertEquals($player,$Steampunked->GetTurn());
		$player = new Steampunked\Player("player1",6,"player1");
		$Steampunked->SwitchTurn();
		$this->assertEquals($player,$Steampunked->GetTurn());
	}

	public function test_GetTurn(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$Steampunked->SetSize(6);
		$Steampunked->SetName("player1","player2");
		$player = new Steampunked\Player("player2",6,"player2");
		$Steampunked->SwitchTurn();
		$this->assertEquals($player,$Steampunked->GetTurn());
		$player = new Steampunked\Player("player1",6,"player1");
		$Steampunked->SwitchTurn();
		$this->assertEquals($player,$Steampunked->GetTurn());
	}

	public function test_GetRandomPipesPlayer1(){
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$this->assertEquals(5, count($Steampunked->GetRandomPipesPlayer1()));
		for($r=0; $r<count($Steampunked->GetRandomPipesPlayer1());  $r++) {
			$this->assertInstanceOf("Steampunked\Tile", $Steampunked->GetRandomPipesPlayer1()[$r]);
		}
	}
}
/// @endcond
?>
