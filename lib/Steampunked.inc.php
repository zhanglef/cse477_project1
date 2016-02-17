<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2/16/2016
 * Time: 11:43 PM
 */

require __DIR__ . "/../vendor/autoload.php";

// Start the PHP session system
session_start();

//Create a constant "STEAMPUNKED_SESSION" for the session variable index.
define("STEAMPUNKED_SESSION", 'steampunked');

// If there is a Wumpus session, use that. Otherwise, create one
if(!isset($_SESSION[STEAMPUNKED_SESSION])) {
    $_SESSION[STEAMPUNKED_SESSION] = new \Steampunked\Steampunked();
}

$steampunked = $_SESSION[STEAMPUNKED_SESSION];

