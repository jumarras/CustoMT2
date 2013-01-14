<?php
ini_set('display_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set('error_log', dirname(__FILE__).'/error.log');
if(file_exists('install.php')){
	include_once('install.php');
}
else{
	include_once 'config.php';
	include_once 'mysql.con.php';
	include_once 'includes/general.functions.php';
	IncludeLang('spanish');
	if(!empty($_GET['page']) && @file_get_contents('includes/pages/'.$_GET['page'].'.php'))
		include_once('includes/pages/'.$_GET['page'].'.php');
	else
		include_once('includes/pages/home.php');
	echo Template('base');
}
?>
