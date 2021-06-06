<?php
require_once('config.php');

/**
 * Execute SQL Query. This's used for insert, update or delete
 * @param $sql SQL Query
 */
function execute($sql){
    //create connection
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    //execute query
    mysqli_query($connection, $sql);

    //close connection
    mysqli_close($connection);
}

/**
 * Select SQL Query
 * @param string $sql SQL Query
 * @return list data 
 */
function select($sql){
    //create connection
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    //execute query
    $resultSet = mysqli_query($connection, $sql);
    $list = [];
    while($row = mysqli_fetch_array($resultSet, 1)){
        $list[] = $row;
    }
   
    //close connection
    mysqli_close($connection); 

    return $list;
}
?>