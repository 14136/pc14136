<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<title>販売会員情報更新完了</title>
<body>
<h1>販売会員情報更新完了</h1><br><br>
<?php
        $s_pass = htmlspecialchars($_POST['s_pass']);
	$s_comp = htmlspecialchars($_POST['s_comp']);
	$s_name = htmlspecialchars($_POST['s_name']);
	$s_add = htmlspecialchars($_POST['s_add']);
	$s_tel = htmlspecialchars($_POST['s_tel']);
	$s_mail = htmlspecialchars($_POST['s_mail']);
	$s_code = 3;
        require 'common.php';
	$pdo = connect();
        $st = $pdo->prepare("UPDATE s_member SET s_pass= ?,s_comp = ?,s_name= ?,s_add= ?,s_tel=?,s_mail= ? WHERE s_code= ?;");
        $st->execute(array($s_pass,$s_comp,$s_name,$s_add,$s_tel,$s_mail,$s_code));

?>
<table  border="3" align="center" width=800 >
<caption><h2>以下の内容に更新しました。</h2></caption>
<tr><td width = 300  >パスワード</td>
	<td>
	<?php
		echo $s_pass;
		echo "<input type=\"hidden\" name=\"s_pass\" value=\""; 
		echo $s_pass;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >販売企業名</td>
	<td>
	<?php
		echo $s_comp;
		echo "<input type=\"hidden\" name=\"s_comp\" value=\""; 
		echo $s_comp;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >代表者名</td>
	<td>
	<?php
		echo $s_name;
		echo "<input type=\"hidden\" name=\"s_name\" value=\""; 
		echo $s_name;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >住所</td>
	<td>
	<?php
		echo $s_add;
		echo "<input type=\"hidden\" name=\"s_add\" value=\""; 
		echo $s_add;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >電話番号</td>
	<td>
	<?php
		echo $s_tel;
		echo "<input type=\"hidden\" name=\"s_tel\" value=\""; 
		echo $s_tel;
		echo "\" />";
	?>
	</td>
</tr>
<tr><td width = 300 >メールアドレス</td>
	<td>
	<?php
		echo $s_mail;
		echo "<input type=\"hidden\" name=\"s_mail\" value=\""; 
		echo $s_mail;
		echo "\" />";
	?>
	</td>
</tr>
</table>
</html>