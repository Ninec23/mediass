<?
include('session.php');
?>
    <div class="table-responsive">
     <table class="table table-hover" style="color:black;" >
        <tr style="background-color: lightgray;">
          <th>Ime i prezime</th>
          <th>OIB</th>
          <th>spol</th>
          <th>Liječnik</th>
          <th>mjesto stanovanja</th>
          <th>Adresa</th>
          <th>Brisanje pacijenata sa popisa</th>
        </tr>
        <?
          include "inc_conn.php";
          $sql="SELECT * FROM Pacijenti WHERE vlasnik='$user' ";
          $rez=mysqli_query($conn,$sql);
          while($niz=mysqli_fetch_array($rez)){
            $ime=$niz['ime'];
            $OIB=$niz['OIB'];
            $spol=$niz['spol'];
            $lijecnik=$niz['lijecnik'];
            $mjesto_stanovanja=$niz['mjesto'];
            $adresa=$niz['adresa'];
            
            echo"<tr>
                 <td>$ime</td><td>$OIB</td><td>$spol</td><td>$lijecnik</td><td>$mjesto_stanovanja</td><td>$adresa</td>";
                 ?>
        <td><form method="POST" id="izbrisi_pacijenta">
           <input type="hidden" name="OIB" value="<? echo $OIB; ?>">
          <input type="button" id="btn" value="Izbriši" onclick="" class="btn btn-default" style="margin-left:30%;" data-id3="<? echo $niz['OIB'];?>">
          </form></td>
       <div class=".data">
        </div>
                 <?
                 echo "<tr>";
          }
       ?>
    </table>
</div>
</main>