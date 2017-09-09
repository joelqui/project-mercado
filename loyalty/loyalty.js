

        $(document).ready(function () {
          
                changePage(1);
 

                $("#loyaltyContainer").on("click",".page", function(){
                        var p = $( this ).attr('id');
                        changePage(p);
                        });
                
                
               
          
            });


function changePage(page){
    console.log("1");
	 $.get("changeLContent.php",{page: page}, 
             function(data){
                 console.log("2");
            $('#loyaltyContainer').html(data);
            console.log("3");
            }
         );
}
