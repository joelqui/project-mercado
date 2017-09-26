 $(document).ready(function () {
          
        isSelected();

        console.log('I JUST WANNA BE FUCKED IN THE ASS!');
        $("#fami").hide();
        $("#educ").hide();
        //makeTextboxUneditable();


        $('#perstab').click(function(){
        $("#pers").show();
        $("#fami").hide();
        $("#educ").hide();
        $('#perstab').addClass("active");
        $('#famitab').removeClass("active");
        $('#eductab').removeClass("active");
    });

    $('#famitab').click(function(){
        $("#pers").hide();
        $("#fami").show();
        $("#educ").hide();
        $('#perstab').removeClass("active");
        $('#famitab').addClass("active");
        $('#eductab').removeClass("active");
    });

    $('#eductab').click(function(){
        $("#pers").hide();
        $("#fami").hide();
        $("#educ").show();
        $('#perstab').removeClass("active");
        $('#famitab').removeClass("active");
        $('#eductab').addClass("active");
    });

    $('#save').click(function(){
         $.get( "update-personnel.php", { 
                 id: $("#holder").find('h2').attr('id') ,
                 lname: $('#addMoreLastName').val() ,
                 fname: $('#addMoreFirstName').val() ,
                 mname: $('#addMoreMiddleName').val() ,
                 suffix: $('#addMoreSuffix').val() 
                })
        .done(function( data ) {
            alert('EDIT SUCCESS!!!!');
        });
    });
});

function getPersonnelDetails(){

        $.getJSON( "retrievePersonnelDetails.php", { id: $("#holder").find('h2').attr('id')} )
                .done(function( json ) {
                $('#addMoreLastName').val(json[0].lname);
                $('#addMoreFirstName').val(json[0].fname);
                $('#addMoreMiddleName').val(json[0].mname);
                $('#addMoreSuffix').val(json[0].suffix);

                console.log( "JSON Data: " + json[0].lname );
                })
                .fail(function( jqxhr, textStatus, error ) {
                var err = textStatus + ", " + error;
                console.log( "Request Failed: " + err );
                });
}


function makeTextboxUneditable(){
    $('#addMoreLastName').attr('disabled', 'disabled');
    $('#addMoreFirstName').attr('disabled', 'disabled');
    $('#addMoreMiddleName').attr('disabled', 'disabled');
    $('#addMoreSuffix').attr('disabled', 'disabled');
}

function isSelected(){
    var school = $("#holder").find('h2').attr('id');
    if (school != 1){
        getPersonnelDetails();
    }
}

