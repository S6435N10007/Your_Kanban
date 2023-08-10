<?php
    ini_set('display_errors', 0);
    include('includes/connect.php');
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $tel = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['permission'];
    if($pass !=''){
        $pass = hash('sha512',$pass);
        $sql = "UPDATE tb_member
                SET m_email='$email',m_pass='$pass',m_status='$status',m_name='$name',m_surname='$surname',m_gender='$gender',m_tel='$tel',m_address='$address'
                WHERE m_no='$id'";
    }else{
        $sql = "UPDATE tb_member
                SET m_email='$email',m_status='$status',m_name='$name',m_surname='$surname',m_gender='$gender',m_tel='$tel',m_address='$address'
                WHERE m_no='$id'";
    }
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Change Detail Success')</script>";
        echo "<script>window.location='member_detail.php?id=$id'</script>";
    }else{
        echo "<script>alert('Change Detail Failed')</script>";
        echo "<script>window.location='member_detail.php?id=$id'</script>";
    }
    mysqli_close($conn);
?>