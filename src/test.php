<?php

$filter = function($arr){
    return array_filter($arr, function($elem) {
                       
        print_r($elem);
        print_r("\n");

        // if(is_array($elem)){
        //     return $f($elem);
        // } 
        var_dump($elem !== 3);
        return $elem !== 3;
    
    });
    
};

$arr = [[1], [5, 3 , 8], 3];
// print_r ($arr);
print_r(serialize($arr));