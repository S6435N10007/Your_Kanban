<?php
    ini_set('display_errors', 0);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $protype = $_POST['protype'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $picmain = $_FILES['picmain']['name'];
    $pic2 = $_FILES['pic2']['name'];
    $pic3 = $_FILES['pic3']['name'];
    include('includes/connect.php');
    $sqlu = "SELECT count(p_name) FROM tb_product WHERE p_name='$name'" ;
    $resultu = mysqli_query($conn,$sqlu);
    if( $resultu > 0 ){
        echo "<script>alert('Already has this name')</script>";
        echo "<script>window.location='product.php'</script>";
    }else{
    if($picmain != "" && $pic2 != "" && $pic3 != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_main='$picmain',p_pic_2='$pic2',p_pic_3='$pic3'
                WHERE p_no = '$id'";
    }elseif($picmain != "" && $pic2 != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_main='$picmain',p_pic_2='$pic2'
                WHERE p_no = '$id'";
    }elseif($picmain != "" && $pic3 != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_main='$picmain',p_pic_3='$pic3'
                WHERE p_no = '$id'";
    }elseif($pic2 != "" && $pic3 != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_2='$pic2',p_pic_3='$pic3'
                WHERE p_no = '$id'";
    }elseif($picmain != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_main='$picmain'
                WHERE p_no = '$id'";
    }elseif($pic2 != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_2='$pic2'
                WHERE p_no = '$id'";
    }elseif($pic3 != ""){
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price',p_pic_3='$pic3'
                WHERE p_no = '$id'";
    }else{
        $sql = "UPDATE tb_product
                SET p_name='$name',cat_id='$protype',p_detail='$detail',p_price='$price'
                WHERE p_no = '$id'";
    }
    $result = mysqli_query($conn,$sql);
    if($result){//คำสั่ง upload รูปภาพ คือ move_uploaded_file(ชื่อไฟล์,เส้นทาง)
        if($picmain != "" && $pic2 != "" && $pic3 != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
            move_uploaded_file($_FILES['pic2']['tmp_name'],"product_image/".$_FILES['pic2']['name']);
            move_uploaded_file($_FILES['pic3']['tmp_name'],"product_image/".$_FILES['pic3']['name']);
        }elseif($picmain != "" && $pic2 != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
            move_uploaded_file($_FILES['pic2']['tmp_name'],"product_image/".$_FILES['pic2']['name']);
        }elseif($picmain != "" && $pic3 != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
            move_uploaded_file($_FILES['pic3']['tmp_name'],"product_image/".$_FILES['pic3']['name']);
        }elseif($pic2 != "" && $pic3 != ""){
            move_uploaded_file($_FILES['pic2']['tmp_name'],"product_image/".$_FILES['pic2']['name']);
            move_uploaded_file($_FILES['pic3']['tmp_name'],"product_image/".$_FILES['pic3']['name']);
        }elseif($picmain != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
        }elseif($pic2 != ""){
            move_uploaded_file($_FILES['pic2']['tmp_name'],"product_image/".$_FILES['pic2']['name']);
        }elseif($pic3 != ""){
            move_uploaded_file($_FILES['pic3']['tmp_name'],"product_image/".$_FILES['pic3']['name']);
        }
        echo "<script>alert('Update Product Success')</script>";
        echo "<script>window.location='product.php'</script>";
    }else{
        echo "<script>alert('Update Product Failed')</script>";
        echo "<script>window.location='product.php'</script>";
    }
}
mysqli_close($conn);
?>