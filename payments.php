<?php
include './config.php';
if(isset($_POST['nid']))
{
    echo $_POST['nid'];
}
$q1="select * from addcustomer order by fname asc";
$result=mysqli_query($db, $q1);
$rowCount=  mysqli_num_rows($result);
?>
<html>
    <head>
        <title>pay</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </head>
    <body>
        <select name="name" onchange="myfun()" id="name">
            <option value selected disabled>select name</option>
            <?php
            if($rowCount>0)
            {
                while($row=  mysqli_fetch_assoc($result))
                {
                    ?><option value="<?php echo $row['balance']; ?>"><?php echo $row['fname'],"_",$row['lname']; ?></option><?php
                }
            }
            ?>
        </select>
        <p id="demo"></p>
        <input type="text" name="bal" id="bal" value="">
        <script>
        function myfun() {
  var x = document.getElementById("name").value;
  document.getElementById("bal").value = x;
}
        </script>
    </body>
    
</html>