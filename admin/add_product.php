<?php   
    ini_set('display_errors', 0);
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
        echo "<script>window.location='add_product_form.php'</script>";
    }else{
    if($pic2 != "" && $pic3 != ""){
        $sql = "INSERT INTO tb_product(p_name,cat_id,p_detail,p_price,p_pic_main,p_pic_2,p_pic_3)
                VALUES('$name','$protype','$detail','$price','$picmain','$pic2','$pic3')";
    }
    elseif($pic2 != ""){
        $sql = "INSERT INTO tb_product(p_name,cat_id,p_detail,p_price,p_pic_main,p_pic_2)
                VALUES('$name','$protype','$detail','$price','$picmain','$pic2')";
    }
    elseif($pic3 != ""){
        $sql = "INSERT INTO tb_product(p_name,cat_id,p_detail,p_price,p_pic_main,p_pic_3)
                VALUES('$name','$protype','$detail','$price','$picmain','$pic3')";
    }else{
        $sql = "INSERT INTO tb_product(p_name,cat_id,p_detail,p_price,p_pic_main)
                VALUES('$name','$protype','$detail','$price','$picmain')";
    }
    $result = mysqli_query($conn,$sql);
    if($result){//คำสั่ง upload รูปภาพ คือ move_uploaded_file(ชื่อไฟล์,เส้นทาง)
      if($pic2 != "" && $pic3 != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
            move_uploaded_file($_FILES['pic2']['tmp_name'],"product_image/".$_FILES['pic2']['name']);
            move_uploaded_file($_FILES['pic3']['tmp_name'],"product_image/".$_FILES['pic3']['name']);
        }
        elseif($pic2 != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
            move_uploaded_file($_FILES['pic2']['tmp_name'],"product_image/".$_FILES['pic2']['name']);
        }
        elseif($pic3 != ""){
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
            move_uploaded_file($_FILES['pic3']['tmp_name'],"product_image/".$_FILES['pic3']['name']);
        }else{
            move_uploaded_file($_FILES['picmain']['tmp_name'],"product_image/".$_FILES['picmain']['name']);
        }
        echo "<script>alert('Add Product Success')</script>";
        echo "<script>window.location='add_product_form.php'</script>";
    }else{
        echo "<script>alert('Add Product Failed')</script>";
        echo "<script>window.location='add_product_form.php'</script>";
    }
}
    mysqli_close($conn);
    
?>