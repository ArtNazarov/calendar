﻿<?php



function weekOfMonth($date) {
    // estract date parts
    list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));

    // current week, min 1
    $w = 1;

    // for each day since the start of the month
    for ($i = 1; $i <= $d; ++$i) {
        // if that day was a sunday and is not the first day of month
        if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
            // increment current week
            ++$w;
        }
    }

    // now return
    return $w;
}

function getWeekday($date) {
    return date('w', strtotime($date));
}


function calendar($month, $year){

$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$rows = ceil($days / 7);
// Init widget
$calendar = [];
$index_of_row = 0;
for($r=0;$r<$rows;$r++){
	$calendar[$r] = [];
	for($d=0;$d<8;$d++){
	$calendar[$r][$d] = ["text"=>""];
	};
};

$index_of_row = 0;

for($i=1;$i<=$days;$i++){

	$date = "$year-$month-$i";
	$place = getWeekday($date);
    $index_of_row=weekOfMonth($date);

	$calendar[$index_of_row][$place] = ["date" => $date, "text"=>""];
	};
  
   // print_r( getWeekday("2020-2-1") . ' ' . weekOfMonth("2020-2-1") );
return $calendar;
};

function output_calendar($month, $year){
  $daynames = ["Вс", "Пн", "Вт",
  "Ср", "Чт", "Пт", "Сб"];
  $cal = calendar($month, $year);
  $html = "<table border='1'>";
  for ($r=0;$r<count($cal);$r++){
     $html.="<tr>";
    if ($r==0){
   
    for ($d=0;$d<count($daynames);$d++){
      $html .= "<td>" . $daynames[$d] . "</td>";
    };

    };
    if ($r>0){
    for ($d=0;$d<count($daynames);$d++){
      isset( $cal[$r][$d]["date"] ) ?
      $html.="<td>" . $cal[$r][$d]["date"] . "<br/>" . $cal[$r][$d]['text'] . "</td>" :
          $html.="<td> - </td>" ;

    };
    };
    $html .= "</tr>";
  };
  $html .= "</table>";
  return $html;
}



?>