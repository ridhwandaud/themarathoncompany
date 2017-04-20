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

    include('connect.php');

    $cono = isset($_REQUEST['cono']) ? $_REQUEST['cono'] : "false";

    $sql = "SELECT * FROM dbm_marathon_users WHERE f_confirm_id = '".$cono."'";

    $query = mysql_query($sql) or exit("Sql Error".mysql_error());

    $data = mysql_fetch_assoc($query);

    echo $data;
?>
<!-- @todo navbar -->
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
        	<a href="/dashboard.php" class="btn btn-success">Single</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doLogout">Logout</button>
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

                <a href="single.php?doLogout=true" class="btn btn-primary btn-ok">Yes</a>

            </div>

        </div>

    </div>

</div>

<div class="container" ng-controller="singleCtrl">
     <div class="col-md-6">
        <div class="form-group">
            <label>Kit Collect Status</label>
            <h3>{{runner.status | statusFilter}}</h3>
                
            <form ng-if="collected == false">
                <div class="form-group">
                    <label>Collect By</label>
                    <select class="form-control form-block" id="select-type" ng-model="runner.collect" ng-change="collect(runner)">
                        <option value="self">Self</option>
                        <option value="ob">On Behalf</option>
                    </select>
                </div>
                <div ng-if="runner.collect == 'ob'">
                    <div class="form-group" >
                       <label>Collector Name</label>
                        <input type="text" ng-model="runner.collecterName" class="form-control">
                    </div> 
                    <div class="form-group" >
                       <label>Collector IC</label>
                        <input type="text" ng-model="runner.collecterIc" class="form-control">
                    </div>
                    <div class="form-group" >
                       <label>Collector Contact No</label>
                        <input type="text" ng-model="runner.collecterMobile" class="form-control">
                    </div>  
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" ng-click="collectKit(runner,collecter)">{{runner.collect | collectFilter}}</button>
                </div>
            </form>

        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" ng-model="runner.name" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" ng-model="runner.category" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Confirmation ID</label>
            <input type="text" ng-model="runner.confirmId" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>IC Number</label>
            <input type="text" ng-model="runner.icNo" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text" ng-model="runner.gender" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Tshirt Size</label>
            <input type="text" ng-model="runner.tShirtSize" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Bib Number</label>
            <input type="text" ng-model="runner.bib" class="form-control" disabled="">
        </div>
        <div class="form-group">
            <label>Payment Balance</label>
            <p>{{ runner.paymentBalance | currency : 'RM'}}</p>
        </div>
    </div>     
</div>