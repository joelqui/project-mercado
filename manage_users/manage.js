
$(document).ready(function(){
  
        changePage(1);
        updateMenus();

        //EventListener when adding new user
        $('#addUser').click(function() {
            $.post("addUser.php",{
                lastname: $('#lastname').val(),
                firstname: $('#firstname').val(),
                username: $('#username').val(),
                password: $('#password').val(),
                deptcode: $('#dept').val(),
                usertype: $('#usertype').val()
                },
                addFn,
                "text");
            });
 
        //EventListener when closing the addUser modal
        $('#closeUserMenu').click(function() {
                $('#lastname').val("");
                $('#firstname').val("");
                $('#username').val("");
                $('#password').val("");
                $('#dept').val("");
                $('#usertype').val("");
                $('#userAlert').html("");
            });

        //EventListener when changing the userpassword
        $('#changePasswordButton').click(function() {
              $.post("changepassword.php",{
                id: $('#changePass').find('h4').data('value'),
                p1: $('#password1').val(),
                p2: $('#password2').val()
                },
                changeFn,
                "text");   
            });
        
        $('#closePassword').click(function() {
              $('#passwordAlert').html("");
              $('#password1').val("");
              $('#password2').val("");
            });

        
        

        $("#usersContainer").on("click",".page", function(){
                        var p = $( this ).attr('id');
                        changePage(p);
                        });

        $("#usersContainer").on("click",".btn", function(){
                        $('#changePass h4').remove();
                        $.get("retrieveUser.php", {id: $(this).val()},
                            function(data){
                            $('#changePass').prepend(data);
                            }
                         );
                        });


});

//Retrieves the Department and the Usertypes
function updateMenus(){
	 $.get("retrieveDepts.php", 
             function(data){
                 console.log('department');
            $('#dept').html(data);
            }
         );
     $.get("retrieveUserTypes.php", 
             function(data){
            $('#usertype').html(data);
            }
         );
}

//Displays users from the database
function changePage(page){
	 $.get("retrieveUsers.php",{page: page}, 
             function(data){
            $('#usersContainer').html(data);
            }
         );
}


function addFn(result){
    var msgleft = '<div class="alert alert-success col-xs-offset-1 col-xs-10">';
    var msgright = '</div>';
    console.log(result);
    if (result == 0)
        msgright = '<strong>Unknown</strong> error occured.</div>';
    else if (result == 1){
        msgright = '<strong>User</strong> successfully added.</div>';
        $('#lastname').val("");
        $('#firstname').val("");
        $('#username').val("");
        $('#password').val("");
        $('#dept').val("");
        $('#usertype').val("");
    }
    else if (result == 2){
        msgright = '<strong>Last Name</strong> must not be NULL.</div>';
        $('#password').val("");
    }
    else if (result == 3){
        msgright = '<strong>First Name</strong> must not be NULL.</div>';
        $('#password').val("");
    }
    else if (result == 4){
        msgright = '<strong>Username</strong> invalid.</div>';
        $('#password').val("");
    }
    else if (result == 5){
        msgright = '<strong>Password</strong> must be more than 6 characters.</div>';
        $('#password').val("");
    }  
    else if (result == 6){
        msgright = '<strong>Department</strong> must not be NULL.</div>';
        $('#password').val("");
    }
    else if (result == 6){
        msgright = '<strong>Usertype</strong> must not be NULL.</div>';
        $('#password').val("");
    }
        
    $('#userAlert').html(msgleft+msgright);

    }

function changeFn(result){
    var msgleft = '<div class="alert alert-success col-xs-offset-1 col-xs-10">';
    var msgright = '</div>';

  if (result == 0)
        msgright = '<strong>Unknown</strong> error occured.</div>';
    else if (result == 1)
        msgright = '<strong>Password</strong> successfully changed.</div>';
    else if (result == 2)
        msgright = '<strong>Passwords</strong> must match.</div>';
    else if (result == 3)
        msgright = '<strong>Passwords</strong> must be more than 6 characters.</div>';
    
    $('#password1').val("");
    $('#password2').val("");    
    
    $('#passwordAlert').html(msgleft+msgright);  

    }


    

