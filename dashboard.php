<?php
require_once('header.php');

//Check session
if(!isset($_SESSION['user'])) {
    echo "<script>location.href='index.php'</script>";
}

$doLogout = isset($_REQUEST['doLogout']) ? $_REQUEST['doLogout'] : "false";

if($doLogout == "true") {
    session_destroy();
    echo "<script>window.location = 'index.php';</script>";
}
?>


<!-- @todo navbar -->
<div class="cpy-logo-small" style="margin-top:10px;"></div>
<button data-toggle="modal" data-href="dashboard.php" data-target="#doLogout" style="float:right;margin-top:20px;" type="button" class="btn btn-primary btn-sm">Logout</button>
<div class="modal fade" id="doLogout" tab="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<hr class="colorgraph">

<div class="container">
    <div class="form-group">
		<label>Type:</label>

         <select class="form-control form-block input-lg" id="select-type">
			<option value="I">Ic No</option>
			<option value="C">Confirmation No</option>
		</select>
    </div>        
    <div class="form-group" id="search1">
		<label>Enter IC No:</label>
		<input type="text" name="icNo" id="icNo" class="form-control input-lg" placeholder="eg: 700101010101" autocomplete="off" maxlength="30" >
		
	</div>
	<div id="search2" class="form-group none">
		<label>Enter Confirmation No:</label>
		<input type="text" name="confirmationNo" id="confirmationNo" class="form-control input-lg" placeholder="eg: MY192481" autocomplete="off" maxlength="40" >
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-danger btn-danger-custom" id="errMsg"></div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <input id="btnSearch" type="submit" name="Search" value="Search" class="btn btn-lg btn-success btn-block">  
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <input id="btnClear" type="button" name="Clear" value="Clear" class="btn btn-lg btn-danger btn-block">  
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div id="loadAct" class="spinner" style="display:none;">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
        
        <!-- @todo fix styling -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 100px;display:block;">
        <hr class="colorgraph" id="midBar" style="display: none;">
        <p class="bg-success" id="updtMsg" style="display: none;margin-top: 40px;">Record has been successfully updated.</p>
        <div id="result" class="detailContrainer" style="display:none;"></div>
        <div id="colSelf" style="display:none;">
			<input style="margin-top: 40px;" id="collect" type="button" name="Collect" value="Collect Now" class="btn btn-lg btn-primary btn-block"> 
		</div>
		<div id="colOnbehalf" style="display:none;">
			<div style='margin-top:30px;'></div>
			<div class='txtTitle' style='color:#262829;font-size:13px;'>OB Name:</div>
			<input type='text' name='sLastName' class='frmTxt' id='obName' style='width:100%;color:#1B6C87;height:25px;'>
			<div class='txtTitle' style='color:#262829;font-size:13px;'>OB IC:</div>
			<input type='text' name='sLastName' class='frmTxt' id='obIc' style='width:100%;color:#1B6C87;height:25px;'>
			<div class='txtTitle' style='color:#262829;font-size:13px;'>OB Contact No:</div>
			<input type='text' name='sLastName' class='frmTxt' id='obContact' style='width:100%;color:#1B6C87;height:25px;'>
			<p class="bg-success" id="errorMsg" style="display: none;margin-top: 5px;color:red">Please check the required fields.</p>
			<input style="margin-top: 40px;" id="collect2" type="button" name="Collect2" value="Collect On Behalf" class="btn btn-lg btn-primary btn-block"> 			
		</div>
	</div>    
</div>

<script type="text/javascript">
    $(function(){
        $('#doLogout').on('show.bs.modal', function(e){});        
    });
</script>


<!-- @todo send js to it file -->
<script type="text/javascript">
    /** Global Vars **/
    var gIcNo = 0;
    $(document).ready(function () {

        $(document).keypress(function(e) {
            if(e.which == 13) {
                clickOrEnter(); 
            }
        });
        
        $('#icno').keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errMsg").html("Error: Only numeric values").show().fadeOut("slow");
                return false;
            }
            return true;
        });
        
        $('#btnSearch').click(function() {
		  
          clickOrEnter();	

        });

        function clickOrEnter() {

            var type = $('#select-type').val();
            var bContinue = false;
            var parameter = "";
            var value = "";
            var statusColor = "";
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
                $('#colSelf').hide();
                
                $.ajax({
                    type: "POST",
                    dataType: "json", 
                    url: "api.php?sAction=getData&"+parameter+"="+value+"",
                    beforeSend: function() {
                        $('#loadAct').show();
                    },
                    success: function(response) {    
                        var data = response.data;
                        var sStatus = "";
                        if (response.statuscode == 202) {
                            $('#loadAct').hide();
                            $('#errMsg').html("Record not found. Please try again").show().fadeOut(2500);
                        } else if (response.statuscode == 200) { //data available
                            $('#loadAct').hide();
                            var data = response.data;
                            gIcNo = data.icNo;
                            if(data.status == "N") {
                                statusColor = "#b78006;";
                                sStatus = "Pending Collection";
                                $('#colSelf').show();
                                $('#result').html(
                            "<h3 style='color:#62C2E4;'>"+data.name+"</h3>"
                            +"<h4 style='margin-top: 20px;color: #F0776C;'>"+data.category+"</h4>"
                            +"<h1 style='margin-top: 40px;'><b>Confirmation ID:</b> "+data.confirmId+"</h1>"
                            +"<h1 style='margin-top: 5px;'><b>IC No:</b> "+data.icNo+"</h1>"
                            +"<h5 style='margin-top: 5px;'><b>Gender:</b> "+data.gender+"</h4>"
                            +"<h1 style='margin-top: 5px;'><b style='float:left;line-height:30px'>T-Shirt Size:</b><input type='text' name='sBib' class='frmTxt2' id='sTshirtSize' value='"+data.tShirtSize+"' style='margin-left:10px;width:50%;color:#1B6C87;height:50px;background:none;float:left;font-size: 40px;'></h1>"
                            +"<div style='clear:both;margin-bottom:0px;'></div>"
                            +"<h1 style='margin-top: 5px;'><b style='float:left;line-height:30px'>Bib:</b><input type='text' name='sBib' class='frmTxt2' id='sBib' value='"+data.bib+"' style='margin-left:10px;width:50%;color:#1B6C87;height:50px;background:none;float:left;font-size: 40px'></h1>"
                            +"<div style='clear:both;'></div>"
                            +"<h5 style='margin-top: 5px;'><b>Payment Bal:</b> RM "+data.paymentBalance+"</h5>"
                            +"<h1 id='txtCollectStatus' style='margin-top: 5px;'><b>Status:</b> <span style='color: "+statusColor+"'>"+sStatus+"</span></h1>"
                            +"<h5 style='margin-top: 5px;' id='collectByStatus'><b>Collect By:</b><select style='margin-top: 10px;width:40%;margin-left:10px;' class='select-style' name='sCollectType' id='sCollectType'>"
                            +" <option value='S'>Self</option>"
                            +" <option value='B'>On Behalf</option>"
                            +"</select></h5>");
                            } else {
                                statusColor = "#04B431;";
                                sStatus = "Collected";
                                $('#result').html(
                                    "<h3 style='color:#62C2E4;'>"+data.name+"</h3>"
                                    +"<h4 style='margin-top: 20px;color: #F0776C;'>"+data.category+"</h4>"
                                    +"<h1 style='margin-top: 40px;'><b>Confirmation ID:</b> "+data.confirmId+"</h1>"
                                    +"<h1 style='margin-top: 5px;'><b>IC No:</b> "+data.icNo+"</h1>"
                                    +"<h5 style='margin-top: 5px;'><b>Gender:</b> "+data.gender+"</h4>"
                                    +"<h1 style='margin-top: 5px;'><b>T-Shirt Size:</b> "+data.tShirtSize+"</h1>"
                                    +"<h1 style='margin-top: 5px;'><b>Bib:</b> "+data.bib+"</h1>"
                                    +"<h5 style='margin-top: 5px;'><b>Payment Bal:</b> RM "+data.paymentBalance+"</h5>"
                                    +"<h1 id='txtCollectStatus' style='margin-top: 5px;'><b>Status:</b> <span style='color: "+statusColor+"'>"+sStatus+"</span></h1>"
                                    +"<h5 style='margin-top: 5px;'><b>O/B Name:</b> "+data.obName+"</h5>"
                                    +"<h5 style='margin-top: 5px;'><b>O/B IC:</b> "+data.obIc+"</h5>"
                                    +"<h5 style='margin-top: 5px;'><b>O/B Contact:</b> "+data.obContact+"</h5>"
                                    );
                            }
                                    
                            $('#result').show().fadeIn("fast");
                            $('#midBar').show().fadeIn("fast");
                        }
                    }
                }); //End $.ajax({
            }//End if(bContinue)
        
        }
		
		
		$(document).on('change', '#sCollectType', function() {
			var val = this.value;
			
			if (val === 'B') {
				$("#colSelf").hide();
				$("#colOnbehalf").show();
			} else {
				$("#colSelf").show();
				$("#colOnbehalf").hide();
			}
			
		});

		$('#collect2').click(function() {
			
			
			var obName = $.trim($('#obName').val());
			var obIc = $.trim($('#obIc').val());
			var obContact = $.trim($('#obContact').val());
            var sBib = $.trim($('#sBib').val());
			var sTshirtSize = $.trim($('#sTshirtSize').val());
			
			if(obName == "" || obIc == "" || obContact == "") {
				$('#errorMsg').show().fadeOut(1500);
			} else {
				//Convert back to db format without dash ("-")
				var clean1 = gIcNo.replace("-","");
				var icNo = clean1.replace("-","");
				$.ajax({
						type: "POST",
						dataType: "json", 
						url: "api.php?sAction=updtData&sOnBehalf=true&obName="+obName+"&obIc="+obIc+"&obContact="+obContact+"&s&icNo="+icNo+"&sBib="+sBib+"&sTshirtSize="+sTshirtSize,
						beforeSend: function() {
							$('#colOnbehalf').hide();
						},
						success: function(response) {
							var data = response.data;
							$('#txtCollectStatus').html('Status  : <span style="color: #54a341">Collected</span>');
							$("#updtMsg").show().fadeOut(3000);
							$("#sCollectType").hide();
							$("#collectByStatus").hide();
						}
				});  
			}
        });	
		
        $('#collect').click(function() {
			
			//Convert back to db format without dash ("-")
			var clean1 = gIcNo.replace("-","");
			var icNo = clean1.replace("-","");
			var sBib = $.trim($('#sBib').val());
			var sTshirtSize = $.trim($('#sTshirtSize').val());
            $.ajax({
                    type: "POST",
                    dataType: "json", 
                    url: "api.php?sAction=updtData&icNo="+icNo+"&sBib="+sBib+"&sTshirtSize="+sTshirtSize,
                    beforeSend: function() {
                        $('#colSelf').hide();
                    },
                    success: function(response) {
                        var data = response.data;
                        $('#txtCollectStatus').html('Status  : <span style="color: #54a341">Collected</span>');
                        $("#updtMsg").show().fadeOut(3000);
						$("#sCollectType").hide();
						$("#collectByStatus").hide();
                    }
            });        
        });
		
        $('#btnClear').click(function() {
            $('#icNo').val("");
			$('#confirmationNo').val("");
            $('#result').html('');
            $('#result').hide();
            $('#midBar').hide();
            $('#colSelf').hide();
        });
		
		$('#select-type').on('change', function(){
			var option = $('option:selected', this);
			var val = this.value;
			
			if(val == "I") {
				$('#icNo').val('');
				$('#search2').hide();
				$('#search1').show();
			} else {
				$('#confirmationNo').val('');
				$('#search1').hide();
				$('#search2').show();
			}
		});
    });
</script>
<?php require_once('footer.php'); ?>

