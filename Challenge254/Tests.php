<?php
/**
 * Created by PhpStorm.
 * User: marisia
 * Date: 3/3/16
 * Time: 11:02 PM
 */

namespace App;


class Tests
{
    function encrypt($string){


        $split = str_split($string);

        $output = '';
        foreach($split as $chars){
//            if(ord($chars) == 47){
//                $output .= $chars;
//            }
            if(ord($chars) >=97 && ord($chars) <=122){
                $position=ord($chars);
                $oppositetotake = $position-97;
                $otherside = 90-$oppositetotake;

                $output .= strtolower(chr($otherside));
            }
            else if(ord($chars) >=65 && ord($chars) <=90){
                $position=ord($chars);
                $oppositetotake = $position-65;
                $otherside = 122-$oppositetotake;

                $output .= strtolower(chr($otherside));
            }

            else {
                $output .= $chars;
            }


        }


        return $output;


    }
}