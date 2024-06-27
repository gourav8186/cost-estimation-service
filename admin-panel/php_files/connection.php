<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 0);
	session_start();

	// Local Server database connection
	$hostName 	= 'localhost:3307';
	$userName 	= 'root';
	$password 	= '';
	$dbName 	= 'ces_db';

	$connect = mysqli_connect($hostName,$userName,$password,$dbName);


	define("CHIPHER", "CESENCRYPTKEY");
	// file attachment
	require_once('ht-access-functions.php');
	require_once('url.php');
	define("SITE_TITLE", "CES");
	define('SITE_FAVICON', SITE_URL.'assets/image/common-image/fav-icon.png');
	define('SITE_LOGO', SITE_URL.'assets/image/logo.png');

?>