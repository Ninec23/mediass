<?php
   include('inc_conn.php');
   session_start();

      $user_check = $_SESSION['login_user'];
   
      $ses_sql = mysqli_query($conn, "select a.kime, b.korisnicko_ime from Medias a inner join Zaposlenici b where a.kime = '$user_check' OR b.korisnicko_ime='$user_check'");
   
      $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
      $user = $row['kime'];

      $user1= $row['korisnicko_ime'];
   
      if(!isset($_SESSION['login_user'])){
         header("location:index.php");
    }
?>