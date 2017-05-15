<?include "inc_conn.php";
  include "head.php";
  include('session.php');
  setlocale( LC_ALL, "hr_HR.utf8" );
?>
<link rel="stylesheet" type="text/css" href="style.css" >
<div class="page-header" style="background-color:#99CCFF;margin-top:0%;padding-top:5px;margin-left:0%;">
<div class="media">
  <ul class="nav navbar-nav navbar-right" style="margin-left:65%;display:inline-block;">
        <li><a href="odjava.php"><span class="glyphicon glyphicon-log-out"></span> Odjava </a></li>
      </ul>
        <div class="media-left">
         <img src="slike/depositphotos_3882693-Cartoon-nurse.jpg" class="media-object" style="width:50px; margin-left:10px;">
    </div>
    <div class="media-body">
      <h3 class="media-heading" style="margin-top:25px;"><a href="index.php" style="text-decoration:none;"> <?=$name ?></a></h3>
    </div>
        <a href="medias.php" >
            <img src='slike/nurse.jpg' alt='slika profila' class='img-circle'>
  </a>
      <div class="text-center">
        <h1  style="color:#808080;margin-top:0%;">Dobro došli, <?php echo $user; ?></h1>           
      </div>
    </div>
 <? include "navigacija.php"; ?>