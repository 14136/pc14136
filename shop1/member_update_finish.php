<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>会員情報更新完了</title>
<body>
<h1>会員情報更新完了</h1><br><br>
<?php
	$m_code = 22;
        $m_pass = htmlspecialchars($_POST['m_pass']);
	$m_name = htmlspecialchars($_POST['m_name']);
	$m_add = htmlspecialchars($_POST['m_add']);
	$m_tel = htmlspecialchars($_POST['m_tel']);
	$m_mail = htmlspecialchars($_POST['m_mail']);
	$m_pos = htmlspecialchars($_POST['bf_pos']);
	$h_pos2 = htmlspecialchars($_POST['h_pos']);
        require 'common.php';
	$pdo = connect();
        $st = $pdo->prepare("UPDATE member SET m_pass= ?,m_name= ?,m_add= ?,m_tel=?,m_mail= ?,m_post= ?WHERE m_code= ?;");
        $st->execute(array($m_pass,$m_name,$m_add,$m_tel,$m_mail,$m_pos,$m_code));	

?>


<table  border="3" align="center" width=800>
<caption><h2>以下の内容に更新しました。</h2></caption>
<tr><td width = 300 >パスワード</td>
	<td>
	<?php
		echo $m_pass;
	?>
	</td>
</tr>
<tr><td width = 300 >会員名</td>
	<td>
	<?php
		echo $m_name;
	?>
	</td>
</tr>
<tr>	<td width=180>郵便番号</td>
	<td>
	<?php
		echo $h_pos2;
	?>	
	</td>
</tr>

<tr><td width = 300 >住所</td>
	<td>
	<?php
		echo $m_add;
	?>
	</td>
</tr>
<tr><td width = 300 >電話番号</td>
	<td>
	<?php
		echo $m_tel;
	?>
	</td>
</tr>
<tr><td width = 300 >メールアドレス</td>
	<td>
	<?php
		echo $m_mail;
	?>
	</td>
</tr>
</table>
</html>