<?php
require "functions.php";
session_destroy();
header('Location: '. $http_referer);
?>