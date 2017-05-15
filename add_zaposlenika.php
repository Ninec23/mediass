<?php
 include "inc_conn.php";

  $hash = password_hash($_POST['broj_prijave'],PASSWORD_BCRYPT); 

  $sql="insert into Zaposlenici (ime,prezime,spol,broj_prijave,korisnicko_ime,datum,mjesto_rodenja,mjesto_stanovanja,vlasnik)
       VALUES (('".$_POST['ime']."'),('".$_POST['prezime']."'),('".$_POST['spol']."'),'$hash',('".$_POST['korisnicko_ime']."'),('".$_POST['datum_rodenja']."'),('".$_POST['mjesto_rodenja']."'),('".$_POST['mjesto_stanovanja']."'),('".$_POST['vlasnik']."'))";

  if($rez=mysqli_query($conn, $sql)){
  echo 3; die();
}

?>