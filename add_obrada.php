<?php
 include "inc_conn.php";

          if(isset($_POST['pon'])){$pon=1;}else{$pon=0;}
          if(isset($_POST['uto'])){$uto=1;}else{$uto=0;}
          if(isset($_POST['sri'])){$sri=1;}else{$sri=0;}
          if(isset($_POST['cet'])){$cet=1;}else{$cet=0;}
          if(isset($_POST['pet'])){$pet=1;}else{$pet=0;}
          $zbroj=($pon + $uto + $sri +$cet +$pet)*4;

          $DTP=$_POST['DTP'];
         $sql="SELECT * FROM DTP WHERE DTP= '$DTP'";
          $rez=mysqli_query($conn, $sql);
          while($niz=mysqli_fetch_array($rez)){
            $vrijeme=$niz['vrijeme'];
            $cijena=$niz['cijena'];
          }
          $ukupno_vrijeme=$vrijeme * $zbroj;
          $ukupna_cijena=$cijena * $zbroj;

        

  $sql="insert into Obrada (zaposlenik,vlasnik,pacijent,DTP,start,kraj,pon,uto,sri,cet,pet,zbroj,ukupno_vrijeme,ukupna_cijena) VALUES (('".$_POST['zaposlenik']."'),('".$_POST['vlasnik']."'),
        ('".$_POST['pacijent']."'),('".$_POST['DTP']."'),('".$_POST['start']."'),('".$_POST['kraj']."'),$pon,$uto,$sri,$cet,$pet,$zbroj,$ukupno_vrijeme,$ukupna_cijena)";
  if($rez=mysqli_query($conn, $sql)){
  echo 3; die();
}
 
?>