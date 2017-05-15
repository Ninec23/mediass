<?
include('session.php');
?>
<div class="jumbotron text-justify" style="background-color:#FFFF99;">
         <div class="text-center">
       <h3>
         Ovdje možete vidjeti podatke o obradi pacijentat od strane Vaših zaposlenika!
       </h3>
     </div>
   <?    
     include "inc_conn.php";
     $sql="SELECT * FROM Obrada_Gotova WHERE vlasnik='$user'";
     $rez=mysqli_query($conn, $sql);
     while($niz=mysqli_fetch_array($rez)){
       $zaposlenik=$niz['zaposlenik'];
       $pacijent=$niz['pacijent'];
       $DTP=$niz['DTP'];
       $datum=$niz['datum'];
       $vrijeme=$niz['vrijeme'];
       $komentar=$niz['komentar'];?> 
       <?
       echo " <p><br> - Zaposlenik $zaposlenik je obradio pacijenta $pacijent primjenom $DTP usluga. 
              Obrada pacijenta je izvršena $datum u $vrijeme sati. Zaposlenik je ostavio komentar: $komentar";
       echo "</p>";
         ?>
      <form method="POST" id="izbrisi_pracenje">
           <input type="hidden" name="komentar" value="<? echo $komentar; ?>">
           <input type="button" id="btn" value="Izbriši" onclick="" class="btn btn-default" style="margin-left:40%;" data-id3="<? echo $niz['komentar'];?>">
      </form>
  <?
           }
         ?>
       </div>
 </main>