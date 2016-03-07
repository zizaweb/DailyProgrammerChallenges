<?php
/**
 * Created by PhpStorm.
 * User: marisia
 * Date: 3/5/16
 * Time: 1:23 PM
 */

namespace App\Challenges;


class Challenge255
{
    private $switchesOnState=[];

    public function __construct($totalswitches = 10){

        for($i=0; $i<$totalswitches; $i++){$this->switchesOnState[$i] = 0;}

    }

    public function flippRanges($start, $end){


            if($end >= $start){
                for($c=$start; $c <= $end; $c++){
                    $this->switchesOnState[$c] = $this->toggleOnOff($this->switchesOnState[$c]);
                }
            }
            else{

                for($c=$start; $c >= $end; $c--){

                    $this->switchesOnState[$c] = $this->toggleOnOff($this->switchesOnState[$c]);

                }
            }


    }

    private function toggleOnOff($state){

        if($state ==1)
            return 0;
        return 1;

    }

    public function getCount(){

        $count = 0;

        foreach($this->switchesOnState as $values){
            if($values == 1)
                $count++;
        }

        return $count;
    }
}