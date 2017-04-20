<?php

	include('connect.php');

	$data = json_decode(file_get_contents('php://input'), true);

	if($data['name'] != "")
	{
		$sql = "SELECT * FROM dbm_marathon_users WHERE f_icno = '".$data['icno']."' OR f_confirm_id = '".$data['cono']."' OR f_firstname LIKE '%".$data['name']."%'";

		$query = mysql_query($sql) or exit("Sql Error".mysql_error());

		$num_rows = mysql_num_rows($query);

		while ($row = mysql_fetch_assoc($query))
		{
			$datas[] = $row;
		}

		$jsonOutput = json_encode($datas);

		echo $jsonOutput;

	}else{

		$sql = "SELECT * FROM dbm_marathon_users WHERE f_icno LIKE '%".$data['icno']."' OR f_confirm_id LIKE '".$data['cono']."'";

		$query = mysql_query($sql) or exit("Sql Error".mysql_error());

		$num_rows = mysql_num_rows($query);

		while ($row = mysql_fetch_assoc($query))
		{
			$datas[] = $row;
		}

		$jsonOutput = json_encode($datas);

		echo $jsonOutput;
	}
	

?>