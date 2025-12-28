 <?php
session_start();
include './config.php';
if(isset($_SESSION['user'])=="")
{
    ?>
<script>window.location = "index.php";</script>
<?php
}
if(isset($_POST['update']))
{   $iid=$_POST['iid'];
   $iname=$_POST['iname'];
//    $weight=$_POST['weight'];
    $rate=$_POST['rate'];
    $total_bag=$_POST['total_bag'];
    $n_s=$_POST['n_s'];
    $total=$n_s+$total_bag;
   
    $qq="update additem set rate=$rate,total_bag='$total' where iid=$iid";
    if(mysqli_query($db,$qq))
    {
       $d=  date("d/m/Y");
        $add="insert into stock_history values(0,'$iid','$n_s','$rate','$d')";
        if(mysqli_query($db,$add))
        {
             $_SESSION['msg']="<script>alert('ITEM UPDATED SUCCESSFULLY')</script>";
//        header('Location : home.php');
        ?>
<script>window.location = "home.php";</script>
<?php
        }
       
      
             }
   else
   {
       $_SESSION['msg']="<script>alert('ITEM NOT UPDATED ')</script>";
        header('Location : home.php');
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ADD STOCKS</title>
    </head>
    <body>
             
       <?php include './aheader.php'; ?>
        <div><H1 class="btn-success container-fluid " align="center">ADD STOCKS</H1>
            <div class="container" >
  
                <form method="post" action="addStock.php">
                    
                   
    
  </form>
                 <div class="container">
       

    <?PHP
    include './config.php';
    $sum=0;
    if(isset($_GET['iid']))
    {
        
    $query="select * from additem where iid=".$_GET['iid']." LIMIT 1";
    $result=mysqli_query($db, $query);
    $sum=0;
    while($row=  mysqli_fetch_array($result))
    {
        ?>
                     <form method="post" action="addStock.php">
                         <input type="hidden" name="iid"  value="<?php echo $row['iid']; ?>" >
          <div class="form-group">
      <label for="usr">ITEM NAME</label>
      <input type="text" class="form-control" value="<?php echo $row['iname']; ?>" readonly name="iname" >
    </div>
                     <div class="form-group">
      <label for="usr">ITEM WEIGHT</label>
      <input type="text" class="form-control" value="<?php echo $row['weight']; ?>" readonly name="weight">
    </div>
                          <div class="form-group">
      <label for="usr">OLD  STOCKS</label>
      <input type="text" class="form-control" value="<?php echo $row['total_bag']; ?>" readonly name="total_bag">
    </div>
                     <div class="form-group">
      <label for="usr">ITEM RATE</label>
      <input type="text" class="form-control" value="<?php echo $row['rate']; ?>" name="rate">
    </div>
    
                         <div class="form-group">
      <label for="usr">ADDITIONAL STOCKS</label>
      <input type="text" class="form-control" value="" name="n_s">
    </div>
                         
                 <div class="form-group">
                        <input type="submit" class="form-control btn-primary" name="update" value="UPDATE">
                    </div>         
                         </form>
   <?php }
   
    
        
    }
    ?>
 
                           </div>
                
</div>
        </div>
    </body>
</html>
