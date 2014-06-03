<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>販売会員メインメニュー</title>
  </head>
  <body>
    <?php
      session_start();
      print("<p>".$_SESSION['s_name']."さんようこそ</p>");
    ?>
    <p><a href="http://172.20.17.202/kome/mada.php">商品登録</a></p>
    <p><a href="http://172.20.17.202/kome/mada.php">商品情報登録</a></p>
    <p><a href="http://172.20.17.202/kome/mada.php">注文履歴確認</a></p>
    <p><a href="http://172.20.17.202/kome/mada.php">販売会員の情報更新</a></p>
  </body>
</html>