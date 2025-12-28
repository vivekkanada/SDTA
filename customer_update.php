<?php
session_start();
include './config.php';
if(isset($_SESSION['user'])=="")
{
    ?>
<script>window.location = "index.php";</script>
<?php
}

    if(isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
if(isset($_POST['update']))
{
     $cid=$_POST['cid'];
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $mobile=$_POST['mobile'];
     $place=$_POST['place'];
    $query="update addcustomer set fname='$fname',lname='$lname',mobile='$mobile',place='$place' where cid=$cid";
    if(mysqli_query($db, $query))
    {
        echo "<script>alert('customer details updated successfull')</script>";
    }
    else
        echo "<script>alert('customer details updated successfull')</script>";
    
}
       

?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>ADD ITEM</title>
    </head>
    <body>
             
      <?php include './aheader.php'; ?>
        <div><H1 class="btn-success container-fluid " align="center">ADD CUSTOMER</H1>
           <div class="container ">
  <?php
  if(isset($_GET['cid']))
  {
   $cid=$_GET['cid'];
  $query="select * from addCUSTOMER where cid=$cid";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
  ?>
               <form method="post" action="customer_update.php">
                   <input type="hidden" class="form-control" name="cid" value="<?php echo $row['cid']; ?>" >
    <div class="form-group">
      <label for="usr">First Name:</label>
      <input type="text" class="form-control" name="fname" value="<?php echo $row['name']; ?>" >
    </div>
     
      <div class="form-group">
      <label for="usr">Mobile number</label>
      <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>" >
    </div>
      <div class="form-group">
      <label for="usr">Place</label>
      <input type="text" class="form-control" name="place" value="<?php echo $row['place']; ?>" >
    </div>
     <div class="form-group">
         <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
       </div>
  </form>
    <?php } }?>
</div>
        </div>
        <div align="center"><h2><a style="text-decoration-line: underline" href="view_customers.php">back</a></h2></div>
    </body>
</html>
