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
<?php		$m_post = $row['m_post'];
		$b_pos = $m_post % 10000;
		$f_pos = $m_post / 10000;
		$f_pos = (int) $f_pos;
?>
<tr><td>パスワード</td><td><input type="password" name="m_pass1" size="21" maxlength="4" value=<?php echo $row['m_pass']; ?> ></td></tr>
<tr><td>パスワード(確認用)</td><td><input type="password" name="m_pass2" size="21" maxlength="4" value=<?php echo $row['m_pass']; ?> ></td></tr>
<tr><td>会員名</td><td><input type="text" name="m_name" value=<?php echo $row['m_name']; ?> ></td></tr>
<tr><td>郵便番号</td><td><input type="text" name="f_pos" size="5" maxlength="3" value=<?php echo $f_pos; ?> />-<input type="text" name="b_pos" size="8" maxlength="4" value=<?php echo $b_pos; ?> /></td></tr>
<tr><td>住所</td><td><input type="text" name="m_add" value=<?php echo $row['m_add']; ?> ></td></tr>
<tr><td>電話番号</td><td><input type="text" name="m_tel" value=<?php echo $row['m_tel']; ?> ></td></tr>
<tr><td>メールアドレス</td><td><input type="text" name="m_mail" value=<?php echo $row['m_mail']; ?> ></td></tr>
<tr><td></td><td align="right"><input type="submit" value="更新" /></td></tr>
</table>
</form>
</html>