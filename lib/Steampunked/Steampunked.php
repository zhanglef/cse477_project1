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
        $this->constructRandomPipes();
    }


    public function constructTiles()
    {
        $this->pipes[] = new Tile("cap-e.png", array("N" => false, "W" => false, "S" => false, "E" => true));
        $this->pipes[] = new Tile("cap-n.png", array("N" => true, "W" => false, "S" => false, "E" => false));
        $this->pipes[] = new Tile("cap-s.png", array("N" => false, "W" => false, "S" => true, "E" => false));
        $this->pipes[] = new Tile("cap-w.png", array("N" => false, "W" => true, "S" => false, "E" => false));
        $this->pipes[] = new Tile("ninety-es.png", array("N" => false, "W" => false, "S" => true, "E" => true));
        $this->pipes[] = new Tile("ninety-ne.png", array("N" => true, "W" => false, "S" => false, "E" => true));
        $this->pipes[] = new Tile("ninety-sw.png", array("N" => false, "W" => true, "S" => true, "E" => false));
        $this->pipes[] = new Tile("ninety-wn.png", array("N" => true, "W" => true, "S" => false, "E" => false));
        $this->pipes[] = new Tile("straight-h.png", array("N" => false, "W" => true, "S" => false, "E" => true));
        $this->pipes[] = new Tile("straight-v.png", array("N" => true, "W" => false, "S" => true, "E" => false));
        $this->pipes[] = new Tile("tee-esw.png", array("N" => false, "W" => true, "S" => true, "E" => true));
        $this->pipes[] = new Tile("tee-nes.png", array("N" => true, "W" => false, "S" => true, "E" => true));
        $this->pipes[] = new Tile("tee-swn.png", array("N" => true, "W" => true, "S" => true, "E" => false));
        $this->pipes[] = new Tile("tee-wne.png", array("N" => true, "W" => true, "S" => false, "E" => true));

    }

    public function constructRandomPipes(){
        for ($i=0;$i<5;$i++){
            $rpipe = $this->RandomPipe();
            $this->randomPipesPlayer1[] = $rpipe;
        }
        for ($i=0;$i<5;$i++){
            $rpipe = $this->RandomPipe();
            $this->randomPipesPlayer2[] = $rpipe;
        }
    }

    public function RandomPipe() {
        return clone $this->pipes[rand(0, count($this->pipes)-1)];
    }

    //Set the size of the grid
    public function SetSize($size)
    {
        $this->size = $size;
    }

    //Get the size of the grid
    public function GetSize()
    {
        return $this->size;
    }

    //Set the name of two players
    public function SetName($player1name, $player2name)
    {
        $this->player1 = new Player($player1name,$this->size,"player1");
        $this->player2 = new Player($player2name,$this->size,"player2");
        $this->turn = $this->player1;
    }

    //This will return the object of player1
    public function GetPlayer1(){
        return $this->player1;
    }

    public function GetPlayer2(){
        return $this->player2;
    }

    //call this code will switch turn
    public function SwitchTurn(){
        if ($this->turn == $this->player1){
            $this->turn = $this->player2;
        }else{
            $this->turn = $this->player1;
        }
    }

    //This will return a player object! not player name
    public function GetTurn(){
        return $this->turn;
    }

    //This function will add a new pipe to the current player's pipeline, $filename is the name of img, $index is the index
    //of the grid you want to add to. For example AddPipe("cap-e.png",1) will add this image to the first grid
    public function AddPipe($filename,$index){
        #$pipe = $this->randomPipes[$randomPipesindex];
        #$this->turn->AddPipe($pipe,$index);
        //Don't worry about the next line commond, i write that for myself
        //check this return， if true，replace the randomPipes in this index by calling getRandomPipe（），if false nothing change
        foreach($this->pipes as $pipe){
            if ($filename == $pipe->GetName()){
                $this->turn->AddPipe(clone $pipe,$index);
            }
        }
    }

    //This function will return 5 random pipe object for player1, u will use them when to create that 5 selectable pipe list
    //on the bottom, but all the thing in the list are object, to get the name of the image, you can use
    // GetRandomPipesPlayer1()[0]->GetName(),this will get the image name of the first object in the list
    public function GetRandomPipesPlayer1(){
        return $this->randomPipesPlayer1;
    }

    //same as above, but this list are used for player2
    public function GetRandomPipesPlayer2(){
        return $this->randomPipesPlayer2;
    }

    private $player1;
    private $player2;
    private $size;
    private $pipes = array();
    private $turn;
    private $randomPipesPlayer1 = array();
    private $randomPipesPlayer2 = array();
}
