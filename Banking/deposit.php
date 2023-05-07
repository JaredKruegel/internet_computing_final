<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($db);
$id = $_SESSION['user_id'];

$query = "select * from account where user_id = '$id' limit 1";
$result = mysqli_query($db, $query);
if($result && mysqli_num_rows($result) > 0)
{
    $account_data = mysqli_fetch_assoc($result);
}
$account_id = $account_data['account_id'];;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $amount = $_POST['amount'] + $account_data['balance'];
    $query = "update account set balance = $amount where user_id = '$id' and account_id = '$account_id' limit 1";
    mysqli_query($db, $query);
    header("Location: dashboard.php");
    die;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
</head>
<body>
    <h1>Make a Deposit</h1>
    <p>Balance: <?php echo $account_data['balance'];?></p>
    
    <form method="post">
    <input type="number" step="0.01" name="amount" placeholder="$" required>
    <input type="submit" name="Deposit">
    </form>
</body>
</html>