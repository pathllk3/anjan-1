<?php
require '../../INCLUDES/Connect.php';
$searchTerm = $_GET['term'];
    $query = $db1->query("SELECT * FROM BILL1 WHERE TECH LIKE '%".$searchTerm."%' GROUP BY TECH ORDER BY TECH ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['TECH'];
    }
    echo json_encode($data);
?>