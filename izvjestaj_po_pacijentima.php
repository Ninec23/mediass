<? include "header.php";?>
   </header>
   <main>
    <div class="table-responsive">
     <table class="table table-hover" style="color:black;">
        <tr style="background-color: lightgray;">
          <th> Redni broj</th>
          <th> Ime pacijenta</th>
          <th> Zaposlenik</th>
          <th> Pocetak obrade pacijenta</th>
          <th> Završetak obrade pacijenta</th>
          <th> DTP postupak</th>
          <th> Ponovljeno</th>
          <th> Vrijeme DTP postuka</th>
          <th> Ukupno vrijeme</th>
          <th> Cijena DTP postupka</th>
          <th> Ukupna cijena</th>
          <?
          $brojac = 1;
          $sql="select a.*, b. cijena, vrijeme from Obrada a inner join DTP b on a.DTP=b.DTP WHERE  a.vlasnik='$user'";
          $rez=mysqli_query($conn,$sql);
          while($niz=mysqli_fetch_array($rez)){ 
            $broj=$brojac++;
            $pacijent=$niz['pacijent'];
            $zaposlenik=$niz['zaposlenik'];
            $start=$niz['start'];
            $kraj=$niz['kraj'];
            $DTP =$niz['DTP'];
            $cijena=$niz['cijena'];
            $vrijeme=$niz['vrijeme'];
            $zbroj=$niz['zbroj'];
            $ukupno_vrijeme=$niz['ukupno_vrijeme'];
            $ukupna_cijena=$niz['ukupna_cijena'];
            
     
     
            echo "<tr>
                  <td> $broj</td><td>$pacijent</td><td>$zaposlenik</td><td>$start</td><td>$kraj</td><td>$DTP</td><td>$zbroj puta mjesečno</td>
                  <td>$vrijeme min</td><td>$ukupno_vrijeme min</td><td>$cijena kn</td><td>$ukupna_cijena kn</td>
                  </tr>";       
          }
        ?>
        <td colspan=6>Ukupno</td>
          
        <?
          if($broj>1){
            $sql="select SUM(zbroj) AS zbroj_sum from Obrada WHERE vlasnik='$user'";
            $rez=mysqli_query($conn, $sql);
            $niz=mysqli_fetch_array($rez);
            $sum_zbroj= $niz['zbroj_sum'];
            echo "<td>$sum_zbroj puta</td>"; 
          }  
       else{
            echo "<td>$zbroj puta</td>";
          }
       if($broj>1){
            $sql="select a.*, SUM(b.vrijeme) AS vrijeme_sum from Obrada a inner join DTP b on a.DTP=b.DTP WHERE a.vlasnik='$user'";
            $rez=mysqli_query($conn, $sql);
            $niz=mysqli_fetch_array($rez);
            $sum_vrijeme= $niz['vrijeme_sum'];
            echo "<td>$sum_vrijeme min</td>";   
          }  
       else{
            echo "<td>$vrijeme min</td>";
          }  
       if($broj>1){
             $sql="select SUM(a.ukupno_vrijeme) AS ukupno_vrijeme_sum, b.* from Obrada a inner join DTP b on a.DTP=b.DTP WHERE a.vlasnik='$user'";
             $rez=mysqli_query($conn, $sql);
             $niz=mysqli_fetch_array($rez);
             $sum_ukupno_vrijeme= $niz['ukupno_vrijeme_sum'];
             echo "<td>$sum_ukupno_vrijeme min</td>";
          }  
       else{
            echo "<td>$ukupno_vrijeme min</td>";
          }
       if($broj>1){
             $sql="select a.*, SUM(b.cijena) AS cijena_sum from Obrada a inner join DTP b on a.DTP=b.DTP WHERE a.vlasnik='$user'";
             $rez=mysqli_query($conn, $sql);
             $niz=mysqli_fetch_array($rez);
             $sum_cijena= $niz['cijena_sum'];
             echo "<td>$sum_cijena kn</td>";
          }  
       else{
            echo "<td>$cijena kn</td>";
          }  
       if($broj>1){
            $sql="select SUM(a.ukupna_cijena) AS ukupna_cijena_sum, b.* from Obrada a inner join DTP b on a.DTP=b.DTP WHERE a.vlasnik='$user'";
            $rez=mysqli_query($conn, $sql);
            $niz=mysqli_fetch_array($rez);
            $sum_ukupna_cijena= $niz['ukupna_cijena_sum'];
            echo "<td>$sum_ukupna_cijena min</td>"; 
          }  
       else{
            echo "<td>$ukupna_cijena kn</td>";
       }
     ?>
      </table>
     </div>
 </main>
<? include "footer.php";?>