<?php
	  $username = $_SESSION['login'];
	  
  	$result = mysql_query("SELECT points FROM users WHERE username='$username'");
  	
  	$row = mysql_fetch_assoc($result);
  		
  	$points = $row['points'];
  	mysql_close();
  			
  	for($i=1; $i<=$points; $i++){
  		if($i!=1){
  			$pointsbox .= "<option>$i</option>";
  		}
  	}
?>