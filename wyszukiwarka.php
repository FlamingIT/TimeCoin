<?php
	session_start();
	if($_SESSION['zalogowany'] == 1){
?>

<!DOCTYPE html>
<html lang="Pl">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="Shortcut icon" href="icon.ico">
	<link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title>Wyszukiwarka - TimeCoin</title>
</head>

<body link="black" vlink="black" alink="black">

<div class="bg300" id="bg3">

	<?php
	require 'menu2.php';
	?>
	
	</br>	
		
	<center>
	<div class="title" id="title300">
	
		Wyszukiwarka
	
	</div>
	</center>

</div>
	
<center>
	
<div class="form">

	<div id="text">
	
		<?php

		//Łączenie się; z bazą danych na serwerze

		require_once("db.php");

		$query="SELECT * FROM skills";

		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		mysql_close();
		echo "<b><center>Wybierz kategorię</center></b></br>";
		//echo $query;
		//echo $result;
		//echo $num;
		echo '<form action="wyniki.php" method="post"><select id="search" name="search">';
		$j=0;
		while ($j < $num) {
		$skill=mysql_result($result,$j,"skill");
		echo "<option value=\"$skill\">$skill</option>";
		$j++;	
		}
		echo '</select></br></br></br>
		<input type="submit" id="chlep" value="Sprawdź"/>
		</form>';
		?>			
	</div>
	
</div>
	
</center>

</body>
</html>

<?php
	}
	else header("Location:index.php");
?>