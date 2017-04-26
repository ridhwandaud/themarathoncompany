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
	
	//Make sure no empty file being uploaded
	if ($_FILES['filename']['name'] !== "" ) {
		//Make sure only csv file is being uploaded
		//$type = explode(".",$_FILES['file']['name']);
		//if(strtolower(end($type)) == 'csv'){
			if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
				echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
				echo "<h2>Displaying contents:</h2>";
				echo "<pre>";
				readfile($_FILES['filename']['tmp_name']);
				echo "</pre>";
				echo "<br/>";
			}

			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			$data = array();
			while (($rawData = fgetcsv($handle, 100000, ",")) !== FALSE) {
				//$import = "INSERT into dbm_marathon_subscriber(ic_no,name,address_1,address_2,age,status,confirm_id) 
				//		   VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
				
				//Make sure we clean any 
				/*$data[0] = str_replace("'","",$rawData[0]);
				$data[1] = str_replace("'","",$rawData[1]);
				$data[2] = str_replace("'","",$rawData[2]);
				$data[3] = str_replace("'","",$rawData[3]);
				$data[4] = str_replace("'","",$rawData[4]);
				$data[5] = str_replace("'","",$rawData[5]);
				$data[6] = str_replace("'","",$rawData[6]);
				$data[7] = str_replace("'","",$rawData[7]);
				$data[8] = str_replace("'","",$rawData[8]);
				$data[9] = str_replace("'","",$rawData[9]);*/
				
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
				
				$import = "INSERT INTO dbm_marathon_users(f_confirm_id,f_category,f_firstname,f_lastname,f_icno,f_gender,f_tshirt_size,f_bib,f_payment_balance,f_status) VALUES
							('$data[0]','$data[1]','$sFirstname','$sLastName','$data[4]','$sGender','$data[6]','$data[7]','$data[8]','$data[9]')";
				mysql_query($import) or die(mysql_error());
			}
			
			fclose($handle);
			print "Import done";
		//} else {
			//print "Invalid file format!. Please upload CSV format.";
		//}
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