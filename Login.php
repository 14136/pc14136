<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ログイン</title>
  </head>
  <body>
    <p>会員コードとパスワードを入力してください</p>
    <form action="Login2.php" method="post">
      <table border="1">
        <tr>
          <td>会員コード</td>
          <td><input type="text" name="m_code"></td>
        </tr>
        <tr>
          <td>パスワード</td>
          <td><input type="text" name="m_pass"></td>
          <td colspan="2" align="center"><input type="submit" value="送信"></td>
        </tr>
      </table>
    </form>
    <?php

      $con = mysql_connect('172.20.17.202','admin','1111');
      if (!$con) {
        exit('データベースに接続できませんでした。');
      }

      $result = mysql_select_db('riceshop', $con);
      if (!$result) {
        exit('データベースを選択できませんでした。');
      }

      $result = mysql_query('SET NAMES utf8', $con);
      if (!$result) {
        exit('文字コードを指定できませんでした。');
      }

      $result = mysql_query('SELECT * FROM member', $con);
      while ($data = mysql_fetch_array($result)) {
        echo '<p>' . $data['m_code'] . '←会員コード　' . $data['m_pass'] . '←パスワード　' . $data['m_name'] . '←名前　' . $data['m_add'] . '←住所　' . $data['m_tel'] . '←電話番号　' . $data['m_mail'] .'←メールアドレス　'."</p>\n";
      }

      $con = mysql_close($con);
      if (!$con) {
        exit('データベースとの接続を閉じられませんでした。');
      }

    ?>
  </body>
</html>