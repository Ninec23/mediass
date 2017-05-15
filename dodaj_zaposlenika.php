<? include "header.php";?>
      
   </header>
   <main>
      <script>
      $(document).ready(function(){
        $("#btn").click(function(){
          
          $.ajax({
            type:"POST",
            url: "add_zaposlenika.php",
            data: $('#zaposleni').serialize(), 
           success: function(response){
            if (response === '3') { alert('Uspješno!'); window.location = 'dodaj_zaposlenika.php';}
			 else { alert('Neuspješno!'); }  						
          }
          });
        });
      });
      </script>
    <div class="text-center">
      <h3>
        Ovjde možete unjeti novog zaposlenika
      </h3>
       <div class="jumbotron" style="background-color:#E0E0E0;">
            <form  method="POST" id="zaposleni">
              <div class="form-group" >
                <label for="ime"> Ime:</label>
                <input type="tekst" class="form-control input-sm" placeholder="unesite ime zaposlenika" name="ime"/>
              </div>
              <div class="form-group" >
                <label for="prezime"> Prezime:</label>
                <input type="tekst" class="form-control input-sm" placeholder="unesite prezime zaposlenika" name="prezime"/>
              </div>
              <div class="form-group">
                <label for="Spol"> Spol:</label>
                <select name="spol" class="form-control input-sm" />
                  <option value="M" id="M">M</option>
                  <option value="Z" id="Z">Ž</option>
                </select>
              </div> 
              <div class="form-group">
                <label for="broj_prijave"> Broj prijave:</label>
                <input type="tekst" class="form-control input-sm"  placeholder="unesite broj za prijavu" name="broj_prijave" required/>
              </div> 
              <div class="form-group">
                <label for="korisnicko_ime"> Korisničko ime:</label>
                <input type="tekst" class="form-control input-sm"  placeholder="unesite korisničko ime" name="korisnicko_ime" required/>
              </div>
              <div class="form-group">
                <label for="datum_rodenja"> Datum rođenja:</label>
                <input type="date" class="form-control input-sm" placeholder="unesite datum rođenja" name="datum_rodenja"/>
              </div>
              <div class="form-group">
                <label for="mjesto_rodenja"> Mjesto rođenja:</label>
                <input type="tekst" class="form-control input-sm" placeholder="unesite mjesto rođenja" name="mjesto_rodenja"/>
              </div>  
              <div class="form-group">
                <label for="mjesto_stanovanja"> Mjesto stanovanja:</label>
                <input type="tekst" class="form-control input-sm" placeholder="unesite mjesto stanovanja" name="mjesto_stanovanja"/>
              </div>   
                <input type="hidden" name="vlasnik" value="<? echo $user; ?>"/>
                <input type="button" id="btn" value="Unesi" onclick="" class="btn btn-default" style="margin-right:50%;">
        </form>
        <div class=".data">
        </div>
   </div>
   </div>   
  </main>
<? include "footer.php";?>