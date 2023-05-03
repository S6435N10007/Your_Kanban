<?php
    header('Content-Type: application/json');
    include 'includes/connect.php';
    $sqlQuery = "SELECT c.cat_name , SUM( `quantity` ) AS Total
                FROM tb_product p
                INNER JOIN tb_order_product op
                ON p.p_no = op.p_no
                INNER JOIN tb_category c
                ON c.cat_id = p.cat_id
                GROUP BY c.cat_id
                ORDER BY SUM( `quantity` ) DESC";
    $result = mysqli_query($conn,$sqlQuery);
    $data = array();
    foreach ($result as $row) {
	$data[] = $row;
    }
    mysqli_close($conn);

    echo json_encode($data);
?>