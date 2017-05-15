<?
  $host="localhost";
  $username="ncindric";
  $password="eDFRKTrU";
  $database="ncindric";

  try{
      $conn =new PDO ("mysql:host=$host; dbname=$database;", $username, $password);
  }
  catch(PDOException $e){
      die("Connection failed:" .$e-> getMessage());
  }
?>