<?php
session_start();
include './config.php';
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
        <title>SEARCH </title>
    </head>
    <body>
             
       <?php include './aheader.php'; ?>
        <div><H1 class="btn-success container-fluid " align="center">SEARCH</H1>
            <div class="container" >
  
                <form method="post" action="serach.php">
                      <div class="form-group">
    <label for="exampleInputEmail1">SELECT NAME:</label>

      <select  class="form-control" name="browser" id="browser">
          <option>Select Name</option>
           <?php  include './config.php';
    $query="select distinct a.name,a.cid from addCUSTOMER a,addbill b where a.cid=b.cid";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
        ?>
          <option value="<?php echo $row['cid']  ?>"><?php echo $row['name']  ?></option>
      <?php
    }?>
          
  </select>
    
  </div>
                    
                    <div class="form-group">
                        <input type="submit" class="form-control btn-primary" name="submit" value="submit">
                    </div>
    
  </form>
                 <div class="container">
        <table class="table">
           
  <thead class="thead-dark">
    <tr>
      <th scope="col">BILL ID</th>
      <th scope="col"> NAME</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">PRICE</th>
      
      <th scope="col">DATE</th>
       <th scope="col">TOTAL</th>
        <th scope="col">PAID</th>
         <th scope="col">BALANCE</th>
    </tr>
  </thead>
  <tbody>
    <?PHP
    include './config.php';
    $sum=0;
    if(isset($_POST['submit']))
    {
        $cid=$_POST['browser'];
//    $query="select * from addbill where cid='$cid'";
    $query="select a.bid,b.name,c.iname,a.qty,a.price,a.date,a.total,a.paid,a.balance from addbill a,addcustomer b,additem c where a.cid=b.cid and a.iid=c.iid and a.cid='$cid'";
    $result=mysqli_query($db, $query);
    $sum=0;
    while($row=  mysqli_fetch_array($result))
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
          <?php $sum=$sum+$row['balance'] ?>
      </tr>
    <?php }
   
    
        
    }
    ?>
  </tbody>
</table>
                           </div>
                  <div class="container">
                      <h3 style="color: red;" align="center" class="form-group"><span>BALANCE</span><b> <?php echo $sum; ?></b></h3>
                 </div>
</div>
        </div>
    </body>
</html>
