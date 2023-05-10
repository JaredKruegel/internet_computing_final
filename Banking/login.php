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
    <style>
        .logo{
            margin-top:20px;
            font-size: 20px;
            margin-left:10px;
        }
        .nav-wrapper{
            margin:15px;
            display: flex;
            justify-content: space-around;
        }
        .logo-wrapper{
            display: flex;
            justify-content: left;
        }
        .nav-button {
            margin-top: 20px;
            margin-right: 10px;
            background-color: blueviolet; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 16px;
          }
          .nav-button:hover {
            background-color: lightblue;
            color:black;
          }
          .nav-button:active {
            background-color: lightblue;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .splash {
            text-align: center;
            font-size: 30px;
            margin-top:150px;
        }
        .reasonsWrapper{
            display: flex;
            justify-content: center;
            padding-bottom:100px;
        }
        .reasonsToJoin{
            margin: auto 0;
            margin-top:150px;
            text-align: center;
            max-width: 50%;
        }
    </style>
</head>
<body>
    <header>
        <a class="nav-wrapper"> 
        <div class="logo-wrapper">
        <img src="https://www.pngarts.com/files/6/Blue-Bank-PNG-Image-Background.png" style="max-width:50px;"/>
        <div class="logo">
        J&J&J Bank
        </div>
        </div>
        <a href="index.php">index</a>
        </a> 
    </header>    

    <div style="margin-left:40%; margin-top:100px;">
        <h1> Login </h1>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="user_name" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit" class="nav-button"> Login </div>
        </form>
    </div>
    
</body>
</html>