<?php
session_start();
if(isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> ANIMAL FOOD MANAGEMENT</title>



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
<?php
//session_start();
$db=  mysqli_connect('localhost','root','root','sdta');
if(isset($_POST['save']))
{
    $uname=$_POST['uname'];
    $psw=$_POST['psw'];
   
    $query="select uname from adminlogin where uname='$uname' and password='$psw'";
    $result=mysqli_query($db, $query);
    if(mysqli_num_rows($result)==1)
   
    {
        $_SESSION['user']=$uname;
        $_SESSION['msg']="<script>alert('LOGIN SUCCESSFULL')</script>";
        header('Location: home.php');
      
    }
    else
    {
         header('Location: index.php');
          $_SESSION['msg']="<script>alert('please enter correct username and password')</script>";
    }
        
   
    
}


?>

    </head>
    <body style="background-image: url(images/v.jpg);background-attachment: fixed; ">
        <header>
            <div >
                
               
                <nav class="navbar navbar-inverse nav navbar-fixed-top " style="opacity: 0.8">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#home">ANIMAL FOOD MANAGEMENT</a>
    </div>
      <div style="float: right">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#home">HOME</a></li>
      <li><a href="#about">ABOUT</a></li>
      <li><a href="#contact">CONTACT</a></li>
      <li><a  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOGIN</a></li>
      <!--<li><a href="#log">LOGIN</a></li>-->
    </ul>
          </div>
  </div>
</nav>
            </div>
            </header>
<!--        ################################home page start#############################################-->

<div class="card bg-success text-white" style="margin-top: 60px;padding-top: 35px;" id="home"  >
    <div class="card-body"><h1 align="center">WELCOME TO ANIMAL FOOD MANAGEMENT</h1></div>
    
    
    
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
    </tr>
  </thead>
  <tbody>
    <?PHP
    include './config.php';
    $query="select * from additem";
    $result=mysqli_query($db, $query);
    while($row=  mysqli_fetch_array($result))
    {
        ?>
      <tr>
          <td><?php echo $row['iid']; ?></td>
          <td><?php echo $row['iname']; ?></td>
          <td><?php echo $row['weight']; ?></td>
          <td><?php echo $row['rate']; ?></td>
          <td><?php echo $row['total_bag']; ?></td>
      </tr>
        <?php
    }
    ?>
  </tbody>
</table>
</div>
        <!--#######################################ADD ITEM END#########################################################-->

    
    
    
    
    
    
    <div class="container-fluid row">
        
        <div class="card col-lg-4 ">
            <img src="images/img1.jpg" class="card-img-top col-lg-12"width="100%" height="200px" alt="...">
             
            <div class="card-body" >
      
    <h5 class="card-title">VIVEK KANADA</h5>
    <p class="card-text">EMPLOYEE</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        <div class="card col-lg-4 ">
            <img src="images/img2.jpg" class="card-img-top col-lg-12" width="100%" height="200px" alt="...">
        
  <div class="card-body">
      
    <h5 class="card-title">VIVEK KANADA</h5>
    <p class="card-text">EMPLOYEE</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        
        <div class="card col-lg-4 ">
            <img src="images/img3.jpg" class="card-img-top col-lg-12 rounded"  width="100%" height="200px" alt="...">
        
  <div class="card-body">
      
    <h5 class="card-title">VIVEK KANADA</h5>
    <p class="card-text">EMPLOYEE</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>  
        
      
        
    </div>
    
  </div>



<!--        ################################home page end#############################################-->

  <!--################################about page start#############################################-->
  <div class="container-fluid col-lg-12 text-center">
                        <h1 id="about">ABOUT US</h1>
                        <hr>
                        <p>
                        <pre>
                            Animal Food Management is a General Template to which generate a HTML Code for specific areas of the sites
                             where the animal food details and customer records stored in database. Animal Food Management also maintains 
                            information regarding the following:
 
Accounts – of the users of this Application.
Items- Details of Items
Stock-Details of Stocks
Sales- Details of Sales
Bill-Add a customer bill

The designer should be flexible and should be made in a manner that it can be customized at any moment of time. 
Access any bill directly by date and time.
See customer’s credit by entering name of the customer or ID.
Secured system. Without authority, you cant see any information.
Easy access of any data.

                        </pre>    
                        </p>
                        <button class="btn-primary text-white"> Wanna Know Me</button>
                    </div>
    <!--################################about page end#############################################-->
            
            
            <!--#########################LOGIN FORM##########################-->
            
            
           

            <div id="id01" class="modal" style="width: 30%; margin-left: 450px">
  
    <form class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
<!--      <img src="img_avatar2.png" alt="Avatar" class="avatar">-->
    </div>

    <div class="container-fluid">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="save">Login</button>
<!--      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
    </div>

    <div class="container-fluid" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


            
            
            
            <!--###########################LOGIN FORM END#####################################-->
      
        
        
        
        
        
        
        <!--##################script start########################-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!--##################script end########################-->
        
        
        
         <!--################################CONTACT page start#############################################-->
         <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="Klazu2fT"></script>
  <div class="container-fluid col-lg-12 text-center">
                        <h1 id="contact">CONTACT US</h1>
                        <hr>
                        <p>
                        <H3>LOCATION   </H3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30642.479955132538!2d74.46571682824347!3d16.25587513099867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc093ea3b2d7157%3A0x58670f775c160f63!2sSankeshwar%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1607073388451!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        
                        <H3>FACEBOOK</H3>
                        <div class="fb-like" data-href="https://www.facebook.com/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
  </p>
                      
                    </div>


  
  <div class="container">
      <div class="row">
          <div class="col-sm-6">
            <h2>Sammed Chougule</h2>

  <div class="card" style="width:400px">
      <img class="card-img-top" src="images/sammedchougule - .jpg" alt="Card image" style="width:50%">
    <div class="card-body">
      <!--<h4 class="card-title">smdchougule24@gmail.com</h4>-->
      <br>
      <a href="" class="btn btn-primary">smdchougule24@gmail.com
      <p class="card-text">Mobile No : 8904331718</p>
      </a>
    </div>
  </div>
          </div>
          
        
      
   
          <div class="col-sm-6">
              <h2>Vivek Kanada</h2>

  <div class="card" style="width:400px">
      <img class="card-img-top" src="images/VIVEK PHOTO.jpg" alt="Card image" style="width:50%">
    <div class="card-body">
        <br>
      <!--<h4 class="card-title">vivekkanada38@gmail.com</h4>-->
<!--      <p class="card-text">8762075729</p>-->
      <a href="" class="btn btn-primary">vivekkanada38@gmail.com
      <p class="card-text"> Mobile No : 8762075729</p>
      </a>
    </div>
  </div>
          </div>
          
          
     
  
         
          
 
  
</div>
</div>  
    <!--################################CONTACT page end#############################################-->
    </body>
</html>
