<?php
session_start();

if(isset($_SESSION['user_id']))
  {
  header("Location: ../");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Matilda Info Sys</title>
</head>
<body>

<div class="make-center top-buffer container">
	<div class="row "> 
		<section class="col-sm-offset-5 col-xs-4">
			<img src="../images/soleytelogo.png" class="icon" alt="Southern Leyte Logo">
      
		</section>
	</div>     
</div>

		

<div class="container">
  <div class="row">
    <section class="col-sm-offset-5 col-sm-4">
       <h4>Project MERCADO</h4>
      </section>
     <section class="col-sm-offset-3 col-sm-7">
       <h4>Managing Electronic Records to Continuously Advance Dynamic Actions</h4>
      </section>
    <section class="col-sm-offset-4 col-sm-4">
      
       <form id="loginForm">
          <div class="form-group">
              <label class="control-label" for="inputUserName">User Name:</label>
              <div>
                <input class="form-control" type="text"
                  id="inputUserName" placeholder="Enter User Name">  
              </div>
          </div>

          <div class="form-group">
              <label class="control-label" 
                for="inputPassword">Password:</label>
              <div>
                <input class="form-control" type="password"
                  id="inputPassword" placeholder="Enter Password">  
              </div>
          </div>

          

          <div class="form-group">
            
                  <button id="login" class="btn btn-default btn-block" type="submit">
                Login
                </button>
         
          </div>
       </form>

        <div id="loginNotify" class="form-group">
             
            </div>
     
    </section>
        <section class="col-sm-offset-4 col-sm-4">
            
        </section>
   
  </div><!-- row -->   

</div><!-- content container -->




  
<script src="../js/jquery.js"></script>
<script src="../js/boostrap.min.js"></script>
<script src="login.js"></script>
</body>
</html>  