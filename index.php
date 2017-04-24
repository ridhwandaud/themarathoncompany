<?php
require_once('header.php');
?>
<!-- @todo navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top navbar-blue">

  <div class="container">

    <div class="navbar-header">
        <a class="navbar-brand" href="/">
            Coway Run
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
        <div class="col-md-12 text-center">
            <img src="images/cover-logo.png" alt="" height="300px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form class="form">
                <div class="form-group" style="padding-top:30px">
                    <label for="">Ic No/ Confirmation No</label>
                    <input type="text" class="form-control" placeholder="Ic No/Confirmation No" ng-model="runner.icno">
                    <p>Example: 891324885851</p>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" ng-click="searchRunners(runner)">Search</button>
                    <button class="btn btn-danger" ng-click="clearForm()">Clear</button>
                </div>
            </form>
        </div>
    </div> 
    
    <div style="padding-top: 50px">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Ic Number</th>
                    <th>Confirmation No</th>
                    <th>Bib number</th>
                    <th>Size</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat = "runner in runnersData">
                    <td>{{runner.f_firstname}}</td>
                    <td>{{runner.f_status}}</td>
                    <td>{{runner.f_icno}}</td>
                    <td>{{runner.f_confirm_id}}</td>
                    <td>{{runner.f_bib}}</td>
                    <td>{{runner.f_tshirt_size}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>