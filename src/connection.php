<?php

$dbhost = "db";
$dbuser = "root";
$dbpass = "root";
$db = "db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die ("Connection failed: %s\n". $conn -> error);

?>