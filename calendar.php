<?php
$year = 2022;
$monthList = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
$daysArray = ['lundi' => [], 'mardi' => [], 'mercredi' => [], 'jeudi' => [], 'vendredi' => [], 'samedi' => [], 'dimanche' => []];
$startDay = 5;
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
    if($year != 2030){
        $container += dataStructure($year, $countYears, $monthList, $daysArray, $container);
    }
    return $container;
}

$calendar = dataStructure($year, $countYears, $monthList, $daysArray, $container);

function daysInArray($calendar){
    for ($i=0; $i < count($calendar); $i++) {
        // Index of array
        for ($j = 0; $j < count($calendar[$i]); $j++) {
            // Array of the year 
            for ($k=0; $k < count($calendar[$i][$j + 2022]); $k++) {
                // Array of the month 
                for ($l=0; $l < count($calendar[$i][$j + 2022][$k]); $l++) {
                    // Array of the days 
                    print_r($calendar[$i][$j + 2022][$k]['jours']);
                }
            }
        }
    }
    // print_r($calendar[1][2023][1]['jours']['lundi']);
}
daysInArray($calendar);

$final = json_encode($calendar);
file_put_contents('tes.json', $final);