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
        $query = "select * from user where user_name = '$user_name' limit 1";

        $result = mysqli_query($db, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password'] === $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: dashboard.php");
                die;
            }
        }
        echo "You must enter the correct username or password";
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
    <title>Login</title>
</head>
<body>
    
<div>
    <form method="post">
        <h3>Login</h3>
        <input type="text" name="user_name">
        <br>
        <input type="password" name="password">
        <br>

        <input type="submit" name="Login">

        <a href="signup.php">Signup</a>
    </form>
</div>
</body>
</html>