<?php
      session_start();
      if($_SESSION['s_name'] == null){
       header('Location: http://172.20.17.202/kome/SLogin.php');
      }
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品情報登録</title>
  </head>
  <body>
    <p>商品登録完了しました</p>
    <table border=1><tr><th>商品名</th><th>商品説明</th><th>商品画像</th><th>商品価格</th></tr>
    <?php
      session_start(); 

      $con = mysql_connect('172.20.17.202', 'admin', '1111');
      if(!$con){
        exit('データベースに接続できませんでした。');
      }

      $result = mysql_select_db('riceshop', $con);
        if(!$result){
          exit('データベースを選択できませんでした。');
        }

      $result = mysql_query('SET NAMES utf8', $con);
      if(!$result){
        exit('文字コードを指定できませんでした。');
      }
      

      $sqlstr = "SELECT * " .
                            "FROM goods " .
                            "WHERE g_s_code = " . $_SESSION['s_code'] . 
                            " AND g_code = " . $_SESSION['g_code'];

      $result = mysql_query($sqlstr);
      $data = mysql_fetch_array($result);
      echo '</td><td>' . $data['g_name'] . 
           '</td><td>' . $data['g_exp'] . 
           '</td><td><img src="' . $data['g_phot'] . '" height="100">' .
           '</td><td>' . $data['g_pri'] .  
           '</td></tr>';
      

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
    ?>
    <table>
    <input type="button" value="メニューに戻る" onClick="location.href='http://172.20.17.202/kome/SMemberMenu.php'">
    <input type="button" value="続けて登録する" onClick="location.href='http://172.20.17.202/kome/MIRegistration.php'">
  </body>
</html> 
