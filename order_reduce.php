<?php
ob_start();
session_start();
include 'includes/connect.php';

if(!isset($_SESSION["intLine"]))    //ถ้าบรรทัด ไม่ได้เก็บค่า
{
	 $_SESSION["intLine"] = 0; //จำนวนบรรทัด
	 $_SESSION["strProductID"][0] = $_GET["id"];   //รหัสสินค้า
	 $_SESSION["strQty"][0] = 1;                   //จำนวนสินค้า
	 header("location:cart.php");
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["strProductID"]);
	if((string)$key != "")//ถ้าเพิ่มสินค้าที่มีอยู่แล้ว จำนวน +1
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] - 1; 
	}
	else
	{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	 header("location:cart.php");
}
mysqli_close($conn);
?>