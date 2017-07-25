<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include_once("db.php");

	$id = $_GET['cid'];
	if($id!=""&&$id!="all")
	{
		$result = $conn->query("SELECT m_id,m_name,img,price,m_name_kh,m.cat_id FROM tbl_menu m ORDER BY m.order");
	}else
	{
		$result = $conn->query("SELECT m_id,m_name,img,price,m_name_kh,m.cat_id FROM tbl_menu m ORDER BY m.order");
	}

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
	    $outp .= '"Id":"'   . $rs["m_id"]        . '",';
	    $outp .= '"Price":"'   . (int)$rs["price"]        . '",';
      $outp .= '"NameKh":"'  . $rs["m_name_kh"] . '",';
      $outp .= '"Category":"'  . $rs["cat_id"] . '",';
	    $outp .= '"Img":"'   . $rs["img"]        . '"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>
