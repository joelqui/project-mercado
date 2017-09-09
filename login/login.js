
$(document).ready(function(){
  
        $("#loginForm").submit(function(event) {
            event.preventDefault();
           $.post("verifylogin.php",{
                username: $("#inputUserName").val(),
                password: $("#inputPassword").val(),
                },
                successFn,
                "text");
            });
        });


function successFn(result){
    var msg = '<div class="alert alert-warning"><strong>Incorrect</strong> credentials!</div>';

    if(result==1){
        window.location.href = "../";
        console.log('Yes');
        
        
        }
    else if(result==0){
        console.log('No');
         console.log(msg);
        $("#loginNotify").html(msg);
         
         
    }
}  

       
  

