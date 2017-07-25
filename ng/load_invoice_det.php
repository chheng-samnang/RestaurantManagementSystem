<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include_once("db.php");

  $id = $_GET['invID'];
	$result = $conn->query("SELECT i.*,m_name,m_name_kh FROM tbl_invoice_det i INNER JOIN tbl_menu m ON i.m_id=m.m_id WHERE inv_id='$id'");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
      $outp .= '"NameKh":"'  . $rs["m_name_kh"] . '",';
      $outp .= '"Qty":"'  . $rs["qty"] . '",';
      $outp .= '"Price":"'  . $rs["cost"] . '",';
      $outp .= '"Total":"'  . $rs["total"] . '",';
      $outp .= '"MID":"'  . $rs["m_id"] . '",';
	    $outp .= '"Id":"'   . $rs["inv_det_id"]        . '"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>
