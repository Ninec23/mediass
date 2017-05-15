<?php
 include "inc_conn.php";
  $sql="delete from Zaposlenici WHERE OIB='".$_POST['id']."'";
  $rez=mysqli_query($conn, $sql);

?>