<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>米販売システム_会員登録_会員登録完了 </title>
<body>
<center><h1><font color="#FF0000">会員登録完了</font></h1></center>

<br><center>
<h3>
会員登録が完了致しました。ご登録された会員内容は以下の通りです。
</h3>
</center>
<br>
<h5>会員メニューは<a href=".php" >こちら</a></h5>




<table border="3" align="center" width=800>
<caption><h3>1.登録内容</h3></caption>

<tr>	<td width=180>お名前</td>
	<td>
	<?php
		$m_name = htmlspecialchars($_POST['m_name']);
		echo m_name;
	?>	
	</td>
</tr>

<tr>	<td width=180>お名前(フリガナ)</td>
	<td>
	<?php
		$m_fname = htmlspecialchars($_POST['m_fname']);
		echo m_fname;
	?>	
	</td>
</tr>

<tr>	<td width=180>宛先住所</td>
	<td>
	<?php
		$m_add = htmlspecialchars($_POST['m_add']);
		echo $m_add;
	?>
	</td>
</tr>

<tr>	<td width=180>電話番号</td>
	<td>
	<?php
		$m_tel = htmlspecialchars($_POST['m_name']);
		echo $m_tel;
	?>
	</td>
</tr>

<tr>	<td width=180>メールアドレス</td>
	<td>
	<?php
		$m_mail = htmlspecialchars($_POST['m_mail']);
		echo $m_mail;
	?>
	</td>
</tr>

<tr>	<td width=180>会員コード</td>
	<td>
	<?php
		$m_code = htmlspecialchars($_POST['m_code']);
		echo $m_code;
	?>	
	</td>
</tr>

<tr>	<td width=180>パスワード</td>
	<td>
	<?php
		$m_pass = htmlspecialchars($_POST['m_pass']);
		echo $m_pass;
	?>	
	</td>
</tr>
</table>
<br>

<h5><a href="mainmenu.php" >メインメニューに戻る</a></h5>
</body>
</html>