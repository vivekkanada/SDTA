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
if(isset($_POST['save']))
{
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $mobile=$_POST['mobile'];
    $place=$_POST['place'];
    $result=mysqli_query($db, "select * from addcustomer where mobile='$mobile'");
             if(mysqli_num_rows($result)==1)
    
    {
       
        echo"<script>alert('customer already registered with this mobile number')</script>";
    }
    else
    {
       $query="insert into addcustomer (name,gender,mobile,place)values('$name','$gender','$mobile','$place')";
    if(mysqli_query($db, $query))
    {
       
      echo"<script>alert('customer added successfully')</script>";
    }
    else
    {   
        header('Location : add_customer.php');
        $_SESSION['msg']="<script>alert('customer not added, please try later')</script>";
    } 
    }
    
   
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ADD CUSTOMER</title>
    </head>
    <body>
        
       <?php include './aheader.php'; ?>
        <div><H1 class="btn-success container-fluid " align="center">ADD CUSTOMER</H1>
            <div class="container">
               
  
               <form method="post" action="add_customer.php">
    <div class="form-group">
      <label for="usr">Full Name:</label>
      <input type="text" class="form-control" name="name">
    </div>
      <div >
      <label for="usr">GENDER:</label>
      <br><br>
       <DIV>
           <input type="radio" name="gender" value="Male">   MALE
            <input type="radio" name="gender" value="Female">    FEMALE
       </div><br>

    </div>
      <div class="form-group">
      <label for="usr">Mobile number</label>
      <input type="text" class="form-control" name="mobile">
    </div>
      <div class="form-group">
      <label for="usr">Place</label>
      <input type="text" class="form-control" name="place">
    </div>
     <div class="form-group">
         <button type="submit" class="btn btn-primary" name="save">SUBMIT</button>
       </div>
  </form>
</div>
        </div>
        
    </body>
</html>
