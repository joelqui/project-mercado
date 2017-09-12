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
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker3.css">

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/select2.min.js"></script>    
    <script type="text/javascript" src="manage.js"></script>
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
                   data-target="#addUserMenu"><span class="glyphicon glyphicon-plus"></span></button>  
           <br><br>
        </div>

        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center">USER ACCOUNTS MANAGEMENT</div>
                <div class="panel-body">

                   

                

                <div id="usersContainer" class="row col-sm-12">

              
                </div>
                </div>
            </div>
        </div>
    </div>   

</div>

<!-- Modal For Adding Personnel-->
<div id="addUserMenu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body" id="addUserDetails">
          <!-- Container for Add Personnel alert-->

          <div id="userAlert" class="row">
                   
          </div>
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <label for="lastname" class-"control-label">Last Name:</label>
                <input type="text" class="form-control" id="lastname" required>
                
                <label for="firstname" class-"control-label">First Name:</label>
                <input type="text" class="form-control" id="firstname">

                 <label for="username" class-"control-label">Username:</label>
                <input type="text" class="form-control" id="username" required>
                
                <label for="password" class-"control-label">Password:</label>
                <input type="password" class="form-control" id="password">
            
                <div class="form-group">
                    <label for="dept">Department:</label>
                    <select class="form-control" id="dept">
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="usertype">User Type:</label>
                    <select class="form-control" id="usertype">
           
                    </select>
                </div>

             </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="addUser">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeUserMenu">Close</button>
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
      <div class="modal-body" id="changePass">
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