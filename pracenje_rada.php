<? include "header.php";?>
   
   </header>
   <main>
   
   <div id="izbrisi_pracenje">
     </div>
     <script>     
      $(document).ready(function(){
        
           function fetch_data()
        {
          $.ajax({
            type:"POST",
            url: "pracenje_rada2.php",
            success: function(data) {
              $('#izbrisi_pracenje').html(data);
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
            url: "brisi_pracenje.php",
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