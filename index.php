<?php
require_once('header.php');
?>
<!-- @todo navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top navbar-blue">

  <div class="container">

    <div class="navbar-header">
        <a class="navbar-brand" href="/">
            Coway Run 2017 Registration Status
        </a>
    </div>

  </div>

</nav>

<div class="modal fade" id="doLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <div class="modal-body">Are you sure to logout?</div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                <a href="all.php?doLogout=true" class="btn btn-primary btn-ok">Yes</a>

            </div>

        </div>

    </div>

</div>


<div class="container" ng-controller="publicCtrl">
    <flash-message></flash-message>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <center><img src="images/cover-logo.png" alt="" style="max-height: 250px" class="img-responsive"></center>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <form class="form">
                <div class="form-group" style="padding-top:30px">
                    <label for="">Ic No / Confirmation No</label>
                    <input type="text" class="form-control" placeholder="Ic No / Confirmation No" ng-model="runner.icno">
                    <p>Example: 891324885851 (Ic No)</p>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" ng-click="searchRunners(runner)">Search</button>
                    <button class="btn btn-danger" ng-click="clearForm()">Clear</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row hidden-md hidden-lg">
        
        <div class="col-md-4 col-md-offset-4" ng-repeat="runner in runnersData">
            <hr>
            <div class="form-group">
                <label>Name</label>
                <p class="form-control">{{runner.f_firstname}}</p>
            </div>
            <div class="form-group">
                <label>Bib Number</label>
                <p class="form-control">{{runner.f_bib}}</p>
            </div>
            <div class="form-group">
                <label>Tshirt Size</label>
                <p class="form-control">{{runner.f_tshirt_size}}</p>
            </div>
            <div class="form-group">
                <label>Confirmation ID</label>
                <p class="form-control">{{runner.f_confirm_id}}</p>
            </div>
            <div class="form-group">
                <label>IC Number</label>
                <p class="form-control">{{runner.f_icno}}</p>
            </div>
        </div>
    </div> 
    
    <div class="hidden-sm hidden-xs" style="padding-top: 50px" ng-show="runners">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Ic Number</th>
                        <th>Confirmation No</th>
                        <th>Bib number</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat = "runner in runnersData">
                        <td>{{runner.f_firstname}}</td>
                        <td>{{runner.f_icno}}</td>
                        <td>{{runner.f_confirm_id}}</td>
                        <td>{{runner.f_bib}}</td>
                        <td>{{runner.f_tshirt_size}}</td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>

    <div class="row">
        
    </div>
</div>