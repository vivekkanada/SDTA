<?php
session_start();
include './config.php';
if(isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
if(isset($_SESSION['user'])=="")
{
    ?>
<script>window.location = "index.php";</script>
<?php
}
if(isset($_POST['submit']))
{
    
    $cid=$_POST['browser'];
    $iid=$_POST['browser1'];
    $demo=  explode(':', $iid);
    $id =  $demo[0];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $total=$_POST['total'];
    $date=  date('Y-m-d');
    $paid=$_POST['paid'];
    $balance=$_POST['balance'];
    echo '<script>alert($id)</script>';
    $q="insert into addbill values(0,$cid,$id,'$qty','$price','$total','$date','$paid','$balance');";
  
    if(mysqli_query($db, $q))
  {
//      echo "<script>alert('data inserted successfully')</script>";   
     $q1="select sum(balance) as s from addbill where cid='$cid'";

    $res= mysqli_query($db, $q1);
   $row= mysqli_fetch_assoc($res);
    $bal=$row['s'];
   
   
     
     $q2="update addcustomer set balance='$bal' where cid='$cid'";
     
     if(mysqli_query($db, $q2))
      {
//         echo "<script>alert('balance updated')</script>";   
         $idd=  explode(':', $iid);
         
         $q3="select total_bag from additem where iid='$idd[0]'";
         
         $res3= mysqli_query($db, $q3);
   $row3= mysqli_fetch_assoc($res3);
    $dec=$row3['total_bag'];
         $dec=$dec-$qty;
          $q4="update additem set total_bag='$dec' where iid='$idd[0]' ";
          
          if(mysqli_query($db, $q4))
          {
                echo "<script>alert('Bill Added successfully')</script>";  
          }
          else
               echo "<script>alert('Bill Not added, please try later')</script>";  
   }
   else
       echo "<script>alert('balance not updated')</script>";   

  
     
     
   }
  else
  {
      echo "<script>alert('data inserted successfully')</script>"; 
      
  }
      
}
?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title> ADD BILL</title>



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


<!--<script>
function add_bill(val) {
	$.ajax({
	type: "POST",
	url: "add_bill.php",
	data:'cat_id='+val,
	success: function(data){
		$("#bill").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>-->
  <script>
        function myfun() {
  var x = document.getElementById("browser1").value;
  
  var res = x.split(":");

 
  document.getElementById("price").value = res[1];

 }</script>
    </head>
    <body>
        <header>
          <?php include './aheader.php'; ?>
            </header>
        
            
            
            <!--#########################HOME FORM##########################-->
            
            <DIV class="container-fluid">
                <H1 class="bg-success" align="center">ADD CUSTOMER BILL</H1>
            </DIV>
            <!--###########################HOME FORM END#####################################-->
      
        
            <!--######################################SEARCH CUSTOMER##########################################-->
            <br>
           
            
            <div class="container" style="width: 50%;alignment-adjust: central">
                <form action="add_bill.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">SELECT NAME:</label>

      <select  class="form-control" name="browser" id="browser">
          <option>Select Name</option>
           <?php  include './config.php';
    $query="select * from addCUSTOMER";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
        ?>
          <option value="<?php echo $row['cid']  ?>"><?php echo $row['name']   ?></option>
      <?php
    }?>
          
  </select>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SELECT ITEM</label>
      </div>
                    
  <div class="form-group form-check">
      
      <select  class="form-control" onchange="myfun()" name="browser1" id="browser1">
          <option>Select Item</option>
           <?php  include './config.php';
    $query="select * from additem";
    $result=mysqli_query($db, $query);
    while($row1=  mysqli_fetch_array($result))
    {
        ?>
          <option value="<?php echo $row1['iid'].':'.$row1['rate'] ?>"><?php echo $row1['iname'] ?></option>
          
      <?php
     $r=$row1['price'];
    }

    ?>
          
  </select>
  </div>
                  
                
                            <div class="form-group">
    <label for="exampleInputPassword1">ENTER RATE</label>
      </div>
                    
  <div class="form-group form-check">
      <input type="number" class="form-control"  placeholder="ENTER PRICE" name="price" id="price">
  
  </div> 
                    <div class="form-group">
    <label for="exampleInputPassword1">ENTER QTY</label>
      </div>
  <div class="form-group form-check">
      <input type="number" class="form-control" onchange ="cal()" placeholder="ENTER QUANTITY" name="qty" id="qty">
  
  </div>
                <div class="form-group">
    <label for="exampleInputPassword1">TOTAL</label>
      </div>
  <div class="form-group form-check">
      <input type="number" class="form-control" placeholder="TOTAL" name="total" value="" id="total">
       
     
       <script>
        function cal() {
 var n1=parseInt(document.getElementById('price').value);
       var n2=parseInt(document.getElementById('qty').value);
       var res=document.getElementById('total').value=n1*n2;
 
}
        </script>
      <hr>
      
       <div class="form-group">
    <label for="exampleInputPassword1">PAID</label>
      </div>
  <div class="form-group form-check">
      <input type="number" class="form-control" onchange="funct()" placeholder="ENTER AMOUNT" name="paid" id="paid">
  
  </div>   
       <div class="form-group">
    <label for="exampleInputPassword1">BALANCE</label>
      </div>
  <div class="form-group form-check">
      <input type="number" class="form-control" placeholder="BALANCE" name="balance" id="balance">
  
  </div> 
       
      <script>
            function funct()
            {
       var n1=parseInt(document.getElementById('paid').value);
       var n2=parseInt(document.getElementById('total').value);
       var res=document.getElementById('balance').value=n2-n1;
      

   }
        
      </script>
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
