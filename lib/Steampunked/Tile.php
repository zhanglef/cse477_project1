<?php
/**
 * Created by PhpStorm.
 * User: Lefan
 * Date: 2016/2/15
 * Time: 0:28
 */

namespace Steampunked;


class Tile
{
    public function __construct($name, $open){
        $this->name=$name;
        $this->open=$open;
    }

    public function GetName(){
        return $this->name;
    }

    public function GetOpen(){
        return $this->open;
    }

    private $name;
    private $open;
}