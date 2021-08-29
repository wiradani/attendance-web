<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * This class contain of all support function for development
 * @author : Parama_Fadli_Kurnia
 * Developer can make some additional code in this class
 */
class Nfuncs {

    /* encrypt data with base 64 */
    function encrypt($q) {
        $qEncoded = base64_encode($q);
        return $qEncoded;
    }

    /* decrypt data with base 64 */
    function decrypt($q) {
        $qDecoded = base64_decode($q);
        return $qDecoded;
    }


    function make_key($lenKey) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $lenKey; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $str_pass = implode($pass);
        return $str_pass; //turn the array into a string
    }

    function urlsafe_b64encode($string) {
        $datas = str_replace(array('+','/','=') , array('-','_','') , base64_encode($string));
        return $datas;
    }
    
}
