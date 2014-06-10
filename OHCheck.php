<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注文履歴確認</title>
  </head>
  <body>
    <form method="post" action="DSChange.php">
    <table border=1><tr><th></th><th>注文日</th><th>発送状態</th><th>顧客名</th><th>顧客住所</th><th>顧客TEL</th><th>顧客メールアドレス</th><th>注文商品</th><th>数量</th><th>単価</th><th>一点当たりの値引き額</th><th>請求金額</th></tr>
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

      $result = mysql_query(
                            "SELECT * " .
                            "FROM goods INNER JOIN s_member ON g_s_code = s_code " .
                            "INNER JOIN history ON g_code = h_g_code " .
                            "LEFT JOIN member ON m_code = h_m_code " .
                            "LEFT JOIN discount ON d_g_code = g_code AND h_date BETWEEN d_open AND d_end " .
                            "WHERE s_code =" . $s_code , $con);
      while($data = mysql_fetch_array($result)){
        echo '<tr><td><input type="checkbox" name="h_code[]" value="' . $data['h_code'] . '">' . 
             '</td><td>' . $data['h_date'];
          if($data['h_pri'] == 0){
             echo '</td><td><font color=red>未発送</font>' ;
          }else{
             echo '</td><td>発送済み' ;
          }
          if($data['h_name'] == null){
             echo '</td><td>' . $data['m_name'] . 
                  '</td><td>' . $data['m_add'] . 
                  '</td><td>' . $data['m_tel'] . 
                  '</td><td>' . $data['m_mail'];
          }else{
             echo '</td><td>' . $data['h_name'] . 
                  '</td><td>' . $data['h_add'] . 
                  '</td><td>' . $data['h_tel'] . 
                  '</td><td>' . $data['h_mail'];
          }
        echo '</td><td>' . $data['g_name'] . 
             '</td><td>' . $data['h_phot'] . 
             '</td><td>' . $data['g_pri'] . 
             '</td><td>' . $data['d_pri'] . 
             '</td><td>' . ( $data['g_pri'] - $data['d_pri'] ) * $data['h_phot'] . 
             '</td></tr>';
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }

    ?>
    <table>
    <p><input type="submit" value="選択した注文を発送済みにする" name="sumi"><input type="submit" value="選択した注文を未発送にする" name="mi"></p>
    </form>
  </body>
</html>


<!--
SELECT *
FROM goods INNER JOIN s_member ON g_s_code = s_code
INNER JOIN history ON g_code = h_g_code
LEFT JOIN member ON m_code = h_m_code
LEFT JOIN discount ON d_g_code = g_code AND h_date BETWEEN d_open AND d_end
WHERE s_code = 1;
-->