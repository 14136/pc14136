<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品情報変更</title>
  </head>
  <body>
    <p>商品情報を変更します</p>
    <form action="MIChange3.php" method="post" enctype="multipart/form-data">
      <table border=1><tr><th>商品名</th><th>商品説明</th><th>画像</th><th>価格</th></tr>
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
                            "FROM goods " .
                            "WHERE g_s_code = " . $s_code.
                            " AND g_code = " . $_POST['g_code'] , $con);
        while($data = mysql_fetch_array($result)){
          echo '<tr><td><input type="text" name="g_name" value="' . $data['g_name'] . '">' . 
               '</td><td><input type="text" name="g_exp" value="' . $data['g_exp'] . '">' .
               '</td><td><img src="' . $data['g_phot'] . '"><input type="file" name="g_phot" accept="image/jpeg,image/png,image/gif" size="50">' .
               '</td><td><input type="text" name="g_pri" value="' . $data['g_pri'] . '">' .
               '</td></tr>';
          $_SESSION['g_photmae'] = $data['g_phot'];
        }
        $_SESSION['g_code'] = $_POST['g_code'];
        

        $con = mysql_close($con);
        if(!$con){
          exit('データベースとの接続を閉じられませんでした。');
        }

      ?>
      </table>
      <input type="submit" value="登録">
    </form>
  </body>
</html>