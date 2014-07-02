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
$m_pass  = $_REQUEST['m_pass'];
$m_name = $_REQUEST['m_name'];
$m_add  = $_REQUEST['m_add'];
$m_tel  = $_REQUEST['m_tel'];
$m_mail  = $_REQUEST['m_mail'];

$result = mysql_query("INSERT INTO member(m_code, m_pass, m_name, m_add, m_tel, m_mail) VALUES(null,' $m_pass ',' $m_name ',' $m_add ',' $m_tel ',' $m_mail ')",$con);
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

 ?>










<center><h1><font color="#FF0000">会員登録完了</font></h1></center>

<br><center>
<h3>
会員登録が完了致しました。ご登録された会員内容は以下の通りです。
</h3>
</center>
<br>





<table border="3" align="center" width=800>
<caption><h3>1.登録内容</h3></caption>

<tr>	<td width=180>お名前</td>
	<td>
	<?php
		$m_name = htmlspecialchars($_POST['m_name']);
		echo $m_name;
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
		$m_tel = htmlspecialchars($_POST['m_tel']);
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
<center><h2>会員メニューは<a href="m_mainmenu.php" >こちら</a></h2></center>

</body>
</html>