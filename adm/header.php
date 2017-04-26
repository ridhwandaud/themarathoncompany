<?php

ini_set('session.gc_maxlifetime',999999);

ini_set('session.gc_probability',1);

ini_set('session.gc_divisor',1);

$sessionCookieExpireTime=8*60*60;

session_set_cookie_params($sessionCookieExpireTime);

session_start();

error_reporting(E_ALL);

require_once('connect.php');



global $filename;

$filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');



?>



<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js">

<!--<![endif]-->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>TMC - <?php echo $filename; ?></title>

	<meta name="description" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/main.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<script src="bower_components/angular/angular.min.js"></script>

	<script src="bower_components/angular-flash-alert/dist/angular-flash.min.js"></script>
	
	<script src="js/app.js"></script>

</head>

<body ng-app="repcApp">