<?php
session_start();
include './config.php';
if(isset($_GET['bid']))
{
    $bid=$_GET['bid'];
    $q="delete from addbill where bid=$bid";
    if(mysqli_query($db, $q))
    {
        echo "<script>alert('bill deleted')</script>";
    }
 else {
         echo "<script>alert('bill not deleted')</script>";
    }
}
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
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>  VIEW BILLS </title>
        


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
        <header>
          <?php include './aheader.php'; ?>
            </header>
        
            
            
            <!--#########################HOME FORM##########################-->
            
            <DIV class="container-fluid">
                <H1 class="bg-success" align="center">BILL DETAILS</H1>
                <div style="float: right"><button onclick="window.print()">print</button></div>
               
                 <!--###################################ADD ITEM START############################################################-->
            <div class="container">
                 <?PHP
    include './config.php';
     $sum=0;
     $page=null;
    $query="select a.bid,b.name,c.iname,a.qty,a.price,a.date,a.total,a.paid,a.balance from addbill a,addcustomer b,additem c where a.cid=b.cid and a.iid=c.iid ";
    $result=mysqli_query($db, $query);
    $results_per_page=4;
    $num_of_results=  mysqli_num_rows($result);
    if($num_of_results<=0)
    {
        echo '<h3 style="color: red;" align="center" class="form-group">no records available</h3>';
    }
    else
    {?>
                <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">BILL ID</th>
      <th scope="col">NAME</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">PRICE</th>
     
      <th scope="col">DATE</th>
       <th scope="col">TOTAL</th>
      <th scope="col">PAID</th>
      <th scope="col">BALANCE</th>
      <th scope="col" colspan="2">ACTION</th>
    </tr>
  </thead>
  <tbody>
   
    
 <?php
    if(!isset($_GET['page']))
    {
        $page=1;
    }
    else
        $page=$_GET['page'];
    $this_page_first_result=($page-1)*$results_per_page;
    $sql="select a.bid,b.name,c.iname,a.qty,a.price,a.date,a.total,a.paid,a.balance from addbill a,addcustomer b,additem c where a.cid=b.cid and a.iid=c.iid LIMIT ".$this_page_first_result.','.$results_per_page;
    $result1=mysqli_query($db, $sql);
      while($row=  mysqli_fetch_array($result1))
    {
        ?>
      <tr>
          <td><?php echo $row['bid']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['iname']; ?></td>
          <td><?php echo $row['qty']; ?></td>
          <td><?php echo $row['price']; ?></td>
         
          <td><?php echo $row['date']; ?></td>
           <td><?php echo $row['total']; ?></td>
          <td><?php echo $row['paid']; ?></td>
          <td><?php echo $row['balance']; ?></td>
          <?php $sum=$sum+$row['balance']; ?>
          <td><a class="form-control" align="center" style="background-color: greenyellow " href="bill_update.php?bid=<?php echo $row['bid']; ?>">EDIT</a></td>
          <td><a class="form-control" align="center" style="background-color: red;color: white " href="view_bills.php?bid=<?php echo $row['bid']; ?>">DELETE</a></td>

      </tr>
        <?php
    }
    
    
    
    $num_of_pages=  ceil($num_of_results/$results_per_page);
    
    
    ?>
  </tbody>
  
</table>
                 <div class="container">
                     <h3 style="color: red;" align="center" class="form-group"><b>
                         <?php 
                          for ($page=1;$page<=$num_of_pages;$page++){
        echo '<a href="view_bills.php?page='.$page.'">'.$page .  '</a>';
    }
                         ?>
                         </b></h3>
                 </div>
   <?php }
    
    ?>
   
</div>
                
                
                  <div class="container">
                      <h3 style="color: red;" align="center" class="form-group"><span>BALANCE</span><b> <?php echo $sum; ?></b></h3>
                 </div>
        <!--#######################################ADD ITEM END#########################################################-->

                
            </DIV>
            <!--###########################HOME FORM END#####################################-->
      
        
        
        
        
        
        
        <!--##################script start########################-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!--##################script end########################-->
    </body>
</html>
