<?php
/**
 * Created by PhpStorm.
 * User: Lefan
 * Date: 2016/2/15
 * Time: 0:27
 */

namespace Steampunked;


class Player
{
    public function __construct($name,$size,$player){
        $this->name = $name;
        $this->size = $size;
        $this->playernum = $player;
        $guage = new Tile("gauge-0.png",array("N" => true, "W" => true, "S" => false, "E" => false));
        $gaugetop = new Tile("gauge-top-0.png",array("N" => false, "W" => false, "S" => true, "E" => false));
        $valve = new Tile("valve-closed.png",array("N" => false, "W" => false, "S" => false, "E" =>true));
        if($player=="player1"){
            $index = ($this->size * ($this->size+2))/2;
            $index -= ($size + 2);
            $this->allPipe[$index] = $guage;
            $this->allPipe[$index]->SetPlayer($this);
            $this->allPipe[$index]->SetSize($size);
            $index -= ($size + 2);
            $this->allPipe[$index] = $gaugetop;
            $this->allPipe[$index]->SetPlayer($this);
            $this->allPipe[$index]->SetSize($size);
            $index -= ($size + 1);
            $this->allPipe[$index] = $valve;
            $this->allPipe[$index]->SetPlayer($this);
            $this->allPipe[$index]->SetSize($size);
        }
        else{
            $index = ($this->size * ($this->size+2))/2;
            $index += ($size + 2);
            $this->allPipe[$index] = $gaugetop;
            $this->allPipe[$index]->SetPlayer($this);
            $this->allPipe[$index]->SetSize($size);
            $index += ($size + 2);
            $this->allPipe[$index] = $guage;
            $this->allPipe[$index]->SetPlayer($this);
            $this->allPipe[$index]->SetSize($size);
            $index += 1;
            $this->allPipe[$index] = $valve;
            $this->allPipe[$index]->SetPlayer($this);
            $this->allPipe[$index]->SetSize($size);
        }
        $this->findClickable();
    }

    public function AddPipe($pipe,$index){
        $this->allPipe[$index] = $pipe;
        $this->allPipe[$index]->SetPlayer($this);
        $this->allPipe[$index]->SetSize($this->size);
        $this->findClickable();
        //need a function to check if we can add this pipe, CheckDirection(),return true if it can
    }

    //This function will return the name of this player
    public function GetName(){
        return $this->name;
    }

    //This function will get the whole pipeline of this player
    public function GetAllPipe(){
        return $this->allPipe;
    }

    public function SetAllFlag(){
        foreach($this->allPipe as $pipe){
            $pipe->setFlag(false);
        }

    }

    public function findClickable(){
        $this->SetAllFlag();
        if($this->GetPlayerNum()=="player1"){
            $index = ($this->size * ($this->size+2))/2;
            $index -= ($this->size + 2);
            $index -= ($this->size + 2);
            $index -= ($this->size + 1);
        }
        else{
            $index = ($this->size * ($this->size+2))/2;
            $index += ($this->size + 2);
            $index += ($this->size + 2);
            $index += 1;
        }

        $this->allPipe[$index]->indicateLeaks();
    }

    //This function will get all clickable grid, clickable grid also means you have to put a leak img at that grid,
    //this function returns an array, the key of the array is index, the value is the direction of the leak img you have to put
    //for example((1,W),(2,E) This means you have a leak at index 1 and the leak img is leak-w.png, and you have a leak
    //at index 2 and the leak img is leak-e.png
    public function GetClickable(){
        $allLeak = array();
        foreach($this->allPipe as $pipe){
            $leak = $pipe->GetLeaks();
            foreach($leak as $l){
               // print($l);
            }
            $allLeak = $allLeak + $leak;
        }
        return $allLeak;
    }

    public function GetPlayerNum(){
        return $this->playernum;
    }

    private $playernum;
    private $size;
    private $name;
    private $allPipe = array();
}