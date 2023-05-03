<?php
    session_start();
    include('includes/connect.php');
    //get username, password from login
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass = hash('sha512',$pass);
    
    //4.SQL
    //$SQL = "SELECT * FROM tb_std WHERE std_user='$u_name' AND std_pass='$pass'";
    $SQL = "SELECT * FROM tb_member WHERE m_email ='".$email."' AND m_pass ='".$pass."'";

    //5.result  มีการเช็คด้วยว่ามี result หรือไม่  
    //ถ้ามี จะต้องตรงทั้ง username และ password  เช็คว่ามีหรือไม่มี ด้วยการนับจำนวนแถวที่ถูกส่งมา 
    //ถ้ามี แสดงว่าจำนวนแถวจะต้องมากกว่า0   จะใช้ตัวแปร $num
    $result = mysqli_query($conn,$SQL);
    $num = mysqli_num_rows($result);   //กำหนดตัวแปร num เพื่อนับจำนวนแถวที่พบ
    if($num==0)   //ไม่พบ
    {
        $_SESSION['login_error'] = 'Your E-mail or Password is invalid';   //เก็บข้อความ login ไม่สำเร็จ
        header( "location: login.php" );
        
    }
    else   //พบ
    {
        while($row = mysqli_fetch_array($result))
        {
            $status = $row['m_status']; //รับค่า status
            $_SESSION['m_no'] = $row['m_no'];   //เก็บไอดี
            $_SESSION['m_email'] = $row['m_email'];    //เก็บอีเมล
            $_SESSION['m_pass'] = $row['m_pass'];   //เก็บรหัสผ่าน
            $_SESSION['m_name'] = $row['m_name'];   //เก็บชื่อ
            $_SESSION['m_surname'] = $row['m_surname'];   //เก็บนามสกุล
            $_SESSION['m_gender'] = $row['m_gender'];   //เก็บเพศ
            $_SESSION['m_tel'] = $row['m_tel'];   //เก็บเบอร์โทร
            $_SESSION['m_address'] = $row['m_address'];   //เก็บที่อยู่
        }  
        if($status=="admin"){
            header( "location: admin/index.php" );    
        }elseif($status=="user"){
            header( "location: index.php" );    
        }
    }
    mysqli_close($conn);
?>