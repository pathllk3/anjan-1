<?php
#Include the connect.php file
include ('MSSQL.php');
// Connect to the database
    $myArray = array();
    if ($result = sqlsrv_query($conn, "SELECT * FROM MAINPOPUs")) {
        $tempArray = array();
        while($row = sqlsrv_fetch_object( $result)) {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
        echo json_encode($myArray);
    }
?>