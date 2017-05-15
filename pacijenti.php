<? include "header.php";?>
    </header>
   <main>
      <script>
    $(document).ready(function(){
      $("#btn").click(function(){
        
        $.ajax({
          type:"POST",
          url: "add_pacijenti.php",
          data: $('#pacijenti').serialize(),
          success: function(response){
            if (response === '3') { alert('Uspješno dodan novi pacijent!'); window.location = 'obrada.php';}
			 else { alert('Ups! Pacijent nije dodan, molimo Vas da pokušate ponovno!!'); }  						
          }
        });
      });
    });
    </script>
      <div class="text-center" style="margin-top:10px;">
        <h3>
            Ovjde možete unjeti podatke o pacijentu!
        </h3>
      <div class="jumbotron">
        <form  method="POST" id="pacijenti">
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="ime"> Ime i prezime:</label>
              <input type="tekst" class="form-control input-sm" placeholder="Unesite ime i prezime pacijenta" name="ime" id="ime"/>
          </div>
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="OIB"> OIB:</label>
              <input type="tekst" class="form-control input-sm" placeholder="Unesite OIB pacijenta" name="OIB"/>
          </div>     
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="Spol"> Spol:</label>
              <select name="spol" class="form-control input-sm" />
                <option value="M" id="M">M</option>
                <option value="Z" id="Z">Ž</option>
              </select>
          </div> 
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="lijecnik"> Lijecnik:</label>
              <input type="tekst" class="form-control input-sm" placeholder="Unesite ime liječnika" name="lijecnik"/>
          </div> 
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="mjesto"> Mjesto stanovanja:</label>
              <input type="tekst" class="form-control input-sm" placeholder="Unesite mjesto stanovanja" name="mjesto_stanovanja"/>
          </div>         
          <div class="form-group" style=" width:40%;margin-left:30%;" >
              <label for="adresa"> Adresa:</label>
              <input type="tekst" class="form-control input-sm" placeholder="Upišite adresu" name="adresa"/>
          </div>          
              <input type="hidden" name="vlasnik" value="<? echo $user; ?>" />
              <input type="button" id="btn" value="Insert" onclick="" class="btn btn-default" style="margin-right:40%;">
        </form>
        </div>
      </div>
  </main>
<? include "footer.php";?>