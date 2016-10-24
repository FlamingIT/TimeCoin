<?php
	session_start();
	if(isset($_POST["submit"])){
		$_SESSION['zalogowany'] = 1;
	}
	if($_SESSION['zalogowany'] == 1){
?>
<!DOCTYPE html>
<html lang="Pl">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="Shortcut icon" href="icon.ico">
	<link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title>O mnie - TimeCoin</title>
</head>
<body link="black" vlink="black" alink="black">

<div class="bg300" id="bg1">

	<?php
	require_once 'menu2.php';
	?>
	
	</br>	
		
	<center>
	<div class="title" id="title300">
	
		O mnie
	
	</div>
	</center>

</div>

<div class="omr" id="text">

	Login</br>
	Stan konta</br>
	Imię</br>
	Nazwisko</br>
	Płeć</br>
	Data urodzenia</br>
	Szkoła</br>
	E-mail</br>
	Telefon</br>
	Przedmioty</br>
	
</div>
<div class="oml" id="text">
	
<?php
		
	}
	else header("Location:index.php");

	require_once("db.php");
	
	$username = $_SESSION['login'];
	
	$result = mysql_query("SELECT * FROM users WHERE username='$username'");
	
	$row = mysql_fetch_assoc($result);
	
	$login = $row['username'];
	$fname = $row['f_name'];
	$lname = $row['s_name'];
	$brd = $row['brd'];
	$email = $row['email'];
	$tel = $row['tel'];
	$plec = $row['sex'];
	$points = $row['points'];
	$skl = $row['skl'];
	$info = $row['info'];
	$skills = $row['skills'];
	mysql_close();

	if($skills=="NULL"){
		$skills = "Brak przedmiotów";
	}

 		echo("
 			$login</br>
			$points (h)</br>
			$fname</br>
			$lname</br>
			$plec</br>
			$brd</br>
			$skl</br>
			$email</br>
			$tel</br>
			$skills</br>
			");
?>
</div>
</body>
</html>