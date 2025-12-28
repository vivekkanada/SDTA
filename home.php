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
if(isset($_GET['iid']))
{
    $iid=$_GET['iid'];
    $q="delete from additem where iid=$iid";
    if(mysqli_query($db, $q))
    {
        echo '<script>alert("record deleted")</script>';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> SHREE DURADUNDESHWAR TRADERS</title>



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
                <H1 class="bg-success" align="center">WEL COME TO ADMIN PANEL</H1>
            </DIV>
            <!--###########################HOME FORM END#####################################-->
          <div class="card-body"><h2 style="color: red" align="center">ALL AVAILABLE ITEMS</h2></div>
            <!--###################################ADD ITEM START############################################################-->
            <div class="container">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">ITEM WEIGHT</th>
      <th scope="col">ITEM RATE(PER BAG)</th>
      <th scope="col">TOTAL BAGS</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?PHP
    include './config.php';
    $query="select * from additem";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
        if ($row['total_bag']!=0)
        {?>
             <tr >
          <td><?php echo $row['iid']; ?></td>
          <td><?php echo $row['iname']; ?></td>
          <td><?php echo $row['weight']; ?></td>
          <td><?php echo $row['rate']; ?></td>
          <td><?php echo $row['total_bag']; ?></td>
          <td><a class="form-control" align="center" style="background-color: greenyellow " href="addStock.php?iid=<?php echo $row['iid']; ?>">ADD</a></td>
          <td><a class="form-control" align="center" style="background-color: red;color: white " href="home.php?iid=<?php echo $row['iid']; ?>">DELETE</a></td>
      </tr>
       <?php }
        else
        { ?>
             
      
      
       <tr style="color: red;font-weight: bold" >
          <td><?php echo $row['iid']; ?></td>
          <td><?php echo $row['iname']; ?></td>
          <td><?php echo $row['weight']; ?></td>
          <td><?php echo $row['rate']; ?></td>
          <td><?php echo $row['total_bag']; ?></td>
          <td><a class="form-control" align="center" style="background-color: greenyellow " href="addStock.php?iid=<?php echo $row['iid']; ?>">ADD</a></td>
          <td><a class="form-control" align="center" style="background-color: red;color: white " href="home.php?iid=<?php echo $row['iid']; ?>">DELETE</a></td>
      </tr>
      
      
      
      
        <?php }
    }
    ?>
  </tbody>
</table>
</div>
        
        
        
        
        
        
        <!--##################script start########################-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!--##################script end########################-->
    </body>
</html>
