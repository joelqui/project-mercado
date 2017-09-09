

        $(document).ready(function () {
          
            
                changePage(1);
 

                $("#stepContainer").on("click",".page", function(){
                        var p = $( this ).attr('id');
                        changePage(p);
                        });
                
                
               
          
            });


function changePage(page){
    console.log("1");
	 $.get("changeContent.php",{page: page}, 
             function(data){
                 console.log("2");
            $('#stepContainer').html(data);
            console.log("3");
            }
         );
}
