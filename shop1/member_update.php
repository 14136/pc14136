<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>会員情報更新</title>
<body>
<h1>会員情報更新</h1><br><br>
<?php
          require 'common.php';
          $pdo = connect();
	  $code = 22;
          $st = $pdo->prepare("SELECT * FROM member WHERE m_code= ?;");
          $st->execute(array($code));
          $row = $st->fetch();

?>
<table>
<form  action="member_update_check.php" method="post"><br><br>
<tr><td>パスワード</td><td><input type="text" name="m_pass" value=<?php echo $row['m_pass']; ?> ></td></tr>
<tr><td>会員名</td><td><input type="text" name="m_name" value=<?php echo $row['m_name']; ?> ></td></tr>
<tr><td>住所</td><td><input type="text" name="m_add" value=<?php echo $row['m_add']; ?> ></td></tr>
<tr><td>電話番号</td><td><input type="text" name="m_tel" value=<?php echo $row['m_tel']; ?> ></td></tr>
<tr><td>メールアドレス</td><td><input type="text" name="m_mail" value=<?php echo $row['m_mail']; ?> ></td></tr>
<tr><td></td><td align="right"><input type="submit" value="更新" /></td></tr>
</table>
</form>
</html>