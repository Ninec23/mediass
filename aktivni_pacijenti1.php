<?
include('session.php');
?> 
<div class="table-responsive">
     <table class="table table-hover" style="color:black;">
        <tr style="background-color: lightgray;">
          <th>Ime i prezime</th>
          <th>OIB</th>
          <th>Spol</th>
          <th>Mjesto stanovanja</th>
          <th> DTP</th>
          <th>Zaposlenik</th>
          <th> Start obrade</th>
          <th> Kraj obrade</th>
          <th> Id obrade</th>
          <th> Brisanje pacijenata iz procesa obrade</th>
        </tr>
        <?
      
          include "inc_conn.php";
          $datum= date('Y-m-d');
          $sql="SELECT a.*, b.* FROM Pacijenti a inner join Obrada b on a.ime = b.pacijent WHERE a.vlasnik= '$user' AND b.start > $datum < b.kraj";
          $rez=mysqli_query($conn,$sql);
          while($niz=mysqli_fetch_array($rez)){
              $ime=$niz['ime'];
              $OIB=$niz['OIB'];
              $spol=$niz['spol'];
              $mjesto_stanovanja=$niz['mjesto'];
              $DTP=$niz['DTP'];
              $zaposlenik=$niz['zaposlenik'];
              $start=$niz['start'];
              $kraj=$niz['kraj'];
              $id_obrade=$niz['id_obrade'];
              
              echo"<tr>
                  <td>$ime</td><td>$OIB</td><td>'$spol'</td>
                  <td>$mjesto_stanovanja</td><td>$DTP</td><td>$zaposlenik</td>
                  <td>$start</td><td>$kraj</td><td>$id_obrade</td>"
                 ?>
       
        <td><form method="POST" id="izbrisi_aktivne">
           <input type="hidden" name="id_obrade" id="id_obrade" value="<? echo $id_obrade; ?>">
          <input type="button" id="btn" value="Izbriši" onclick="" class="btn btn-default" data-id3="<? echo $niz['id_obrade'];?>">
          </form></td>
       <div class=".data">
        </div>
                 <?
                 echo "<tr>";
          }?>
    </table>
  </div>
</main>