<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品情報変更</title>
  </head>
  <body>
    <p>商品情報変更完了しました</p>
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
      echo $sqlstr;
      $result = mysql_query($sqlstr);
      $data = mysql_fetch_array($result);
      echo '</td><td>' . $data['g_name'] . 
           '</td><td>' . $data['g_exp'] . 
           '</td><td><img src="' . $data['g_phot'] . '">' .
           '</td><td>' . $data['g_pri'] .  
           '</td></tr>';
      

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
    ?>
    <table>
  </body>
</html> 