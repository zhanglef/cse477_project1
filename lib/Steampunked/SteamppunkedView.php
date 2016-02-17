<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2/16/2016
 * Time: 11:30 PM
 */

namespace Steampunked;

/**
 * View class for the game Steampunked
 */
class SteamppunkedView
{
    /** Constructor
     * @param $steampunked Steampunked game object
     */
    public function __construct(Steampunked $steampunked) {
        $this->steampunked = $steampunked;
        $this->dir = '/images/';
    }

    /**
     * Display the logo for steampunked, and any other top of the page header stuff
     */
    public function presentHeader(){
        return '<p><img src="./images/title.png"></p>';
    }

    public function presentButtons(){
        //need to iterate through the collection of pipes and present those

        //within iteration, if else statement to determine what piece it is and
        //then match that piece with the image it corresponds to

        //after the iteration is completed, display the bottom buttons in their own button row
        //need to have Rotate, Discard, Open Valve, Give Up

        return '<div class="buttons"><div class="buttonRow">
<div class="buttonCell"><p><img src="./images/straight-h.png" width="50" height="50" alt="straight-h pipe"></p></div>
<div class="buttonCell"><p><img src="./images/ninety-es.png" width="50" height="50" alt="ninety-es pipe"></p></div>
<div class="buttonCell"><p><img src="./images/cap-s.png" width="50" height="50" alt="cap-s pipe"</p></div>
<div class="buttonCell"><p><img src="./images/tee-esw.png" width="50" heigh="50" alt="tee-esw.png"</p></div>
</div><div class="controlButtons"><input type="submit" name="Rotate" value="Rotate"><input type="button" name="Discard" value="Discard"><input type="button" name="OpenValve" value="OpenValve"><input type="button" name=GiveUp" value="Give Up"></div></div>';
    }

    /**
     * Present the grid that the game will be played on
     *
     */
    public function presentGrid(){
        //loop over the size of the game and produce rows of that size each time

        //need it to start with this div
        $html ='<form><div class="game">';

        //size is not currently being set anywhere...
        //$size = $this->steampunked->GetSize();

        $size = 6;
        $rowCount = 0; //keep track of what row we are currently on

        for($i=0;$i<$size;$i++){
            if($i == 0){
                $html .= <<<HTML
<div class ="row">
HTML;
            }

            if($i <= $size-1){
                $html .= <<<HTML
    <div class="cell">
        <input type="submit" name="leak" value"$rowCount, $i">
    </div>
HTML;
            }

            //debugging the loop
//            print_r("rowCount: ");
//            print_r($rowCount);
//            print_r("col count: ");
//            print_r($i);
//            echo '<br>';

            //if this is the end of a row, close div, reset count, move over one row
            if($i == $size-1 && $rowCount < $size-1){
                $html .=<<<HTML
</div>
HTML;
                $rowCount += 1; //move over one row
                $i = -1; //reset i
            }
        }

        //finally close the form
        $html .= <<<HTML
</form>
HTML;
        return $html;
    }

    private $steampunked;
    private $dir; //directory full of images
}