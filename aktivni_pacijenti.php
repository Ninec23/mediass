 <?  include "header.php";?>
   </header>
   <main>
      <div id="aktivni_pacijenti">
     </div>
     <script>     
      $(document).ready(function(){
        
           function fetch_data()
        {
          $.ajax({
            type:"POST",
            url: "aktivni_pacijenti1.php",
            success: function(data) {
              $('#aktivni_pacijenti').html(data);
        }
          });
        }
        fetch_data ();
        
       $(document).on('click','#btn', function(){
          var id=$(this).data("id3");
          if(confirm("Želite li izbrisati?")){
            alert (id);
          $.ajax({
            type:"POST",
            url: "izbrisi_aktivne.php",
            data:{id:id},
            success: function(data) {
              fetch_data();
              }
          });
          };
        });
      });
      </script>
<? include "footer.php";?>