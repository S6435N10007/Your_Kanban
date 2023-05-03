<?php
    include 'includes/connect.php';
    $id = $_GET['id'];
    $sql ="DELETE FROM tb_product 
    WHERE p_no = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>window.location='product.php'</script>";
    }else{
        echo "<script>alert('Can't remove this product')</script>";
    }
mysqli_close($conn);
?>