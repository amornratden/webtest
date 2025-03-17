<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "avalons_db";

try {
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $conn->set_charset("utf8mb4");
    date_default_timezone_set("Asia/Bangkok");
} catch (Exception $e) {
    echo "Connect Fail!" . $e->getMessage();
}