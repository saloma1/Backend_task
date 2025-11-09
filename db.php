<?php
$host="localhost";
$username="root";
$password="";
$dbname="attendance_db";

$conn= new mysqli($host, $username, $password, $dbname);
if($conn->connect_error) {
    die("ERROR!! could not connect: " .$conn->connect_error);
}
?>