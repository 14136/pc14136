<html>
<?xml version="1.0" encoding="Shift_JIS"?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"ja" lang="ja">

<head></head>
<title>米販売システム_新規販売会員登録</title>
<body>
<center><h1><font color="#FF0000">新規販売会員登録</font></center>
<br>

<font color="#FFCC00">アカウントの作成に必要な情報を正しく入力してください。</font>
<br>
<form action="s_login_check.php" name="aaa" method="post">
        <table>
			<tr><td>代表者名<font color="#FF0000">(必須)</td><td><input type="text" name="s_name"size="20" maxlength="15"></td></tr>
			<tr><td>代表者名(フリガナ)<font color="#FF0000">(必須)</td><td><input type="text" name="s_fname"size="20" maxlength="15"></td></tr>
			<tr><td>販売企業名<font color="#FF0000">(必須)</td><td><input type="text" name="s_comp"size="50" maxlength="20"></td></tr>
			<tr><td>宛先住所<font color="#FF0000">(必須)</td><td><input type="text" name="s_add"size="50" maxlength="30"></td></tr>
			<tr><td>電話番号<font color="#FF0000">(必須)</td><td><input type="text" name="s_tel"size="15" maxlength="13"></td></tr>
			<tr><td>メールアドレス</td><td><input type="text" name="s_mail"size="38" maxlength="20"></td></tr>
           	<tr><td>会員コード<font color="#FF0000">(必須)*半角英数字7文字</td><td><input type="text" name="s_code"size="15" maxlength="7"></td></tr>
          	<tr><td>パスワード<font color="#FF0000">(必須)*半角英数字4文字</td><td><input type="password" name="s_pass"size="10" maxlength="4"></td></tr>
        </table>
        <input type="submit" name="m_entry" value="登録">
		<h5><a href="mainmenu.php" >メインメニューに戻る</a></h5>

</form>

</body>
</html>