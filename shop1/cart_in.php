<?php
   session_start();
   if (@$_POST['submit']) {
     @$_SESSION['cart'][$_POST['code']] += $_POST['num'];
   }
   function connect() {
	$dbtype = "mysql";
	$sv = "172.20.17.202";
	$dbname = "riceshop";
	$user = "admin";
	$pass = "1111";

	$dsn = "$dbtype:dbname=$dbname;host=$sv";
     	return new PDO($dsn, $user, $pass);
   }

   function img_tag($code) {
     if (file_exists("images/$code.jpg")) $name = $code;
     else $name = 'noimage';
     return '<img src="images/' . $name . '.jpg" alt="" width="100" height="100">';
   }

   $pdo = connect();
   $n_date = date("Y/m/d");
   $st = $pdo->prepare("SELECT MIN(if(d_open <= ? and d_end >= ?,g_pri - d_pri,g_pri)) as g_pri,g_code,g_name,g_exp,g_phot FROM discount right join goods on discount.d_g_code = goods.g_code GROUP BY g_code");
   $st->execute(array($n_date,$n_date));
   $goods = $st->fetchAll();
   $in = 1;
   require 't_index.php';
?>
