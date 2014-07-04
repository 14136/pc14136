<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品情報変更</title>
  </head>
  <body>
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
      

      $sqlstr = "SELECT COUNT(*) " .
                            "FROM history " .
                            "WHERE h_g_code = " . $_SESSION['g_code'] . 
                            " AND h_pri = 0";
      $result = mysql_query($sqlstr);
      $data = mysql_fetch_array($result);

      if($data == 0){
        $sqlstr = "SELECT COUNT(*) " .
                            "FROM discount " .
                            "WHERE d_g_code = " . $_SESSION['g_code'];
        $result = mysql_query($sqlstr);
        $data = mysql_fetch_array($result);
        if($data != 0){
          $sqlstr = "DELETE FROM discount " .
                            "WHERE d_g_code = " . $_SESSION['g_code'];
          $result = mysql_query($sqlstr);
        }
        $sqlstr = "SELECT COUNT(*) " .
                            "FROM history " .
                            "WHERE h_g_code = " . $_SESSION['g_code'];
        $result = mysql_query($sqlstr);
        $data = mysql_fetch_array($result);
        if($data != 0){
          $sqlstr = "DELETE FROM history " .
                            "WHERE h_g_code = " . $_SESSION['g_code'];
          $result = mysql_query($sqlstr);
        }
        $sqlstr = "DELETE FROM goods " .
                            "WHERE g_code = " . $_SESSION['g_code'];
        $result = mysql_query($sqlstr);
        $data = mysql_fetch_array($result);
        echo '<p>商品を削除しました</p>';
      }else{
        echo '<p>未発送の商品があります</p><p>削除を実行できません</p>';
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }
    ?>
    <input type="button" value="メニューに戻る" onClick="location.href='http://172.20.17.202/kome/SMemberMenu.php'">
    <input type="button" value="続けて変更する" onClick="location.href='http://172.20.17.202/kome/MIChange.php'">

  </body>
</html> 