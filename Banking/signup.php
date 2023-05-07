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
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            max-width:30%;
        }
        .form-group label {
            width: 150px;
            padding-right: 20px;
            text-align: right;
        }
        .form-group input {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .form-group button {
            margin-left: 170px;
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
        <button class="nav-button">
            Login
        </button>
        </a>   
    </header>

    <div style="margin-top:100px; margin-left:40%">
        <h1 >Create Bank Account</h1>
        <br/>
        <br/>
        <form method="post">
            <div class="form-group">
            <label for="user_name">Full Name</label>
            <input type="text" name="user_name" id="user_name" placeholder="Full Name">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
            <button class="nav-button" type="submit">Signup</button>
            </div>
        </form>
    </div>

</body>
</html>