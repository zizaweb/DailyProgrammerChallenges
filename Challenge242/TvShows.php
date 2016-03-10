<?php
/**
 * Created by PhpStorm.
 * User: marisia
 * Date: 3/5/16
 * Time: 4:02 PM
 */

namespace App\Challenge242;


class TvShows
{

    private $recordedNames;
    private $preferredMovie;
    private $movieTimes;
    private $movieCount = 0;


    public function showMovies(){

        print_r($this->getMovieTimes());

    }

    /**
     * @return mixed
     */
    public function getMovieTimes()
    {
        return $this->movieTimes;
    }

    public function countRecordedMovies(){

        foreach($this->getMovieTimes() as $time){

            if(!isset($currentTime)){
                $currentTime = $time['finish'];
                $this->movieCount++;
            }

            if($currentTime >= $time['start']){
                $this->movieCount++;
                $currentTime = $time['finish'];
            }

        }

        return $this->movieCount;
    }

    public function getRecordedMovies(){

        foreach($this->getMovieTimes() as $time){

            if(!isset($currentTime)){
                $currentTime = $time['finish'];
                $this->recordedNames[] = $time['names'];
            }

            if($time['start'] >= $currentTime ){
                $this->recordedNames[] = $time['names'];
                $currentTime = $time['finish'];
            }

        }

        print_r($this->recordedNames); die;

        return $this->recordedNames;
    }

    /**
     * @param mixed $movieTimes
     */
    public function setMovieTimes($start, $finish, $names = '')
    {
        $this->movieTimes[] = array('start' => $start, 'finish' => $finish, 'names' => $names);

        $this->movieTimes = $this->sortArray($this->movieTimes);
    }

    private function sortArray($data){


        // Obtain a list of columns
        foreach ($data as $key => $row) {
            $start[$key]  = $row['start'];
            $finish[$key] = $row['finish'];
            $names[$key] = $row['names'];
        }

        array_multisort($start, SORT_ASC, $data);

        return $data;
    }

    public function SetPreferredMovie($preferredMovie){

        $this->preferredMovie = $preferredMovie;

    }

    public function GetPreferredMovie(){

        return $this->preferredMovie;

    }


}