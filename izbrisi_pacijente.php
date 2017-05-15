<?php
 include "inc_conn.php";
  $sql="delete from Pacijenti WHERE OIB='".$_POST['id']."'";
  $rez=mysqli_query($conn, $sql);

?>