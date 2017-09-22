<?php
session_start();

if(empty($_SESSION['user_id']))
  {
  header("Location: ./login/");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/select2.min.css">


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.number.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/select2.min.js"></script>    
    <script type="text/javascript" src="js/menu-visibility.js"></script>
    <script type="text/javascript" src="home.js"></script>
 
  <title>MERCADO-Home</title>
</head>
<body>

    <nav class="navbar navbar-inverse">
            <div class="navbar-header">
             <a href="#" class="navbar-brand" >J.HRIS</a>
            </div>
            <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="#" >Home</a></li>
      <li>
          <a href="#" class="dropdown-toggle"
          data-toggle="dropdown" role="button">Stations
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li><a href="serstat">Service Stations</a></li>
              <li><a href="planstat">Plantilla Stations</a></li>
          </ul>
        </li>     
         <li>
          <a href="#" class="dropdown-toggle"
          data-toggle="dropdown" role="button">Reports
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li><a href="stepinc">Step Increments</a></li>
              <li><a href="loyalty">Loyalty Pay</a></li>
              <li><a href="retire">Retirables</a></li>
              <li><a href="demographics">Demographics</a></li>
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
                    <li><a href="./login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
                

            </li>
    </ul>
    </div>

    </nav>
    
    
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-1">
           <button type="button" id="addEmp"class="btn btn-default pull-right" data-toggle="modal" 
                   data-target="#addModal"><span class="glyphicon glyphicon-plus"></span></button> 
        </div>
        <div class="col-sm-3">
          <select class="form-control" name="search" id="search"></select>
        </div>
        <div class="col-sm-8">
            <h1 class="text-center" id="nameContainer">Please enter name of employee.<h1>
        </div>
    </div>

    <div class="row" id="queennie">
        <div class="col-sm-8 ">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Service Record</a></li>
                <li><a href="#">Service/Leave Credits</a></li>
                <li><a href="#">Salary</a></li>
                <li><a href="#">Submission Tracking</a></li>
            </ul>
            <div class="pre-scrollable">
             <table align="center" class="table-bordered table-striped text-center ">
                 <br>
                <thead>
                <tr>
                <th class="text-center" rowspan="2" colspan="2"> SERVICE </th>
                <th class="text-center" colspan="3"> RECORD OF APPOINTMENT</th>
                <th class="text-center" colspan="2"> OFFICE/ENTITY/DIV.</th>
                <th class="text-center"> Leave of </th>
                <th class="text-center" colspan="2"> SEPARATION</th>
                </tr>
                    <tr>
                <th class="text-center" rowspan="2"> Designation</th>
                <th class="text-center"> Status</th>
                <th class="text-center"> Salary</th>
                <th class="text-center"> Station/Place of</th>
                <th class="text-center"> Branch</th>
                <th class="text-center"> Absence</th>
                <th class="text-center" rowspan="2"> Date</th>
                    <th class="text-center" rowspan="2"> Cause</th>
                    </tr>

                        <tr>
                <th class="text-center"> From </th>
                <th class="text-center"> To</th>
                <th class="text-center"> [1]</th>
                <th class="text-center"> [2]</th>
                <th class="text-center"> Assignment</th>
                <th class="text-center"> [3]</th>
                <th class="text-center"> without pay</th>
                    </tr>
                </thead>
        
                <tbody id="serviceContainer">
                    <tr>
                        <td colspan="10">Please enter name of employee.</td>
                        </tr>
                </tbody>
        
             </table>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">PERSONNEL INFORMATION</div>
                <div class="panel-body">
                    <div id="personnelInfo">
                        <div>EMPLOYEE NUMBER:</div>
                        <div>DATE OF BIRTH:</div>
                        <div>GENDER:</div>
                        <div>CIVIL STATUS:</div>
                        <div>TAX IDENTIFICATION NUMBER:</div>
                        <div>PHILHEALTH NUMBER:</div>
                        <div>GSIS POLICY NUMBER:</div>
                        <div>POSITION:</div>
                        <div>STEP INCREMENT:</div>
                        <div>ORIGINAL APPOINTMENT:</div>
                        <div>LAST PROMO DATE: </div>
                        <div>PLANTILLA STATION: </div>
                        <div>SCHOOL ID</div>
                    </div> <br>
                    <div class="dropup">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Select Processing <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#addMoreModal" href="#">Add/Edit Details</a></li>
                            <li><a href="#">Promote</a></li>
                            <li><a href="#">Apply for Step Increment</a></li>
                            <li><a href="#">Apply for Loyalty Pay</a></li>
                            <li><a href="#">Apply for Resignation</a></li>
                            <li><a href="#">Apply for Retirement</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<!-- Modal For Adding Personnel-->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Personnel</h4>
      </div>
      <div class="modal-body" id="addDetails">
          <!-- Container for Add Personnel alert-->
          <div class="row"></div>
          <div class="row">
              <div class="col-sm-6">
                <label for="lastname" class-"control-label">Last Name:</label>
                <input type="text" class="form-control input-sm" id="lastname" required>
                
                <label for="firstname" class-"control-label">First Name:</label>
                <input type="text" class="form-control input-sm" id="firstname">
                
                <label for="middlename" class-"control-label">Middle Name:</label>
                <input type="text" class="form-control input-sm" id="middlename">
            
                <div class="form-group">
                    <label for="suffix">Suffix:</label>
                    <select class="form-control input-sm" id="suffix">
                        <option value="">NONE</option>
                        <option value="SR">SR</option>
                        <option value="JR">JR</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                    </select>
                </div>

                <div class="form-group">
                <label for="gender" class-"control-label">Gender:</label><br>
                    <div class="radio-inline">
                    <label><input type="radio" value="1" name="gender" id="mradio"checked>Male</label>
                    </div>
                    <div class="radio-inline">
                    <label><input type="radio" value="2" name="gender">Female</label>
                    </div>
                </div>

                <div class="form-group">
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
              <div class="col-sm-6">
                <label for="maidenname" class-"control-label">Maiden Name:</label>
                <input type="text" class="form-control input-sm" id="maidenname" disabled>

                <label for="tin" class-"control-label">TIN:</label>
                <input type="number" class="form-control input-sm" id="tin">
              
                <label for="birthdate" class-"control-label">Birth Date:</label>
                   <input type="text" class="form-control input-sm" readonly="readonly" id="birthdate">    
               
               

                
                <label for="birthplace" class-"control-label">Birth Place:</label>
                <input type="text" class="form-control input-sm" id="birthplace">  

                <div class="form-group">
                <label for="empstatus">Employment Status</label>
                <select class="form-control input-sm" id="empstatus">
                    <option value="1">REGULAR PERMANENT</option>
                    <option value="2">PERMANENT</option>
                    <option value="3">TEMPORARY</option>
                    <option value="4">SUBSTITUTE</option>
                    <option value="5">CO-TERMINOUS</option>
                    <option value="6">CONTRACTUAL</option>
                    <option value="7">CASUAL</option>
                    <option value="8">PROVISIONAL</option>
                    <option value="9">RETIRED</option>
                    <option value="10">RESIGNED</option>
                    <option value="11">TERMINATED</option>
                    <option value="12">TRANSFERRED</option>
                </select>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="addPersonnelButton">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeAddPersonnel">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal For Adding/Editing Personnel Details-->
<div id="addMoreModal" class="modal fade" role="dialog">
  <div class="modal-lg modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add/Edit Personnel Details</h4>
      </div>
      <div class="modal-body" id="addDetails">
          <!-- Container for Add Personnel alert-->
          
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="addEmpButton">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeEmpButton">Close</button>
      </div>
    </div>

  </div>
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
                            <div class="form-group col-xs-12">
                                <div class="col-xs-6">
                                    <label for="lastname" class-"control-label">Name of Child (Full name)</label>
                                    <input type="text" class="form-control input-sm" id="lastname" required>
                                </div> 
                                <div class="col-xs-4">
                                    <label for="lastname" class-"control-label">Date of Birth</label>
                                    <input type="date" class="form-control input-sm" id="lastname" required>
                                </div>  

                                <div class="col-xs-1">
                                    <button type="button" id="addEmp"class="align-middle btn btn-default pull-right" data-toggle="modal" 
                                        data-target="#"><span class="glyphicon glyphicon-plus"></span></button> 
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" id="addEmp"class="align-middle btn btn-default pull-right" data-toggle="modal" 
                                        data-target="#"><span class="glyphicon glyphicon-minus"></span></button> 
                                </div>
                            </div> 
                            <div class="form-group col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control input-sm" id="lastname" required>
                                </div>
                        
                                <div class="col-xs-4">
                                    <input type="date" class="form-control input-sm" id="lastname" required>
                                </div>   
                            </div> 
                       </div> 
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </div>

  </div>
</div>

</body>
</html>  