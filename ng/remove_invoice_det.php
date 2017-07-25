<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	$conn = new mysqli("localhost", "root", "123456", "restaurant_management_system");

  $id = $_GET["id"];
	$result = $conn->query("DELETE FROM tbl_invoice_det WHERE inv_id='$id'");

	$conn->close();
?>
