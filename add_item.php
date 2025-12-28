<?php
session_start();
include './config.php';
if(isset($_SESSION['user'])=="")
{
    ?>
<script>window.location = "index.php";</script>
<?php
}
if(isset($_POST['save']))
{
    $name=$_POST['iname'];
    $weight=$_POST['weight'];
    $rate=$_POST['rate'];
    $total=$_POST['total'];
    
    $result=mysqli_query($db, "select iid from additem where iname='$name'");
    if(mysqli_num_rows($result)==1)
    {
        header('Location : add_item.php');
        $_SESSION['msg']="<script>alert('item already registered')</script>";
    }
    else
    {
       $query="insert into additem (iname,weight,rate,total_bag)values('$name','$weight','$rate','$total')";
    if(mysqli_query($db, $query))
    {
        header('Location : add_item.php');
        $_SESSION['msg']="<script>alert('item added successfully')</script>";
    }
    else
    {   
        header('Location : add_item.php');
        $_SESSION['msg']="<script>alert('item not added, please try later')</script>";
    } 
    }
    if(isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ADD ITEM</title>
    </head>
    <body>
             
       <?php include './aheader.php'; ?>
        <div><H1 class="btn-success container-fluid " align="center">ADD ITEM</H1>
            <div class="container" >
  
               <form method="post" action="add_item.php">
    <div class="form-group">
      <label for="usr">ITEM Name:</label>
      <input type="text" class="form-control" name="iname">
    </div>
      <div class="form-group">
      <label for="usr">ITEM WEIGHT (in KG):</label>
      <input type="text" class="form-control"  name="weight">
    </div>
      <div class="form-group">
      <label for="usr">ITEM RATE</label>
      <input type="text" class="form-control" name="rate">
    </div>
      <div class="form-group">
      <label for="usr">TOTAL ITEMS</label>
      <input type="text" class="form-control" name="total">
    </div>
     <div class="form-group">
         <button type="submit" class="btn btn-primary" name="save">ADD ITEM</button>
       </div>
  </form>
</div>
        </div>
    </body>
</html>
