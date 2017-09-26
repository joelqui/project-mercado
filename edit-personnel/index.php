<?php
session_start();
require_once '../connect.php';

if(empty($_SESSION['user_id']))
  {
  header("Location: ./login/");
  }

if(isset($_GET['personnel_id'])) {
$selected = $_GET['personnel_id'];
$htmlContent = "";
$school = $db->query("SELECT CONCAT(last_name,',',first_name,' ',middle_name) AS name FROM personnel WHERE personnel_id = $selected");
while ($row = $school->fetch_assoc()){
    $htmlContent .= '<h2 class="header" id="';
    $htmlContent .= $selected;
    $htmlContent .= '">Edit Personnel - ';
    $htmlContent .= $row['name'];
    $htmlContent .= '<h2>';
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/select2.min.css">


<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.number.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>    
<script type="text/javascript" src="../js/menu-visibility.js"></script>
<script type="text/javascript" src="edit.js"></script>
 
<title>MERCADO-EditPersonnel</title>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a href="#" class="navbar-brand" >J.HRIS</a>
        </div>
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="../" >Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle"
                    data-toggle="dropdown" role="button">Stations
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../serstat">Service Stations</a></li>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li id="user">
                    <a href="#" class="dropdown-toggle"
                    data-toggle="dropdown" id="<?php echo $_SESSION['usertype']?>" role="button">
                    <span class="glyphicon glyphicon-user"></span> 
                    <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li id="manageUsersOption"><a href="#">Manage Users</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

<div class="col-xs-offset-1 col-xs-10">    
   <div id="holder" class="form-group">
        <?php
        if(isset($_GET['personnel_id'])) {
            echo $htmlContent; }
        else{
            echo '<h2 class="header" id="1">Edit Personnel - NO PERSONNEL SELECTED</h2>';
        }
        ?> 
    </div>
</div>

<div class="col-xs-offset-1 col-xs-10">    
    <ul class="nav nav-tabs">
                <li class="active" id="perstab"><a href="#">Personal Information</a></li>
                <li  id="famitab"><a href="#" >Family Background</a></li>
                <li id="eductab"><a href="#" >Education/Eligibility</a></li>
            </ul>
          <br>  

        <div class="row" id="pers">   
            <div class="form-group row col-xs-12">
                <div class="col-xs-3">
                    <label for="addMoreLastName" class-"control-label">Last Name:</label>
                    <input type="text" class="form-control input-sm" id="addMoreLastName" required>
                </div>
            
                <div class="col-xs-3">
                    <label for="addMoreFirstName" class-"control-label">First Name:</label>
                    <input type="text" class="form-control input-sm" id="addMoreFirstName" required>
                </div>
            
                <div class="col-xs-3">
                    <label for="addMoreMiddleName" class-"control-label">Middle Name:</label>
                    <input type="text" class="form-control input-sm" id="addMoreMiddleName" required>
                </div>

                <div class="col-xs-2">
                    <label for="addMoreSuffix">Suffix:</label>
                    <select class="form-control input-sm" id="addMoreSuffix">
                        <option value=""></option>
                        <option value="SR">SR</option>
                        <option value="JR">JR</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                    </select>
                </div>
            </div>

            <div class="form-group row col-xs-12">
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Date of Birth</label>
                    <input type="date" class="form-control input-sm" id="lastname" required>
                </div>
                <div class="col-xs-4">
                    <label for="lastname" class-"control-label">Place of Birth</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>
                <div class="col-xs-2">
                    <label for="civilstatus">Civil Status</label>
                    <select class="form-control input-sm" id="civilstatus">
                        <option value="1">SINGLE</option>
                        <option value="2">MARRIED</option>
                        <option value="3">ANNULLED</option>
                        <option value="4">WIDOWED</option>
                        <option value="5">SEPARATED</option>
                    </select>  
                </div> 
            </div>

            <div class="form-group row col-xs-12">
                <div class="col-xs-4">
                    <label for="ex1">Email Address</label>
                    <input class="form-control input-sm" id="ex1" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Cellphone No.</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Citizenship</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                <div class="col-xs-1">
                    <label for="ex2">Height</label>
                    <input class="form-control input-sm" id="ex2" placeholder="mtrs" type="text">
                </div>
                    <div class="col-xs-1">
                    <label for="ex2">Weight</label>
                    <input class="form-control input-sm" id="ex2" placeholder="kgs" type="text">
                </div>
                    <div class="col-xs-2">
                    <label for="ex2">Blood Type</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
            </div>     

            <div class="form-group row col-xs-12">
                <div class="col-xs-2">
                    <label for="ex1">Address</label>
                    <input class="form-control input-sm" id="ex1" placeholder="Select Region" type="text">
                </div>
                <div class="col-xs-2">
                        <label for="ex2"></label>
                    <input class="form-control input-sm" id="ex2" placeholder="Province" type="text">
                </div>
                <div class="col-xs-2">
                        <label for="ex2"></label>
                    <input class="form-control input-sm" id="ex2" placeholder="Municipality/City" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2"></label>
                    <input class="form-control input-sm" id="ex2" placeholder="Barangay" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Zip Code</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">Tel. No.</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
            </div>     

            <div class="form-group row col-xs-12">
                <div class="col-xs-2">
                    <label for="ex1">Employee No.</label>
                    <input class="form-control input-sm" id="ex1" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">TIN</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">SSS No.</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="ex2">GSIS No.</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                    <div class="col-xs-2">
                    <label for="ex2">Pagibig ID No.</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
                    <div class="col-xs-2">
                    <label for="ex2">Philhealth No.</label>
                    <input class="form-control input-sm" id="ex2" type="text">
                </div>
            </div> 
        </div>  
        
        <div class="row" id="fami">   
                <div class="form-group row  col-xs-12">
                    <div class=" col-xs-4">
                        <label for="lastname" class-"control-label">Spouse's Last Name:</label>
                        <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
              
                    <div class="col-xs-4">
                          <label for="lastname" class-"control-label">Spouse's First Name:</label>
                          <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
               
                    <div class="col-xs-4">
                         <label for="lastname" class-"control-label">Spouse's Middle Name:</label>
                         <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
                </div>

                <div class="form-group row col-xs-12">
                    <div class="col-xs-4">
                        <label for="lastname" class-"control-label">Father's Last Name:</label>
                        <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
              
                    <div class="col-xs-4">
                          <label for="lastname" class-"control-label">Father's First Name:</label>
                          <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
               
                    <div class="col-xs-4">
                         <label for="lastname" class-"control-label">Father's Middle Name:</label>
                         <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
                </div>

                <div class="form-group row col-xs-12">
                    <div class="col-xs-4">
                        <label for="lastname" class-"control-label">Mothers's Maiden Last Name:</label>
                        <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
                    <div class="col-xs-4">
                          <label for="lastname" class-"control-label">Mothers's First Name:</label>
                          <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
                    <div class="col-xs-4">
                         <label for="lastname" class-"control-label">Mothers's Maiden Middle Name:</label>
                         <input type="text" class="form-control input-sm" id="lastname" required>
                    </div>
                </div>

                <div class="form-group row col-xs-12">
                    <div class="col-xs-3">
                          <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target="#childrenModal">Add Children</button>
                    </div>
                </div>

        </div> 

        <div class="row" id="educ">
            <h4>&nbsp&nbspCivil Service Eligibility</h4>
            <div class="form-group col-xs-12">
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Eligibility</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div> 
                <div class="col-xs-2">
                    <label for="lastname" class-"control-label">Rating</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Date of Examination</label>
                    <input type="date" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-4">
                    <label for="lastname" class-"control-label">Date of Examination</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
            </div>
            <h4>&nbsp&nbspEducational Background</h4>
            <div class="form-group col-xs-12">
                <div class="col-xs-2">
                    <label for="lastname" class-"control-label">Level</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div> 
                <div class="col-xs-4">
                    <label for="lastname" class-"control-label">Name of school</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Degree Course</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-2">
                    <label for="lastname" class-"control-label">Year Grad.</label>
                    <input type="date" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-1">
                    <label for="lastname" class-"control-label">Units</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
            </div>
        </div>
        <button type="button" class="btn btn-default" id="save">Save Changes</button>
    </div>


</body>
</html>  