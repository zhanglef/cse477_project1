<?php

/** @file
 * @brief unit testing template for player
 * @cond 
 * @brief Unit tests for the class 
 */

require __DIR__ . "/../../vendor/autoload.php";

class PlayerTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$Player = new Steampunked\Player("name1",6,"player1");
		$this->assertInstanceOf('Steampunked\Player', $Player);

		//check the initial pipeline of player1 with size 6
		$this->assertEquals(3,count($Player->GetAllPipe()));
		$this->assertEquals("valve-closed.png",$Player->GetAllPipe()[1]->GetName());
		$this->assertEquals("gauge-top-0.png",$Player->GetAllPipe()[8]->GetName());
		$this->assertEquals("gauge-0.png",$Player->GetAllPipe()[16]->GetName());

		$Player = new Steampunked\Player("name2",6,"player2");
		$this->assertInstanceOf('Steampunked\Player', $Player);

		//check the initial pipeline of player2 with size 6
		$this->assertEquals(3,count($Player->GetAllPipe()));
		$this->assertEquals("valve-closed.png",$Player->GetAllPipe()[41]->GetName());
		$this->assertEquals("gauge-top-0.png",$Player->GetAllPipe()[32]->GetName());
		$this->assertEquals("gauge-0.png",$Player->GetAllPipe()[40]->GetName());

		$Player = new Steampunked\Player("name1",10,"player1");
		$this->assertInstanceOf('Steampunked\Player', $Player);

		//check the initial pipeline of player1 with size 10
		$this->assertEquals(3,count($Player->GetAllPipe()));
		$this->assertEquals("valve-closed.png",$Player->GetAllPipe()[25]->GetName());
		$this->assertEquals("gauge-top-0.png",$Player->GetAllPipe()[36]->GetName());
		$this->assertEquals("gauge-0.png",$Player->GetAllPipe()[48]->GetName());

		$Player = new Steampunked\Player("name1",10,"player2");
		$this->assertInstanceOf('Steampunked\Player', $Player);

		//check the initial pipeline of player2 with size 10
		$this->assertEquals(3,count($Player->GetAllPipe()));
		$this->assertEquals("valve-closed.png",$Player->GetAllPipe()[85]->GetName());
		$this->assertEquals("gauge-top-0.png",$Player->GetAllPipe()[72]->GetName());
		$this->assertEquals("gauge-0.png",$Player->GetAllPipe()[84]->GetName());

		//check if the clickable initialise
		$this->assertEquals(1,count($Player->GetClickable()));
		$this->assertEquals("E",$Player->GetClickable()[86]);
	}

	public function test_AddPipe(){
		$Player = new Steampunked\Player("name1",6,"player1");
		$newTile = new Steampunked\Tile("cap-w.png",array("N" => false, "W" => true, "S" => false, "E" => false));
		$Player->AddPipe($newTile,2);
		$this->assertEquals(4,count($Player->GetAllPipe()));
		$this->assertEquals("cap-w.png",$Player->GetAllPipe()[2]->GetName());
	}

	public function test_GetName(){
		$Player = new Steampunked\Player("name1",6,"player1");
		$this->assertEquals("name1",$Player->GetName());
		$this->assertNotEquals("name2",$Player->GetName());
	}

	public function test_GetAllPipe(){
		$Player = new Steampunked\Player("name1",6,"player1");
		foreach($Player->GetAllPipe() as $pipe) {
			$this->assertInstanceOf("Steampunked\Tile", $pipe);
		}
	}

	public function test_SetAllFlag(){
		$Player = new Steampunked\Player("name1",6,"player1");
		$Player->SetAllFlag();
		foreach($Player->GetAllPipe() as $pipe) {
			$this->assertEquals(false, $pipe->isFlag());
		}
	}

	public function test_GetClickable(){
		$Player = new Steampunked\Player("name1",6,"player1");
		$this->assertEquals(1,count($Player->GetClickable()));

		//Add a straight-h leaks should be 1
		$newTile = new Steampunked\Tile("straight-h.png",array("N" => false, "W" => true, "S" => false, "E" => true));
		$Player->AddPipe($newTile,2);
		$this->assertEquals(1,count($Player->GetClickable()));

		//Add a tee-wne leaks should be 2
		$newTile = new Steampunked\Tile("tee-esw.png",array("N" => false, "W" => true, "S" => true, "E" => true));
		$Player->AddPipe($newTile,3);

		$this->assertEquals(2,count($Player->GetClickable()));

		//This clickable should be 1
		$newTile = new Steampunked\Tile("cap-w.png",array("N" => false, "W" => true, "S" => false, "E" => false));
		$Player->AddPipe($newTile,4);
		$this->assertEquals(1,count($Player->GetClickable()));
	}

	public function test_GetPlayerNum(){
		$Player = new Steampunked\Player("name1",6,"player1");
		$this->assertEquals("player1",$Player->GetPlayerNum());
		$this->assertNotEquals("player2",$Player->GetPlayerNum());
	}
}

/// @endcond
?>
