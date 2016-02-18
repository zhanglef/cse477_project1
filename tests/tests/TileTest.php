<?php

/** @file
 * @brief unit testing template TileTest
 * @cond 
 * @brief Unit tests for the class 
 */

require __DIR__ . "/../../vendor/autoload.php";

class TileTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$tile = new Steampunked\Tile("gauge-0",array("N" => true, "W" => true, "S" => false, "E" => false));
		$this->assertInstanceOf('Steampunked\Tile', $tile);

		$this->assertEquals($tile->getName(), "gauge-0");
		$this->assertEquals($tile->open(), array("N" => true, "W" => true, "S" => false, "E" => false));
	}

	public function test_neighbor() {
		$tile = new Steampunked\Tile("straight-h.png",array("N" => false, "W" => true, "S" => false, "E" => true));
		$player = new Steampunked\Player("name1", 6, "player1");
		$player->addPipe($tile,2);
		//$valve = new Steampunked\Tile("valve-closed.png",array("N" => false, "W" => false, "S" => false, "E" =>true));
		$this->assertEquals($tile->neighbor("E"), array(null, 3));
		//$this->assertEquals($tile->neighbor("W"), array($valve, 1));
	}

	public function test_open(){
		$tile = new Steampunked\Tile("gauge-0",array("N" => true, "W" => true, "S" => false, "E" => false));
		$this->assertEquals($tile->open(), array("N" => true, "W" => true, "S" => false, "E" => false));
		$tile = new Steampunked\Tile("gauge-0",array("N" => false, "W" => true, "S" => false, "E" => false));
		$this->assertNotEquals($tile->open(), array("N" => true, "W" => true, "S" => false, "E" => false));
	}

	public function test_SetFlag(){
		$tile = new Steampunked\Tile("gauge-0",array("N" => true, "W" => true, "S" => false, "E" => false));
		$this->assertEquals(false,$tile->isFlag());
		$tile->setFlag((true));
		$this->assertEquals(true,$tile->isFlag());
	}

	public function test_indicateLeaks(){

	}

	public function test_SetPlayer() {
		$tile = new Steampunked\Tile("gauge-0",array("N" => true, "W" => true, "S" => false, "E" => false));

		$this->assertEquals($tile->GetPlayer(), null);
		$tile->SetPlayer("player1");
		$this->assertEquals($tile->GetPlayer(), "player1");
	}

	public function test_SetSize(){
		$tile = new Steampunked\Tile("gauge-0",array("N" => true, "W" => true, "S" => false, "E" => false));
		$tile->SetSize(6);
		$this->assertEquals(6,$tile->GetSize());
		$tile->SetSize(8);
		$this->assertEquals(8,$tile->GetSize());
	}
}

/// @endcond
?>
