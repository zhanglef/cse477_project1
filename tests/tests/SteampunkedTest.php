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
	}
}
/// @endcond
?>
