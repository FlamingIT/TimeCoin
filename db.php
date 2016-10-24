<?php
    $servername = "sql.5v.pl";
	  $username="db-user18980";
	  $password="5vids0c0fmu2td39";
	  $database="db-user18980";
    mysql_connect("$servername", "$username", "$password");
    mysql_select_db("$database") or die (mysql_error());
		mysql_query('SET character_set_database = utf8');
		mysql_query ("SET NAMES 'utf8'");
?>