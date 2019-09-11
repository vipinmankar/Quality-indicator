<?php
      require "database.php";
    session_start ();
    $session_name = "user";
   
    if (!isset ($_SESSION[$session_name]) || $_SESSION[$session_name] == "") {
        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
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
      		body {font-family: 'Raleway', sans-serif;color: #263238;}
      		.round {border-radius: 50px;}
	  		.loginpanel {width: 320px;top: 50%;left: 50%;position: absolute;transform: translate(-50%,-50%);}
	  		img {height: 100%;}
	  		.he {height: 250px;}
	  		div.scrollmenu {overflow: auto;white-space: nowrap;}
			div.scrollmenu a {display: inline-block;text-align: center;text-decoration: none;padding-left: 15px;color: #263238;}
			.ico_he {height: 100px;}
	  	</style>

    </head>

    <body>

  <?php require "navigation.php"?>
	  	<div class="card-panel z-depth-3 flow-text center">
    	citylist
    	</div>

    	<div class="container center">
    		<ul class="collapsible popout">
			    <?php
	  			    $sql = "SELECT `cityname`, `level`,`dataenter` FROM `citylist` WHERE dataenter=1 ";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_row($result)) {
    	  			    echo "
            	  			<li>
			                    <div class='collapsible-header'>".$row[0]."</div>
			                    <div class='collapsible-body'><span class='left-align'>".$row[1]."<br><br></div>
			                </li>
            	  		";
                    }
	  			?>
			</ul>

     


      	<script type="text/javascript" src="js/materialize.min.js"></script>
      	<script>M.AutoInit();</script>
    </body>
</html>
