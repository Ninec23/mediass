<?php
 session_start();

 require 'database.php';

    if(!empty($_POST['kime']) && !empty($_POST['password']) && !empty ($_POST['oznaka'])):
      $tvrtka=$_POST['tvrtka'];
      $vlasnik=$_POST['vlasnik'];
      $sjediste=$_POST['sjediste'];
      $datum_osnivanja=$_POST['datum_osnivanja'];
      $email=$_POST['email'];
      $oznaka=$_POST['oznaka'];

      $sql= "INSERT INTO Medias (kime, password, tvrtka, vlasnik, sjediste, datum, oznaka,email) 
             VALUES (:kime, :password, '$tvrtka', '$vlasnik', '$sjediste', '$datum_osnivanja',:oznaka,'$email')";
      
      $stmt= $conn->prepare($sql);


      $stmt->bindParam(':kime', $_POST['kime']);
      $hash = password_hash($_POST['password'],PASSWORD_BCRYPT);
      $stmt->bindParam(':password',$hash);
      $hash1 = password_hash($_POST['oznaka'],PASSWORD_BCRYPT);
      $stmt->bindParam( ':oznaka',$hash1);
 
     if($stmt->execute()){ 
            echo 3; die();
        } 
endif;
?>