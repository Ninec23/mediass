<?php
  include("inc_conn.php");
	session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
		 if(!empty($_POST['oznaka'])){
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
		 	$oznaka = mysqli_real_escape_string($conn, $_POST['oznaka']);
      
      $sql = "SELECT password,oznaka FROM medias WHERE kime = '$myusername'";
			$result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
			if (password_verify($mypassword, $row['password']) && password_verify($oznaka, $row['oznaka']) ) {
         $_SESSION['login_user'] = $myusername;
         header("location: medias.php");
		 }      
		 	else{?>

					<script type="text/javascript"> 
            alert ("Neispravna lozinka ili korisničko ime. Pokušajte ponovno!")
            window.onclick = window.location = "prijava.php";
          </script>
				<?
      }
		 }
		 else{
			$myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      
      $sql = "SELECT broj_prijave FROM zaposlenici WHERE korisnicko_ime = '$myusername'";
			$result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
			if (password_verify($mypassword, $row['broj_prijave'])){
         $_SESSION['login_user'] = $myusername;
         
         header("location: medias_k.php");
      }
		 	else {?>

					<script type="text/javascript"> 
            alert ("Neispravna lozinka ili korisničko ime. Pokušajte ponovno!")
            window.onclick = window.location = "prijava.php";
          </script>
				<?
      }
		 }
		}
?>