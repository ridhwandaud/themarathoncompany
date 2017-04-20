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

                <a href="dashboard.php?doLogout=true" class="btn btn-primary btn-ok">Yes</a>

            </div>

        </div>

    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" class="form-inline">
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="IC Number" name="IcNo">
                    </div>
                
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Confirmation Number" name="CoNo">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Search</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row" style="padding-top: 50px">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Ic No</th>
                    <th>Confirmation No</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ridhwan</td>
                    <td>Not collected</td>
                    <td>890328-08-5851</td>
                    <td>BHW 381</td>
                </tr>
                <tr>
                    <td>Sayang</td>
                    <td>Collected</td>
                    <td>890328-08-5851</td>
                    <td>BHW 381</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>