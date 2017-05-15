<?php
 include "inc_conn.php";
  $sql="delete from Obrada_Gotova WHERE komentar='".$_POST['id']."'";
  $rez=mysqli_query($conn, $sql);

?>