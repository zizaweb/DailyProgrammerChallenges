<?php
/**
 * Created by PhpStorm.
 * User: marisia
 * Date: 3/13/16
 * Time: 10:50 AM
 */

namespace App\Challenge257;

use League\Csv\Reader;

class President
{
    private $csvHeader;
    private $csvData;
    private $firstYear;

    public function __construct()
    {
        $csv = Reader::createFromPath('app/Challenge257/presidents.csv');

        //get the CSV header
        $headers = $csv->fetchOne();
        $headersTrimmed = array_map('trim', $headers);

        $this->csvHeader = $headersTrimmed;
        $this->csvData = $csv->setOffset(1)->fetchAll();

    }

    public function countMaxYears(){

        $birthArray = array_search('BIRTH DATE', $this->csvHeader);
        $deathArray = array_search('DEATH DATE', $this->csvHeader);


        for($y=$this->getFirstYear(); $y <= date('Y'); $y++){

            foreach($this->csvData as $key => $data){
                $birthYear = date('Y', strtotime($data[$birthArray]));
                $deathYear = date('Y', strtotime($data[$deathArray]));

                if($y >= $birthYear  && ($y <= $deathYear || empty($deathYear)) ){

                    if(isset($mostYears[$y])){
                        $mostYears[$y] = $mostYears[$y] +1;
                    }
                    else{
                        $mostYears[$y] = 1;
                    }

                }

            }
        }

        $maxYearCount = max($mostYears);

        $tmp =[];

        foreach($mostYears as $year => $data){
            if($data == $maxYearCount){
                $tmp[] = $year;
            }
        }

        return join(",", $tmp);

    }


    public function firstBirthday(){

        $birthdays = array();
        $birthArray = array_search('BIRTH DATE', $this->csvHeader);

        foreach($this->csvData as $data){

            $birthdays[date('Y', strtotime($data[$birthArray]))]= date('Y', strtotime($data[$birthArray]));
        }

        asort($birthdays);

        $this->firstYear = $birthdays[0];

    }

    public function getFirstYear(){
        return $this->firstYear;
    }
}