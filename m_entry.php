<html>
<?xml version="1.0" encoding="Shift_JIS"?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"ja" lang="ja">

<head></head>
<title>米販売システム_新規会員登録</title>
<body>
<center><h1><font color="#FF0000">新規会員登録</font></center>
<br>

<font color="#FFCC00">アカウントの作成に必要な情報を正しく入力してください。</font>
<br>
<form action="../login_suru.do" name="aaa" method="post">
        <table>
			<tr><td>お名前<font color="#FF0000">(必須)</td><td><input type="text" name="m_name"size="20" maxlength="15"></td></tr>
			<tr><td>フリガナ<font color="#FF0000">(必須)</td><td><input type="text" name="m_fname"size="20" maxlength="15"></td></tr>
			<tr><td>宛先住所<font color="#FF0000">(必須)</td><td><input type="text" name="m_add"size="50" maxlength="30"></td></tr>
			<tr><td>電話番号<font color="#FF0000">(必須)</td><td><input type="text" name="m_tel"size="15" maxlength="13"></td></tr>
			<tr><td>メールアドレス</td><td><input type="text" name="m_mail"size="38" maxlength="20"></td></tr>
           	<tr><td>会員コード<font color="#FF0000">(必須)*半角英数字7文字</td><td><input type="text" name="m_code"size="15" maxlength="7"></td></tr>
          	<tr><td>パスワード<font color="#FF0000">(必須)*半角英数字4文字</td><td><input type="password" name="m_pass"size="10" maxlength="4"></td></tr>
        </table>
        <input type="submit" name="m_entry" value="登録">
		<h5><a href="/" >メインメニューに戻る</a></h5>

        
</form>

</body>
</html>