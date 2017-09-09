

        $(document).ready(function () {
                
                isSelected();

                 
                 $('#states').select2({
             placeholder: 'Enter name of employee', 
              ajax: {
                     url: "../joel.php",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                    return {
                        eq: params.term // search term
                    
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
             
               $("#assignEmp").click(function() {
               var schoolID = $("#holder").find('h4').attr('id');
                var empID = $("#states").val();
               console.log(schoolID);
               console.log(empID);

                 $.post("assignpersonnel.php",{
                schoolID: schoolID,
                empID: empID },
                addSuccess,
                "text");

               });
        
                getDistrict();

        
              $('#states').on('select2:select', function (evt) {
                 
                  checkStatus();
              });

              $("#deleteEmp,#deleteOther").click(function() {
                  console.log('was here');
                  deletePersonnel();
                  updateTable();
                  checkStatus();
               });


                
            });

         
      //  });

function getDistrict(){
	$.get("retrieveDistricts.php",successFn);
}


function getSchool(){
 $("div .collapse,.panel-collapse").each(function( index ) {
  var dist = $( this ).attr('id');
  console.log(dist);
  $.get("retrieveSchools.php",{district: dist}, 
  function(data){
    $('#'+dist).find("ul").html(data);
  //  $(.html("The server returned: "+data);
  }
  );
});
}

function successFn(result){
	$("#districtAccordion").html(result);
    console.log("success");
    getSchool();
}

function checkStatus(){
     var schoolID = $("#holder").find('h4').attr('id');
                var empID = $("#states").val();
     $.get("checkassignment.php",{school: schoolID,employee: empID}, 
  function(data){
      console.log(data);
    if(data==0){
   $("#deleteEmp,#deleteOther").hide();
   $("#assignEmp").show();
}
else if (data==1){
    $("#assignEmp, #deleteEmp").hide();
     $("#deleteOther").show();
}
else if (data==2){
    $("#assignEmp, #deleteOther").hide();
     $("#deleteEmp").show();
}

        
    }
  );
}

function addSuccess(result){
	updateTable();
    console.log("fucking successful");
    checkStatus();
}

function updateTable(){
     $.get("retrievePersonnel.php",{school: $("#holder").find('h4').attr('id')}, 
  function(data){
      console.log(data);
    $("#schoolList").html(data);
  //  $(.html("The server returned: "+data);
  }
  );
    
}

function isSelected(){
    var school = $("#holder").find('h4').attr('id');
    if (school != 1){
        updateTable();
    }

}

function deletePersonnel(){
        $.get("deleteassignment.php",{employee: $("#states").val()}, 
    function(data){
        console.log('Success');
        updateTable();
    }
  );

}

  

