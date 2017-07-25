<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include_once("db.php");

	$id = $_GET['id'];
	$inv_id =$_GET["i_id"];


		$result = $conn->query("SELECT * FROM tbl_menu where m_id='$id'");


	while($rs = $result->fetch_array(MYSQLI_ASSOC))
	{

		$id = $rs["m_id"];
		$cost = $rs["price"];
		$total = $rs["price"];
    $outp = "";
		//$sql = $conn->query("INSERT INTO tbl_invoice_det (inv_id,m_id,qty,cost,total,discount) VALUES ('$inv_id','$id', '1', '$cost', '$total',0)");
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["m_name"] . '",';
    $outp .= '"NameKh":"'  . $rs["m_name_kh"] . '",';
    $outp .= '"Qty":"1",';
    $outp .= '"Price":"'  . $rs["price"] . '",';
    $outp .= '"Total":"'  . $rs["price"] . '",';
    $outp .= '"MID":"'  . $rs["m_id"] . '",';
    $outp .= '"Id":"'   . $rs["m_id"]        . '"}';
	}
  $outp ='{"records":['.$outp.']}';
   $conn->close();

   echo($outp);
?>
