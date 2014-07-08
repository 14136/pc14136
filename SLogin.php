<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ログイン</title>
  </head>
  <body align="center">
    <br><br><br><br>
    <p>販売会員コードとパスワードを入力してください</p>
    <form action="SLogin2.php" method="post">
      <table border="1" align="center">
        <tr>
          <td>会員コード</td>
          <td><input type="text" name="s_code"></td>
        </tr>
        <tr>
          <td>パスワード</td>
          <td><input type="password" maxlength="4" name="s_pass"></td>
          <td colspan="2" align="center"><input type="submit" value="送信"></td>
        </tr>
      </table>
    </form>
  </body>
</html>