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