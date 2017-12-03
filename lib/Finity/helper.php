<?php
    
/**
 * 
 */
function print_ra($arr){
    echo '<br><pre>';
    print_r($arr);
    echo '</pre><br>';    

}

/**
 * 
 */
function toMoney($val='')
{
    if(!empty($val) && isset($val) ){
       return  '$'.number_format($val,2);
    }else{
        return '$0.00';
    }
}

function cleanPostDataFromUser(){
    
    $arg  = unserialize(LOGINVAR);
        foreach($arg as $key=>$field){
            $arg[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
   return $arg; 

}

function logincheckCleanDataFromUser($arg = array()){
    $error = array("?"=>true,"errors"=>"");
    foreach($arg as $key=>$val){
        if($key=='email' && !filter_var($val, FILTER_VALIDATE_EMAIL)){
            $error['?'] = false;
            $error['errors'] = array($key=>"invalid email");
        }

        if($key=='pwd' && strlen($val)<8){
            $error['?'] = false;
            $error['errors'] = array($key=>"Password length too small");
        }
    }
    return $error;
}