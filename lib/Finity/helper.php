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