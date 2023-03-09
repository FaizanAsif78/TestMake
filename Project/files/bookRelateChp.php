
<?php
include('../include/conn.php');
 $Book_id=$_POST['id'];

 $sql= "SELECT * FROM `chapter` WHERE `book_id`='$Book_id'";
 $run= mysqli_query($conn,$sql);
 while($fet=mysqli_fetch_array($run)){
     ?>
         <option value="<?php echo $fet['chp_id'];?>"> Ch no:<?php echo $fet['chp_num'];?>  (<?php echo $fet['chp_name']; ?>)</option>
     <?php
 }

?>