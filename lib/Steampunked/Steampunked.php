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
    public function __construct($seed = null) {
        if($seed === null) {
            $seed = time();
        }
        srand($seed);
        #$this->constructRooms();
        #$this->populateRooms();
    }

    public function north($filename){
        return true;
    }

    public function east($filename){
        return true;
    }

    public function south($filename){
        return true;
    }

    public function west($filename){
        return true;
    }

    public function isLeak(){
        return true;
    }

    private $pipeLocationOne;
    private $pipeLocationTwo;
}