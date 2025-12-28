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
     $bid=$_POST['bid'];
     $name=$_POST['name'];
     $item=$_POST['item'];
     $qty=$_POST['qty'];
     $price=$_POST['price'];
      $total=$_POST['total'];
    $query="update addbill set qty='$qty',price='$price', total='$total' where bid=$bid";
    if(mysqli_query($db, $query))
    {?>
        
<!--<script>window.location = "view_bills.php";</script>-->
        
   <?php }
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
        <div><H1 class="btn-success container-fluid " align="center">UPDATE BILL</H1>
           <div class="container ">
  <?php
  if(isset($_GET['bid']))
  {
   $bid=$_GET['bid'];
  $query="select * from addbill a,additem b,addcustomer c where a.bid=$bid and b.iid=a.iid and c.cid=a.cid ";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
  ?>
               <form method="post" action="bill_update.php">
                   <input type="hidden" class="form-control" name="bid" value="<?php echo $row['bid']; ?>" >
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" name="name" readonly="" value="<?php echo $row['name']; ?>"  >
    </div>
      <div class="form-group">
      <label for="usr">ITEM:</label>
      <input type="text" class="form-control"  name="item" readonly="" value="<?php echo $row['iname']; ?>" >
    </div>
      <div class="form-group">
      <label for="usr">QUANTITY</label>
      <input type="text" class="form-control" name="qty" value="<?php echo $row['qty']; ?>" >
    </div>
      <div class="form-group">
      <label for="usr">PRICE</label>
      <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>" >
    </div>
    <div class="form-group">
      <label for="usr">TOTAL</label>
      <input type="text" class="form-control" name="total" value="<?php echo $row['total']; ?>" >
    </div>
   
     <div class="form-group">
         <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
       </div>
  </form>
    <?php } }?>
</div>
        </div>
    </body>
</html>
