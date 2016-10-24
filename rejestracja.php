<!DOCTYPE html>
<html lang="Pl">
<head>
	<meta charset="utf-8">
	<link rel="Shortcut icon" href="icon.ico">
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title>Rejestracja - TimeCoin</title>
</head>
<body link="black" vlink="black" alink="black">
	
<div class="bg300" id="bg2">

	<?php
		require_once 'menu.php';
			session_start();
			if($_SESSION["zalogowany"]==1) header("Location:wyszukiwarka.php");
			$login = $_POST['login'];
			$pass1 = $_POST['haslo'];
			$pass2 = $_POST['haslo2']; 
			$email1 = $_POST['email'];
			$email2 = $_POST['email2'];
			$firstname = $_POST['imie'];
			$lastname = $_POST['nazwisko'];
			$tel = $_POST['tel'];
			$skl = $_POST['szkola'];
			$dataurodzenia = $_POST['dataurodzenia'];
			$plec = $_POST['plec'];
			if($login!=""){
			if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) $msg = "Źle ułożony login";
			else{
				require_once("db.php");
				$query = mysql_query("SELECT * FROM users WHERE username='$login'");
				$numrows=mysql_num_rows($query);
				if($numrows!=0)
				{
					$msg = "Login jest zajęty";
				}
				else{
						if($pass1==$pass2){
							if($email1==$email2){
								if(strlen($pass1)>=8){
									if(strlen($pass1)<=20){
										if(strlen($info)<=200){
											$pass = md5($pass1);
											$query = mysql_query("INSERT INTO users VALUES('','$login','$pass','$email1','$firstname','$lastname','$tel','5','$plec','$skl','$dataurodzenia','NULL')");
											$query = "SELECT * FROM users WHERE username='$username'";
											$_SESSION["login"] = $login;
											$_SESSION['zalogowany'] = 1;
											$msg = "Konto zostało sworzone!";
											mysql_close();
											header("Location:wyszukiwarka.php");
										}
										else $msg = "Opis jest za długi!";
									}
									else $msg = "Hasło jest za długie!";
								}
								else $msg = "Hasło jest za krótkie!";
							}
							else $msg = "Błędny e-mail!";
						}
						else $msg = "Błędne hasło!";
					}
				}
			}
	?>
	
	</br>	
		
	<center>
	<div class="title" id="title300">
	
		Rejestracja
	
	</div>
	</center>
 		

</div>

<div class="form" id="reg">
	
	<?php
			if(isset($msg)){
				echo('<center><div id="text">'.$msg.'</div></center>');
			}
	?>
	
	</br></br>

	<div id="text">
	
		<form action="" method="post">
			
			<label for="login">Login</label>
			<input name="login" id="reg" type="text" required/></br></br>
			
			<label for="haslo">Hasło</label>
			<input name="haslo" id="reg" type="password" required/></br></br>
			
			<label for="haslo2">Powtórz hasło</label>
			<input name="haslo2" id="reg" type="password" required/></br></br>
			
			<label for="email">E-mail</label>
			<input name="email" id="reg" type="email" required/></br></br>
			
			<label for="email2">Powtórz E-mail</label>
			<input name="email2" id="reg" type="email" required/></br></br>

			<label for="tel">Telefon</label>
			<input name="tel" id="reg" type="text" required/></br></br>
			
			<label for="imie">Imię</label>
			<input name="imie" id="reg" type="text" required/></br></br>
			
			<label for="nazwisko">Nazwisko</label>
			<input name="nazwisko" id="reg" type="text" required/></br></br>
			
			<label for="dataurodzenia">Data urodzenia</label>
			<input name="dataurodzenia" id="reg" type="date" placeholder="dd.mm.rrrr" required/></br></br>

			<label for="plec">Płeć</label>
			<select name="plec" id="reg">
				<option>Mężczyzna</option>
				<option>Kobieta</option>
			</select></br></br>
			
			<label for="szkola">Szkoła</label>
			<select name="szkola" id="reg">
				<option>Podstawowa</option>
				<option>Gimnazjum</option>
				<option selected="selected">Liceum</option>
				<option>Technikum</option>
				<option>Studia I stopnia</option>
				<option>Studia II stopnia lub wyższe</option>
			</select></br></br>

			Jaki jest zakres twoich umiejętności?</br></br>
			
			<div id="lista">
			
								<?php
							require_once("db.php");
							$query="SELECT * FROM skills";
							$result=mysql_query($query);
							$num=mysql_num_rows($result);
							mysql_close();

							$j=0;
							while ($j < $num) {
							$skill=mysql_result($result,$j,"skill");
								echo '<input type= "checkbox" name= "kategoria" value="',$skill,'"/>', $skill ,'</br></br>';
							$j++;
							}

							?>
				
			</div>
			
			<input type="submit" value="Zarejestruj"/></br></br>
			
			<input type="reset" value="Wyczyść formularz"/>
			
		</form>

	</div>
</div>

</body>
</html>