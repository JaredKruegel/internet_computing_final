<!DOCTYPE html>
<head> 
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
<header>
    <div class="nav-wrapper"> 
    <div class="logo-wrapper">
    <img src="https://www.pngarts.com/files/6/Blue-Bank-PNG-Image-Background.png" style="max-width:50px;"/>
    <div class="logo">
    J&J&J Bank
    </div>
    </div>
    <a href="./login.php">
    <button  class="nav-button">
        Login
    </button>
    </a> 
    </div>
   
</header>
<body>

<div class="splash">
Your money, our priority. Bank with us today.
<br/>
<br/>
<br/>
<a href="./signup.php">
<button class="nav-button" >
    Create account
</button>
</a>
</div>
<div class="reasonsWrapper">
<div class="reasonsToJoin">

<h1 style="margin:50px;"> Why join ?</h1>
<br/>
<h2> We're All About Family </h2> At J&J&J Bank, we believe that family comes first. That's why we offer special rates and discounts for families with multiple accounts, as well as free financial planning consultations to help you plan for your family's future.
<br/>
<h2 style="margin:50px;"> Innovative Banking Solutions  </h2>
At J&J&J Bank, we're always looking for ways to make banking more convenient and accessible. That's why we offer cutting-edge digital banking tools, like our AI-powered chatbot that can help you with everything from account balances to investment advice.
<br/>
<h2 style="margin:50px;">Community Involvement </h2>
At J&J&J Bank, we're proud to be part of the communities we serve. We sponsor local events, support local charities, and offer community outreach programs to help our neighbors thrive. Plus, we have a special program that rewards our customers for volunteering in their communities.

    </div>
</div>

</body>

</html>