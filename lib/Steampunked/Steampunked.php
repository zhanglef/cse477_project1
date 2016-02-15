<?php
/**
 * Created by PhpStorm.
 * User: Lefan
 * Date: 2016/2/13
 * Time: 13:35
 */

namespace Steampunked;


class Steampunked
{
    /**
     * Constructor
     * @param $seed Random number seed
     */
    public function __construct($seed = null)
    {
        if ($seed === null) {
            $seed = time();
        }
        srand($seed);

        $this->constructTiles();
        for ($i=0;$i<5;$i++){
            $rpipe = $this->getRandomPipe();
            $this->randomPipes[] = $rpipe;
        }
    }


    public function constructTiles()
    {
        $this->pipes[] = new Tile("cap-e.png", array("N" => true, "W" => true, "S" => true, "E" => false));
        $this->pipes[] = new Tile("cap-n.png", array("N" => false, "W" => true, "S" => true, "E" => true));
        $this->pipes[] = new Tile("cap-s.png", array("N" => true, "W" => true, "S" => false, "E" => true));
        $this->pipes[] = new Tile("cap-w.png", array("N" => true, "W" => false, "S" => true, "E" => true));
        $this->pipes[] = new Tile("ninety-es.png", array("N" => true, "W" => true, "S" => false, "E" => false));
        $this->pipes[] = new Tile("ninety-ne.png", array("N" => false, "W" => true, "S" => true, "E" => false));
        $this->pipes[] = new Tile("ninety-sw.png", array("N" => true, "W" => false, "S" => false, "E" => true));
        $this->pipes[] = new Tile("ninety-wn.png", array("N" => false, "W" => false, "S" => true, "E" => true));
        $this->pipes[] = new Tile("straight-h.png", array("N" => true, "W" => false, "S" => true, "E" => false));
        $this->pipes[] = new Tile("straight-v.png", array("N" => false, "W" => true, "S" => false, "E" => true));
        $this->pipes[] = new Tile("tee-esw.png", array("N" => true, "W" => false, "S" => false, "E" => false));
        $this->pipes[] = new Tile("tee-nes.png", array("N" => false, "W" => true, "S" => false, "E" => false));
        $this->pipes[] = new Tile("tee-swn.png", array("N" => false, "W" => false, "S" => false, "E" => true));
        $this->pipes[] = new Tile("tee-wne.png", array("N" => false, "W" => false, "S" => true, "E" => false));
    }

    public function getRandomPipe() {
        return clone $this->pipes[rand(0, count($this->pipes)-1)];
    }

    public function SetSize($size)
    {
        $this->size = $size;
    }

    public function GetSize()
    {
        return $this->size;
    }

    public function SetName($player1name, $player2name)
    {
        $this->player1 = new Player($player1name);
        $this->player2 = new Player($player2name);
        $this->turn = $this->player;
    }

    public function SwitchTurn(){
        if ($this->turn == $this->player1){
            $this->turn = $this->player2;
        }else{
            $this->turn = $this->player1;
        }
    }

    public function GetTurn(){
        return $this->turn;
    }

    public function AddPipe($filename,$index){
        foreach($this->pipes as $pipe){
            if ($filename == $pipe->GetName()){
                $this->turn->AddPipe($pipe,$index);
            }
        }
    }


    private $player1;
    private $player2;
    private $size;
    private $pipes = array();
    private $turn;
    private $randomPipes = array();
}
