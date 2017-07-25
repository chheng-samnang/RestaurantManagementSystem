<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	$conn = new mysqli("localhost", "root", "123456", "restaurant_management_system");

	$result = $conn->query("SELECT key_data,m_name,key_data1 FROM tbl_sysdata s inner join tbl_menu m on s.key_data = m.m_id where key_type='SET'");


	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
	    $outp .= '"Id":"'   . $rs["key_data"]        . '",';
	    $outp .= '"Price":"'   . $rs["key_data1"]        . '"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>
