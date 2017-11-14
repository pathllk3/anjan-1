<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ('../../INCLUDES/Connect.php');
    $myArray = array();
    if ($result = $db1->query("SELECT * FROM TABLE1")) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
        echo json_encode($myArray);
    }

    $result->close();
?>