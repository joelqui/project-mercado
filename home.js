

        $(document).ready(function () {
          
           
              $("#fami").hide();
              $("#educ").hide();
        var shit = $('#user').find('a').attr('id');
          console.log(shit);

          

           if(shit!=1){
               $('#manageUsersOption').hide();
               console.log('shit');
            
        }
              
            
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
                    //    parse the results into the format expected by Select2
                    //    since we are using custom formatting functions we do not need to
                    //   alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                       // params.page = params.page || 1;

                        return {
                            results: data
                            };
                        },
                    cache: true
                },
               // templateSelection: template,
               // escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 3
               // templateResult: formatRepo, // omitted for brevity, see the source of this page

               
         });


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

      

         

        $('#states').on('select2:select', function (evt) {
             $.get( "retrieveEmpName.php", { id: $("#states").val() } )
                .done(function( data ) {
                    $("#nameContainer").text(data);
                });

             $.get( "retrieveEmpDetails.php", { id: $("#states").val() } )
                .done(function( data ) {
                    $("#empInfo").html(data);
                });

            $.get( "retrieveServiceRecords.php", { id: $("#states").val() } )
                .done(function( data ) {
                    $("#serviceContainer").html(data);
                    $("#queennie").show();
                });
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




            function successFn(result){
              // var msg ="$("<div> was added to the Database.</div>");"  
               var emp = ($("#firstname").val().concat(" ",$("#lastname").val())).toUpperCase(); 
           //    var finalmsg ='<div>'.concat(emp,' was added to the Database.</div>');
            var finalmsg='<div class="col-sm-10 col-sm-offset-1 alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'.concat(emp,'</strong> added to the database.</div>');
               $("#addDetails div:first").html(finalmsg);
           
            $("#addDetails input:not(input:radio)").val("");
            $("#civilstatus,#empstatus,#suffix").val("1")
             $('#mradio').prop('checked',true);
            }
        });

      

       
  

