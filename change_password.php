<?php	
    session_start();
	include "includes/connect.php";
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $confirmpass = $_POST['confirmpassword'];
    $oldpass = hash('sha512',$oldpass);
    $newpass = hash('sha512',$newpass);
	$strSQL = "SELECT * 
               FROM tb_member 
               WHERE m_no = '".$_SESSION['m_no']."'";
	$objQuery = mysqli_query($conn,$strSQL);
    $row = mysqli_fetch_array($objQuery);
	if($row['m_pass'] != $oldpass){
		echo "<script>alert('Current Password Incorrect!')</script>";
		echo $row;
	}else{
		$sql = "UPDATE tb_member SET m_pass = '".$newpass."' WHERE m_no = '".$_SESSION['m_no']."' ";
		$result = mysqli_query($conn,$sql);
		echo "<script>alert('Change Password Success')</script>";
	}
	mysqli_close($conn);
?>