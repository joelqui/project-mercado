<?php
/*
session_start();

if(empty($_SESSION['user_id']))
  {
  header("Location: ./login/");
  }   */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker3.css">

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>    
    <script type="text/javascript" src="home.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
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
                <?php //echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>
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
        <div class="col-sm-offset-2 col-sm-1">
           <button type="button" class="btn btn-default pull-right" data-toggle="modal" 
                   data-target="#addsalTab"><span class="glyphicon glyphicon-plus"></span></button>  
           <br><br>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">USER ACCOUNTS MANAGEMENT</div>
                <div class="panel-body">

                   

                

                <div class="row">
                 <table class="table-bordered table-striped table-condensed text-center col-xs-12">
            <thead>
            <tr>
                <th style="width:10%" class="text-center">USER_ID</th>
                <th style="width:50%" class="text-center">NAME</th>
                <th style="width:25%"class="text-center">USERNAME</th>
                <th style="width:15%"class="text-center">CHANGE<br>PASSWORD</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                <td>1</td>
                <td>9,981</td>
                <td>10,072</td>
                <td>
                   
                             <button type="button" class="btn btn-default btn-sm" data-toggle="modal" 
                                    data-target="#addSalTable"><span class="glyphicon glyphicon-edit"></span></button>  
                        
                </td>
                </tr>
                <tr>
                <td>2</td>
                <td>10,667</td>
                <td>10,761</td>
                <td>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" 
                                    data-target="#addSalTable"><span class="glyphicon glyphicon-edit"></span></button>  
                </td>
                </tr>
                <tr>
                <td>3</td>
                <td>11,387</td>
                <td>11,468</td>
                <td>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" 
                                    data-target="#addSalTable"><span class="glyphicon glyphicon-edit"></span></button>  
                </td>
                </tr>
                <tr>
                <td>4</td>
                <td>12,155</td>
                <td>12,262</td>
                <td>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" 
                                    data-target="#addSalTable"><span class="glyphicon glyphicon-edit"></span></button>  
                </td>
                
                </tr>
         
            </tbody>
            </table>
            </div>
                </div>
            </div>
        </div>
    </div>   

    
</div>

<!-- Modal For Adding Personnel-->
<div id="adModal" class="modal fade" role="dialog">
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
                <input type="text" class="form-control" id="lastname" required>
                
                <label for="firstname" class-"control-label">First Name:</label>
                <input type="text" class="form-control" id="firstname">
                
                <label for="middlename" class-"control-label">Middle Name:</label>
                <input type="text" class="form-control" id="middlename">
            
                <div class="form-group">
                    <label for="suffix">Suffix:</label>
                    <select class="form-control" id="suffix">
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
                    <select class="form-control" id="civilstatus">
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
                <input type="text" class="form-control" id="maidenname" disabled>

                <label for="tin" class-"control-label">TIN:</label>
                <input type="number" min="111111111" maxlength="999999999" class="form-control" id="tin">
                
                <label for="birthdate" class-"control-label">Birth Date:</label>
                <input type="date" class="form-control" id="birthdate">
                
                <label for="birthplace" class-"control-label">Birth Place:</label>
                <input type="text" class="form-control" id="birthplace">

                <div class="form-group">
                <label for="empstatus">Employment Status</label>
                <select class="form-control" id="empstatus">
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
        <button type="button" class="btn btn-default" id="addEmpButton">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeEmpButton">Close</button>
      </div>
    </div>

  </div>
</div>



</body>
</html>  