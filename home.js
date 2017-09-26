$(document).ready(function () {
    
    $( "#birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

    $( "#birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

   $('#tin').number(this, 2,",","," );
    

   
       
    $('#search').select2({
        placeholder: 'Enter name of Personnel', 
        ajax: {
            url: "home/searchPersonnel.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
            return {
                searchTerm: params.term // search term
            
                };
            },
            processResults: function (data) {
                return {
                    results: data
                    };
                },
            cache: true
        },
        minimumInputLength: 3
    });


    

    //EventListener when a searched personnel is selected
    $('#search').on('select2:select', function (evt) {
        var personnelID = $('#search').val();
        var newUrl = "edit-personnel/?personnel_id="+$('#search').val();
        $.get( "home/retrievePersonnelName.php", { id: personnelID } )
        .done(function( data ) {
            $("#nameContainer").text(data);
        });

        $.get("home/retrievePersonnelDetails.php", { id: personnelID } )
        .done(function( data ) {
            $("#personnelInfo").html(data);
        });
        $('#editDetails').attr("href",newUrl);
    });
        
    $( "#addEmpButton" ).click(function() {
            $.post("addpersonnel.php",{
            lastName: $("#lastname").val(),
            firstName: $("#firstname").val(),
            middleName: $("#middlename").val(),
            suffix: $('#suffix').val(),
            gender: $('input[name=gender]:checked').val(),
            civilStatus: $('#civilstatus').val(),
            maidenName: $('#maidenname').val(),
            tin: $('#tin').val(),
            birthDate: $('#birthdate').val(),
            birthPlace: $('#birthplace').val(),
            empStatus:$('#empstatus').val()
            },
            successFn,
            "text");
        });

            $( "#closeEmpButton" ).click(function() {
                $("#addDetails div:first").html("").removeClass("col-sm-10 col-sm-offset-1 alert alert-success");
                 $("#addDetails input:not(input:radio)").val("");
                    $("#civilstatus,#empstatus,#suffix").val("1")
                    $('#mradio').prop('checked',true);
            });

            $("#addDetails input,select").change(function(){
                console.log($('#addDetails input[name=gender]:checked').val());
                if($('input[name=gender]:checked').val()=="2" && $('#civilstatus').val()!="1")
                    {
                    console.log("Yes");
                     $('#maidenname').prop('disabled',false);
                    }
                else{
                     $('#maidenname').val('');
                    $('#maidenname').prop('disabled',true);     
                }
            });




            
});

      
function successFn(result){
    var emp = ($("#firstname").val().concat(" ",$("#lastname").val())).toUpperCase(); 
    var finalmsg='<div class="col-sm-10 col-sm-offset-1 alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'.concat(emp,'</strong> added to the database.</div>');
    
    $("#addDetails div:first").html(finalmsg);
    $("#addDetails input:not(input:radio)").val("");
    $("#civilstatus,#empstatus,#suffix").val("1")
    $('#mradio').prop('checked',true);
}


       
  

