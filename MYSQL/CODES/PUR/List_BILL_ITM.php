<?php
include ('../../INCLUDES/Connect.php');
$bno = $_GET['bno'];
    $myArray = array();
    if ($result = $db1->query("SELECT * FROM BILLs WHERE BILL_NO='" .$bno. "'")) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
        echo json_encode($myArray);
    }

    $result->close();
?>