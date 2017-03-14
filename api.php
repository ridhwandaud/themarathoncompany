<?php



/***

 Source API for this program

 Author: Hilmi

 Date: 08/09/2015

***/

include('connect.php');



$sAction = $_REQUEST['sAction'] ? $_REQUEST['sAction'] : "";



//Vars

$icNo = $_REQUEST['icNo'] ? $_REQUEST['icNo'] : "";

$confirmNo = $_REQUEST['confirmNo'] ? $_REQUEST['confirmNo'] : "";


/*******/

$sOnBehalf = isset($_REQUEST['sOnBehalf']) ? $_REQUEST['sOnBehalf'] : "";

$obName = isset($_REQUEST['obName']) ? $_REQUEST['obName'] : "";

$obIc = isset($_REQUEST['obIc']) ? $_REQUEST['obIc'] : "";

$obContact  = isset($_REQUEST['obContact']) ? $_REQUEST['obContact'] : "";

$sBib  = isset($_REQUEST['sBib']) ? $_REQUEST['sBib'] : "";

$sTshirtSize  = isset($_REQUEST['sTshirtSize']) ? $_REQUEST['sTshirtSize'] : "";



if(!empty($sAction)) {

    

    if($sAction == 'getData') {

        $arrData = array();

		$sql = "";

		if(!empty($icNo)) {

			$sql = "SELECT CONCAT(f_firstname,' ',f_lastname) as name,

						f_confirm_id,

                  		f_category,

						f_icno,

						f_gender,

						f_tshirt_size,

						f_bib,

						f_payment_balance,

						f_status,

						f_ob_name,

						f_ob_ic,

						f_ob_contact

					FROM dbm_marathon_users WHERE f_icno = '".$icNo."' OR f_confirm_id = '".$icNo."'" ; 

		} else if(!empty($confirmNo)) {

			$sql = "SELECT CONCAT(f_firstname,' ',f_lastname) as name,

						f_confirm_id,

				  		f_category,

						f_icno,

						f_gender,

						f_tshirt_size,

						f_bib,

						f_payment_balance,

						f_status,

						f_ob_name,

						f_ob_ic,

						f_ob_contact

					FROM dbm_marathon_users WHERE f_confirm_id = '".$confirmNo."'"; 

				

		}

		

		$query = mysql_query($sql) or exit("Sql Error".mysql_error());

		$num_rows = mysql_num_rows($query);

		

		if($num_rows > 0) {

			$arrResults = mysql_fetch_assoc($query);

			

			$string = $arrResults['f_icno'];

			$join = join('-',str_split($string,6));

			$updateIcNo = join('-',str_split($join,9));

			

			$arrData['name'] = $arrResults['name'];

         	$arrData['category'] = $arrResults['f_category'];

			$arrData['confirmId'] = $arrResults['f_confirm_id'];

			$arrData['icNo'] = $updateIcNo;

			$arrData['gender'] = $arrResults['f_gender'];

			$arrData['tShirtSize'] = $arrResults['f_tshirt_size'];

			$arrData['bib'] = $arrResults['f_bib'];

			$arrData['paymentBalance'] = $arrResults['f_payment_balance'];

			$arrData['status'] = $arrResults['f_status'];

			

			if($arrResults['f_ob_name'] == "") {

				$arrData['obName'] = $arrResults['f_bib'];

			} else {

				$arrData['obName'] = $arrResults['f_ob_name'];

			}

			

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

			if($sOnBehalf === "true") {

				$sql = "UPDATE dbm_marathon_users SET 

						f_status = 'Y',

						f_ob_name = '".$obName."',

						f_ob_ic = '".$obIc."',

						f_ob_contact = '".$obContact."',

						f_bib = '".$sBib."',

						f_tshirt_size = '".$sTshirtSize."'

						WHERE f_icno = '".$icNo."'";

				$query = mysql_query($sql) or exit("Sql Error".mysql_error());

				

				$response = array(

						"statuscode" => 200,

						"data" => "Status = 'Y' for IC No - ".$icNo."",

						"message" => "Successful"

					);

					

					$jsonOutput = json_encode($response);

					echo $jsonOutput;

			} else {

				$sql = "UPDATE dbm_marathon_users SET 

						f_status = 'Y',

						f_bib = '".$sBib."',

						f_tshirt_size = '".$sTshirtSize."'

						WHERE f_icno = '".$icNo."'";

				$query = mysql_query($sql) or exit("Sql Error".mysql_error());

				

				$response = array(

						"statuscode" => 200,

						"data" => "Status = 'Y' for IC No - ".$icNo."",

						"message" => "Successful"

					);

					

					$jsonOutput = json_encode($response);

					echo $jsonOutput;

			}	

        }    

    } else if($sAction == "rollbackData") {

        if($icNo) {

            $sql = "UPDATE dbm_marathon_subscriber SET status = 'N' WHERE ic_no = '".$icNo."'";

            $query = mysql_query($sql) or exit("Sql Error".mysql_error());

            

            $response = array(

                    "statuscode" => 200,

                    "data" => "Rollback for IC No - ".$icNo."",

                    "message" => "Successful"

                );

                

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