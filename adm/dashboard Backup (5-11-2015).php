<?php
require_once('header.php');

//Check session
if(!isset($_SESSION['id'])) {
    echo "<script>location.href='index.php'</script>";
}

$doLogout = isset($_REQUEST['doLogout']) ? $_REQUEST['doLogout'] : "false";

if($doLogout == "true") {
    session_destroy();
    echo "<script>window.location = 'index.php';</script>";
}
?>
<div class="container">
	<div class="header-container">
		<div class="cpy-logo-small"></div>
		<div class="adm-header-title">Admin Control Panel</div>
	</div>
    <button data-toggle="modal" data-href="dashboard.php" data-target="#doLogout" style="float:right;margin-top:20px;" type="button" class="btn btn-primary btn-sm">Logout</button>
    <div class="modal fade" id="doLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">Are you sure?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="dashboard.php?doLogout=true" class="btn btn-danger btn-ok">Logout</a>
                
            </div>
        </div>
    </div>
</div>
    <div style="clear:both;"></div>
    <hr class="colorgraph">
    <div class="form-group" style="margin-top:30px;">
        <form action="" method="post">
			<h3>Type:</h3>
			<div class="select-style" style="margin-top: 10px;">
                 <select id="select-type">
					<option value="I">Ic No</option>
					<option value="C">Confirmation No</option>
				</select>
            </div>
			<div id="search1">
				<h3>Enter IC No:</h3>
				<input type="text" name="icNo" id="icNo" class="form-control input-pincode" placeholder="eg: 700101010101" autocomplete="off" maxlength="12">
			</div>
			<div id="search2" style="display:none;">
				<h3>Enter Confirmation No:</h3>
				<input type="text" name="confirmationNo" id="confirmationNo" class="form-control input-pincode" placeholder="eg: MY192481" autocomplete="off" maxlength="12">
			</div>
            <div class="row-enter" style="margin-top:20px;">
				<div class="bg-danger" id="errMsg" style="display: none;color: #e26a6a;font-size: 16px;margin-bottom:20px;"></div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <input id="btnSearch" type="button" name="Search" value="Search" class="btn btn-lg btn-success btn-block">  
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <input id="btnClear" type="button" name="Clear" value="Clear" class="btn btn-lg btn-danger btn-block">  
                </div>
            </div>
        </form>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div id="loadAct" class="spinner" style="display:none;">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;margin-top: 100px;display:block;">
				<div  id="result" class="container" style="display:none;"></div>
				<hr class="colorgraph" id="midBar" style="display: none;">
            <p class="bg-success" id="updtMsg" style="display: none;margin-top: 40px;"></p>
            <input style="display: none;margin-top: 40px;" id="btnUpdate" type="button" name="update" value="Update" class="btn btn-lg btn-primary btn-block">    
        </div>    
    </div> 
</div>

<script type="text/javascript">
    $(function(){
        $('#doLogout').on('show.bs.modal', function(e){});        
    });
</script>
<script type="text/javascript">
    /** Global Vars **/
    var gIcNo = 0;
    $(document).ready(function () {
        
        $('#icno').keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errMsg").html("Error: Only numeric values").show().fadeOut("slow");
                return false;
            }
            return true;
        });
        
        $('#btnSearch').click(function() {
            var type = $('#select-type').val();
			var bContinue = false;
			var parameter = "";
			var value = "";
			var statusColor = "";
			//Validate
			//Validate
			if(type === "I") {
				if ($.trim($('#icNo').val()) == '') {
					$('#errMsg').html("Ic No cannot be blank.").show().fadeOut(3000);
				} else {
					bContinue = true;
					value = $.trim($('#icNo').val());
					parameter = "icNo";
				}	
			} 

			if(type === "C"){
				if ($.trim($('#confirmationNo').val()) == '') {
					$('#errMsg').html("Confirmation No cannot be blank.").show().fadeOut(3000);
				} else {
					bContinue = true;
					value = $.trim($('#confirmationNo').val());
					parameter = "confirmNo";
				}
			}
			
			if(bContinue) {
				/* Just in case, hide again*/
				$('#result').html('');
				$('#result').hide();
				$('#midBar').hide();
				$('#collect').hide();
				
				$.ajax({
                    type: "POST",
                    dataType: "json", 
                    url: "api.php?sAction=getData&"+parameter+"="+value+"",
                    beforeSend: function() {
                        $('#loadAct').show();
                    },
                    success: function(response) { 
						var data = response.data;
                        if (response.statuscode == 202) {
                            $('#loadAct').hide();
                            $('#errMsg').html("Record not found. Please try again").show().fadeOut(2500);
                        } else if (response.statuscode == 200) { //data available
							$('#loadAct').hide();
							var data = response.data;
							gIcNo = data.icNo;
							var sStatus = "";
							var sPendingStatus = "";
							var sCollectedStatus = "";
							if(data.status == "N") {
								sPendingStatus = "selected";
							} else {
								sCollectedStatus = "selected";
							}
							
							$('#result').html(
								"<div class='txtTitle' style='color:#669AE1;'>Firstname:</div>"
								+"<input type='text' name='sFirstName' class='frmTxt' id='sFirstName' style='width:100%' value='"+data.firstname+"'>"
								+"<div class='txtTitle' style='color:#FECF71;'>Lastname:</div>"
								+"<input type='text' name='sLastName' class='frmTxt' id='sLastName' style='width:100%' value='"+data.lastname+"'>"
								+"<div class='txtTitle' style='color:#669AE1;'>Confirmation ID:</div>"
								+"<input type='text' name='sConfirmId' class='frmTxt' id='sConfirmId' style='width:100%' value='"+data.confirmId+"'>"
								+"<div class='txtTitle' style='color:#FECF71;'>Category:</div>"
								+"<input type='text' name='sCategory' class='frmTxt' id='sCategory' style='width:100%' value='"+data.category+"'>"
								+"<div class='txtTitle' style='color:#669AE1;'>IC No: <font style='color:#D2322D;font-size:8px;'>**uneditable field</font></div>"
								+"<input type='text' style='color:#dddddd' disabled name='sIcNo' class='frmTxt' id='sIcNo' style='width:100%' value='"+data.icNo+"'>"
								+"<div class='txtTitle' style='color:#FECF71;'>Gender:</div>"
								+"<input type='text' name='sGender' class='frmTxt' id='sGender' style='width:100%' value='"+data.gender+"'>"
								+"<div class='txtTitle' style='color:#669AE1;'>T-Shirt Size:</div>"
								+"<input type='text' name='sTshirtSize' class='frmTxt' id='sTshirtSize' style='width:100%' value='"+data.tShirtSize+"'>"
								+"<div class='txtTitle' style='color:#FECF71;'>Bib:</div>"
								+"<input type='text' name='sBib' class='frmTxt' id='sBib' style='width:100%' value='"+data.bib+"'>"
								+"<div class='txtTitle' style='color:#669AE1;'>Payment Balance(RM):</div>"
								+"<input type='text' name='sPaymentBalance' class='frmTxt' id='sPaymentBalance' style='width:100%' value='"+data.paymentBalance+"'>"
								+"<div class='txtTitle' style='color:#FECF71;'>Status:</div>"
								+"<select style='margin-top: 10px;' class='select-style' name='sStatus' id='sStatus'>"
								+" <option value='N' "+sPendingStatus+">Pending Collection</option>"
								+" <option value='Y' "+sCollectedStatus+">Collected</option>"
								+"</select>");
								
							$('#btnUpdate').show();
							$('#result').show().fadeIn("fast");
							$('#midBar').show().fadeIn("fast");
						}//End if (response.statuscode == 202) {
					}
				});//End $.ajax({
			}//End if(bContinue) {            
        });
        
        $('#btnUpdate').click(function() {
				
				var sIcNo = $.trim($('#sIcNo').val());
				var sFirstName = $.trim($('#sFirstName').val());
				var sLastName = $.trim($('#sLastName').val());
				var sCategory = $.trim($('#sCategory').val());
				var sConfirmId = $.trim($('#sConfirmId').val());
				var sGender = $.trim($('#sGender').val());
				var sTshirtSize = $.trim($('#sTshirtSize').val());
				var sBib = $.trim($('#sBib').val());
				var sPaymentBalance = $.trim($('#sPaymentBalance').val());
				var sStatus = $.trim($('#sStatus').val());
				
            $.ajax({
                    type: "POST",
                    dataType: "json", 
                    url: "api.php?sAction=updtData&icNo="+sIcNo+"&sFirstName="+sFirstName+"&sLastName="+sLastName+"&sCategory="+sCategory+"&confirmNo="+sConfirmId+"&sGender="+sGender+"&sTshirtSize="+sTshirtSize+"&sBib="+sBib+"&sPaymentBalance="+sPaymentBalance+"&sStatus="+sStatus+"",
                    beforeSend: function() {
                    },
                    success: function(response) {

								if(response.statuscode == 202) {
									 $("#updtMsg").html(response.message);
									 $("#updtMsg").show().fadeOut(3000);
								} else if(response.statuscode == 200) {
									 $("#updtMsg").html(response.message);
									 $("#updtMsg").show().fadeOut(3000);
								}
                    }
            });        
        });
        
        $('#btnClear').click(function() {
            $('#icNo').val("");
			$('#confirmationNo').val("");
            $('#result').html('');
            $('#result').hide();
            $('#midBar').hide();
            $('#btnUpdate').hide();
        });
		
		$('#select-type').on('change', function(){
			var option = $('option:selected', this);
			var val = this.value;
			$('#icNo').val("");
			$('#confirmationNo').val("");
			$('#result').html('');
            $('#result').hide();
			$('#midBar').hide();
            $('#btnUpdate').hide();
			
			if(val == "I") {
				
				$('#search2').hide();
				$('#search1').show();
			} else {
				$('#search1').hide();
				$('#search2').show();
			}
		});	
    });
</script>
<?php require_once('footer.php'); ?>


