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

function cleanPostDataFromUser($arg = array()){
        foreach($arg as $key=>$field){
            $arg[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
   return $arg; 
}

function cleanUnknownKeysFromUser(){
    $arg = array();
    foreach($_POST as $key=>$field){
        $arg[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    return $arg;
}

function checkCleanDataFromUser($arg = array()){
    $error = array("?"=>true,"errors"=>array());
    foreach($arg as $key=>$val){
        if($key=='email' && !filter_var($val, FILTER_VALIDATE_EMAIL)){
            $error['?'] = false;
            $error['errors'][$key] = "Invalid email";
        }

        if($key=='pwd' && strlen($val)<8){
            $error['?'] = false;
            $error['errors'][$key] = "Password length too short";
        }

        if($key=='Rpwd' && $val != $arg['pwd'] || $key=='Rpwd' && empty($val)){
            $error['?'] = false;
            $error['errors'][$key] = "This password does not match";
        }

        if($key=='fname' && empty($val) || $key=='fname' && !preg_match('/^[a-zA-Z]+$/', trim($val))){
            $error['?'] = false;
            $error['errors'][$key] = "Invalid value";
        }

        if($key=='lname' && empty($val) || $key=='lname' && !preg_match('/^[a-zA-Z]+$/', trim($val))){
            $error['?'] = false;
            $error['errors'][$key] = "Invalid value";
        }

        if($key=='bday' && empty($val)){
            $error['?'] = false;
            $error['errors'][$key] = "Invality date";
        }

    }
    return $error;
}

function isClass($arg){
    if(isset($arg))
        return 'error';
    else
        return 'ok';
}

function isShow($arg){
    if(isset($arg))
        return 'show';
    else
        return 'hide';
}

function isVarSet($arg = array(), $str){
    return (isset($arg[$str])?$arg[$str]:'');
}

function hasAccess(){
    if(!isset($_SESSION['user']))
        header('Location: index.php');
}