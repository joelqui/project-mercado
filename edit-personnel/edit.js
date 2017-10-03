 $(document).ready(function () {
       

        
        isSelected();

        $("#fami").hide();
        $("#educ").hide();
        makeTextboxUneditable();

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


    $('#region').click(function() {
        retrieveProvince($('#region').val());
    });

     $('#province').click(function() {
        retrieveMunicipality($('#province').val());
    });


    $('#municipality').click(function() {
        retrieveBarangay($('#municipality').val());
    });


    $('#save').click(function(){

         $.get( "update-personnel.php", { 
                 id: $("#holder").find('h2').attr('id') ,
                 lname: $('#addMoreLastName').val() ,
                 fname: $('#addMoreFirstName').val() ,
                 mname: $('#addMoreMiddleName').val() ,
                 suffix: $('#addMoreSuffix').val(),
                 region: $('#region').val(),
                 province: $('#province').val(),
                 municipality: $('#municipality').val(),
                 barangay: $('#barangay').val()
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
                $('#birthdate').val(json[0].birthdate)
                $('#civilstatus').val(json[0].civilstatus);
                $('#empnum').val(json[0].empnum);
                $('#tin').val(json[0].tin);
                $('#gsisnum').val(json[0].gsisnum);
                $('#philhealthnum').val(json[0].philhealthnum);
                console.log( "JSON Data: " + json[0].lname );
                })
                .fail(function( jqxhr, textStatus, error ) {
                var err = textStatus + ", " + error;
                console.log( "Request Failed: " + err );
                });
}

function getPersonnelAddress(){

        $.getJSON( "retrievePersonnelAddress.php", { id: $("#holder").find('h2').attr('id')} )
                .done(function( json ) {
                    retrieveRegion();
                    retrieveProvince(json[0].region);
                    retrieveMunicipality(json[0].province);
                    retrieveBarangay(json[0].municipality);              
                })
                .fail(function( jqxhr, textStatus, error ) {
                var err = textStatus + ", " + error;
                console.log( "Request Failed: " + err );
                });
}

function putPersonnelAddress(){

        $.getJSON( "retrievePersonnelAddress.php", { id: $("#holder").find('h2').attr('id')} )
                .done(function( json ) {
                    
                    $('#region').val(8);
                   // retrieveMunicipality(json[0].province);
                  //  retrieveBarangay(json[0].municipality);              
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
    $('#zipcode').attr('disabled', 'disabled');
}

function isSelected(){
    var school = $("#holder").find('h2').attr('id');
    if (school != 1){
        getPersonnelAddress();
        getPersonnelDetails();
        putPersonnelAddress();

        
    }
}

function retrieveRegion(){
    
    $.get( "retrieveRegion.php")
        .done(function( data ) {
            $('#region').html(data);
        });
}

function retrieveBarangay(municipality){

      $.get( "retrieveBarangay.php", { 
                    select: municipality
                    })
            .done(function( data ) {
                $('#barangay').html(data);
            });

      $.getJSON( "retrieveZipcode.php", {select: municipality} )
                .done(function( json ) {
                $('#zipcode').val(json[0].zipcode);
            });   
        
        
}

function retrieveMunicipality(province){
       $.get( "retrieveMunicipality.php", { 
                    select: province
                    })
            .done(function( data ) {
                $('#municipality').html(data);
            });
}

function retrieveProvince(region){
        $.get( "retrieveProvince.php", { 
                    select: region
                    })
            .done(function( data ) {
                $('#province').html(data);
            });
}

