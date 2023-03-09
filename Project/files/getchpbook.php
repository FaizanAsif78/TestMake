
<?php
include('../include/conn.php');
 $class_id=$_POST['id'];

 $sql= "SELECT * FROM `books` WHERE `class_id`='$class_id'";
 $run= mysqli_query($conn,$sql);
 while($fet=mysqli_fetch_array($run)){
     ?>
         <option value="<?php echo $fet['book_id'];?>"><?php echo $fet['book_name'];?> </option>
     <?php
 }

?>