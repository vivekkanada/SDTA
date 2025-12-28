<?php
session_start();
include './config.php';
if(isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

if(isset($_POST['submit']))
{
    
    $name=$_POST['browser'];
    $paid=$_POST['price'];
    $bal=$_POST['total'];
    $date=  date('Y-m-d');
    $demo=explode(" ",$name);
   
    $fname_n= $demo[0];
    $lname_n=$demo[1];
    $lname_n2=$demo[2];
    
    echo $fname_n,$lname_n,$lname_n2;
    
    $q="insert into payment values(0,'$name','$paid','$bal','$date');";
  
    if(mysqli_query($db, $q))
  {
 
        $q5="update addcustomer set balance='$bal' where fname='$fname_n' and lname='$lname_n'";
        if(mysqli_query($db, $q5))
        {
                echo "<script>alert('Payment Added successfully')</script>";  
          }
          else
               echo "<script>alert('Payment Not added, please try later')</script>";  
      
  
      
}else
     echo "<script>alert('Payment Not added, please try later')</script>";  
}
?>
<html>
    
    <head>
        <meta charset="UTF-8">
        



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
 <script>
        function myfun() {
  var x = document.getElementById("browser").value;
  document.getElementById("bal").value = x;
 }</script>
 <title>PAYMENTS</title>
    </head>
    <body>
        <header>
          <?php include './aheader.php'; ?>
            </header>
        
            
            
            <!--#########################HOME FORM##########################-->
            
            <DIV class="container-fluid">
                <H1 class="bg-success" align="center">payments</H1>
            </DIV>
            <!--###########################HOME FORM END#####################################-->
      
        
            <!--######################################SEARCH CUSTOMER##########################################-->
            <br>
           
            
            <div class="container" style="width: 50%;alignment-adjust: central">
                <form action="pay.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">NAME OF THE CUSTOOMER:</label>
    <select  class="form-control"  onchange="myfun()" name="browser" id="browser">
        <option disabled selected>Select Name</option>
           <?php  include './config.php';
    $query="select * from addCUSTOMER where balance !='0'";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
        ?>
          <option value="<?php echo $row['balance']. " ",$row['fname'] ." " . $row['lname']  ?>"><?php echo $row['fname'] ." " . $row['lname']  ?></option>
      <?php
    }?>
          
  </select>
    
  </div>
  
                <div class="form-group">
    <label for="exampleInputPassword1">BALANCE</label>
      </div>
  <div class="form-group form-check">
      <input type="text" class="form-control" placeholder="BALANCE" value="" name="bal" id="bal">
  
  </div>
          <div class="form-group">
    <label for="exampleInputPassword1">ENTER AMOUNT</label>
      </div>
  <div class="form-group form-check">
      <input type="number" class="form-control" onchange="cal()" placeholder="ENTER AMOUNT" name="price" id="price">
  
  </div> 
                     <script>
        function cal() {
  var x = document.getElementById("bal").value;
   var y = document.getElementById("price").value;
  document.getElementById("total").value = x-y;
}
        </script>
                <div class="form-group">
    <label for="exampleInputPassword1">REMAINING BALANCE</label>
      </div>
  <div class="form-group form-check">
      <input type="number" class="form-control" placeholder="TOTAL" name="total" value="" id="total">
      
    
      <hr>
      
      
       </div>       
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
            
            
            <!--#######################################SEARCH CUSTOMER END#########################################-->
        
        
        
        
        
        <!--##################script start########################-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!--##################script end########################-->
    </body>
</html>
