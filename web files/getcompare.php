<?php
    require "database.php";
 
        session_start ();
        $session_name = "user";
        if (!isset ($_SESSION[$session_name]) || $_SESSION[$session_name] == "") {
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        }
        if (isset($_GET['lang'])) {
            $_SESSION['lang'] = $_GET['lang'];
            echo "<script type='text/javascript'> document.location = 'compare.php'; </script>";
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
	  		a  {color: #b0bec5;font-size: 12px}
	  		img {height: 100%;}
	  		.he {height: 250px;}
	  		div.scrollmenu {overflow: auto;white-space: nowrap;}
			div.scrollmenu a {display: inline-block;text-align: center;text-decoration: none;padding-left: 15px;color: #263238;}
			.ico_he {height: 100px;}
	  	</style>

    </head>

    <body>

        <?php require "navigation.php"?>

	  	<div class="card-panel loginpanel center z-depth-3 <?php echo $_SESSION ["main_color"];?> ">
    	    <a class='dropdown-trigger btn white z-depth-3 black-text' href='#' data-target='dropdown1'>city list</a>
            <ul id='dropdown1' class='dropdown-content'>
                <?php
                    require "database.php";
                    $sql = "SELECT id, cityname FROM getcompare";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        echo "<li><a class='black-text' href='getcompare.php?lang=".$row['id']."'>".$row['cityname']."</a></li>";
                    }
	  			?>
            </ul>
    	</div>

      	<script type="text/javascript" src="js/materialize.min.js"></script>
      	<script>M.AutoInit();</script>
    </body>
</html>