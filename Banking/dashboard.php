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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- <header>
    <div class="nav-wrapper"> 
        <div class="logo-wrapper">
            <img src="https://www.pngarts.com/files/6/Blue-Bank-PNG-Image-Background.png" style="max-width:50px;"/>
            <div class="logo">
                J&J&J Bank
            </div>
        </div>
        <button class="nav-button logo-wrapper" style="margin-left: 500px;">
            Log Out
        </button>
    </div> 
   
</header> -->

<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
        <div class="logo-wrapper">
            <img src="https://www.pngarts.com/files/6/Blue-Bank-PNG-Image-Background.png" style="max-width:50px;"/>
            <div class="logo">
                J&J&J Bank
            </div>
        </div>
        <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>


<div class="container" style="margin-left: 200px;">
        <h1>Checking Account Summary</h1>
        <h2><a href="logout.php">logout</a></h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Balance</h5>
                        <p class="card-text">$<?php echo $account_data['balance']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Number</h5>
                        <p class="card-text"><?php echo $account_data['account_id']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">  
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Type</h5>
                        <p class="card-text">Checking</p>
                    </div>
                </div>
            </div>
        </div>
        <h2>Recent Transactions</h2>
        <div class="table-responsive">
            <table class="table" id="transactionTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
            </table>
        </div>
        <h2>Bill Payments</h2>
        <div class="table-responsive">
            <table class="table" id="billPaymentsTable">
                <thead>
                    <tr>
                        <th>Payee</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Electric Company</td>
                        <td>$100.00</td>
                        <td>05/05/2023</td>
                    </tr>
                    <tr>
                        <td>Phone Company</td>
                        <td>$50.00</td> 
                        <td>05/10/2023</td>
                    </tr>
                    <tr>
                        <td>Credit Card Company</td>
                        <td>$200.00</td>
                        <td>05/15/2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="sidebar">
        <ul class="list-group">
            <li class="list-group-item active">Menu</li>
            <li class="list-group-item"><a href="#">Home</a></li>
            <li class="list-group-item"><a href="deposit.php">Deposit</a></li>
            <li class="list-group-item"><a href="home.html">Choose Accounts</a></li>
        </ul>
    </div>
</body>
</html>