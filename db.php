<?php 
require "/libs/rb.php";
$password = "";
$db = "late_rec";
$username = "root";
R::setup("mysql:host=127.0.0.1;dbname=$db", $username, $password);
$isConnected = R::testConnection();
?>