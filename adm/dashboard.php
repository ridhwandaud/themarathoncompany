<?php
require_once('header.php');

//Check session
if(!isset($_SESSION['admin'])) {
    echo "<script>location.href='index.php'</script>";
}

$doLogout = isset($_REQUEST['doLogout']) ? $_REQUEST['doLogout'] : "false";

if($doLogout == "true") {
    session_destroy();
    echo "<script>window.location = 'index.php';</script>";
}
?>
    
<nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            TMC
        </a>
    </div>

    <div id="navbar" class="collapse navbar-collapse">
        <form class="navbar-form navbar-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#doLogout">Logout</button>
        </form>
    </div>

  </div>

</nav>

<div class="modal fade" id="doLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <div class="modal-body">Are you sure to logout?</div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                <a href="dashboard.php?doLogout=true" class="btn btn-primary btn-ok">Yes</a>

            </div>

        </div>

    </div>

</div>



<div class="container" ng-controller="dashboardCtrl">
    <flash-message></flash-message> 
    <div class="col-md-6 col-md-push-6">
        <form name="searchForm" ng-submit="checkForm(searchForm.$invalid)">
            <div class="col-md-12 text-center">
                <img src="/images/icewatchlogo.gif">
            </div>    
            <hr class="colorgraph">      
            <div class="form-group" ng-if="showIc == true">
        		<label>Enter IC No or Confirmation No:</label>
        		<input type="text" ng-model="runner.search" class="form-control" placeholder="eg: 700101010101" autocomplete="off" maxlength="30" >
        	</div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-success" ng-show="successMessage">{{successMessage}}</p>
                    <p class="text-danger" ng-show="errorMessage">{{errorMessage}}</p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6" >
                  <input zid="btnSearch" type="submit" name="Search" value="Search" class="btn btn-lg btn-success btn-block" ng-click="search(runner)">  
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <input id="btnClear" type="button" name="Clear" value="Clear" class="btn btn-lg btn-danger btn-block">  
                </div>
            </div>  
        </form> 
    </div>
    <hr class="visible-xs">
    <div class="col-md-6 col-md-pull-6">
        <div class="form-group">
            <label for="">Status</label>
            <select name="" id="" class="form-control" ng-model="runner.status">
                <option value="Y">Collected</option>
                <option value="N">Not Collected</option>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" ng-model="runner.firstname" class="form-control">
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" ng-model="runner.category" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirmation ID</label>
            <input type="text" ng-model="runner.confirmId" class="form-control">
        </div>
        <div class="form-group">
            <label>IC Number (*uneditable)</label>
            <input type="text" ng-model="runner.icNo" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text" ng-model="runner.gender" class="form-control">
        </div>
        <div class="form-group">
            <label>Tshirt Size</label>
            <input type="text" ng-model="runner.tShirtSize" class="form-control">
        </div>
        <div class="form-group">
            <label>Bib Number</label>
            <input type="text" ng-model="runner.bib" class="form-control">
        </div>
        <div class="form-group">
            <label>Payment Balance</label>
            <!-- <p>{{ runner.paymentBalance | currency : 'RM'}}</p> -->
            <input type="text" ng-model="runner.paymentBalance" class="form-control">
        </div>
        <div class="form-group" >
           <label>Collector Name</label>
            <input type="text" ng-model="runner.obName" class="form-control">
        </div> 
        <div class="form-group" >
           <label>Collector IC</label>
            <input type="text" ng-model="runner.obIc" class="form-control">
        </div>
        <div class="form-group" >
           <label>Collector Contact No</label>
            <input type="text" ng-model="runner.obContact" class="form-control">
        </div> 
    </div>     
</div>

<script type="text/javascript">
    $(function(){
        $('#doLogout').on('show.bs.modal', function(e){});        
    });
</script>


<!-- @todo send js to it file maybe try angular js-->
<script type="text/javascript">
    /** Global Vars **/
    var gIcNo = 0;
    $(document).ready(function () {

        $(document).keypress(function(e) {
            if(e.which == 13) {
                clickOrEnter(); 
            }
        });

        $('#btnSearch').click(function() {
          
          clickOrEnter();   

        });
        
        $('#icno').keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errMsg").html("Error: Only numeric values").show().fadeOut("slow");
                return false;
            }
            return true;
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

                            console.log(data);                       
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
		
    });
</script>
<?php require_once('footer.php'); ?>

