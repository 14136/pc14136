<?php
   require 'common.php';
   $pdo = connect();
   $n_date = date("Y/m/d");
   $st = $pdo->prepare("SELECT MIN(if(d_open <= ? and d_end >= ?,g_pri - d_pri,g_pri)) as g_pri,g_code,g_name,g_exp,g_phot FROM discount right join goods on discount.d_g_code = goods.g_code GROUP BY g_code");
   $st->execute(array($n_date,$n_date));
   $goods = $st->fetchAll();
   $in = 0;
   require 't_index.php';
 ?>
