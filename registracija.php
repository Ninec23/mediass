<?
  include "head.php";
   include "zaglavlje.php";
?>
<script>
      $(document).ready(function(){
        $("#btn").click(function(){
          
          $.ajax({
            type:"POST",
            url: "add_reg.php",
            data: $('#registracija').serialize (), 
            success: function(response){
            if (response === '3') { alert('Uspješno ste se registrirali!'); window.location = 'medias_k.php';  }
			 else { alert('Ups! Registracija nije dobro izvršena, molimo Vas da pokušate ponovno!!'); }  						
          }
          });
        });
      });
      </script>
  <main>
		<div class="jumbotron">
        <h2 class="text-center">
           Molimo Vas da svoju tvrtku prijavite u sustav.
        </h2><br>
        <form method="POST" id="registracija">
            <div class="form-group" >
              <label for="naziv"> Naziv tvrtke:</label>
              <input type="text" class="form-control input-sm" placeholder="unesite naziv tvrtke" name="tvrtka" />
          </div>
          <div class="form-group" >
              <label for="vlasnik"> Vlasnik tvrtke:</label>
              <input type="text" class="form-control input-sm" placeholder="unesite ime vlasnika" name="vlasnik"  />
          </div>  
          <div class="form-group" >
              <label for="sjediste"> Sjedište tvrtke:</label>
              <input type="text" class="form-control input-sm" placeholder="unesite sjedište tvrtke" name="sjediste" />
          </div>      
          <div class="form-group" >
              <label for="datum"> Datum osnivanja:</label>
              <input type="date" class="form-control input-sm" placeholder="unesite datum osnivanja" name="datum_osnivanja">
          </div>    
          <div class="form-group" >
              <label for="email"> Email:</label>
              <input type="email" class="form-control input-sm" placeholder="unesite svoj email" name="email" required >
          </div>  
          <div class="form-group has-warning has-feedback">
            <label for="Korisnicko_ime">Korisnicko ime:</label>
            <input type="text" class="form-control input-sm" placeholder="unesite svoje korisnicko ime" name="kime" required >
            <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
          </div>
          <div class="form-group has-warning has-feedback">
            <label for="password">Password:</label>
            <input type="password" class="form-control input-sm" placeholder="unesite broj za prijavu" name="password" required >
            <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
          </div>
          <div class="form-group has-warning has-feedback">
            <label for="oznaka">Oznaka:</label>
            <input type="password" class="form-control input-sm" placeholder="unose samo vlasnici" name="oznaka" required >
            <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span> 
          </div>
          
              <input type="button" class="btn btn-default" id="btn" value="Registriraj" onclick="">
         </form><br>
        <div class="text-center">
          <h5>
           Ukoliko imate registriranu tvrtku, molimo da se <a href="prijava.php" > prijavite.</a> Hvala!
          </h5>
       </div>
    </div>
  </main>
<? include "footer.php";?>