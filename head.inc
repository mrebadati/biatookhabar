<!doctype html>
<html>
	<head>
<?php require_once("database-connect.inc"); ?>
<title>
    <?php include_once("title.inc"); ?>
</title>
<?php 
require_once("warn.inc"); 
require_once("component/jdf.inc"); 
require_once("mydate.inc");
require_once("salt.inc");
require_once("paging_new.inc");
require_once("san.inc");
require_once("component/limit_text.php.inc");
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js?v=0"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/js-persian-cal.css">
<link rel="stylesheet" type="text/css" href="css/default.css">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	</head>
	<body dir="rtl" lang="FA">
		<div class="container-fluid">
			<?php include_once("menu.inc"); ?>
			<?php include_once("logo.inc"); ?>
		
