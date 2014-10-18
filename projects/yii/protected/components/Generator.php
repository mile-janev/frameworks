<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generator
 *
 * @author mile
 */
class Generator {
    
    //Generate random string for given required random string length
    public static function getRandomString($length=1) 
    {
        $validCharacters = "abcdefghijklmnopqrstuvxyxwz1234567890";
        $validCharNumber = strlen($validCharacters);

        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
    }
    
    /**
     * Generate random decimal number for given length of decimals and length of digits
     */
    public static function getRandomNumber($integerLength=1, $decimalsLength=0)
    {
        $validCharacters = "1234567890";
        $validCharNumber = strlen($validCharacters);
        
        $integer = "";
        $decimal = "";
        
        for ($i=0; $i<$integerLength; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $integer .= $validCharacters[$index];
        }
        
        for ($i=0; $i<$decimalsLength; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $decimal .= $validCharacters[$index];
        }
        
        if ($decimalsLength!=0) {
            return ltrim($integer . '.' . $decimal, '0');
        } else {
            return $integer;
        }
    }
    
    public static function getRandomFromStrings($charList='0123456789', $lenght=1)
    {
        $validCharNumber = strlen($charList);
        
        $string = "";
        
        for ($i=0; $i<$lenght; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $string .= $charList[$index];
        }
        
        return $string;
    }
    
}

?>
