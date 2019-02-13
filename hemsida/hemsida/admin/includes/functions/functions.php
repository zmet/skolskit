<?php
ob_start();
session_start();
require_once("database.php");

$current_file 	= $_SERVER['SCRIPT_NAME'];
$http_referer 	= $_SERVER['HTTP_REFERER'];
$admin_id		= $_SESSION['admin_id'];
$page 			= $_GET['p'];

function loggedin() {
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])) {
		return true;
	} else {
		return false;
	}
}
function RandomPassword($e){
	for($i=0;$i<$e;$i++){
		$number =  $number . rand(0, 9);  
	}
	return $number;
}
function email($to, $subject, $body) {
	mail($to, $subject, $body, 'magr0017@student.hv.se');
}

?>