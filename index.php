<?php
	session_start();
	if(isset($_POST["submit"])){
			
		require_once("db.php");

  		$username=$_POST['login'];
 			$password=$_POST['haslo'];
  		$password = md5($password);
		
		
		
		  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	  $sql = mysql_query($query) or die(mysql_error());
 	 	  if (mysql_num_rows($sql) == 1) {
 	      $row = mysql_fetch_assoc($sql); 
				$_SESSION["id"] = $row['userID'];
				$_SESSION["login"] = $username;
				$_SESSION["zalogowany"] = 1;
				header("Location:wyszukiwarka.php");
  			mysql_close();
	   }
	}
	if($_SESSION['zalogowany'] == 0){
?>

<?php
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
			$kategoria = (implode(", ",$_POST['kategoria']));
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
											$query = mysql_query("INSERT INTO users VALUES('','$login','$pass','$email1','$firstname','$lastname','$tel','5','$plec','$skl','$dataurodzenia','$kategoria')");
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

<!DOCTYPE html>
<html lang="Pl">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="Shortcut icon" href="icon.ico">
	<link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title>TimeCoin</title>
	  <style>
@-webkit-keyframes example {
    from {top:-100px;opacity: 0;}
    to {top:0px;opacity:1;}
}

@keyframes example {
    from {top:-100px;opacity: 0;}
    to {top:0px;opacity:1;}
}

.modal {
  display: none;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
	z-index: 3;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.6);
}

.modal:target {
  display: table;
  position: absolute;
}

.modal-dialog {
  display: table-cell;
  vertical-align: middle;
}

.modal-dialog .modal-content {
  margin: auto;
  background-color: #f3f3f3;
  position: relative;
  padding: 0;
  outline: 0;
  border: 1px #777 solid;
  text-align: justify;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  -webkit-animation-name: example; /* Chrome, Safari, Opera */
  -webkit-animation-duration: 0.5s; /* Chrome, Safari, Opera */
  animation-name: example;
  animation-duration: 0.5s;
}

.closebtn {
  text-decoration: none;
  float: right;
  font-size: 35px;
  font-weight: bold;
  color: #fff;
}

.closebtn:hover,
.closebtn:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.container {
  padding: 2px 16px;
}

header {
  background-image: url('4.png');
  font-size: 25px;
  color: white;
}
    
a {
text-decoration: none;
}
	</style>
</head>
<body link="black" vlink="black" alink="black">

<div class="bg300">
		
	<center>
	<div class="title" id="title300">
	
		<div class="maintitle">Witaj na TimeCoin!</div>
	
	</div>
	</center>

</div>

<div class="form" id="wid201">

	<div id="text">
<center>
	<a href="#idlog"><input type="button" value="Logowanie"/></a></br></br>
<a href="#idreg"><input type="button" value="Rejestracja"/></a>
		</center></br>
	
					<div id="idlog" class="modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<header class="container">
									<a href="#" class="closebtn">×</a>
									<h2><center>Logowanie</center></h2>
								</header>
								<div class="container">
									<p>
										
										<div class="form" id="log">

											<div id="text">

												<form action="" method="post">

													<label for="login">Login</label>
													<input name="login" id="log" type="text"/></br></br>

													<label for="login">Hasło</label>
													<input name="haslo" id="log" type="password"/></br></br>

													<input type="submit" name="submit" value="Zaloguj"/></br>

												</form>	

											</div>

										</div>
									
									</p>
								</div>
							</div>
						</div>
					</div> 
		
					<div id="idreg" class="modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<header class="container">
									<a href="#" class="closebtn">×</a>
									<h2><center>Rejestracja</center></h2>
								</header>
								<div class="container">
									<p>
										
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
																			echo '<input type= "checkbox" name= "kategoria[]" value="',$skill,'"/>', $skill ,'</br></br>';
																		$j++;
																		}

																		?>

														</div>

														</br>

														<input type="submit" value="Zarejestruj"/></br></br>

														<input type="reset" value="Wyczyść formularz"/></br>

													</form>

												</div>
											</div>
									
									</p>
								</div>
							</div>
						</div>
					</div> 
	
	</div>

</div>

<div class="bg300">

	<center>
	<div class="title" id="title300">
	
		Czym jest TimeCoin?
	
	</div>
	</center>

</div>
<div id="text3">

TimeCoin to portal, dzięki któremu możesz się uczyć i nauczać innych. Szybko znajdziesz osoby w twojej okolicy, z którymi możesz "handlować" swoimi umiejętnościami. Taka forma nauki pozwala zaoszczędzić pieniądze, ponieważ system, nad jakim pracujemy jest kompletnie darmowy. Jedyną walutą jest tu czas. Zarabiasz ucząc innych i wydajesz zgromadzony na koncie czas ucząc się u innych.
	
</div>

</body>
</html>
<?php
	}
	else header("Location:wyszukiwarka.php");
?>