<?php require_once('header.php'); ?>



<?php

    

    $isError = false;

    $isEmptyField = false;

    if (isset($_SESSION['user']) != "")

    {   

        echo "<script>location.href='dashboard.php'</script>";

        exit;

    }

    

    if (isset($_REQUEST['Submit'])) 

    {

      if($_REQUEST['pincode'] == "")

      {

        $isEmptyField = true;

      }

      else

      {

        //Prevent sql injection

        $pincode = mysql_real_escape_string($_REQUEST['pincode']);

        $cleanPincode = addslashes($pincode);
        
        $sql1 = "SELECT pincode FROM dbm_user WHERE pincode = '".$cleanPincode."' AND access_level = '0'";

        $result = mysql_query($sql1) or exit("Sql Error".mysql_error());

        

        $num_rows = mysql_num_rows($result);

        if($num_rows > 0)

        {

            $_SESSION['user'] = session_id(); 

            session_write_close(); 

            echo "<script>location.href='dashboard.php'</script>";

            exit;

        }

        else

        {

          $isError = true;

        }

      }//End if($_REQUEST['pincode'] == "")

    }//End if (isset($_REQUEST['Submit'])) 	

?>







<div class="container">

  <div class="row" style="margin-top:20px">

    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

      <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="cpy-logo"></div>

      </div>  

      <form name="form_login" method="post" action="login.php" role="form">

        <fieldset>

          <h2>Enter PIN code</h2>

          <hr class="colorgraph">

          <div class="form-group">

            <input type="password" name="pincode" id="password" class="form-control input-pincode" placeholder="PIN" autocomplete="off">

            <?php if($isError) { ?> <div class="bg-danger">Wrong Pin Code. Please try again.</div><?php } ?>    

            <?php if($isEmptyField) { ?> <div class="bg-danger">Enter pincode to proceed.</div><?php } ?>

          </div>

          <hr class="colorgraph">

          <div class="row-enter">

            <div class="col-xs-12 col-sm-12 col-md-12">

              <input id="btn" type="submit" name="Submit" value="Enter" class="btn btn-lg btn-success btn-block">

            </div>

          </div>

        </fieldset>

      </form>

    </div>

  </div>

</div>



<?php require_once('footer.php'); ?>