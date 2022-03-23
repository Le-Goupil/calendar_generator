<?php
$year = 2022;
$fullMonth = ['janvier', 'mars', 'mai', 'juillet', 'aout', 'octobre', 'decembre'];
$month = ['janvier' => [], 'fevrier' => [], 'mars' => [], 'avril' => [], 'mai' => [], 'juin' => [], 'juillet' => [], 'aout' => [], 'septembre' => [], 'octobre' => [], 'novembre' => [], 'decembre' => []];
$days = ['lundi' => [], 'mardi' => [], 'mercredi' => [], 'jeudi' => [], 'vendredi' => [], 'samedi' => [], 'dimanche' =>  []];

function daysInMonth($month, $days){
    foreach($month as $key => $value){
        $month[$key] = $days;
    }
    return $month;
}

$calendar = daysInMonth($month, $days);

function dataInCalendar($year, $calendar, $days, $fullMonth){
    $compteurJour = 5;
    foreach ($calendar as $key => $value) {
        if(in_array($key, $fullMonth)){
            for ($i=0; $i < 31 ; $i++) {
                switch($compteurJour){
                    case 0:
                        array_push($calendar[$key]['lundi'], $i +1);
                        break;
                    case 1:
                        array_push($calendar[$key]['mardi'], $i +1);
                        break;
                    case 2:
                        array_push($calendar[$key]['mercredi'], $i +1);
                        break;
                    case 3:
                        array_push($calendar[$key]['jeudi'], $i +1);
                        break;
                    case 4:
                        array_push($calendar[$key]['vendredi'], $i +1);
                        break;
                    case 5:
                        array_push($calendar[$key]['samedi'], $i +1);
                        break;
                    case 6:
                        array_push($calendar[$key]['dimanche'], $i +1);
                        break; 
                    }
                $compteurJour++;
                if($compteurJour == 7){
                    $compteurJour = 0;
                }
            }
        } else if ($key == 'Février'){
           if($year % 4 == 0){
            for ($i=0; $i < 29 ; $i++) {
                switch($compteurJour){
                    case 0:
                        array_push($calendar[$key]['lundi'], $i +1);
                        break;
                    case 1:
                        array_push($calendar[$key]['mardi'], $i +1);
                        break;
                    case 2:
                        array_push($calendar[$key]['mercredi'], $i +1);
                        break;
                    case 3:
                        array_push($calendar[$key]['jeudi'], $i +1);
                        break;
                    case 4:
                        array_push($calendar[$key]['vendredi'], $i +1);
                        break;
                    case 5:
                        array_push($calendar[$key]['samedi'], $i +1);
                        break;
                    case 6:
                        array_push($calendar[$key]['dimanche'], $i +1);
                        break; 
                    }
                $compteurJour++;
                if($compteurJour == 7){
                    $compteurJour = 0;
                }
            }
           } else {
            for ($i=0; $i < 28 ; $i++) {
                switch($compteurJour){
                    case 0:
                        array_push($calendar[$key]['lundi'], $i +1);
                        break;
                    case 1:
                        array_push($calendar[$key]['mardi'], $i +1);
                        break;
                    case 2:
                        array_push($calendar[$key]['mercredi'], $i +1);
                        break;
                    case 3:
                        array_push($calendar[$key]['jeudi'], $i +1);
                        break;
                    case 4:
                        array_push($calendar[$key]['vendredi'], $i +1);
                        break;
                    case 5:
                        array_push($calendar[$key]['samedi'], $i +1);
                        break;
                    case 6:
                        array_push($calendar[$key]['dimanche'], $i +1);
                        break; 
                    }
                $compteurJour++;
                if($compteurJour == 7){
                    $compteurJour = 0;
                }
            }
           }
        } else {
            for ($i=0; $i < 30 ; $i++) {
                switch($compteurJour){
                    case 0:
                        array_push($calendar[$key]['lundi'], $i +1);
                        break;
                    case 1:
                        array_push($calendar[$key]['mardi'], $i +1);
                        break;
                    case 2:
                        array_push($calendar[$key]['mercredi'], $i +1);
                        break;
                    case 3:
                        array_push($calendar[$key]['jeudi'], $i +1);
                        break;
                    case 4:
                        array_push($calendar[$key]['vendredi'], $i +1);
                        break;
                    case 5:
                        array_push($calendar[$key]['samedi'], $i +1);
                        break;
                    case 6:
                        array_push($calendar[$key]['dimanche'], $i +1);
                        break; 
                    }
                $compteurJour++;
                if($compteurJour == 7){
                    $compteurJour = 0;
                }
            }
        }
    }
    return $calendar;
}

$calendar = dataInCalendar($year, $calendar, $days, $fullMonth);
$calendar = json_encode($calendar);
file_put_contents('calendar2022.json', $calendar);