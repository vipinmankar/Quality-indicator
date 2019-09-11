<?php
    require "database.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
          
        $myusername = $_POST["username"];
        $mypassword = $_POST["password"];  

        $sql = "SELECT id FROM user WHERE username = '".$myusername."' AND password = '".$mypassword."';";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            session_start ();
            $session_name = "user";
            $session_id = "userid";
            $_SESSION[$session_name] = $myusername;
            $_SESSION[$session_id] = $row["id"];
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }else {
            echo "Your Login Name or Password is invalid";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

      	<style type="text/css">
      		body {font-family: 'Raleway', sans-serif;color: #263238;background-image: linear-gradient(to bottom right, WHITE, #e3f2fd );}
      		.round {border-radius: 50px;}
	  		.loginpanel {width: 320px;top: 50%;left: 50%;position: absolute;transform: translate(-50%,-50%);background-image: linear-gradient(to bottom right, orange , white , green );}
	  		a  {color: #424242;font-size: 12px}
      	</style>

    </head>

    <body>
    	<div class="card-panel z-depth-5 loginpanel">
    		<div class="row center">
    			<img src="images/navlog.png" style="height:150px; width:150px">
    			<br><h3>Login</h3>
    		</div>
    		<div class="container">
    			<form action="" method="POST" class="center">
	    			<div class="row">
	    				<div class="input-field col s12 ">
	    					<input placeholder="Username" name="username" type="text" class="validate">
	    				</div>
	    			</div>					
					<div class="row">
	    				<div class="input-field col s12 ">
	    					<input placeholder="Password" name="password" type="password" class="validate">
	    				</div>
	    			</div>
	    			<input type="submit" name="submit" value="Submit" class="waves-effect waves-light btn grey lighten-5 z-depth-2 ">
    			</form>
    			<br>
    		</div>
    		<a href="registration.php">Don't have an Account.</a>
    	</div>
      	<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>