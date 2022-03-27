<?php
$year = 2022;
$monthList = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
$daysArray = ['lundi' => [], 'mardi' => [], 'mercredi' => [], 'jeudi' => [], 'vendredi' => [], 'samedi' => [], 'dimanche' => []];
$startingDayOfTheYear = 5;
$startMonth = 0;
$countYears = 0;
$container = [];

function dataStructure($year, $countYears, $monthList, $daysArray, $container){
    array_push($container, [$year => []]);
    for ($i = 0; $i < count($monthList); $i++) { 
        array_push($container[$countYears][$year], ['mois' => $monthList[$i], 'jours' => $daysArray]);
    }
    $countYears++;
    $year++;
    if($countYears <= 10){
        $container += dataStructure($year, $countYears, $monthList, $daysArray, $container);
    }
    return $container;
}

$calendar = dataStructure($year, $countYears, $monthList, $daysArray, $container);

function dateInDays($calendar, $startingDayOfTheYear){
    $fullMonth = ['janvier', 'mars', 'mai', 'juillet', 'aout', 'octobre', 'decembre'];
    $daysList =['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    for ($i=0; $i < count($calendar); $i++) {
        for ($j=2022; $j <= 2032; $j++) { 
            $bissextile = $j % 4 == 0 ? true : false;
            if(isset($calendar[$i][$j])){
                for ($k=0; $k < count($calendar[$i][$j]); $k++) {
                    switch ($e = $calendar[$i][$j][$k]['mois']) {
                        case in_array($e, $fullMonth):
                            for ($day=0; $day < 31; $day++) {
                                array_push($calendar[$i][$j][$k]['jours'][$daysList[$startingDayOfTheYear]],$day + 1);
                                $startingDayOfTheYear++;
                                if($startingDayOfTheYear == 7){
                                    $startingDayOfTheYear = 0;
                                }
                            }
                            break;
                        case $e == 'fevrier':
                            if($bissextile){
                                for ($day=0; $day < 29; $day++) {
                                    array_push($calendar[$i][$j][$k]['jours'][$daysList[$startingDayOfTheYear]],$day + 1);
                                    $startingDayOfTheYear++;
                                    if($startingDayOfTheYear == 7){
                                        $startingDayOfTheYear = 0;
                                    }
                                }
                            } else {
                                for ($day=0; $day < 28; $day++) {
                                    array_push($calendar[$i][$j][$k]['jours'][$daysList[$startingDayOfTheYear]],$day + 1);
                                    $startingDayOfTheYear++;
                                    if($startingDayOfTheYear == 7){
                                        $startingDayOfTheYear = 0;
                                    }
                                }
                            }
                            break;
                        default: 
                            for ($day=0; $day < 30; $day++) {
                                array_push($calendar[$i][$j][$k]['jours'][$daysList[$startingDayOfTheYear]],$day + 1);
                                $startingDayOfTheYear++;
                                if($startingDayOfTheYear == 7){
                                    $startingDayOfTheYear = 0;
                                }
                            }
                            break;
                    }
                }
            }
        }
    }
    return $calendar;
}

$calendar = dateInDays($calendar, $startingDayOfTheYear);

$final = json_encode($calendar);
file_put_contents('calendar.json', $final);