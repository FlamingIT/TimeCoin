<?php
	session_start();
	if($_SESSION['zalogowany'] == 1){
	require_once("db.php");
?>
<!DOCTYPE html>
<html lang="Pl">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="Shortcut icon" href="icon.ico">
	<link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title>Rozliczenie - TimeCoin</title>
</head>
<body link="black" vlink="black" alink="black">

<div class="bg300" id="bg2">

	<?php
	require_once 'menu2.php';
	?>
	
	</br>	
		
	<center>
	<div class="title" id="title300">
	
		Rozliczenie
	
	</div>
	</center>

</div>

<div class="omr" id="text">

	<label for="login">Login użytkownika</label></br></br></br></br>

	Imię</br>
	Nazwisko</br>
	E-mail</br>
	Telefon</br></br>

	<label for="godz">Liczba godzin</label></br></br>

</div>
<div class="oml" id="text2">
	<form action="" method="post">
	<input name="login" id="left" type="text"/></br></br>

	<input type="submit" id="wyslij" name="find" value="Sprawdź"/></br></br>
	</form>
	
<?php
	if(isset($_POST['find'])){
	
	$username = $_POST['login'];
	$_SESSION['sendlogin'] = $username;
	
	$result = mysql_query("SELECT * FROM users WHERE username='$username'");
	
	$row = mysql_fetch_assoc($result);
	
	$fname = $row['f_name'];
	$lname = $row['s_name'];
	$email = $row['email'];
	$tel = $row['tel'];
	$skl = $row['skl'];
	$skills = $row['skills'];
	
		if($skills=="NULL"){
			$skills = "Brak przedmiotów";
		}
	}
	if(isset($_POST['send'])){
		$godz = $_POST['godz'];
		$yourlogin = $_SESSION['login'];
		$sendlogin = $_SESSION['sendlogin'];
		if($sendlogin != ""){
			
			$result = mysql_query("SELECT points FROM users WHERE username='$yourlogin'");
	
			$row = mysql_fetch_assoc($result);
			$yourpoints = $row['points'];
			if($yourpoints >= $godz){
					$yourpoints = $yourpoints - $godz;
					
					$result = mysql_query("UPDATE users SET points='$yourpoints' WHERE username='$yourlogin'");
					
					$result = mysql_query("SELECT points FROM users WHERE username='$sendlogin'");
		
					$row = mysql_fetch_assoc($result);
					$sendpoints = $row['points'];
					
					$sendpoints = $sendpoints + $godz;
						
					$result = mysql_query("UPDATE users SET points='$sendpoints' WHERE username='$sendlogin'");
			}
			else die("</br></br></br></br></br>Nie masz tyle godzin!");
		}
	}
	echo("
	$fname</br>
	$lname</br>
	$email</br>
	$tel</br></br>");
?>
<form action="" method="post">
	<select name="godz">
		<option selected="selected">1</option>
		<?php
			require_once("getpoints.php");
			echo("$pointsbox");
		?>
	</select></br></br>
	
	<input type="submit" id="wyslij" name="send" value="Wyślij"/>
</form>

</div>

</body>
</html>

<?php
	mysql_close();
	}
	else header("Location:index.php");
?>