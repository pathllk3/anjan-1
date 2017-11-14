<?php
require '../../INCLUDES/Connect.php';
$searchTerm = $_GET['term'];
$CS = $_GET['CS'];
    $query = $db1->query("SELECT * FROM BILL1 WHERE SNAME LIKE '%".$searchTerm."%' AND CUST='" .$CS. "' GROUP BY SNAME ORDER BY SNAME ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['SNAME'];
    }
    echo json_encode($data);
?>