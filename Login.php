<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ログイン</title>
  </head>
  <body>
    <p>会員コードとパスワードを入力してください</p>
    <p>会員コード：9</p>
    <p>パスワード：7891</p>
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
  </body>
</html>