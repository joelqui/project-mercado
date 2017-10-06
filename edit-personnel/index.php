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
                    <label for="birthdate" class-"control-label">Date of Birth</label>
                    <input type="text" class="form-control input-sm" id="birthdate" required>
                </div>
                <div class="col-xs-4">
                    <label for="birthplace" class-"control-label">Place of Birth</label>
                    <input type="text" class="form-control input-sm" id="birthplace" required>
                </div>
                 <div class="col-xs-2">
                    <label for="sex">Sex</label>
                    <select class="form-control input-sm" id="sex">
                        <option value=""></option>
                        <option value="1">MALE</option>
                        <option value="2">FEMALE</option>
                    </select>  
                </div> 
                <div class="col-xs-2">
                    <label for="civilstatus">Civil Status</label>
                    <select class="form-control input-sm" id="civilstatus">
                        <option value=""></option>
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
                    <label for="email">Email Address</label>
                    <input class="form-control input-sm" id="email" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="celno">Cellphone No.</label>
                    <input class="form-control input-sm" id="celno" type="text">
                </div>
                <div class="col-xs-1">
                    <label for="height">Height</label>
                    <input class="form-control input-sm" id="height" placeholder="mtrs" type="text">
                </div>
                    <div class="col-xs-1">
                    <label for="weight">Weight</label>
                    <input class="form-control input-sm" id="weight" placeholder="kgs" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="bloodtype">Blood Type</label>
                    <select class="form-control input-sm" id="bloodtype">
                        <option value=""></option>
                        <option value="1">O+</option>
                        <option value="2">O-</option>
                        <option value="3">A+</option>
                        <option value="4">A-</option>
                        <option value="5">B+</option>
                        <option value="6">B-</option>
                        <option value="7">AB+</option>
                        <option value="8">AB-</option>
                    </select>
                </div>
            </div>     

            <div class="form-group row col-xs-12">
                <div class="col-xs-2">
                    <label for="region">Address</label>
                    <select class="form-control input-sm" id="region">
                        <option value="">Select Region</option>
                    </select>  
                </div>
                <div class="col-xs-2">
                    <label for="province"></label>
                    <select class="form-control input-sm" id="province">
                        <option value="">Province</option>
                    </select>  
                </div>
                <div class="col-xs-2">
                    <label for="municipality"></label>
                    <select class="form-control input-sm" id="municipality">
                        <option value="">Municipality/City</option>
                    </select>  
                </div>
                <div class="col-xs-2">
                    <label for="barangay"></label>
                    <select class="form-control input-sm" id="barangay">
                        <option value="">Barangay</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <label for="zipcode">Zip Code</label>
                    <input class="form-control input-sm" id="zipcode" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="telno">Tel. No.</label>
                    <input class="form-control input-sm" id="telno" type="text">
                </div>
            </div>     

            <div class="form-group row col-xs-12">
                <div class="col-xs-2">
                    <label for="empnum">Employee No.</label>
                    <input class="form-control input-sm" id="empnum" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="tin">TIN</label>
                    <input class="form-control input-sm" id="tin" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="sssnum">SSS No.</label>
                    <input class="form-control input-sm" id="sssnum" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="gsisnum">GSIS No.</label>
                    <input class="form-control input-sm" id="gsisnum" type="text">
                </div>
                    <div class="col-xs-2">
                    <label for="pagibignum">Pagibig ID No.</label>
                    <input class="form-control input-sm" id="pagibignum" type="text">
                </div>
                    <div class="col-xs-2">
                    <label for="philhealthnum">Philhealth No.</label>
                    <input class="form-control input-sm" id="philhealthnum" type="text">
                </div>
            </div> 
        </div>  
        
        <div class="row" id="fami">   
                <div class="form-group row  col-xs-12">
                    <div class=" col-xs-4">
                        <label for="slastname" class-"control-label">Spouse's Last Name:</label>
                        <input type="text" class="form-control input-sm" id="slastname" required>
                    </div>
              
                    <div class="col-xs-4">
                          <label for="sfirstname" class-"control-label">Spouse's First Name:</label>
                          <input type="text" class="form-control input-sm" id="sfirstname" required>
                    </div>
               
                    <div class="col-xs-4">
                         <label for="smiddlename" class-"control-label">Spouse's Middle Name:</label>
                         <input type="text" class="form-control input-sm" id="smiddlename" required>
                    </div>
                </div>

                <div class="form-group row col-xs-12">
                    <div class="col-xs-4">
                        <label for="flastname" class-"control-label">Father's Last Name:</label>
                        <input type="text" class="form-control input-sm" id="flastname" required>
                    </div>
              
                    <div class="col-xs-4">
                          <label for="ffirstname" class-"control-label">Father's First Name:</label>
                          <input type="text" class="form-control input-sm" id="ffirstname" required>
                    </div>
               
                    <div class="col-xs-4">
                         <label for="fmiddlename" class-"control-label">Father's Middle Name:</label>
                         <input type="text" class="form-control input-sm" id="fmiddlename" required>
                    </div>
                </div>

                <div class="form-group row col-xs-12">
                    <div class="col-xs-4">
                        <label for="mlastname" class-"control-label">Mothers's Maiden Last Name:</label>
                        <input type="text" class="form-control input-sm" id="mlastname" required>
                    </div>
                    <div class="col-xs-4">
                          <label for="mfirstname" class-"control-label">Mothers's First Name:</label>
                          <input type="text" class="form-control input-sm" id="mfirstname" required>
                    </div>
                    <div class="col-xs-4">
                         <label for="mmiddlename" class-"control-label">Mothers's Maiden Middle Name:</label>
                         <input type="text" class="form-control input-sm" id="mmiddlename" required>
                    </div>
                </div>

                <div class="form-group row col-xs-12">
                    <div class="col-xs-3">
                          <button type="button" id="addChildButton" class="btn btn-info btn-default" data-toggle="modal" data-target="#childrenModal">Add Children</button>
                    </div>
                </div>

        </div> 

        <div class="row" id="educ">
            <h4>&nbsp&nbspEligibility</h4>
            <div class="form-group col-xs-12">
                <div class="col-xs-3">
                    <label for="eligibility" class-"control-label">Eligibility</label>
                    <select class="form-control input-sm" id="eligibility">
                        <option value=""></option>
                    </select>  
                </div>  
            </div>
            <h4>&nbsp&nbspEducational Background-Undergraduate</h4>
            <div class="form-group col-xs-12">
                <div class="col-xs-4">
                    <label for="lastname" class-"control-label">Name of school</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Degree Course</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                 <div class="col-xs-2">
                    <label for="eligibility" class-"control-label">Graduated?</label>
                    <select class="form-control input-sm" id="eligibility">
                        <option value="">Yes</option>
                    </select>  
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
            <h4>&nbsp&nbspEducational Background-Masteral</h4>
            <div class="form-group col-xs-12">
                <div class="col-xs-4">
                    <label for="lastname" class-"control-label">Name of school</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Degree Course</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                 <div class="col-xs-2">
                    <label for="eligibility" class-"control-label">Graduated?</label>
                    <select class="form-control input-sm" id="eligibility">
                        <option value="">Yes</option>
                    </select>  
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
             <h4>&nbsp&nbspEducational Background-Doctoral</h4>
            <div class="form-group col-xs-12">
                <div class="col-xs-4">
                    <label for="lastname" class-"control-label">Name of school</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-3">
                    <label for="lastname" class-"control-label">Degree Course</label>
                    <input type="text" class="form-control input-sm" id="lastname" required>
                </div>  
                <div class="col-xs-2">
                    <label for="eligibility" class-"control-label">Graduated?</label>
                    <select class="form-control input-sm" id="eligibility">
                        <option value="">Yes</option>
                    </select>  
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

<!-- Modal -->
<div id="childrenModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content for adding children-->
    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">List of Children</h4>
            </div>
            <div class="modal-body">
                    <div class="row"> 
                        <div class="col-xs-12 form-group" id="childrenContainer">
                            


                        </div>
                       
                        <div id="addTextBoxArea" class="form-group">
                            <div class="col-xs-6">
                                <label for="childname" class-"control-label">Name of Child (Full name)</label>
                            </div> 
                            <div class="col-xs-4">
                                <label for="childbdate" class-"control-label">Date of Birth</label>
                            </div>  
                        </div>

                    </div>       

                    <div class="row">

                    <div class="col-xs-12 form-group">
                        <div class="col-xs-6">
                            <input type="text" class="form-control input-sm" id="childname" required>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control input-sm" id="childbdate" required>
                        </div>
                        <div class="col-xs-2">
                            <button type="button" id="addChild" class="btn btn-block btn-primary btn-sm">Add</button>
                        </div>
                    </div>       
                    </div>       
                                        
                     <!--<div class="form-group col-xs-12">
                                <div class="col-xs-6">
                                    <label for="childname1" class-"control-label">Name of Child (Full name)</label>
                                    <input type="text" class="form-control input-sm" id="childname1" required>
                                </div> 
                                <div class="col-xs-4">
                                    <label for="childbdate1" class-"control-label">Date of Birth</label>
                                    <input type="text" class="form-control input-sm" id="childbdate1" required>
                                </div>  
                            </div> 

                            <div class="form-group col-xs-offset-1 col-xs-11">
                                <button type="button" id="addChild" class="btn btn-default">Add</button>
                                <button type="button" id="removeChild" class="btn btn-default">Remove</button>
                            </div>    -->



                    
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </div>

  </div>
</div>

</body>
</html>  