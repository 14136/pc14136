<?php
   session_start();

   function connect(){
	$dbtype = "mysql";
	$sv = "172.20.17.202";
	$dbname = "riceshop";
	$user = "admin";
	$pass = "1111";

	// データベースに接続
	$dsn = "$dbtype:dbname=$dbname;host=$sv";
     	return new PDO($dsn, $user, $pass);
   }
   function img_tag($code) {
     if (file_exists("images/$code.jpg")) $name = $code;
     else $name = 'noimage';
     return '<img src="images/' . $name . '.jpg" alt="" width="100" height="100">';
   }
 ?>