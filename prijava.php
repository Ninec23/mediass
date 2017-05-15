<? include "head.php";
   include "zaglavlje.php";?>
   <main>
     <div class="jumbotron" style="padding-top:2px;padding-bottom:2px;">
        <h2 class="text-center">
            Molimo Vas da se prijavite u sustav.
        </h2><br><br>
        <form id='login-form' action="login.php" method="POST">
					<div class="form-group" >
              <label for="korisnicko_ime"> Korisničko ime:</label>
              <input type="text" class="form-control input-sm" placeholder="Unesite svoje korisničko ime" name="username"/>
          </div>
					<div class="form-group" >
              <label for="lozinka"> Lozinka:</label>
              <input type="password" class="form-control input-sm" placeholder="Unesite lozinku" name="password"/>
          </div>
					<div class="form-group" >
              <label for="oznaka"> Oznaka:</label>
              <input type="password" class="form-control input-sm" placeholder="Unesite oznaku ako ste vlasnik" name="oznaka"/>
          </div>
                <input type="submit"  class="btn btn-default" value="Prijavi se" />
        </form><br>
       	<div class="text-center">
          <h5>
              Ukoliko još nemate registriranu tvrtku, molimo da se <a href="registracija.php" >registrirate.</a> Hvala!
          </h5>
       </div>
    </div>
  </main>
  <script>
   $('#login-form').on('submit', function (e) { e.preventDefault(); 
	   $.ajax({ method: 'POST', url: 'login.php', data: $(this).serialize(), success: function (response) { 
			 if (response === '1') { window.location = 'medias.php'; }
			 else if(response === '2') { window.location = 'medias_k.php'; }
			 else { alert('Neispravno korisnicko ime ili lozinka!'); }  
		 }})																						
	 });

  </script>
<? include "footer.php";?>