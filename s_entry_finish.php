<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>米販売システム_新規会員登録確認_新規会員登録完了</title>
</head>
<body>
<?php

$con = mysql_connect('172.20.17.202','admin','1111');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('riceshop', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}
$s_pass  = $_REQUEST['s_pass'];
$s_comp = $_REQUEST['s_comp'];
$s_name  = $_REQUEST['s_name'];
$s_add  = $_REQUEST['s_add'];
$s_tel  = $_REQUEST['s_tel'];
$s_mail  = $_REQUEST['s_mail'];

$result = mysql_query("INSERT INTO s_member(s_code, s_pass, s_comp, s_name, s_add, s_tel, s_mail) VALUES(null,' $s_pass ',' $s_comp ',' $s_name ',' $s_add ',' $s_tel ',' $s_mail ')",$con);
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}
?>



<center><h1><font color="#FF0000">販売会員登録完了</font></h1></center>

<br><center>
<h3>
販売会員登録が完了致しました。ご登録された販売会員内容は以下の通りです。
</h3>
</center>
<br>








<table border="3" align="center" width=800>
<caption><h3>1.登録内容</h3></caption>

<tr>	<td width=180>代表者名</td>
	<td>
	<?php
		$s_name = htmlspecialchars($_POST['s_name']);
		echo $s_name;
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
<center><h2>販売会員メニューは<a href="m_mainmenu.php" >こちら</a></h2></center>

</body>
</html>