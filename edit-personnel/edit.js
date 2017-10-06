$(document).ready(function () {
       
    //Add JQuery UI to date collectors
    
        addDatePackage();

        isSelected();

        $("#fami").hide();
        $("#educ").hide();
       // makeTextboxUneditable();

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
        console.log($('#region').val());
        retrieveProvince($('#region').val(),'');
    });

     $('#province').click(function() {
        retrieveMunicipality($('#province').val(),'');
    });


    $('#municipality').click(function() {
        retrieveBarangay($('#municipality').val(),0);
    });


    $('#save').click(function(){

         $.get( "update-personnel.php", { 
                 id: $("#holder").find('h2').attr('id') ,
                 lname: $('#addMoreLastName').val(),
                 fname: $('#addMoreFirstName').val(),
                 mname: $('#addMoreMiddleName').val(),
                 suffix: $('#addMoreSuffix').val(),
                 birthdate: $('#birthdate').val(),
                 birthplace: $('#birthplace').val(),
                 sex: $('#sex').val(),
                 civilstatus: $('#civilstatus').val(),
                 email: $('#email').val(),
                 celno: $('#celno').val(),
                 telno: $('#telno').val(),
                 height: $('#height').val(),
                 weight: $('#weight').val(),
                 bloodtype: $('#bloodtype').val(),
                 region: $('#region').val(),
                 province: $('#province').val(),
                 municipality: $('#municipality').val(),
                 barangay: $('#barangay').val(),
                 zipcode: $('#zipcode').val(),

                 empnum: $('#empnum').val(),
                 tin: $('#tin').val(),
                 sssnum: $('#sssnum').val(),
                 gsisnum: $('#gsisnum').val(),
                 philhealthnum: $('#philhealthnum').val(),
                 pagibignum: $('#pagibignum').val(),

                 slastname: $('#slastname').val(),
                 sfirstname: $('#sfirstname').val(),
                 smiddlename: $('#smiddlename').val(),

                 flastname: $('#flastname').val(),
                 ffirstname: $('#ffirstname').val(),
                 fmiddlename: $('#fmiddlename').val(),

                 mlastname: $('#mlastname').val(),
                 mfirstname: $('#mfirstname').val(),
                 mmiddlename: $('#mmiddlename').val()
                })
        .done(function( data ) {
           alert(data);
        });
    });

    $('#addChild').click(function(){
         $.get( "addChild.php", { 
                    id: $("#holder").find('h2').attr('id'),
                    cname: $('#childname').val(),
                    bdate: $('#childbdate').val()
                    })
            .done(function( data ) {
                if (data==1){
                    retrieveChildren();
                    $('#childname').val('');
                    $('#childbdate').val('');
                    }
                else
                    alert('Something went wrong!!');
            });
    });

    //Listener when deleting a child
    $('#childrenContainer').on('click','button',function(){
        $.get( "deleteChild.php", { 
                    dependent_id: $(this).parent().parent().data('id')
                    })
            .done(function( data ) {
                if (data==1){
                    retrieveChildren();
                    }
                else
                    alert('Something went wrong!!');
            });
    });

    $('#addChildButton').click(function(){
        console.log('shit');
         retrieveChildren();
    });
    
  

});


function addDatePackage(){
    $( '#birthdate, #childbdate').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
}



function getPersonnelDetails(){

        $.getJSON( "retrievePersonnelDetails.php", { id: $("#holder").find('h2').attr('id')} )
                .done(function( json ) {
                $('#addMoreLastName').val(json[0].lname);
                $('#addMoreFirstName').val(json[0].fname);
                $('#addMoreMiddleName').val(json[0].mname);
                $('#addMoreSuffix').val(json[0].suffix);
                $('#birthdate').val(json[0].birthdate);
                $('#birthplace').val(json[0].birthplace);
                $('#sex').val(json[0].sex);
                $('#civilstatus').val(json[0].civilstatus);

                $('#email').val(json[0].email);
                $('#celno').val(json[0].celno);
                $('#height').val(json[0].height);
                $('#weight').val(json[0].weight);
                $('#bloodtype').val(json[0].bloodtype);
                $('#telno').val(json[0].telno);

                $('#empnum').val(json[0].empnum);
                $('#tin').val(json[0].tin);
                $('#sssnum').val(json[0].sssnum);
                $('#gsisnum').val(json[0].gsisnum);
                $('#philhealthnum').val(json[0].philhealthnum);
                $('#pagibignum').val(json[0].pagibignum);

                $('#slastname').val(json[0].slastname);
                $('#sfirstname').val(json[0].sfirstname);
                $('#smiddlename').val(json[0].smiddlename);

                $('#flastname').val(json[0].flastname);
                $('#ffirstname').val(json[0].ffirstname);
                $('#fmiddlename').val(json[0].fmiddlename);

                $('#mlastname').val(json[0].mlastname);
                $('#mfirstname').val(json[0].mfirstname);
                $('#mmiddlename').val(json[0].mmiddlename);
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
                    retrieveRegion(json[0].region);
                    retrieveProvince(json[0].region,json[0].province);
                    retrieveMunicipality(json[0].province,json[0].municipality);
                    retrieveBarangay(json[0].municipality,json[0].barangay);              
                })
                .fail(function( jqxhr, textStatus, error ) {
                var err = textStatus + ", " + error;
                console.log( "Request Failed: " + err );
                });
}

function retrieveChildren(){
        $.get( "retrieveChildren.php", { 
                    id: $("#holder").find('h2').attr('id')
                    })
            .done(function( data ) {
                $('#childrenContainer').html(data);
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
   
        //putPersonnelAddress();
    }
}

function retrieveRegion(s){
    $.get( "retrieveRegion.php",{
                slctd: s
                })
        .done(function( data ) {
            $('#region').html(data);
        });
}

function retrieveBarangay(municipality,s){

      $.get( "retrieveBarangay.php", { 
                    select: municipality,
                    slctd: s
                    })
            .done(function( data ) {
                $('#barangay').html(data);
            });

      $.getJSON( "retrieveZipcode.php", {select: municipality} )
                .done(function( json ) {
                $('#zipcode').val(json[0].zipcode);
            });     
}

function retrieveMunicipality(province,s){
       $.get( "retrieveMunicipality.php", { 
                    select: province,
                    slctd: s
                    })
            .done(function( data ) {
                $('#municipality').html(data);
            });
}

function retrieveProvince(region,s){
        $.get( "retrieveProvince.php", { 
                    select: region,
                    slctd: s
                    })
            .done(function( data ) {
                console.log('yes');
                $('#province').html(data);
            });
}

