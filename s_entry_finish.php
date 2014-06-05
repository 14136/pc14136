<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shiftJIS" /></head>
<title>米販売システム_販売会員登録_販売会員登録完了</title>
<body>
<center><h1><font color="#FF0000">販売会員登録完了</font></h1></center>

<br><center>
<h3>
販売会員登録が完了致しました。ご登録された販売会員内容は以下の通りです。
</h3>
</center>
<br>
<h5>販売会員メニューは<a href=".php" >こちら</a></h5>




<table border="3" align="center" width=800>
<caption><h3>1.登録内容</h3></caption>

<tr>	<td width=180>代表者名</td>
	<td>
	<?php
		$s_name = htmlspecialchars($_POST['s_name']);
		echo s_name;
	?>	
	</td>
</tr>

<tr>	<td width=180>代表者名(フリガナ)</td>
	<td>
	<?php
		$s_fname = htmlspecialchars($_POST['s_fname']);
		echo s_fname;
	?>	
	</td>
</tr>

<tr>	<td width=180>販売企業名</td>
	<td>
	<?php
		$s_comp = htmlspecialchars($_POST['s_comp']);
		echo $s_comp;
	?>
	</td>
</tr>

<tr>	<td width=180>宛先住所</td>
	<td>
	<?php
		$s_add = htmlspecialchars($_POST['s_add']);
		echo $s_add;
	?>
	</td>
</tr>

<tr>	<td width=180>電話番号</td>
	<td>
	<?php
		$s_tel = htmlspecialchars($_POST['s_tel']);
		echo $s_tel;
	?>
	</td>
</tr>

<tr>	<td width=180>メールアドレス</td>
	<td>
	<?php
		$s_mail = htmlspecialchars($_POST['s_mail']);
		echo $s_mail;
	?>
	</td>
</tr>

<tr>	<td width=180>会員コード</td>
	<td>
	<?php
		$s_code = htmlspecialchars($_POST['s_code']);
		echo $s_code;
	?>	
	</td>
</tr>

<tr>	<td width=180>パスワード</td>
	<td>
	<?php
		$s_pass = htmlspecialchars($_POST['s_pass']);
		echo $s_pass;
	?>	
	</td>
</tr>
</table>
<br>

<h5><a href="mainmenu.php" >メインメニューに戻る</a></h5>
</body>
</html>