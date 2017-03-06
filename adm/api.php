<?php

/***
 Source API for this program
 Author: Hilmi
 Date: 08/09/2015
***/
include('connect.php');

$sAction = $_REQUEST['sAction'] ? $_REQUEST['sAction'] : "";

//Vars
$icNo = isset($_REQUEST['icNo']) ? $_REQUEST['icNo'] : "";
$confirmNo = isset($_REQUEST['confirmNo']) ? $_REQUEST['confirmNo'] : "";
$sFirstName = isset($_REQUEST['sFirstName']) ? $_REQUEST['sFirstName'] : "";
$sLastName = isset($_REQUEST['sLastName']) ? $_REQUEST['sLastName'] : "";
$sCategory = isset($_REQUEST['sCategory']) ? $_REQUEST['sCategory'] : "";
$sGender = isset($_REQUEST['sGender']) ? $_REQUEST['sGender'] : "";
$sTshirtSize = isset($_REQUEST['sTshirtSize']) ? $_REQUEST['sTshirtSize'] : "";
$sBib = isset($_REQUEST['sBib']) ? $_REQUEST['sBib'] : "";
$sPaymentBalance = isset($_REQUEST['sPaymentBalance']) ? $_REQUEST['sPaymentBalance'] : "";
$sStatus = isset($_REQUEST['sStatus']) ? $_REQUEST['sStatus'] : "";
$obName = isset($_REQUEST['obName']) ? $_REQUEST['obName'] : "";
$obIc = isset($_REQUEST['obIc']) ? $_REQUEST['obIc'] : "";
$obContact  = isset($_REQUEST['obContact']) ? $_REQUEST['obContact'] : "";

if(!empty($sAction)) {
    
    if($sAction == 'getData') {
		$arrData = array();
		
		if(!empty($icNo)) {
			$sql = "SELECT * FROM dbm_marathon_users WHERE f_icNo = '".$icNo."'"; 
		}

		if(!empty($confirmNo)) {
			$sql = "SELECT * FROM dbm_marathon_users WHERE f_confirm_id = '".$confirmNo."'"; 
		}		
   
		$query = mysql_query($sql) or exit("Sql Error".mysql_error());
		$num_rows = mysql_num_rows($query);
		
		if($num_rows > 0) {
			$arrResults = mysql_fetch_assoc($query);

			$arrData['firstname'] = $arrResults['f_firstname'];
			$arrData['lastname'] = $arrResults['f_lastname'];
			$arrData['confirmId'] = $arrResults['f_confirm_id'];
			$arrData['category'] = $arrResults['f_category'];
			$arrData['icNo'] = $arrResults['f_icno'];
			$arrData['gender'] = $arrResults['f_gender'];
			$arrData['tShirtSize'] = $arrResults['f_tshirt_size'];
			$arrData['bib'] = $arrResults['f_bib'];
			$arrData['paymentBalance'] = $arrResults['f_payment_balance'];
			$arrData['status'] = $arrResults['f_status'];
			$arrData['obName'] = $arrResults['f_ob_name'];
			$arrData['obIc'] = $arrResults['f_ob_ic'];
			$arrData['obContact'] = $arrResults['f_ob_contact'];

			$response = array(
				"statuscode" => 200,
				"data" => $arrData,
				"message" => "Successful"
			);
			
			$jsonOutput = json_encode($response);
			echo $jsonOutput;
			
		} else {
			$response = array(
				"statuscode" => 202,
				"data" => NULL,
				"message" => "Data not found."
			);
			
			$jsonOutput = json_encode($response);
			echo $jsonOutput;
		}    
        
    } else if($sAction == "updtData") {
        if($icNo) {
            $sql = "UPDATE dbm_marathon_users SET
								f_firstname = '$sFirstName',
								f_lastname = '$sLastName',
								f_category = '$sCategory',
								f_confirm_id = '$confirmNo',
								f_gender = '$sGender',
								f_tshirt_size = '$sTshirtSize',
								f_bib = '$sBib',
								f_payment_balance = '$sPaymentBalance',
								f_status = '$sStatus',
								f_ob_name = '$obName',
								f_ob_ic = '$obIc',
								f_ob_contact = '$obContact'
						  WHERE f_icno = '".$icNo."'";
            $query = mysql_query($sql) or exit("Sql Error".mysql_error());
            
				if(mysql_affected_rows() > 0) {
					 $response = array(
                    "statuscode" => 200,
                    "data" => "Successfully updated ".mysql_affected_rows()."",
                    "message" => "Record has been successfully updated"
					 );
				} else {
					 $response = array(
                    "statuscode" => 202,
                    "data" => "",
                    "message" => "No record updated"
					 );
				}
				
            $jsonOutput = json_encode($response);
            echo $jsonOutput;
        }    
    } else {
        
        $response = array(
            "statuscode" => 201,
            "data" => NULL,
            "message" => "Unable to identify action"
        );
        
        $jsonOutput = json_encode($response);
        echo $jsonOutput;
    }    
    
} else {
   
   $response = array(
        "statuscode" => 201,
        "data" => NULL,
        "message" => "No action performed"
   );
   
   $jsonOutput = json_encode($response);
   echo $jsonOutput;
}    

?>