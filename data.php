       <?php  include './config.php';
    $query="select * from additem";
    $result=mysqli_query($db, $query);
    while($row1=  mysqli_fetch_array($result))
    {
        ?>
          <option value="<?php echo $row1['iid'] ?>"><?php echo $row1['iname'] ?></option>
      <?php
    }?>