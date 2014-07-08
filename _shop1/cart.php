<?php
   require 'common.php';
   $rows = array();
   $sum = 0;
   $n_date = date("Y/m/d");
   $pdo = connect();
   if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();   
   if (@$_POST['submit']) {
     @$_SESSION['cart'][$_POST['code']] += $_POST['num'];
   }
   foreach($_SESSION['cart'] as $code => $num) {
     $st = $pdo->prepare("SELECT MIN(if(d_open <= ? and d_end >= ?,g_pri - d_pri,g_pri)) as g_pri,g_code,g_name,g_exp,g_phot FROM discount right join goods on discount.d_g_code = goods.g_code GROUP BY g_code having g_code = ?");
     $st->execute(array($n_date,$n_date,$code));
     $row = $st->fetch();
     $st->closeCursor();
     $row['num'] = strip_tags($num);
     $sum += $num * $row['g_pri'];
     $rows[] = $row;
   }
	require 't_cart.php'; 
 ?>
