

        $(document).ready(function () {
          
                changePage(1);
 

                $("#retireContainer").on("click",".page", function(){
                        var p = $( this ).attr('id');
                        changePage(p);
                        });
                
                
               
          
            });


function changePage(page){
    console.log("1");
	 $.get("changeRContent.php",{page: page}, 
             function(data){
                 console.log("2");
            $('#retireContainer').html(data);
            console.log("3");
            }
         );
}
