

        $(document).ready(function () {
          
            
                changePage(1);
 

                $("#tableContainer").on("click",".page", function(){
                        var p = $( this ).attr('id');
                        changePage(p);
                        });
                
                
               
          
            });


function changePage(page){
    console.log("1");
	 $.get("changeContent.php",{page: page}, 
             function(data){
                 console.log("2");
            $('#tableContainer').html(data);
            console.log("3");
            }
         );
}
