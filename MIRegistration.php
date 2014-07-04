<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品情報登録</title>
  </head>
  <body>
    <p>商品情報を登録します</p>

    <form action="MIRegistration2.php" method="post" enctype="multipart/form-data">
      <table border="1">
        <tr>
          <th>商品名</th>
          <th>生産年</th>
          <th>商品説明</th>
          <th>商品画像(任意)</th>
          <th>商品価格</th>
        </tr>
        <tr>
          <td><input type="text" name="g_name"></td>
          <td><select name="nenndo">
              <option value="＿平成２４年産"selected>平成２４年産</option>
              <option value="＿平成２５年産">平成２５年産</option>
              <option value="＿平成２６年産">平成２６年産</option>
          </select></td>
          <td><input type="text" name="g_exp"></td>
          <td><input type="file" name="g_phot"  accept="image/jpeg,image/png,image/gif" size="50"></td>
          <td><input type="text" name="g_pri"></td>
        </tr>
      </table>
      <input type="submit" value="登録">
    </form>
  </body>
</html>