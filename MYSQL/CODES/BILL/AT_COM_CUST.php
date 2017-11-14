<?php
require '../../INCLUDES/Connect.php';
$searchTerm = $_GET['term'];
    $query = $db1->query("SELECT * FROM BILL1 WHERE CUST LIKE '%".$searchTerm."%' GROUP BY CUST ORDER BY CUST DESC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['CUST'];
    }
    echo json_encode($data);
?>