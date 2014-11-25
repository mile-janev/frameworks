<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Library
 *
 * @author mile
 */
class Library {
    /*Prepare results for displaying in chart*/
    public function formatArray($results)
    {
        $formatedArray = array();
        $small = 0;
        $medium = 0;
        $large = 0;
        $time = 0;
        
        foreach ($results as $result) {
            $small += $result->small;
            $medium += $result->medium;
            $large += $result->large;
            $time += $result->execution_time;
        }
        
        $interval = 60/$time;//Ova e interval, posle go mnozeme so small/medium/large za 
                            //da dobieme kolku e prosekot na izvrseni upiti vo minuta
        
        $formatedArray['tests'] = count($results);
        $formatedArray['small'] = round($small*$interval);
        $formatedArray['medium'] = round($medium*$interval);
        $formatedArray['large'] = round($large*$interval);
        $formatedArray['average'] = round(($formatedArray['small']+$formatedArray['medium']+$formatedArray['large'])/3);
        
        return $formatedArray;
    }
    
    public function findStatistic($framework, $function)
    {
        if (strpos($_SERVER['DOCUMENT_ROOT'], 'wamp')) {
            $password = "";
        } else {
            $password = "toor";
        }
        
        $mysql_database = "frameworks";
        $db = @mysql_connect("localhost", "root", $password) or die("Could not connect database");
        mysql_select_db($mysql_database, $db) or die("Could not select database");
        
        if ($function == 'all') {
            $query = "SELECT * FROM statistic WHERE framework = '$framework'";
        } else {
            $query = "SELECT * FROM statistic WHERE framework = '$framework' AND function = '$function'";
        }
        $result = mysql_query($query);
        
        $resultArray = array();
        $counter = 0;
        while ($row = mysql_fetch_object($result)) {
            $resultArray[$counter] = $row;
            $counter++;
        }
        
        $statistic = $this->formatArray($resultArray);
        
        return $statistic;
    }
}
