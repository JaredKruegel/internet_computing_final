<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($db);

$id = $_SESSION['user_id'];
$query = "select * from account where user_id ='$id' limit 1";
$result = mysqli_query($db, $query);
if($result && mysqli_num_rows($result) > 0)
{
    $account_data = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>This is the index page</h1>
    
    <br>

    <p>Hello, <?php echo $user_data['user_name']; ?></p>

    <p>Balance: <?php echo $account_data['balance'];?></p>

    <a href="deposit.php">Make a Deposit</a>
    <br>
    <a href="withdrawal.php">Make a Withdrawal</a>


</body>
</html>