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

      $result = mysql_query(
                            "SELECT g_name,g_pri,h_date,m_name,m_add,m_tel,m_mail,d_pri" .
                            "FROM goods INNER JOIN s_member ON g_s_code = s_code" .
                            "INNER JOIN history ON g_code = h_g_code" .
                            "INNER JOIN member ON m_code = h_m_code" .
                            "LEFT JOIN discount ON d_g_code = g_code AND h_date BETWEEN d_open AND d_end" .
                            "WHERE s_code =" . $_SESSION['s_code'] , $con);
      while($data = mysql_fetch_array($result)){
        echo '<p>' . $data['g_name'] . ':' . $data['g_pri'] . ':' . $data['h_date'] . "</p>\n";
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }

    ?>
  </body>
</html>


<!--
SELECT g_name,g_pri,h_date,m_name,m_add,m_tel,m_mail,d_pri 
FROM goods INNER JOIN s_member ON g_s_code = s_code
INNER JOIN history ON g_code = h_g_code
INNER JOIN member ON m_code = h_m_code
LEFT JOIN discount ON d_g_code = g_code AND h_date BETWEEN d_open AND d_end
WHERE s_code = 1;
-->