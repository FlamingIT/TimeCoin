<?php
  session_start();
  
  $_SESSION['zalogowany'] = 0;
  
  header("Location:index.php");
?>