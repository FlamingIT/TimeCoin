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
	<title>Wyniki wyszukiwania - TimeCoin</title>
</head>
<body link="black" vlink="black" alink="black">

<div class="bg300" id="bg1">

	<?php
	require_once 'menu2.php';
	?>
	
	</br>	
		
	<center>
	<div class="title" id="title300">
	
		<?php
			$wybor=$_POST['search'];
			echo("$wybor");
		?>
	
	</div>
	</center>

	</div>

	<div id="text4">
	<div id="text">

		<?php
		//echo $wybor;
				require_once("db.php");
				$query="SELECT * FROM users where skills like '%".$wybor."%' order by points asc";
				$result=mysql_query($query);
				$num=mysql_num_rows($result);
				mysql_close();
			echo "<table><tr><td><b>Login:</b></td><td><b>Imię:</b></td><td><b>Nazwisko:</b></td><td><b>Email:</b></td><td><b>Telefon:</b></td></tr>";
		for ($i=0;$i<$num;$i++)	{
			$row=mysql_fetch_array($result);
			echo '<tr><td>',$row["username"],'</td><td>',$row["f_name"],'</td><td>',$row["s_name"],'</td><td>',$row["email"],'</td><td>',$row["tel"],'</td></tr>';
			}
		echo "</table>";
		?>
	
</div>
	</div>

</body>
</html>
<?php
	}
	else header("Location:index.php");
?>