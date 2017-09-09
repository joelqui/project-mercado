<?php
//header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

if(isset($_GET['schoolid'])) {
$selectedSchool = $_GET['schoolid'];
$htmlContent = "";
$school = $db->query("SELECT * FROM school WHERE school_id = $selectedSchool");
while ($row = $school->fetch_assoc()){
    $htmlContent .= '<h4 class="header" id="';
    $htmlContent .= $selectedSchool;
    $htmlContent .= '">List of Personnel in ';
    $htmlContent .= $selectedSchool.' - '.$row['school_name'];
    $htmlContent .= '<h4>';
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>JHRIS-Service Stations</title>
</head>
<body>
     <nav class="navbar navbar-inverse">
            <div class="navbar-header">
             <a href="#" class="navbar-brand" >J.HRIS</a>
            </div>
              <ul class="nav navbar-nav">
      <li><a href="../" >Home</a></li>
      <li>
          <a href="#" class="dropdown-toggle"
          data-toggle="dropdown" role="button">Stations
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li><a href="serstat">Service Stations</a></li>
              <li><a href="../planstat">Plantilla Stations</a></li>
          </ul>
        </li>     
         <li>
          <a href="#" class="dropdown-toggle"
          data-toggle="dropdown" role="button">Reports
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li><a href="../stepinc">Step Increments</a></li>
              <li><a href="../loyalty">Loyalty Pay</a></li>
              <li><a href="../retire">Retirables</a></li>
              <li><a href="../demographics">Demographics</a></li>
          </ul>
        </li>        
    </nav>
   
   
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
         <div class="panel-group ">
              <div class="panel panel-default">
           
               <div class="panel-group" id="districtAccordion"></div>      

              </div>
         </div>
        </div>

       

        <div class="col-sm-6">
                     <div class="form-group">
                     <select class="form-control" name="states" id="states"></select>
                     </div>
                     <div class="form-group">
                     <button id="assignEmp" class="btn btn-default">Add</button>
                     <button id="deleteEmp" class="btn btn-default">Remove</button>
                     <button id="deleteOther" class="btn btn-default">Remove from currrent school</button>
                     </div>
                     <div id="holder" class="form-group">
                   <?php
                   if(isset($_GET['schoolid'])) {
                   echo $htmlContent; }
                   else{
                       echo '<h4 class="header" id="1">No school selected. :-)</h4>';
                   }
                   ?> 
                     </div>
                   <table align="center" class="table">
                       <thead>
                           <tr> 
                              <th>Name</th>
                              <th>Position</th> 
                           </tr>
                       </thead>
                       <tbody id="schoolList">
                           
                       </tbody>
                    </table>
        </div>
    </div>   
</div>




  
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script> 
<script src="district.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
</body>
</html>  