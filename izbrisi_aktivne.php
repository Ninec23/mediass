<?php
 include "inc_conn.php";
  $sql="delete from Obrada WHERE id_obrade='".$_POST['id']."'";
  $rez=mysqli_query($conn, $sql);

?>
