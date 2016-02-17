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
			$this->assertInstanceOf("Steampunked\Tile", $Steampunked->GetRandomPipesPlayer1()[0]);
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
	}
}
/// @endcond
?>
