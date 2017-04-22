<?php

	include('connect.php');

	$data = json_decode(file_get_contents('php://input'), true);

	if($data['name'] != "")
	{
		$sql = "SELECT * FROM dbm_marathon_users WHERE f_icno = '".$data['icno']."' OR f_confirm_id = '".$data['cono']."' OR f_firstname LIKE '%".$data['name']."%'";

		$query = mysql_query($sql) or exit("Sql Error".mysql_error());

	}else if($data['icno'] != "")
	{

		$sql = "SELECT * FROM dbm_marathon_users WHERE f_icno LIKE '%".$data['icno']."' OR f_confirm_id = '".$data['cono']."'";

		$query = mysql_query($sql) or exit("Sql Error".mysql_error());

		
		
	}
	else
	{
		$sql = "SELECT * FROM dbm_marathon_users WHERE f_confirm_id = '".$data['cono']."'";

		$query = mysql_query($sql) or exit("Sql Error".mysql_error());

	}

	$num_rows = mysql_num_rows($query);

	if($num_rows > 0) {

		while ($row = mysql_fetch_assoc($query))
		{
			$datas[] = $row;
		}

		$response = array(

			"statuscode" => 200,

			"data" => $datas,

			"message" => "Successful"

		);

		$jsonOutput = json_encode($response);

		echo $jsonOutput;
	}else{
		
		$response = array(

			"statuscode" => 202,

			"data" => NULL,

			"message" => "Data not found."

		);

		

		$jsonOutput = json_encode($response);

		echo $jsonOutput;
	}

?>