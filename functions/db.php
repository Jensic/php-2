<?php

/**************************************************
                DATABAS FUNCTIONS
***************************************************/

/**
*
*Stores the built in function mysqli_connect in variable $con, to use when connect to database is needed.
*
*
**/

$con = mysqli_connect('localhost', 'root', 'root', 'dynweb_inl2');


/**
*
*A function wich using built in mysqli_num_rows, takes in $result variable and returns number of rows into $result variable.
*
*
**/

function row_count($result) {
    
    return mysqli_num_rows($result);
    
}

/**
*
*The function is used to escape special characters on the incoming $string and returns it escaped. Function have access to $con who has to be global since $con is defined outside the function.
*
*
**/

function escape($string) {
    
    global $con;
    
    return mysqli_real_escape_string($con, $string);
    
}


/**
*
*Functions which query(sends in the sql question) to the database and returns the result if it goes well(checks with confirm) 
*
*
**/

function query($query) {
    
    global $con;
    
    $result = mysqli_query($con, $query);
    
    confirm($result);
    
    return $result;
    
}

/**
*
*Function wich confirms the query to the databas, if anything fails it exit the script and displays that together with the output of built in function mysqli_error message. Function have access to $con who has to be global since $con is defined outside the function.
*
*
**/

function confirm($result) {
    
    global $con;
    
    if(!$result) {
        
       die("QUERY FAILED" . mysqli_error($con)); 
        
    }
    
}

/**
*
*Using the built in function mysqli_fetch_array, takes in the $result variable and fetch a result row as an associative or a numeric array and returns it in the $result variable.Function have access to $con who has to be global since $con is defined outside the function. 
*
*
**/


function fetch_array($result) {
    
    global $con;
    
    return mysqli_fetch_array($result);
    
}
