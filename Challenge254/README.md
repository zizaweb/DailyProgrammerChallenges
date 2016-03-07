<?php ß

//Set the amount of switches

$switches = new \App\Challenges\Challenge255(10);

//Enter the ranges
$switches->flippRanges(3, 6);
$switches->flippRanges(0, 4);
$switches->flippRanges(7, 3);
$switches->flippRanges(9, 9);
$count = $switches->getCount();

//Display total
$this->assertEquals(7, $count);