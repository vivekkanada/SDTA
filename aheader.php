<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                
                
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
    </head>
    <body>
        <div>
                <nav class="navbar navbar-inverse ">
  <div class="container-fluid" >
    <div class="navbar-header">
        <a class="navbar-brand" href="home.php">ANIMAL FOOD MANAGEMENT</a>
    </div>
      <div style="float: right">
    <ul class="nav navbar-nav" >
        <li class="active"><a href="home.php">HOME</a></li>
     
     
      <li><a href="pay.php">PAY</a></li>
      
      <li>
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">ADD
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
   <li><a href="add_customer.php">ADD CUSTOMER</a></li>
    <li><a href="add_bill.php">ADD BILL</a></li>
      <li><a href="add_item.php">ADD ITEM</a></li>
       <!--<li><a href="addStock.php">ADD STOCKS</a></li>-->
  </ul>
      </li>
      
        <li>
            <button  class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">VIEW
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="view_customers.php">VIEW CUSTOMER</a></li>
    <li><a href="debt_customer.php">VIEW DEBT CUSTOMER</a></li>
      <li><a href="view_bills.php">VIEW BILLS</a></li>
      <li><a href="stockaddedhistory.php">STOCK_HISTORY</a></li>
      <li><a href="serach.php">SERACH</a></li>
      <li><a href="payment_history.php">PAYMENT HISTORY</a></li>
      <li><a href="history.html">HISTORY</a></li>
  </ul>
      </li>
      <li>
            <button  class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">REPORTS
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
      <li><a href="reports.php">REPORTS</a></li>
     
     
  </ul>
      </li>
      <li><a href="logout.php">LOGOUT</a></li>
    </ul>
  </div>
  </div>                  
</nav>
            </div>
    </body>
</html>
