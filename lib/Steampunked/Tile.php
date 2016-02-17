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

    //Get the image name
    public function GetName(){
        return $this->name;
    }

    public function open(){
        return $this->open;
    }


    public function setFlag($f) {
        $this->flag = $f;
    }

    public function isFlag() {
        return $this->flag;
    }

    public function indicateLeaks() {

        if($this->flag) {
            // Already visited
            return array();
        }

        $this->flag = true;

        $pipe = $this->player->GetAllPipe();
        $key = array_search($this, $pipe);
        $this->leaks = array();

        $open = $this->open();
        foreach(array("N", "W", "S", "E") as $direction) {
            // Are we open in this direction?
            if($open[$direction]) {
                $n = $this->neighbor($direction);
                if($n[0] === null) {
                    // We have a leak in this direction...
                    $this->leaks[$n[1]] = array($direction);

                } else {
                    // Recurse
                    $n->indicateLeaks();
                }

            }
        }

    }

    public function neighbor($direction){
        $pipe = $this->player->GetAllPipe();
        $key = array_search($this, $pipe);
        if ($direction == "N"){
            $index = $key - $this->size;
        }
        if ($direction == "S"){
            $index = $key + $this->size;
        }
        if ($direction == "W"){
            $index = $key - 1;
        }
        if ($direction == "E"){
            $index = $key + 1;
        }
        if (isset($pipe[$index])){
            return array($pipe[$index],$index);
        }
        else{
            return array(null,$index);
        }
        #return $this->player->GetNeighbor($this,$direction);
    }

    public function SetPlayer($player){
        $this->player = $player;
    }

    public function GetLeaks(){
        return $this->leaks;
    }

    public function SetSize($size){
        $this->size = $size;
    }

    private $size;
    private $player;
    private $leaks = array();
    private $flag = false;
    private $name;
    private $open = array();
}