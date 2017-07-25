<?php


	$conn = new mysqli("localhost", "root", "123456", "restaurant_management_system");
  $id = $_GET["id"];
  $val = $_GET["val"];
	$result = $conn->query("UPDATE tbl_menu m SET m.order='$val' where m_id='$id'");
  //echo "UPDATE tbl_menu m SET m.order='$val' where m_id='$id'";
	$conn->close();
?>
