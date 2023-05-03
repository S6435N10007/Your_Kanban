<?php
    header('Content-Type: application/json');
    include 'includes/connect.php';
    $sqlQuery = "SELECT datemonth , SUM( o_total_price ) AS Total
                FROM tb_order
                GROUP BY datemonth
                ORDER BY datemonth";
    $result = mysqli_query($conn,$sqlQuery);
    $data = array();
    foreach ($result as $row) {
	$data[] = $row;
    }
    mysqli_close($conn);

    echo json_encode($data);
?>