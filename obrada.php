<? include "header.php";?>
   </header>
   <main>
      <script>
    $(document).ready(function(){
      $("#btn").click(function(){
        
        $.ajax({
          type:"POST",
          url: "add_obrada.php",
          data: $('#obrade').serialize (),
        success: function(response){
            if (response === '3') { alert('Uspješno definirana obada pacijenta!');window.location = 'obrada.php'; }
			 else { alert('Ups! Obrada nije dobro definirana, molimo Vas da pokušate ponovno!'); }  						
          }
        });
      });
    });
    </script>
     <div class="text-center">
       <h3>
            Ovdje definirajte parametre obrade pojedinog pacijenta!
        </h3>
       <div class="jumbotron" >
      <form method="POST" id="obrade">
        <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="zaposlenik"> Zaposlenik:</label>
              <select name="zaposlenik" class="form-control input-sm" />
                <?
                  include "inc_conn.php";
                  $sql="select * from Zaposlenici where vlasnik='$user' ";
                  $rez=mysqli_query($conn, $sql);
                  while($niz=mysqli_fetch_array($rez)){
                    $s="";
                    $ime=$niz['korisnicko_ime'];
                    if($ime==$odabrano){$s="selected";} else {$s="";};
                    echo "<option value='$ime' id='ime' $s> $ime </option>";
                  }
                ?>
                <option value="<? echo $user; ?>" id="ime_vlasnik"> <? echo $user; ?></option>
              </select>
          </div> 
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="vlasnik"> Vlasnik:</label>
              <select name="vlasnik" class="form-control input-sm" />
                <?
                  include "inc_conn.php";
                  echo "<option value='$user' > $user </option>";
                ?>
              </select>
          </div>
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="pacijent"> Pacijent:</label>
              <select name="pacijent" class="form-control input-sm" />
                <?
                  include "inc_conn.php";
                  $sql="select * from Pacijenti WHERE vlasnik='$user'";
                  $rez=mysqli_query($conn, $sql);
                  while($niz=mysqli_fetch_array($rez)){
                    $s="";
                    $ime=$niz['ime'];
                    $prezime=$niz['prezime'];
                    if($ime==$odabrano){$s="selected";} else {$s="";};
                    echo "<option value='$ime $prezime' $s> $ime $prezime</option>";
                  }
                ?>
              </select>
          </div> 
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="DTP"> DTP postupak:</label>
              <select name="DTP" class="form-control input-sm" />
                <?
                  include "inc_conn.php";
                  $sql="select * from DTP";
                  $rez=mysqli_query($conn, $sql);
                  while($niz=mysqli_fetch_array($rez)){
                    $s="";
                    $DTP=$niz['DTP'];
                    if($DTP==$odabrano){$s="selected";} else {$s="";};
                    echo "<option value='$DTP' $s> $DTP </option>";
                  }
                ?>
              </select>
          </div> 
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="start"> Datum početka:</label>
              <input type="date" class="form-control input-sm" placeholder="Unesite datum početka obrada" name="start" id="start"/>
          </div>
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="kraj"> Datum kraja:</label>
              <input type="date" class="form-control input-sm" placeholder="Unesite datum kraja obrada" name="kraj" id="kraj"/>
          </div>
          <label class="checkbox-inline">
            <input type="checkbox" name="pon" id="pon" > Ponedjeljak
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="uto" id="uto" > Utorak
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="sri" id="sri" > Srijeda
          </label>    
          <label class="checkbox-inline">
            <input type="checkbox" name="cet" id="cet" > Četvrtak
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="pet" id="pet" >  Petak 
          </label><br><br>
          <input type="button" id="btn" value="Insert" onclick="" class="btn btn-default" style="margin-right:50%;">
             
        </form> 
     </div>
     </div>
     </div>
  </main>
<? include "footer.php";?>