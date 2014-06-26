<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>販売会員情報更新</title>
<body>
<h1>販売会員情報更新</h1><br><br>
<?php
          require 'common.php';
          $pdo = connect();
	  $code = 3;
          $st = $pdo->prepare("SELECT * FROM s_member WHERE s_code= ?;");
          $st->execute(array($code));
          $row = $st->fetch();

?>
<table>
<form  action="s_member_update_check.php" method="post"><br><br>
<tr><td>パスワード</td><td><input type="text" name="s_pass" value=<?php echo $row['s_pass']; ?> /></td></tr>
<tr><td>販売企業名</td><td><input type="text" name="s_comp" value=<?php echo  $row['s_comp'] ; ?> /></td></tr>
<tr><td>代表者名</td><td><input type="text" name="s_name" value=<?php echo  $row['s_name']; ?> /></td></tr>
<tr><td>住所</td><td><input type="text" name="s_add" value=<?php echo $row['s_add']; ?> /></td></tr>
<tr><td>電話番号</td><td><input type="text" name="s_tel" value=<?php echo  $row['s_tel']; ?> /></td></tr>
<tr><td>メールアドレス</td><td><input type="text" name="s_mail" value=<?php echo $row['s_mail']; ?> /></td></tr>
<tr><td></td><td align="right"><input type="submit" value="次へ" /></td></tr>
</table>
</form>
</html>