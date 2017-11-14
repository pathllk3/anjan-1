<?php
require_once '../../INCLUDES/CHK_SESS.php';
require '../../INCLUDES/Connect.php';
$searchTerm = $_GET['term'];
    $query = $db1->query("SELECT * FROM sheet1 WHERE PART_NO LIKE '%".$searchTerm."%' ORDER BY PART_NO ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['PART_NO'];
    }
    echo json_encode($data);
?>