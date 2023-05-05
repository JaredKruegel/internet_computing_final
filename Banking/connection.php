<?php 
$dbhost = "";
$dbuser = "root";
$dbpassword = "";
$dbname = "internet_computing_bank";


if (!$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname))
{
    die("failed to connect to database!");
}
?>