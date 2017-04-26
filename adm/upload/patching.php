<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TMC Upload page</title>
<style type="text/css">
body {
	background: #E3F4FC;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #2b2b2b;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
a:hover {
	color:#CC0033;
}

h1 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #CC0033;
}
h2 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #898989;
}
#container {
	background: #CCC;
	margin: 100px auto;
	width: 945px;
}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
</head>
<body>
<div id="container">
<div id="form">

<?php

require_once('../connect.php');

//Upload File
if (isset($_POST['submit'])) {
	
	$total_success_upload = 0;
	$total_unsuccessful_upload = 0;
	$arrUnsuccessUpload = array();
	$count = 0;
	//Make sure no empty file being uploaded
	if ($_FILES['filename']['name'] !== "" ) {

		$handle = fopen($_FILES['filename']['tmp_name'], "r");
		$data = array();
		while (($rawData = fgetcsv($handle, 100000, ",")) !== FALSE) {
			
			
			$data[0] = mysql_real_escape_string($rawData[0]);
			$data[1] = mysql_real_escape_string($rawData[1]);
			$data[2] = mysql_real_escape_string($rawData[2]);
			$data[3] = mysql_real_escape_string($rawData[3]);
			$data[4] = mysql_real_escape_string($rawData[4]);
			$data[5] = mysql_real_escape_string($rawData[5]);
			$data[6] = mysql_real_escape_string($rawData[6]);
			$data[7] = mysql_real_escape_string($rawData[7]);
			$data[8] = mysql_real_escape_string($rawData[8]);
			$data[9] = mysql_real_escape_string($rawData[9]);
			
			$sFirstname = strtoupper($data[2]);
			$sLastName = strtoupper($data[3]);
			$sGender = strtolower($data[5]);
			
			
			//Check if data exists
			$query = mysql_query("SELECT f_icno FROM dbm_marathon_users WHERE f_icno = '".$data[4]."'");
			$num = mysql_num_rows($query);
			
			if($num > 0) {

				$arrUnsuccessUpload[] = "'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]'";
				$total_unsuccessful_upload++;
			} else {
				$import = "INSERT INTO dbm_marathon_users(f_confirm_id,f_category,f_firstname,f_lastname,f_icno,f_gender,f_tshirt_size,f_bib,f_payment_balance,f_status) VALUES
						('$data[0]','$data[1]','$sFirstname','$sLastName','$data[4]','$sGender','$data[6]','$data[7]','$data[8]','$data[9]')";
				mysql_query($import) or die(mysql_error());
				$total_success_upload++;
			}
			
			$count++;
		}	
		fclose($handle);
		
		echo "<center><a href='patching.php' style='color:blue;'>-- (Done) --</a></center>";
		echo "<br/><br/>";
		echo "<h2>Total Successful Upload: <b>".$total_success_upload."</h2></b>";
		echo "<br/>";
		echo "<h2>Total Unsuccessful Upload: <b>".$total_unsuccessful_upload."</h2></b>";
		echo "<br/>";
		
		if($total_unsuccessful_upload > 0) {
				print "List of unsuccessful data (duplicate/data already exists in Database): </br></br>";
			foreach($arrUnsuccessUpload as $key=>$val) {
				print "<div style='width:100%;text-align:left;display:block;color:red;margin-bottom:5px;font-size:10px;'><b>".$val."</b></div>";
			}
		}
	} else {
		print "File not found.";
	}
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='patching.php' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";

}

?>

</div>
</div>
</body>
</html>