<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !is_numeric($user_name) && !empty($password))
    {
        $user_id = random_num(20);

        // create user account
        $query = "insert into user (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
        mysqli_query($db, $query);

        //create account account linked to user account
        $query = "insert into account (user_id, balance) values ('$user_id', '0')";
        mysqli_query($db, $query);

        header("Location: login.php");
        die;
    } else
    {
        echo "You must enter a valid username and password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    
<div>
    <form method="post">
        <h3>Signup</h3>
        <input type="text" name="user_name">
        <br>
        <input type="password" name="password">
        <br>

        <input type="submit" name="Signup">

        <a href="login.php">Login</a>
    </form>
</div>
</body>
</html>