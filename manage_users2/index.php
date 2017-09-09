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
        <div class="col-sm-offset-1 col-sm-1">
           <button type="button" class="btn btn-default pull-right" data-toggle="modal" 
                   data-target="#addUser"><span class="glyphicon glyphicon-plus"></span></button>  
           <br><br>
        </div>

        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center">USER ACCOUNTS MANAGEMENT</div>
                <div class="panel-body">

                   

                

                <div class="row col-sm-12">

                 <table class="table-bordered table-striped table-condensed col-xs-12"><thead><tr><th style="width:5%" class="text-center">USER_ID</th><th style="width:15%" class="text-center">DEPT_CODE</th><th style="width:40%" class="text-center">NAME</th><th style="width:20%"class="text-center">USERNAME</th><th style="width:15%"class="text-center">USERTYPE<br></th><th style="width:5%"class="text-center">CHANGE<br>PASSWORD</th></tr></thead><tbody><tr><td  class="text-center">11</td><td>ADMIN</td><td>QUEENNIE TIA</td><td>queennie</td><td>admin</td><td class="text-center"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#changePassword" value="11"><span class="glyphicon glyphicon-edit"></span></button></td></tr><tr><td  class="text-center">12</td><td>ACCNTNG</td><td>JOCIELYN RANQUE</td><td>jocielyn</td><td>admin</td><td class="text-center"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#changePassword" value="12"><span class="glyphicon glyphicon-edit"></span></button></td></tr><tr><td  class="text-center">13</td><td>CASHIER</td><td>PHILLINE PLARISAN</td><td>philline</td><td>sds staff</td><td class="text-center"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#changePassword" value="13"><span class="glyphicon glyphicon-edit"></span></button></td></tr></tbody></table><div id="pageHolder"><ul class="pagination"><li><a class="page" href="#" id="1">1</a></li><li><a class="page" href="#" id="2">2</a></li></ul></div> 

                </div>
                </div>
            </div>
        </div>
    </div>   

    
</div>

<!-- Modal For Adding Personnel-->
<div id="addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body" id="addDetails">
          <!-- Container for Add Personnel alert-->

          <div class="row"></div>
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <label for="lastname" class-"control-label">Last Name:</label>
                <input type="text" class="form-control" id="lastname" required>
                
                <label for="firstname" class-"control-label">First Name:</label>
                <input type="text" class="form-control" id="firstname">

                 <label for="lastname" class-"control-label">Username:</label>
                <input type="text" class="form-control" id="lastname" required>
                
                <label for="firstname" class-"control-label">Password:</label>
                <input type="password" class="form-control" id="firstname">
            
                <div class="form-group">
                    <label for="dept">Department:</label>
                    <select class="form-control" id="dept">
                        
                        <option value=""></option><option value="1">ACCOUNTING</option><option value="5">ADMIN</option><option value="13">ASSISTANT SCHOOLS DIVISION SUPERINTENDENT</option><option value="2">BUDGET</option><option value="3">CASHIER</option><option value="4">COA</option><option value="12">CURRICULUM IMPLEMENTATION DIVISION</option><option value="22">FRONT DESK</option><option value="8">HUMAN RESOURCE AND DEVELOPMENT</option><option value="6">HUMAN RESOURCE AND MANAGEMENT</option><option value="18">INFORMATION COMMUNICATIONS AND TECHNOLOGY</option><option value="20">LEARNING RESOURCE</option><option value="19">LEGAL</option><option value="21">LIBRARY HUB</option><option value="16">MEDICAL</option><option value="11">MONITORING AND EVALUATION</option><option value="15">PHYSICAL FACILITIES</option><option value="9">PLANNING AND RESEARCH</option><option value="7">RECORDS</option><option value="14">SCHOOL GOVERNANCE AND OPERATIONS DIVISION</option><option value="10">SOCIAL MOBILIZATION</option><option value="17">SUPPLY</option> 
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="suffix">User Type:</label>
                    <select class="form-control" id="suffix">
                        <option value=""></option>
                        <option value="1">sds</option>
                        <option value="2">sds_staff</option>
                        <option value="3">asds</option>
                        <option value="4">asds_staff</option>
                        <option value="5">sds_ict</option>
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

<!-- Modal For Changing Password-->
<div id="changePassword" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body" id="addDetails">
          <!-- Container for Add Personnel alert-->
          <h4> Username: joelkeequi </h4>
          <div class="row"></div>
          <div class="row">
              <div class="col-sm-12">
                <label for="lastname" class-"control-label">Enter new password:</label>
                <input type="password" class="form-control" id="lastname" required>
                
                <label for="firstname" class-"control-label">Confirm new password:</label>
                <input type="password" class="form-control" id="firstname">

             </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="addEmpButton">Change Password</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeEmpButton">Close</button>
      </div>
    </div>

  </div>
</div>

</body>
</html>  