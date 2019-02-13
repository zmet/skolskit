<?php
ob_start();
session_start();
require_once("database.php");

$current_file 	= $_SERVER['SCRIPT_NAME'];
$http_referer 	= $_SERVER['HTTP_REFERER'];
$user_id		= $_SESSION['user_id'];
$page 			= $_GET['p'];

function loggedin() {
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
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
ini_set("SMTP","smtp.moonmoose.zmet.se");
ini_set("smtp_port","25");
function email($to, $subject, $body) {
		$from = "admin@moonmoose.zmet.se";

	$headers  = "MIME-Version: 1.0"."\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8"."\r\n";
	$headers .= "To: ".$to."\r\n";
	$headers .= "From: ".$from.""."\r\n";
	mail($to, "=?UTF-8?B?".base64_encode($subject)."?=", $body, $header_.$headers);
}
?>