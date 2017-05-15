<? include "header.php"; ?>
    </header>
      <div class="well">
        <?     
        include "inc_conn.php";
        $hrformat = "Danas je %d.%m.%Y. godine <br> Vrijeme je %H:%M:%S";
        $res = strftime($hrformat);
        $vrijeme = iconv('ISO-8859-2', 'UTF-8', $res);
        echo $vrijeme ;
        ?> 
      </div>
      <script>
        $(document).ready(function(){
          $("#btn").click(function(){
        
        $.ajax({
          type:"POST",
          url: "add_medias.php",
          data: $('#medias').serialize(),
         success: function(response){
            if (response === '3') { alert('Uspješno izvršena obrada!'); window.location = 'medias.php'; }
			 else { alert('Ups! Obrada nije dobro izvršena, molimo Vas da pokušate ponovno!'); }  						
          }
            });
        });
      });
      </script>
      <div class="jumbotron" style="background-color:#FFFF99;">
        <?
        $datum= date('Y-m-d');
        $sql="SELECT a.*, b.OIB, mjesto, adresa FROM Obrada a INNER JOIN Pacijenti b  ON a.pacijent= b.ime 
              WHERE a.vlasnik= '$user' AND a.zaposlenik='$user'AND a.start > $datum < a.kraj";
        $rez=mysqli_query($conn, $sql);
        while ($niz=mysqli_fetch_array($rez)){
          $pacijent=$niz['pacijent'];
          $OIB=$niz['OIB'];
          $mjesto_stanovanja=$niz['mjesto'];
          $adresa=$niz['adresa'];
          $DTP = $niz['DTP'];
          
          $vlasnik=$niz['vlasnik'];
          if($niz['pon']==1){$pon='ponedjeljak';}else{$pon='';}
          if($niz['uto']==1){$uto='utorak';} else{$uto='';}
          if($niz['sri']==1){$sri='srijeda';}else{$sri='';}
          if($niz['cet']==1){$cet='četvrtak';}else{$cet='';}
          if($niz['pet']==1){$pet='petak';}else{$pet='';}
          ?>
       
        <div class="text-center" >
            <h3>
              <? echo $pacijent; ?>
          </h3>
        </div>
			<div class="text-justify" style="margin-left:20%;">
        <?
          echo " <br> OIB: $OIB<br> $mjesto_stanovanja, $adresa <br> 
                  Potrebno uraditi: $DTP <br> Obradu pacijenta ponoviti:<br> <strong> $pon $uto $sri $cet $pet </strong><br><br>" ;
          
                 $komentar="Ovdje možete upisati komentar o posjeti pacijentu!";
          echo "</div>";
          ?>
        <form  method="POST" id="medias">
          
          <input type="hidden" name="zaposlenik" value="<? echo $user; ?>" />
          <input type="hidden" name="pacijent" value="<? echo $pacijent; ?>">
          <input type="hidden" name="DTP" value="<? echo $DTP; ?>">
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="komentar" style="margin-left:25%;"> Komentar:</label>
              <textarea class="form-control" cols="80" rows="7" name="komentar"><? echo $komentar; ?></textarea><br>
          </div>
          <input type="hidden" name="datum" value="<? echo $datum; ?>">
          <input type="hidden" name="vrijeme" value="<? echo $vrijeme= date('H:i:s');; ?>">
          <input type="hidden" name="vlasnik" value="<? echo $vlasnik; ?>">
          <input type="button" class="btn btn-default" id="btn" value="Insert" onclick="" ><br><br>
        </form>
         <?
        }
            ?>
       
      </div>
        
<? include ("footer.php"); ?>