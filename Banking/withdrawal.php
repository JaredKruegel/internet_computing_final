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
    if ($account_data['balance'] >= $_POST['amount'])
    {
        $amount = $account_data['balance'] - $_POST['amount'];
        $query = "update account set balance = $amount where user_id = '$id' and account_id = '$account_id' limit 1";
        mysqli_query($db, $query);
        header("Location: dashboard.php");
        die;
    } else 
    {
        echo "<p style='margin-left:250px'>Withdrawal amount must not be greater than the balance!</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Withdrawal</title>
</head>

    

<body>

    <header>
    <a class="nav-wrapper">
        <div class="logo-wrapper">
            <img src="https://www.pngarts.com/files/6/Blue-Bank-PNG-Image-Background.png" style="max-width:50px;" />
            <div class="logo">
                J&J&J Bank
            </div>
        </div>
        <!-- <button class="nav-button"><a href="logout.php">Logout</a></button> -->
        <a href="./logout.php"><button  class="nav-button">Logout</button></a>
        
    </a>
    </header>
    
    <div class="container" style="margin-left: 200px;">
        <div class="card-body">
            <p class="card-text"></p>
            <a href="logout.php">logout</a>
            <div class="row">
                <div class="col">
                    <label for="accountNumber">Account Number</label>
                    <input type="text" value="<?php echo $account_data['account_id']; ?>" name="accountNumber" class="form-control " readonly="" required="">
                    <label for="userName">Account Holder Name</label>
                    <input type="text" class="form-control" value="<?php echo $user_data['user_name']; ?>" readonly required>
                    <label for="balance">Account Balance</label>
                    <input type="text" class="form-control my-1" value="<?php echo $account_data['balance']; ?>" readonly="" required="">
                </div>
                <div class="col">
                    Transaction Process.
                    <form method="post">
                        <label for=""></label>
                        <input type="number" step="0.01" class="form-control my-1" name="amount" placeholder="Write Amount To Withdraw" required>

                        <button type="submit" name="withdraw" class="btn btn-success btn-bloc btn-sm my-1">Withdraw</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add sidebar for deposit option -->
    <div class="sidebar">
        <ul class="list-group">
            <li class="list-group-item active">Menu</li>
            <li class="list-group-item"><a href="dashboard.php">Home</a></li>
            <li class="list-group-item"><a href="deposit.php">Deposit</a></li>
            <li class="list-group-item"><a href="withdrawal.php">Withdrawal</a></li>
        </ul>
    </div>



</body>
</html>