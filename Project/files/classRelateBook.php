<?php
        include('../include/conn.php');

   echo $classId = $_POST['id'];

    $sql= "SELECT * FROM `books` WHERE `class_id`='$classId'";
    $run= mysqli_query($conn,$sql);
    while($fet=mysqli_fetch_array($run)){
        ?>
            <option value="<?php echo $fet['book_id'];?>"><?php echo $fet['book_name'];?></option>
        <?php
    }
?>