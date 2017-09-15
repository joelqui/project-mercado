//script for user menu option visibility
$(document).ready(function () {

    var shit = $('#user').find('a').attr('id');
    console.log(shit);

    if(shit!=1){
        $('#manageUsersOption').hide();
        console.log('shit');    
    }            
});

      

       
  

