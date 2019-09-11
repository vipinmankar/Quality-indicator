<?php

    require "database.php";
	
   
    $sql = "SELECT `fname`, `lname`, `contact` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	$_SESSION["name"]=$row[0]." ".$row[1];

    if (isset($_GET['logout'])) {
        session_unset(); 
        session_destroy();
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
    
    echo "
        <nav class='".$_SESSION ["main_color"]." darken-5 white-text z-depth-5 center'>
    		<a href='#' data-target='slide-out' class='sidenav-trigger'><i class='material-icons'>menu</i></a>
    		<ul id='slide-out' class='sidenav left-align '>
    			<li>
    				<div class='user-view ".$_SESSION ["main_color"]." darken-5 center'><br>
				      	<a href='#user'><i class='material-icons' style='font-size: 100px'>account_circle</i></a>
				      	<a href='#name'><span class='white-text name'>".$row[0]." ".$row[1]."</span></a>
				      	<a href='#email'><span class='white-text email'>".$row[2]."</span></a>
    				</div>
    			</li>
    			<li><a class='waves-effect' href='index.php'>Home</a></li>
    			<li><a class='waves-effect' href='citylist.php'>Citylist</a></li>
    			<li><a class='waves-effect' href='getcompare.php'>compare</a></li>
			    <li><div class='divider'></div></li>
			    <li><a class='waves-effect' href='login.php?logout=true'>Logout</a></li>
  			</ul>
  			<img src='images/navlog.png'>
  			<i class='material-icons right-align'><a href='index.php'>home</a></i>
    	</nav>
    	";
?>