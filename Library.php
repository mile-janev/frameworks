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
    public function formatArray($statistic)
    {
        $results = $this->cleanResults($statistic);
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
        $formatedArray['small'] = $small*$interval;
        $formatedArray['medium'] = $medium*$interval;
        $formatedArray['large'] = $large*$interval;
        
        return $formatedArray;
    }
    
    //This function remove 5% of highest and 5% of lowest results for each database type (small/medium/large)
    //Means that 70% of the tests will be accepted.
    //
    //Ova se pravi bidejki tie 30% se ne tolku realni poradi faktot sto procesorot vo
    //toj moment mozel da bide zafaten pa pokazal pomal broj na zapisi ili drug nekoj faktor.
    public function cleanResults($results)
    {
        
        return $results;
    }
    
    public function findStatistic($framework, $function)
    {
        if ($_SERVER['SERVER_NAME']=='tday.dev') {
            $mysql_password = "toor";
        } else {
            $mysql_password = "toor";
        }
        $mysql_hostname = "localhost";
        $mysql_user = "root";

        $mysql_database = "frameworks";
        $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
        mysql_select_db($mysql_database, $bd) or die("Could not select database");
        
        $query = "SELECT * FROM statistic WHERE framework = '$framework' AND function = '$function'";
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
