<?php
require_once('config.php');

// insert, upDate, delete sử dụng funcion này
function execute($sql){
    // create connection tới data base
    $conn= mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    //query
    mysqli_query($conn,$sql);

    //close connection
    mysqli_close($conn);
}

//select
function executeResult($sql){
    // create connection tới data base
    $conn= mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    //query
    $reSultset= mysqli_query($conn,$sql);

    $list= [];

    while($row= mysqli_fetch_array($reSultset, 1)){
        $list[]=$row;

    }
    //close connection
    mysqli_close($conn);
    return $list;
}