<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品情報変更</title>
  </head>
  <body>
    <form method="post" action="MIChange2.php">
    <p>変更する商品を選択してください</p>
    <table border=1><tr><th></th><th>商品名</th><th>商品説明</th><th>画像</th><th>価格</th></tr>
    <?php
      session_start();
      $s_code = $_SESSION['s_code'];

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
      $tt = 1;
      $result = mysql_query(
                            "SELECT * " .
                            "FROM goods " .
                            "WHERE g_s_code =" . $s_code , $con);
      while($data = mysql_fetch_array($result)){
        echo '<tr><td><input type="radio" name="g_code" value="' . $data['g_code'] . '"' ;
             if($tt == 1){
               echo ' checked="checked"';
               $tt = 0;
             } 
        echo '></td><td>' . $data['g_name'] .
             '</td><td>' . $data['g_exp'] . 
             '</td><td><img src="' . $data['g_phot'] . 
             '" height="100"></td><td>' . $data['g_pri'] . 
             '</td></tr>';
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }

    ?>
    </table> 
    <p><input type="submit" value="変更する" ></p>
    </form>
  </body>
</html>
