<?php
$apartment = $_GET['a'];

if(isset($apartment)) {
	require_once('apartments-single.php');
} else {
	require_once('apartments-multiple.php');
}
?>