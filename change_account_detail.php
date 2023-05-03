<?php
    session_start();
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    include('includes/connect.php');
    $sql = "UPDATE tb_member
            SET m_name='$name',m_surname='$surname',m_gender = '$gender',m_tel='$phone',m_address='$address'
            WHERE m_no = '".$_SESSION['m_no']."'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Change Detail Success')</script>";
        echo "<script>window.location='my_account.php'</script>";
    }else{
        echo "<script>alert('Change Detail Failed')</script>";
        echo "<script>window.location='my_account.php'</script>";
    }
    mysqli_close($conn);
    
?>