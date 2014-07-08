<html>
  <head>
	<link rel="stylesheet" href="shop.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>購入履歴確認</title>
  </head>
    
  <body>
	<center><h1><font color="#FF0000">米販売サイト</font><h1></center>

	<Table border="1"align="center" width="800" height="30" cellspacing="0" cellpadding="0">
	<Tr><Td align="center">
	<a href="mainmenu.php">HOME
	</Td><Td align="center">
	<a href="m_login.php">会員ログイン
	</Td><Td align="center">
	<a href="s_login.php">販売会員ログイン
	</Td><Td align="center">
	<a href="m_entry.html">会員登録
	</Td><Td align="center">
	<a href="s_entry.html">販売会員登録
	</Td></Tr>
	</Table>
	<br>
	<br>
	<p>MENU:</p>
	<ul>
	<li><a href=".php">商品選択</a></li><br>
	<li><a href=".php">カートの商品の確認、変更</a></li><br>
	<li><a href=".php">商品購入</a></li><br>
	</ul>
	<h2>購入履歴確認</h2>
	<a href=".php">お買い物に戻る</a>
    <form method="post" action="DSChange.php">
    <table border=1><tr><th>注文日</th><th>発送状態</th><th>顧客郵便番号</th><th>顧客住所</th><th>注文商品</th><th>数量</th><th>単価</th><th>一点当たりの値引き額</th><th>請求金額</th></tr>
    <?php
	  /*
	  session_start();
      $m_code = $_SESSION['m_code'];
	  */
	  $m_code = $_POST['m_code'];
	  
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
                            "WHERE m_code =" . $m_code , $con);
      while($data = mysql_fetch_array($result)){
        echo /*'<tr><td><input type="checkbox" name="h_code[]" value="' . $data['h_code'] . '">' . */
             '</td><td>' . $data['h_date'];
          if($data['h_pri'] == 0){
             echo '</td><td><font color=red>未発送</font>' ;
          }else{
             echo '</td><td>発送済み' ;
          }
          if($data['h_name'] == null){
			$m_pos = $data['m_post'];
			 $f_pos = $m_pos / 10000;
			 $f_pos = (int)$f_pos;
			 $b_pos = $m_pos % 10000;
             echo'</td><td>' . $f_pos."-".$b_pos.
				 '</td><td>' . $data['m_add'];
          }else{
			 $h_pos = $data['h_post'];
			 $f_pos = $h_pos / 10000;
			 $f_pos = (int)$f_pos;
			 $b_pos = $h_pos % 10000;
             echo'</td><td>' . $f_pos."-".$b_pos.
				 '</td><td>' . $data['h_add'];
          }
        echo '</td><td>' . $data['g_name'] . 
             '</td><td>' . $data['h_phot'] . 
             '</td><td>' . number_format($data['g_pri']) .
             '</td><td>' . number_format($data['d_pri']) . 
             '</td><td>' . number_format(($data['g_pri'] - $data['d_pri']) * $data['h_phot']) . 
             '</td></tr>';
      }

      $con = mysql_close($con);
      if(!$con){
        exit('データベースとの接続を閉じられませんでした。');
      }

    ?>
    </table>
    <!--<p><input type="submit" value="選択した注文を発送済みにする" name="sumi"><input type="submit" value="選択した注文を未発送にする" name="mi"></p>-->
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