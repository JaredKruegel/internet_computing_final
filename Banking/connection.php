<?php 
$dbhost = "localhost";
$dbuser = "jjjbank";
$dbpassword = "jjjbankpass";
$dbname = "jjjbankdatabase";


if (!$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname))
{
    die("failed to connect to database!");
}



// $dsn = 'mysql:host=localhost;dbname=jjjbankdatabase';
// $db = new PDO ($dsn, "jjjbank", "jjjbankpass");
?>