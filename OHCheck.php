<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注文履歴確認</title>
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

      $result = mysql_query("SELECT * FROM history WHERE s_code = ". $_SESSION['s_code'] . " and s_pass = ", $con);
      while($data = mysql_fetch_array($result)){
        echo '<p>' . $data['no'] . ':' . $data['name'] . ':' . $data['tel'] . "</p>\n";
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }

    ?>
  </body>
</html>


商品テーブル
履歴テーブル
販売会員テーブル
値引きテーブル
会員テーブル

SELECT * FROM goods,s_member,history,member
WHERE s_member.s_code = goods.g_s_code
AND goods.g_code = history.h_g_code
AND member.m_code = history.h_m_code
AND s_member.s_code = 1;