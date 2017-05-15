<?php
 include "inc_conn.php";

$sql="insert into Pacijenti (ime,OIB,spol,lijecnik,mjesto,adresa,vlasnik) VALUES (('".$_POST['ime']."'),('".$_POST['OIB']."'),
('".$_POST['spol']."'),('".$_POST['lijecnik']."'),('".$_POST['mjesto_stanovanja']."'),('".$_POST['adresa']."'),('".$_POST['vlasnik']."'))";

if($rez=mysqli_query($conn, $sql)){
  echo 3; die();
}
?>